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
        Schema::create('kriteria', function (Blueprint $table) {
            $table->id('id_kriteria')->autoIncrement();
            $table->string('nama_kriteria', 100);
            $table->enum('tipe', ['benefit', 'cost']);
            $table->text('keterangan');
            $table->timestamps(); // Added timestamps to match other tables
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kriteria');
    }
};
