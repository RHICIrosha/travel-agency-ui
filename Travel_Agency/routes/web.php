<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $settings            = \App\Models\HomepageSetting::getSettings();
    $whyUsItems          = \App\Models\WhyUsItem::active()->get();
    $homeServices        = \App\Models\HomeService::active()->get();
    $featuredDestinations = \App\Models\FeaturedDestination::active()->get();
    return view('welcome', compact('settings', 'whyUsItems', 'homeServices', 'featuredDestinations'));
});
Route::get('/tours', function (\Illuminate\Http\Request $request) { 
    $query = \App\Models\Tour::with('destination');

    if ($request->filled('days')) {
        $query->where('duration_days', '<=', $request->days);
    }
    
    if ($request->filled('destinations')) {
        $query->whereIn('destination_id', $request->destinations);
    }
    
    if ($request->filled('trip_types')) {
        $query->where(function($q) use ($request) {
            foreach ($request->trip_types as $type) {
                $q->orWhere('suitable_for', 'like', "%{$type}%");
            }
        });
    }

    if ($request->filled('themes')) {
        $query->where(function($q) use ($request) {
            foreach ($request->themes as $theme) {
                $q->orWhereJsonContains('themes', $theme);
            }
        });
    }

    $tours = $query->get();
    $allDestinations = \App\Models\Destination::all();

    // Fetch unique trip types
    $tripTypesFromDb = \App\Models\Tour::whereNotNull('suitable_for')->pluck('suitable_for');
    $allTripTypes = [];
    foreach ($tripTypesFromDb as $typeStr) {
        $types = array_map('trim', explode(',', $typeStr));
        foreach ($types as $type) {
            if (!empty($type) && !in_array($type, $allTripTypes)) {
                $allTripTypes[] = $type;
            }
        }
    }

    // Fetch unique themes
    $themesFromDb = \App\Models\Tour::whereNotNull('themes')->pluck('themes');
    $allThemes = [];
    foreach ($themesFromDb as $themeArray) {
        if (is_array($themeArray)) {
            foreach ($themeArray as $theme) {
                if (!empty($theme) && !in_array($theme, $allThemes)) {
                    $allThemes[] = $theme;
                }
            }
        }
    }
    // Fetch max and min days for the filter
    $maxDays = \App\Models\Tour::max('duration_days') ?: 15;
    $minDays = \App\Models\Tour::min('duration_days') ?: 1;
    
    return view('tours', compact('tours', 'allDestinations', 'allTripTypes', 'allThemes', 'maxDays', 'minDays')); 
});
Route::get('/tours/{tour}', function (\App\Models\Tour $tour) { 
    $tour->load('itineraries');
    return view('tour-detail', compact('tour')); 
});
Route::get('/faq', function () { return view('faq'); });

// Add these two new routes:
Route::get('/destinations', function () { 
    $destinations = \App\Models\Destination::all();
    $categories = \App\Models\DestinationCategory::with('locations')->get();
    return view('destinations', compact('destinations', 'categories')); 
});
Route::get('/contact', function () { return view('contact'); });