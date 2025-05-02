<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});
Route::get('/profile', function () {
    return view('user.profile');
});
Route::get('/dashboard', function () {
    return view('user.dashboard');
});
