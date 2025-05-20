<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('skema_magang', function (Blueprint $table) {
            $table->id('id_skema_magang')->autoIncrement();
            $table->enum('nama_skema_magang', ['pkl_3_bulan', 'MBKM - Mandiri 6 bulan', 'MBKM - MSIB 6 Bulan', 'MBKM - Kewirausahaan']);
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skema_magang');
    }
};
