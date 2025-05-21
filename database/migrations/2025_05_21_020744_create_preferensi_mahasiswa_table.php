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
        Schema::create('preferensi_mahasiswa', function (Blueprint $table) {
            $table->id('id_preferensi_mahasiswa')->autoIncrement();
            $table->unsignedBigInteger('id_mahasiswa');
            $table->unsignedBigInteger('id_kriteria');
            $table->decimal('bobot', 8, 2);
            $table->timestamps();

            $table->foreign('id_mahasiswa')->references('id_mahasiswa')->on('mahasiswa');
            $table->foreign('id_kriteria')->references('id_kriteria')->on('kriteria');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preferensi_mahasiswa');
    }
};
