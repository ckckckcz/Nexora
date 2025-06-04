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
        Schema::create('lowongan_magang', function (Blueprint $table) {
            $table->id('id_lowongan')->autoIncrement();
            $table->string('nama_perusahaan', 50);
            $table->unsignedBigInteger('id_skema_magang');
            $table->unsignedBigInteger('id_posisi_magang');
            $table->text('deskripsi');
            $table->string('lokasi', 100);
            $table->text('bidang_keahlian');
            $table->enum('status_lowongan', ['open', 'close']);
            $table->date('tanggal_pendaftaran');
            $table->date('tanggal_penutupan');
            $table->timestamps();

            $table->foreign('id_skema_magang')->references('id_skema_magang')->on('skema_magang');
            //$table->foreign('id_posisi_magang')->references('id_posisi_magang')->on('posisi_magang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lowongan_magang');
    }
};
