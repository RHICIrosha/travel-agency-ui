<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tours', function () {
    return view('tours');
});

Route::get('/tours/dream-route', function () {
    return view('tour-detail');
});