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
            $table->string('jurusan', 100);
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('id_program_studi')
                ->references('id_program_studi')
                ->on('program_studi')
                ->onDelete('cascade');
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
