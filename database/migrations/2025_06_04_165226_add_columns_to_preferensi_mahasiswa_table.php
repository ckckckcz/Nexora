<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

     //belum fix
    public function up(): void
    {
        Schema::table('preferensi_mahasiswa', function (Blueprint $table) {
            $table->float('bobot_minat')->default(0.2);
            $table->float('bobot_fasilitas')->default(0.2);
            $table->float('bobot_gaji')->default(0.2);
            $table->float('bobot_tipe')->default(0.2);
            $table->float('bobot_fleksibilitas')->default(0.2);
            $table->text('keahlian')->nullable(); // ["UI/UX Design", "Web Development"]
            $table->text('fasilitas')->nullable(); // ["Laptop kerja", "Makan siang gratis"]
            $table->string('status_gaji')->nullable(); // "dibayar"
            $table->string('tipe_perusahaan')->nullable(); // "startup"
            $table->string('fleksibilitas_kerja')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('preferensi_mahasiswa', function (Blueprint $table) {
            $table->dropColumn([
                'bobot_fasilitas',
                'bobot_minat',
                'bobot_tipe',
                'bobot_gaji',
                'bobot_fleksibilitas',
                'keahlian',
                'fasilitas',
                'status_gaji',
                'tipe_perusahaan',
                'fleksibilitas_kerja',
            ]);
        });
    }
};
