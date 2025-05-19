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
            $table->integer('id_mahasiswa')->autoIncrement();
            $table->string('nim', 20)->unique();
            $table->string('nama_mahasiswa', 100);
            $table->unsignedBigInteger('id_program_studi');
            $table->string('jurusan', 100);
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->unsignedInteger('id_user')->nullable()->index();
            $table->timestamps();

            // Relasi Mahasiswa > Prodi
            $table->foreign('id_program_studi')
                ->references('id_program_studi')
                ->on('program_studi');

            // Relasi Mahasiswa > User
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
        Schema::dropIfExists('mahasiswa');
    }
};
