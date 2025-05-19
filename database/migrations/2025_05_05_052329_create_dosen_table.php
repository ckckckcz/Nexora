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
            $table->integer('id_dosen')->autoIncrement();
            $table->string('nidn', 10)->unique();
            $table->string('nama_dosen', 100);
            $table->unsignedBigInteger('id_program_studi');
            $table->string('tanda_tangan', 100)->nullable();
            $table->string('jurusan', 100);
            $table->unsignedInteger('id_user')->nullable()->index(); 
            $table->timestamps();

            // Relasi Dosen > Prodi
            $table->foreign('id_program_studi')
                ->references('id_program_studi')
                ->on('program_studi');

            // Relasi Dosen > User
            $table->foreign('id_user')
                ->references('id_user')
                ->on('users')
                ->onDelete('set null');
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
