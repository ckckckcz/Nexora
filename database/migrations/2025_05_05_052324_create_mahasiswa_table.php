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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->string('nim', 20)->primary();
            $table->unsignedBigInteger('id_program_studi')->nullable(); // kalau nanti ada relasi ke tabel program_studi
            $table->text('kompetensi')->nullable();
            $table->text('keahlian')->nullable();
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan'])->nullable();
            $table->string('preferensi_lokasi', 100)->nullable();
            $table->string('dokumen_cv', 255)->nullable();
            $table->string('dokumen_portofolio', 255)->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
