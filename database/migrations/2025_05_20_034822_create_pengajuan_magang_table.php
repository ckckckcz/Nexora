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
        Schema::create('pengajuan_magang', function (Blueprint $table) {
            $table->id('id_pengajuan')->autoIncrement();
            $table->unsignedBigInteger('id_mahasiswa');
            $table->unsignedBigInteger('id_lowongan');
            $table->enum('status_pengajuan', ['menunggu', 'diterima', 'ditolak']);
            $table->string('Pakta_Integritas', 100);
            $table->string('Daftar_Riwayat_Hidup', 100);
            $table->string('KHS_cetak_Siakad', 100);
            $table->string('KTP', 100);
            $table->string('KTM', 100);
            $table->string('Surat_Izin_Orang_Tua', 100);
            $table->string('Kartu_BPJS_Asuransi_lainnya', 100)->nullable();
            $table->string('SKTM_KIP_Kuliah', 100)->nullable();
            $table->string('Proposal_Magang', 100);
            $table->string('CV', 255);
            $table->string('Surat_Tugas', 100);
            $table->timestamps();

            $table->foreign('id_lowongan')->references('id_lowongan')->on('lowongan_magang');
            //$table->foreign('id_mahasiswa')->references('id_mahasiswa')->on('mahasiswa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_magang');
    }
};
