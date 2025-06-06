<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilRekomendasiTable extends Migration
{
    public function up()
    {
        Schema::create('hasil_rekomendasi', function (Blueprint $table) {
            $table->id('id_hasil_rekomendasi');

            $table->unsignedBigInteger('id_mahasiswa');
            $table->foreign('id_mahasiswa')->references('id_user')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('id_lowongan');
            $table->foreign('id_lowongan')->references('id_lowongan')->on('lowongan_magang')->onDelete('cascade');

            $table->float('wmsc', 8, 3);
            $table->float('qi', 8,3);
            $table->integer('ranking');
            $table->boolean('rekomendasi_dosen')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hasil_rekomendasi');
    }
}
