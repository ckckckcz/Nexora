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
        Schema::create('hasil_rekomendasi', function (Blueprint $table) {
            $table->id('id_hasil_rekomendasi')->autoIncrement();
            $table->unsignedBigInteger('id_mahasiswa');
            $table->unsignedBigInteger('id_dosen');
            $table->decimal('nilai_akhir', 8, 2);
            $table->integer('ranking');
            $table->timestamps();

            $table->foreign('id_mahasiswa')->references('id_mahasiswa')->on('mahasiswa')->onDelete('cascade');
            $table->foreign('id_dosen')->references('id_dosen')->on('dosen')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_rekomendasi');
    }
};
