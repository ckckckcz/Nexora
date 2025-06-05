<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaianLowonganTable extends Migration
{
    public function up()
    {
    Schema::create('penilaian_lowongan', function (Blueprint $table) {
    $table->id('id_penilaian');

    $table->unsignedBigInteger('id_lowongan');
    $table->foreign('id_lowongan')->references('id_lowongan')->on('lowongan_magang')->onDelete('cascade');

    $table->unsignedBigInteger('id_kriteria');
    $table->foreign('id_kriteria')->references('id_kriteria')->on('kriteria')->onDelete('cascade');

    $table->float('nilai');
    $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('penilaian_lowongan');
    }
}
