<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware([\App\Http\Middleware\App::class])->group(function () {
    Route::get('/', function () {
        return view('landing');
    });
    Route::get('/profile', function () {
        return view('user.profile');
    });
    // Route::get('/login', function () {
    //     return view('auth.login');
    // });
    Route::get('/daftar', function () {
        return view('auth.daftar');
    });
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::get('/admin/manajemen-akun/mahasiswa', function () {
        return view('admin.manajemenAkun.mahasiswa');
    });
    Route::get('/admin/manajemen-akun/dosen-pembimbing', function () {
        return view('admin.manajemenAkun.dosen');
    });
});



Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postlogin']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');
