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
        return view('contact', compact('destinations'));
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
