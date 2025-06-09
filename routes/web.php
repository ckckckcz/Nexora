<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AkunDosenController;
use App\Http\Controllers\Admin\AkunMahasiswaController;
use App\Http\Controllers\Admin\BimbinganMagangController;
use App\Http\Controllers\Admin\DetailPerhitunganSPKController;
use App\Http\Controllers\Admin\KriteriaController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\LowonganMagangController;
use App\Http\Controllers\Admin\PengajuanMagangController;
use App\Http\Controllers\Admin\PenilaianLowonganController;
use App\Http\Controllers\Admin\PosisiMagangController;
use App\Http\Controllers\Admin\ProdiController;
use App\Http\Controllers\Admin\ProfileDosenController;
use App\Http\Controllers\Admin\ProfileMahasiswaController;
use App\Http\Controllers\Admin\SkemaMagangController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Dosen\DosenDashboardController;
use App\Http\Controllers\Dosen\BimbinganMagangDosenController;
use App\Http\Controllers\Dosen\ProfileMahasiswaDosenController;
use App\Http\Controllers\Dosen\LogAktivitasMagangController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\RekomendasiController;
use App\Http\Controllers\User\DetailLowonganController;
use App\Http\Controllers\User\LogAktivitasController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\RekomendasiMagangMahasiswaController;
use App\Http\Controllers\User\UnggahDokumenController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Testing\SMCController;
use App\Http\Controllers\User\LowonganMagangMahasiswaController;
use App\Http\Controllers\Dosen\RekomendasiMagangDosenController;

Route::get('/', [DashboardController::class, 'index']);
Route::get('/dosen/dashboard', [DosenDashboardController::class, 'index']);

Route::group(['prefix' => 'profile'], function () {
    Route::get('/{nim}', [ProfileController::class, 'index'])->name('user.profile');
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



Route::get('/dosen/magang/bimbingan-magang', [BimbinganMagangDosenController::class, 'index'])->name('dosen.bimbingan-magang');

Route::get('/dosen/magang/bimbingan-magang/chat', function () {
    return view('dosen.bimbingan_magang.chat');
});
Route::get('/dosen/magang/rekomendasi-magang', [RekomendasiMagangDosenController::class, 'index'])->name('dosen.rekomendasi_magang');
Route::get('/dosen/magang/rekomendasi-magang/profile/{nim}', [RekomendasiMagangDosenController::class, 'showProfile'])->name('dosen.mahasiswa.profile');
Route::get('/dosen/mahasiswa/log-aktivitas', [App\Http\Controllers\Dosen\LogAktivitasMagangController::class, 'index'])->name('dosen.log-aktivitas');
Route::get('/dosen/mahasiswa/profile', [App\Http\Controllers\Dosen\ProfileMahasiswaDosenController::class, 'index']);

Route::group(['prefix' => 'detail-lowongan'], function () {
    Route::get('/', [DetailLowonganController::class, 'index']);
    Route::get('/{id}', [DetailLowonganController::class, 'view'])->name('user.detail-lowongan.view');
});



Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postlogin']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::middleware(['auth', 'authorize:mahasiswa,admin'])->group(function () {
    Route::get('/log-aktivitas', [LogAktivitasController::class, 'create']);
    Route::post('/log-aktivitas/store', [LogAktivitasController::class, 'store']);

    Route::get('/unggah-dokumen', [UnggahDokumenController::class, 'createOrUpdate']);
    Route::post('/unggah-dokumen', [UnggahDokumenController::class, 'storeOrUpdate']);
    Route::get('/unggah-dokumen-perusahaan', function () {
        return view('user.unggah_dokumen_perusahaan');
    });
});

Route::middleware(['auth', 'role:dosen'])->group(function () {
    Route::get('/dosen/profile', [App\Http\Controllers\Dosen\ProfileDosenController::class, 'index'])->name('dosen.profile');
    Route::put('/dosen/profile/update', [App\Http\Controllers\Dosen\ProfileDosenController::class, 'update'])->name('dosen.profile.update');
    
    Route::get('/chat', [ChatController::class, 'index'])->name('dosen.chat');
    Route::post('/chat/send', [ChatController::class, 'sendMessage']);
    Route::get('/chat/messages', [ChatController::class, 'getMessages']);
    
    // Add route for evaluation submission
    Route::post('/dosen/log-aktivitas/evaluate', [App\Http\Controllers\Dosen\LogAktivitasMagangController::class, 'saveEvaluation']);
});

// Allow guest access to dosen profile with NIDN parameter
Route::get('/dosen/profile', [App\Http\Controllers\Dosen\ProfileDosenController::class, 'index'])->name('dosen.profile');

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
        Route::get('/', [ProfileMahasiswaController::class, 'index'])->name('admin.profile.mahasiswa');
        Route::get('/tambah', [ProfileMahasiswaController::class, 'create']);
        Route::post('/tambah', [ProfileMahasiswaController::class, 'store']);
        Route::get('/edit/{id}', [ProfileMahasiswaController::class, 'edit']);
        Route::put('/edit/{id}', [ProfileMahasiswaController::class, 'update']);
        Route::get('/detail/{id}', [ProfileMahasiswaController::class, 'show']);
        Route::delete('/hapus/{id}', [ProfileMahasiswaController::class, 'destroy']);
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

        Route::group(['prefix' => 'perhitungan-spk'], function () {
            Route::get('/', [DetailPerhitunganSPKController::class, 'index'])->name('admin.pembobotan-lowongan');
            Route::get('/detail/{id}', [DetailPerhitunganSPKController::class, 'show']);
        });
    });

    //Laporan
    Route::group(['prefix' => '/admin/laporan'],function () {
        Route::get('/', [LaporanController::class, 'index']);
        Route::get('/export-pdf', [LaporanController::class, 'export_pdf']);
        Route::get('/export-excel', [LaporanController::class, 'export_excel']);
    });

});


// YANG BARU DISINI

// POV ADMINT

// POV USER
Route::get('/rekomendasi-magang', [RekomendasiMagangMahasiswaController::class, 'index'])->name('user.rekomendasi-magang');
Route::post('/rekomendasi-magang/tambah', [RekomendasiMagangMahasiswaController::class, 'store'])->name('user.rekomendasi-magang.store');
Route::get('/rekomendasi-magang/hasil', [RekomendasiMagangMahasiswaController::class, 'hasil'])->name('user.rekomendasi-magang.hasil');


Route::get('/unggah-dokumen', function () {
    return view('user.function.unggah_dokumen');
});
Route::get('/dosen/mahasiswa/log-aktivitas/tambah', function () {
    return view('dosen.functions.log_aktivitas.tambah');
});

// Add this route to the middleware auth group or where appropriate
Route::get('/download/template/{file}', [App\Http\Controllers\User\TemplateController::class, 'download'])->name('download.template');


