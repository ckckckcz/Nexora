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
        Schema::create('bimbingan_magang', function (Blueprint $table) {
            $table->id('id_bimbingan')->autoIncrement();
            $table->unsignedBigInteger('id_mahasiswa');
            $table->unsignedBigInteger('id_dosen');
            $table->unsignedBigInteger('id_lowongan_magang');
            $table->enum('status_bimbingan', ['aktif', 'selesai']);
            $table->timestamps();

            $table->foreign('id_lowongan_magang')->references('id_lowongan')->on('lowongan_magang');
            $table->foreign('id_mahasiswa')->references('id_mahasiswa')->on('mahasiswa');
            $table->foreign('id_dosen')->references('id_dosen')->on('dosen');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bimbingan_magang');
    }
};
