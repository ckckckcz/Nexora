<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('lowongan_magang', function (Blueprint $table) {
            $table->enum('tipe_perusahaan', ['startup', 'korporat', 'pemerintah'])
                  ->after('nama_perusahaan');
            $table->text('fasilitas_perusahaan')->after('tipe_perusahaan');
            $table->enum('gaji', ['dibayar', 'tidak dibayar'])->after('fasilitas_perusahaan');
            $table->enum('fleksibilitas_kerja', ['remote', 'onsite', 'hybrid'])->after('gaji');
        });
    }

    public function down(): void
    {
        Schema::table('lowongan_magang', function (Blueprint $table) {
            $table->dropColumn(['tipe_perusahaan', 'fasilitas_perusahaan', 'gaji', 'fleksibilitas_kerja']);
        });
    }
};
