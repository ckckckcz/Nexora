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
    Schema::create('dosen', function (Blueprint $table) {
        $table->string('nidn')->primary(); // UNIQUE dan PRIMARY
        $table->text('nama_lengkap');
        $table->text('program_studi')->nullable();
        $table->text('jurusan')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen');
    }
};
