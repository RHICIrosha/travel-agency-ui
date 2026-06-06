<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('welcome'); });
Route::get('/tours', function () { 
    $tours = \App\Models\Tour::with('destination')->get();
    return view('tours', compact('tours')); 
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