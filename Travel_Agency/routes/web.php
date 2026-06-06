<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('welcome'); });
Route::get('/tours', function () { return view('tours'); });
Route::get('/tours/dream-route', function () { return view('tour-detail'); });
Route::get('/faq', function () { return view('faq'); });

// Add these two new routes:
Route::get('/destinations', function () { return view('destinations'); });
Route::get('/contact', function () { return view('contact'); });