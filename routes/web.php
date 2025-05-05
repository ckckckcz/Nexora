<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});
Route::get('/profile', function () {
    return view('user.profile');
});
Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/daftar', function () {
    return view('auth.daftar');
});
