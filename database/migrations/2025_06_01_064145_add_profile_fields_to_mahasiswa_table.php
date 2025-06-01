<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('mahasiswa', function (Blueprint $table) {
            $table->text('deskripsi')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('nomor_telepon')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('twitter')->nullable();
            $table->string('github')->nullable();
            $table->string('instagram')->nullable();
        });
    }

    public function down(): void {
        Schema::table('mahasiswa', function (Blueprint $table) {
            $table->dropColumn([
                'deskripsi', 'lokasi', 'nomor_telepon',
                'linkedin', 'twitter', 'github', 'instagram',
            ]);
        });
    }
};
