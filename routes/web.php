<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AkunDosenController;
use App\Http\Controllers\Admin\AkunMahasiswaController;
use App\Http\Controllers\Admin\BimbinganMagangController;
use App\Http\Controllers\Admin\KriteriaController;
use App\Http\Controllers\Admin\LowonganMagangController;
use App\Http\Controllers\Admin\PengajuanMagangController;
use App\Http\Controllers\Admin\PenilaianLowonganController;
use App\Http\Controllers\Admin\PosisiMagangController;
use App\Http\Controllers\Admin\ProdiController;
use App\Http\Controllers\Admin\ProfileDosenController;
use App\Http\Controllers\Admin\ProfilemahasiswaController;
use App\Http\Controllers\Admin\SkemaMagangController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Dosen\DosenDashboardController;
use App\Http\Controllers\Dosen\BimbinganMagangDosenController;
use App\Http\Controllers\Dosen\ProfileMahasiswaDosenController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\RekomendasiController;
use App\Http\Controllers\User\DetailLowonganController;
use App\Http\Controllers\User\LogAktivitasController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\RekomendasiMagangMahasiswaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Testing\SMCController;
use App\Http\Controllers\User\LowonganMagangMahasiswaController;

Route::middleware([\App\Http\Middleware\App::class])->group(function () {

});

//Route Dashboard
Route::get('/', [DashboardController::class, 'index']);
Route::get('/dosen/dashboard', [DosenDashboardController::class, 'index']);

Route::group(['prefix' => 'profile'], function () {

    Route::middleware('auth')->group(function () {
        Route::get('/edit/{id}/', [ProfileController::class, 'edit'])->name('user.profile.edit');
        Route::put('/edit/{nim}', [ProfileController::class, 'update']);
    });
});

// PENGAJUAN MAGANG
Route::group(['prefix' => 'admin/pengajuan-magang'], function () {
    Route::get('/', [PengajuanMagangController::class, 'index'])->name('admin.pengajuan-magang');
    Route::get('/edit/{id}', [PengajuanMagangController::class, 'edit']);
    Route::put('/edit/{id}', [PengajuanMagangController::class, 'update']);
});

Route::get('/admin/laporan', function() {
    return view('admin.laporan');
});

// POV DOSEN
Route::get('/dosen/dashboard', function () {
    return view('dosen.dashboard');
});
Route::get('/dosen/magang/bimbingan-magang', [BimbinganMagangDosenController::class, 'index'])->name('dosen.bimbingan-magang');

Route::get('/dosen/magang/bimbingan-magang/chat', function () {
    return view('dosen.bimbingan_magang.chat');
});
Route::get('/dosen/magang/rekomendasi-magang', function () {
    return view('dosen.rekomendasi_magang');
});
Route::get('/dosen/mahasiswa/log-aktivitas', function () {
    return view('dosen.log_aktivitas');
});
Route::get('/dosen/mahasiswa/profile', [App\Http\Controllers\Dosen\ProfileMahasiswaDosenController::class, 'index']);

Route::get('/rekomendasi-test', [RekomendasiController::class, 'calculateVikor']);
Route::group(['prefix' => 'detail-lowongan'], function () {
    // Route::get('/', [DetailLowonganController::class, 'index']);
    // Route::get('/{id}', [DetailLowonganController::class, 'view']);
});

Route::get('/log-aktivitas', [LogAktivitasController::class, 'create']);
Route::post('/log-aktivitas/store', [LogAktivitasController::class, 'store']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postlogin']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::middleware(['auth', 'role:dosen'])->prefix('dosen')->group(function () {
    Route::get('/chat', [ChatController::class, 'index'])->name('dosen.chat');
    Route::post('/chat/send', [ChatController::class, 'sendMessage']);
    Route::get('/chat/messages', [ChatController::class, 'getMessages']);
});

Route::middleware(['auth', 'authorize:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index']);

    // MAHASISWA
    Route::group(['prefix' => 'admin/manajemen-akun/mahasiswa'], function () {
        Route::get('/', [AkunMahasiswaController::class, 'index'])->name('admin.manajemen-akun.mahasiswa');
        Route::get('/edit/{id}', [AkunMahasiswaController::class, 'edit']);
        Route::put('/edit/{id}', [AkunMahasiswaController::class, 'update']);
        Route::get('/detail/{id}', [AkunMahasiswaController::class, 'show']);
        Route::delete('/hapus/{id}', [AkunMahasiswaController::class, 'destroy']);
    });

    // MAHASISWA
    Route::group(['prefix' => 'admin/profile/mahasiswa'], function () {
        Route::get('/', [ProfilemahasiswaController::class, 'index'])->name('admin.profile.mahasiswa');
        Route::get('/tambah', [ProfilemahasiswaController::class, 'create']);
        Route::post('/tambah', [ProfilemahasiswaController::class, 'store']);
        Route::get('/edit/{id}', [ProfilemahasiswaController::class, 'edit']);
        Route::put('/edit/{id}', [ProfilemahasiswaController::class, 'update']);
        Route::get('/detail/{id}', [ProfilemahasiswaController::class, 'show']);
        Route::delete('/hapus/{id}', [ProfilemahasiswaController::class, 'destroy']);
    });

    // DOSEN
    Route::group(['prefix' => 'admin/manajemen-akun/dosen'], function () {
        Route::get('/', [AkunDosenController::class, 'index'])->name('admin.manajemen-akun.dosen');
        Route::get('/edit/{id}', [AkunDosenController::class, 'edit']);
        Route::put('/edit/{id}', [AkunDosenController::class, 'update']);
        Route::get('/detail/{id}', [AkunDosenController::class, 'show']);
        Route::delete('/hapus/{id}', [AkunDosenController::class, 'destroy']);
    });

    // DOSEN
    Route::group(['prefix' => 'admin/profile/dosen'], function () {
        Route::get('/', [ProfileDosenController::class, 'index'])->name('admin.profile.dosen');
        Route::get('/tambah', [ProfileDosenController::class, 'create']);
        Route::post('/tambah', [ProfileDosenController::class, 'store']);
        Route::get('/edit/{id}', [ProfileDosenController::class, 'edit']);
        Route::put('/edit/{id}', [ProfileDosenController::class, 'update']);
        Route::get('/detail/{id}', [ProfileDosenController::class, 'show']);
        Route::delete('/hapus/{id}', [ProfileDosenController::class, 'destroy']);
    });

    // MAGANG

    // BIMBINGAN MAGANG
    Route::group(['prefix' => 'admin/bimbingan-magang'], function () {
        Route::get('/', [BimbinganMagangController::class, 'index'])->name('admin.bimbingan-magang');
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
        Route::get('/', [LowonganMagangController::class, 'index'])->name('admin.lowongan-magang');
        Route::get('/tambah', [LowonganMagangController::class, 'create']);
        Route::post('/tambah', [LowonganMagangController::class, 'store']);
        Route::get('/edit/{id}', [LowonganMagangController::class, 'edit']);
        Route::put('/edit/{id}', [LowonganMagangController::class, 'update']);
        Route::get('/detail/{id}', [LowonganMagangController::class, 'show']);
        Route::delete('/hapus/{id}', [LowonganMagangController::class, 'destroy']);
    });

    // POSISI MAGANG
    Route::group(['prefix' => '/admin/posisi-magang/'], function () {
        Route::get('/', [PosisiMagangController::class, 'index'])->name('admin.posisi-magang');
        Route::get('/tambah', [PosisiMagangController::class, 'create']);
        Route::post('/tambah', [PosisiMagangController::class, 'store']);
        Route::get('/edit/{id}', [PosisiMagangController::class, 'edit']);
        Route::put('/edit/{id}', [PosisiMagangController::class, 'update']);
        Route::get('/detail/{id}', [PosisiMagangController::class, 'show']);
        Route::delete('/hapus/{id}', [PosisiMagangController::class, 'destroy']);
    });

    // SPK
    Route::group(['prefix' => 'admin/sistem-rekomendasi'], function () {
        Route::group(['prefix' => 'manajemen-kriteria'], function () {
            Route::get('/', [KriteriaController::class, 'index'])->name('admin.manajemen-kriteria');
            Route::get('/tambah', [KriteriaController::class, 'create']);
            Route::post('/tambah', [KriteriaController::class, 'store']);
            Route::get('/edit/{id}', [KriteriaController::class, 'edit']);
            Route::put('/edit/{id}', [KriteriaController::class, 'update']);
            Route::get('/detail/{id}', [KriteriaController::class, 'show']);
            Route::delete('/hapus/{id}', [KriteriaController::class, 'destroy']);
        });

        Route::group(['prefix' => 'pembobotan-lowongan'], function () {
            Route::get('/', [PenilaianLowonganController::class, 'index'])->name('admin.pembobotan-lowongan');
            Route::get('/tambah', [PenilaianLowonganController::class, 'create']);
            Route::post('/tambah', [PenilaianLowonganController::class, 'store']);
            Route::get('/edit/{id}', [PenilaianLowonganController::class, 'edit']);
            Route::put('/edit/{id}', [PenilaianLowonganController::class, 'update']);
            Route::get('/detail/{id}', [PenilaianLowonganController::class, 'show']);
            Route::delete('/hapus/{id}', [PenilaianLowonganController::class, 'destroy']);
        });
    });
});


// YANG BARU DISINI

// POV ADMINT
Route::get('/admin/laporan', function () {
    return view('admin.laporan');
});

// POV USER
Route::get('/rekomendasi-magang', [RekomendasiMagangMahasiswaController::class, 'index'])->name('user.rekomendasi-magang');
Route::post('/rekomendasi-magang/tambah', [RekomendasiMagangMahasiswaController::class, 'store'])->name('user.rekomendasi-magang.store');
Route::get('/rekomendasi-magang/hasil', [RekomendasiMagangMahasiswaController::class, 'hasil'])->name('user.rekomendasi-magang.hasil');
Route::get('/unggah-dokumen', function () {
    return view('user.function.unggah_dokumen');
});

// // POV DOSEN
// Route::get('/dosen/dashboard', function () {
//     return view('dosen.dashboard');
// });
// Route::get('/dosen/magang/bimbingan-magang', function () {
//     return view('dosen.bimbingan_magang');
// });
// Route::get('/dosen/magang/bimbingan-magang/chat', function () {
//     return view('dosen.bimbingan_magang.chat');
// });
// Route::get('/dosen/magang/rekomendasi-magang', function () {
//     return view('dosen.rekomendasi_magang');
// });

// SMC Testing Routes
Route::get('/testing/smc', [SMCController::class, 'index'])->name('smc.test');
Route::post('/testing/smc/calculate', [SMCController::class, 'calculate'])->name('smc.calculate');
