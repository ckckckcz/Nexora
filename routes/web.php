<?php

use Illuminate\Support\Facades\Route;

Route::middleware([\App\Http\Middleware\App::class])->group(function () {
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
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });
});
