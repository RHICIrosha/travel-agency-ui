<?php

use App\Models\Destination;
use App\Models\DestinationCategory;
use App\Models\FeaturedDestination;
use App\Models\HomepageSetting;
use App\Models\HomeService;
use App\Models\Review;
use App\Models\Tour;
use App\Models\WhyUsItem;
use App\Models\SiteSetting;
use App\Mail\ContactSubmissionMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    $settings = HomepageSetting::getSettings();
    $whyUsItems = WhyUsItem::active()->get();
    $homeServices = HomeService::active()->get();
    $featuredDestinations = FeaturedDestination::active()->get();

    return view('welcome', compact('settings', 'whyUsItems', 'homeServices', 'featuredDestinations'));
});
Route::get('/tours', function (Request $request) {
    // Currency handling
    $currencies = ['LKR', 'USD', 'EUR', 'GBP', 'AUD', 'CAD'];
    $selectedCurrency = $request->input('currency', 'LKR');
    if (! in_array($selectedCurrency, $currencies)) {
        $selectedCurrency = 'LKR';
    }

    $exchangeRate = 1;
    if ($selectedCurrency !== 'LKR') {
        $rates = Cache::remember('exchange_rates_lkr', 43200, function () {
            $response = Http::get('https://open.er-api.com/v6/latest/LKR');
            if ($response->successful()) {
                return $response->json('rates');
            }

            return null;
        });

        if ($rates && isset($rates[$selectedCurrency])) {
            $exchangeRate = $rates[$selectedCurrency];
        } else {
            $selectedCurrency = 'LKR'; // Fallback if API fails
        }
    }

    $query = Tour::with('destination');

    if ($request->filled('days')) {
        $query->where('duration_days', '<=', $request->days);
    }

    if ($request->filled('destinations')) {
        $query->whereIn('destination_id', $request->destinations);
    }

    if ($request->filled('trip_types')) {
        $query->where(function ($q) use ($request) {
            foreach ($request->trip_types as $type) {
                $q->orWhere('suitable_for', 'like', "%{$type}%");
            }
        });
    }

    if ($request->filled('themes')) {
        $query->where(function ($q) use ($request) {
            foreach ($request->themes as $theme) {
                $q->orWhereJsonContains('themes', $theme);
            }
        });
    }

    $tours = $query->get();
    $allDestinations = Destination::all();

    // Fetch unique trip types
    $tripTypesFromDb = Tour::whereNotNull('suitable_for')->pluck('suitable_for');
    $allTripTypes = [];
    foreach ($tripTypesFromDb as $typeStr) {
        $types = array_map('trim', explode(',', $typeStr));
        foreach ($types as $type) {
            if (! empty($type) && ! in_array($type, $allTripTypes)) {
                $allTripTypes[] = $type;
            }
        }
    }

    // Fetch unique themes
    $themesFromDb = Tour::whereNotNull('themes')->pluck('themes');
    $allThemes = [];
    foreach ($themesFromDb as $themeArray) {
        if (is_array($themeArray)) {
            foreach ($themeArray as $theme) {
                if (! empty($theme) && ! in_array($theme, $allThemes)) {
                    $allThemes[] = $theme;
                }
            }
        }
    }
    // Fetch max and min days for the filter
    $maxDays = Tour::max('duration_days') ?: 15;
    $minDays = Tour::min('duration_days') ?: 1;

    return view('tours', compact('tours', 'allDestinations', 'allTripTypes', 'allThemes', 'maxDays', 'minDays', 'selectedCurrency', 'exchangeRate', 'currencies'));
});
Route::get('/tours/{tour}', function (Tour $tour) {
    $tour->load('itineraries');

    return view('tour-detail', compact('tour'));
});
Route::get('/faq', function () {
    return view('faq');
});

// Add these two new routes:
Route::get('/destinations', function () {
    $destinations = Destination::all();
    $categories = DestinationCategory::with('locations')->get();

    return view('destinations', compact('destinations', 'categories'));
});
Route::get('/contact', function () {
    try {
        $destinations = Destination::all();
        $tours = Tour::all();
        return view('contact', compact('destinations', 'tours'));
    } catch (\Throwable $e) {
        return response()->json([
            'error' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'trace' => explode("\n", $e->getTraceAsString()),
        ], 500);
    }
});

Route::post('/contact', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|email|max:150',
        'phone' => 'required|string|max:50',
        'destination' => 'required|string|max:100',
        'coupon' => 'nullable|string|max:50',
    ]);

    $adminEmail = SiteSetting::getSettings()->contact_email ?? 'hello@zenoratravels.com';

    Mail::to($adminEmail)->send(new ContactSubmissionMail($validated));

    return back()->with('success', 'Your quote request has been sent! Our team will contact you within 2 hours.');
});

Route::get('/reviews', function () {
    $approvedReviews = Review::approved()->latest()->get();
    $totalReviews = Review::approved()->count();
    $avgRating = Review::approved()->avg('rating') ?? 0;

    return view('reviews', compact('approvedReviews', 'totalReviews', 'avgRating'));
});

Route::post('/reviews', function (Request $request) {
    $validated = $request->validate([
        'reviewer_name' => 'required|string|max:100',
        'reviewer_email' => 'nullable|email|max:150',
        'tour_name' => 'nullable|string|max:150',
        'rating' => 'required|integer|min:1|max:5',
        'mood_emoji' => 'nullable|string|max:10',
        'review_text' => 'required|string|min:20|max:2000',
        'images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        'images' => 'nullable|array|max:3',
    ]);

    $paths = [];
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $paths[] = $image->store('reviews', 'public');
        }
    }

    Review::create([
        'reviewer_name' => $validated['reviewer_name'],
        'reviewer_email' => $validated['reviewer_email'] ?? null,
        'tour_name' => $validated['tour_name'] ?? null,
        'rating' => $validated['rating'],
        'mood_emoji' => $validated['mood_emoji'] ?? null,
        'review_text' => $validated['review_text'],
        'images' => ! empty($paths) ? $paths : null,
        'status' => 'pending',
    ]);

    return redirect('/reviews')->with('success', 'Thank you! Your review has been submitted and is awaiting approval.');
});
Route::get('/privacy', function () {
    return view('privacy');
});
Route::get('/terms', function () {
    return view('terms');
});
Route::get('/cancellation-policy', function () {
    return view('cancellation-policy');
});
Route::get('/sitemap', function () {
    return view('sitemap');
});

// ── Zenora AI Chat endpoint ──────────────────────────────────────
Route::post('/ai-chat', function (Request $request) {
    $userMessage = strip_tags(trim($request->input('message', '')));
    if (empty($userMessage) || strlen($userMessage) > 500) {
        return response()->json(['reply' => 'Please ask a valid question (max 500 characters).']);
    }

    $apiKey = env('GEMINI_API_KEY', '');
    if (empty($apiKey)) {
        return response()->json(['reply' => 'AI assistant is currently unavailable. Please contact us directly at hello@zenoratravels.com or use the quote form below!']);
    }

    // Rich system prompt about Zenora Travels
    $systemPrompt = <<<'PROMPT'
You are the friendly and knowledgeable AI travel assistant for Zenora Travels — a premium travel agency based in Sri Lanka.
Your name is "Zenora AI Assistant". You help website visitors with questions about:
- Sri Lanka travel (destinations, weather, visas, safety, culture, food)
- Zenora Travels services, tours, and packages
- Tour pricing, inclusions, and booking process
- Cancellation and refund policy
- Specific Sri Lankan destinations: Sigiriya, Ella, Galle, Kandy, Yala, Nuwara Eliya, Colombo, Trincomalee, Arugam Bay, Mirissa, Bentota, Anuradhapura, Polonnaruwa, Adam's Peak, Horton Plains

COMPANY INFORMATION:
- Company: Zenora Travels
- Location: Sri Lanka
- Website: http://127.0.0.1:8000
- Contact: hello@zenoratravels.com
- Response time: Within 2 hours of inquiry
- Speciality: Tailor-made, private, chauffeur-guided tours in Sri Lanka and Asia

TOURS & PRICING:
- All tours are fully tailor-made and priced per group (not per person) unless stated
- Tours are available in multiple currencies: LKR, USD, EUR, GBP, AUD, CAD
- Duration ranges from short 3–4 day trips to full 14–15 day island-wide explorations
- Starting prices vary by season, group size, and accommodation category (budget / comfort / luxury)
- Flights are NOT included in packages — guests choose their own flights for flexibility
- A 30% non-refundable deposit is required to confirm a booking
- Each tour includes a dedicated private chauffeur guide throughout

KEY INCLUSIONS IN ALL PACKAGES:
- Private air-conditioned vehicle
- Dedicated English-speaking chauffeur guide
- All accommodation (as per itinerary category selected)
- All entrance fees to national parks and heritage sites
- All meals as specified (typically breakfast and dinner)
- 24/7 on-trip support from Zenora Travels

NOT INCLUDED:
- International flights
- Travel insurance
- Visa fees (ETA: approx. USD 50 online)
- Personal expenses, tips, alcohol

CANCELLATION POLICY:
- More than 30 days before departure: 70% refund of total tour cost
- Within 30 days of departure: No refund (non-refundable)
- The 30% booking deposit is always non-refundable
- Visa fees, airline tickets, and third-party services follow their own provider's policy

BOOKING PROCESS:
1. Browse tours on the website at /tours
2. Click "Book This Trip" or "Get a Quote"
3. Fill out the quote form with your preferences
4. Zenora team contacts you within 2 hours to finalize
5. Pay 30% deposit to confirm booking
6. Remaining balance due 30 days before departure

SRI LANKA TRAVEL FACTS:
- Visa: ETA required for most nationalities — apply at eta.gov.lk (approx USD 50, valid 30 days)
- Currency: Sri Lankan Rupee (LKR). Cards accepted at hotels/shops; carry cash for rural areas
- Best time West/South coast: December to March (dry season)
- Best time East coast (Trincomalee, Arugam Bay): May to September
- Language: Sinhala and Tamil; English widely spoken in tourist areas
- Religion: Mainly Buddhist; dress modestly at temples (cover shoulders and knees, remove shoes)
- Safety: Sri Lanka is very safe for tourists; Zenora provides 24/7 support throughout the journey
- Climate: Tropical; always warm. Nuwara Eliya highlands can be cold (10–20°C) — bring a jacket

DESTINATION HIGHLIGHTS:
- Sigiriya: UNESCO World Heritage 5th-century rock fortress. 1,200 steps. Best climbed 7 AM or after 3:30 PM.
- Ella: Famous Nine Arch Bridge, Little Adam's Peak (easy 1hr hike), Ella Rock (challenging 4hr hike)
- Galle: Dutch colonial fort (UNESCO listed), Lighthouse, colonial churches, Unawatuna Beach nearby
- Kandy: Temple of the Sacred Tooth Relic (Pooja at 5:30AM, 9:30AM, 6:30PM), Botanical Gardens, cultural shows
- Yala: World's highest leopard density. Morning safaris (6AM) and afternoon safaris (3PM). Closes Sep–Oct for Block 1.
- Nuwara Eliya: "Little England" hill station at 1,868m. Tea plantations, tea factory tours, cool climate 10–20°C
- Colombo: Capital city — shopping, street food, National Museum, Gangaramaya Temple
- Mirissa: Best whale watching (Nov–April), blue whales and sperm whales
- Trincomalee: Pristine east coast beaches, snorkeling, Koneswaram Temple

RULES FOR RESPONDING:
- Always be warm, friendly, and helpful
- Keep answers concise but informative (2-5 sentences unless detail is needed)
- For specific tour pricing not listed here, invite the user to fill out the quote form on the website
- If asked about something completely unrelated to travel or Zenora Travels, politely redirect to travel topics
- Never make up specific prices — direct to the quote form for exact pricing
- Always end responses that need follow-up with a gentle CTA to use the quote form or contact hello@zenoratravels.com
PROMPT;

    try {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->timeout(20)->post(
            "https://generativelanguage.googleapis.com/v1beta/models/gemini-flash-latest:generateContent?key={$apiKey}",
            [
                'system_instruction' => [
                    'parts' => [['text' => $systemPrompt]]
                ],
                'contents' => [
                    ['role' => 'user', 'parts' => [['text' => $userMessage]]]
                ],
                'generationConfig' => [
                    'temperature' => 0.7,
                    'maxOutputTokens' => 800,
                    'topP' => 0.9,
                    'thinkingConfig' => [
                        'thinkingBudget' => 0,
                    ],
                ],
                'safetySettings' => [
                    ['category' => 'HARM_CATEGORY_HARASSMENT', 'threshold' => 'BLOCK_MEDIUM_AND_ABOVE'],
                    ['category' => 'HARM_CATEGORY_HATE_SPEECH', 'threshold' => 'BLOCK_MEDIUM_AND_ABOVE'],
                ],
            ]
        );

        if ($response->successful()) {
            $data = $response->json();
            $reply = $data['candidates'][0]['content']['parts'][0]['text'] ?? null;
            if ($reply) {
                return response()->json(['reply' => trim($reply)]);
            }
        }

        // Log the error for debugging
        \Log::warning('Gemini API error', ['status' => $response->status(), 'body' => $response->body()]);
        return response()->json(['reply' => 'I\'m having a moment! Please try again or contact us at hello@zenoratravels.com 😊']);

    } catch (\Exception $e) {
        \Log::error('Gemini API exception', ['error' => $e->getMessage()]);
        return response()->json(['reply' => 'Connection issue. Please use the quote form below or email us at hello@zenoratravels.com 🙏']);
    }
})->middleware('web');
