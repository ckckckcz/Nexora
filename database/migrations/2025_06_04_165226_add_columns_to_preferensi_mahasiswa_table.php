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
        Schema::table('preferensi_mahasiswa', function (Blueprint $table) {
            $table->float('bobot_reputasi')->default(0.2); // Bobot dinamis (0-1)
            $table->float('bobot_fasilitas')->default(0.2);
            $table->float('bobot_minat')->default(0.2);
            $table->float('bobot_tipe')->default(0.2);
            $table->float('bobot_fleksibilitas')->default(0.2);
            $table->json('keahlian')->nullable(); // Array keahlian, misalnya ["Web Development", "PHP"]
            $table->string('tipe_perusahaan')->nullable(); // Misalnya "startup"
            $table->string('fleksibilitas')->nullable(); // Misalnya "remote"
            $table->integer('reputasi_min')->default(3); // Ambang batas reputasi (1-5)
            $table->json('fasilitas')->nullable(); // Array fasilitas, misalnya ["gaji", "pelatihan"]
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('preferensi_mahasiswa', function (Blueprint $table) {
            $table->dropColumn([
                'bobot_reputasi',
                'bobot_fasilitas',
                'bobot_minat',
                'bobot_tipe',
                'bobot_fleksibilitas',
                'keahlian',
                'tipe_perusahaan',
                'fleksibilitas',
                'reputasi_min',
                'fasilitas'
            ]);
        });
    }
};
