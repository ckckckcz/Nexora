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
            $table->text('keahlian')->nullable(); // ["UI/UX Design", "Web Development"]
            $table->text('fasilitas')->nullable(); // ["Laptop kerja", "Makan siang gratis"]
            $table->string('status_gaji')->nullable(); // "dibayar"
            $table->string('tipe_perusahaan')->nullable(); // "startup"
            $table->string('fleksibilitas_kerja')->nullable();
            $table->timestamps();

            $table->foreign('id_mahasiswa')->references('id_mahasiswa')->on('mahasiswa');
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
