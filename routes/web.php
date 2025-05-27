<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware([\App\Http\Middleware\App::class])->group(function () {

});

Route::get('/', function () {
    return view('landing');
});
Route::get('/profile', function () {
    return view('user.profile');
});
Route::get('/rekomendasi-magang', function () {
    return view('user.rekomendasi_magang');
});
Route::get('/profile/edit', function () {
    return view('user.function.edit_profile');
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
Route::get('/admin/bimbingan-magang', function () {
    return view('admin.bimbingan_magang');
});

// POV ADMIN

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

// MAGANG

Route::get('/admin/bimbingan-magang/tambah', function () {
    return view('admin.function.bimbingan_magang.tambah');
});
Route::get('/admin/program-studi/tambah', function () {
    return view('admin.function.program_studi.tambah');
});
Route::get('/admin/lowongan-magang/tambah', function () {
    return view('admin.function.lowongan_magang.tambah');
});
Route::get('/admin/skema-magang/tambah', function () {
    return view('admin.function.skema_magang.tambah');
});

Route::get('/admin/skema-magang/edit', function () {
    return view('admin.function.skema_magang.edit');
});
Route::get('/admin/bimbingan-magang/edit', function () {
    return view('admin.function.bimbingan_magang.edit');
});
Route::get('/admin/program-studi/edit', function () {
    return view('admin.function.program_studi.edit');
});
Route::get('/admin/lowongan-magang/edit', function () {
    return view('admin.function.lowongan_magang.edit');
});

Route::get('/admin/laporan', function() {
    return view('admin.laporan');
});

// POV DOSEN
Route::get('/dosen/dashboard', function () {
    return view('dosen.dashboard');
});
Route::get('/dosen/magang/bimbingan-magang', function () {
    return view('dosen.bimbingan_magang');
});
Route::get('/dosen/magang/rekomendasi-magang', function () {
    return view('dosen.rekomendasi_magang');
});




Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postlogin']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');
