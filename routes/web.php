<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AkunDosenController;
use App\Http\Controllers\Admin\AkunMahasiswaController;
use App\Http\Controllers\Admin\BimbinganMagangController;
use App\Http\Controllers\Admin\LowonganMagangController;
use App\Http\Controllers\Admin\ProdiController;
use App\Http\Controllers\Admin\SkemaMagangController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Dosen\DosenDashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware([\App\Http\Middleware\App::class])->group(function () {

});

//Route Dashboard
Route::get('/', [DashboardController::class, 'index']);
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index']);
Route::get('/dosen/dashboard', [DosenDashboardController::class, 'index']);

Route::get('/rekomendasi-magang', function () {
    return view('user.rekomendasi_magang');
});
Route::get('/unggah-dokumen', function () {
    return view('user.function.unggah_dokumen');
});
Route::get('/profile/edit', function () {
    return view('user.function.edit_profile');
});
Route::get('/profile', function () {
    return view('user.profile');
});
Route::get('/daftar', function () {
    return view('auth.daftar');
});

// POV ADMIN

// MAHASISWA
Route::group(['prefix' => 'admin/manajemen-akun/mahasiswa'], function () {
    Route::get('/', [AkunMahasiswaController::class, 'index']);
    Route::get('/tambah', [AkunMahasiswaController::class, 'create']);
    Route::post('/tambah', [AkunMahasiswaController::class, 'store']);
    Route::get('/edit/{id}', [AkunMahasiswaController::class, 'edit']);
    Route::put('/edit/{id}', [AkunMahasiswaController::class, 'update']);
    Route::get('/detail/{id}', [AkunMahasiswaController::class, 'show']);
    Route::delete('/hapus/{id}', [AkunMahasiswaController::class, 'destroy']);
});

Route::get('/admin/pengajuan-magang', function () {
    return view('admin.pengajuan_magang');
});


// DOSEN
Route::group(['prefix' => 'admin/manajemen-akun/dosen-pembimbing'], function () {
    Route::get('/', [AkunDosenController::class, 'index']);
    Route::get('/tambah', [AkunDosenController::class, 'create']);
    Route::post('/tambah', [AkunDosenController::class, 'store']);
    Route::get('/edit/{id}', [AkunDosenController::class, 'edit']);
    Route::put('/edit/{id}', [AkunDosenController::class, 'update']);
    Route::get('/detail/{id}', [AkunDosenController::class, 'show']);
    Route::delete('/hapus/{id}', [AkunDosenController::class, 'destroy']);
});

// MAGANG

// BIMBINGAN MAGANG
Route::group(['prefix' => 'admin/bimbingan-magang'], function () {
    Route::get('/', [BimbinganMagangController::class, 'index']);
    Route::get('/tambah', [BimbinganMagangController::class, 'create']);
    Route::post('/tambah', [BimbinganMagangController::class, 'store']);
    Route::get('/edit/{id}', [BimbinganMagangController::class, 'edit']);
    Route::put('/edit/{id}', [BimbinganMagangController::class, 'update']);
    Route::get('/detail/{id}', [BimbinganMagangController::class, 'show']);
    Route::delete('/hapus/{id}', [BimbinganMagangController::class, 'destroy']);
});

// SKEMA MAGANG
Route::group(['prefix' => '/admin/skema-magang/'], function () {
    Route::get('/', [SkemaMagangController::class, 'index'])->name('admin.skema-magang');
    Route::get('/tambah', [SkemaMagangController::class, 'create']);
    Route::post('/tambah', [SkemaMagangController::class, 'store']);
    Route::get('/edit/{id}', [SkemaMagangController::class, 'edit']);
    Route::put('/edit/{id}', [SkemaMagangController::class, 'update']);
    Route::get('/detail/{id}', [SkemaMagangController::class, 'show']);
    Route::delete('/hapus/{id}', [SkemaMagangController::class, 'destroy']);
});

// PROGRAM STUDI
Route::group(['prefix' => '/admin/program-studi/'], function () {
    Route::get('/', [ProdiController::class, 'index'])->name('admin.program-studi');;
    Route::get('/tambah', [ProdiController::class, 'create']);
    Route::post('/tambah', [ProdiController::class, 'store']);
    Route::get('/edit/{id}', [ProdiController::class, 'edit']);
    Route::put('/edit/{id}', [ProdiController::class, 'update']);
    Route::get('/detail/{id}', [ProdiController::class, 'show']);
    Route::delete('/hapus/{id}', [ProdiController::class, 'destroy']);
});

// LOWONGAN MAGANG
Route::group(['prefix' => '/admin/lowongan-magang/'], function () {
    Route::get('/', [LowonganMagangController::class, 'index']);
    Route::get('/tambah', [LowonganMagangController::class, 'create']);
    Route::post('/tambah', [LowonganMagangController::class, 'store']);
    Route::get('/edit/{id}', [LowonganMagangController::class, 'edit']);
    Route::put('/edit/{id}', [LowonganMagangController::class, 'update']);
    Route::get('/detail/{id}', [LowonganMagangController::class, 'show']);
    Route::delete('/hapus/{id}', [LowonganMagangController::class, 'destroy']);
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
Route::get('/dosen/magang/bimbingan-magang/chat', function () {
    return view('dosen.bimbingan_magang.chat');
});
Route::get('/dosen/magang/rekomendasi-magang', function () {
    return view('dosen.rekomendasi_magang');
});




Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postlogin']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');
