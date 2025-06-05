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
        Schema::create('skor_kecocokan', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('id_mahasiswa');
            $table->unsignedBigInteger('id_lowongan');
            $table->float('skor_minat')->default(0);
            $table->float('skor_fasilitas')->default(0);
            $table->float('skor_gaji')->default(0);
            $table->float('skor_tipe')->default(0);
            $table->float('skor_fleksibilitas')->default(0);
            $table->float('skor_total')->default(0);
            $table->timestamps();

            $table->foreign('id_mahasiswa')->references('id_mahasiswa')->on('mahasiswa');
            $table->foreign('id_lowongan')->references('id_lowongan')->on('lowongan_magang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skor_kecocokan');
    }
};
