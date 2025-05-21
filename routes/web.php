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
    Route::get('/admin/skema-magang', function () {
        return view('admin.skema_magang');
    });
    Route::get('/admin/program-studi', function () {
        return view('admin.program_studi');
    });
    Route::get('/admin/lowongan-magang', function () {
        return view('admin.lowongan_magang');
    });

    // MAHASISWA
    Route::get('/admin/manajemen-akun/mahasiswa', function () {
        return view('admin.manajemenAkun.mahasiswa');
    });
    Route::get('/admin/manajemen-akun/mahasiswa/tambah', function () {
        return view('admin.function.mahasiswa.tambah');
    });

    // DOSEN
    Route::get('/admin/manajemen-akun/dosen-pembimbing', function () {
        return view('admin.manajemenAkun.dosen');
    });
    Route::get('/admin/manajemen-akun/dosen-pembimbing/tambah', function () {
        return view('admin.function.dosen.tambah');
    });
});



Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postlogin']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');
