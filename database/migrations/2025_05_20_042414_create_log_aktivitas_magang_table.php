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
        Schema::create('log_aktivitas_magang', function (Blueprint $table) {
            $table->id('id_log_aktifitas')->autoIncrement();
            $table->unsignedBigInteger('id_bimbingan');
            $table->date('tanggal');
            $table->time('jam_masuk');
            $table->time('jam_pulang');
            $table->text('kegiatan');
            $table->enum('status_log', ['diterima'])->default('diterima');
            $table->timestamps();

            $table->foreign('id_bimbingan')->references('id_bimbingan')->on('bimbingan_magang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_aktivitas_magang');
    }
};
