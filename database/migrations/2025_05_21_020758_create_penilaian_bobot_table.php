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
        Schema::create('penilaian_bobot', function (Blueprint $table) {
            $table->id('id_penilaian_bobot')->autoIncrement();
            //$table->unsignedBigInteger('id_perusahaan');
            $table->unsignedBigInteger('id_kriteria');
            $table->decimal('nilai', 8, 2);
            $table->timestamps();

            //$table->foreign('id_perusahaan')->references('id_perusahaan')->on('perusahaan');
            $table->foreign('id_kriteria')->references('id_kriteria')->on('kriteria');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaian_bobot');
    }
};
