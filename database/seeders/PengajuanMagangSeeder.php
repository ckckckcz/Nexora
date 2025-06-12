<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengajuanMagangSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pengajuan_magang')->insert([
            [
                'id_mahasiswa' => 1,
                'id_lowongan' => 1,
                'status_pengajuan' => 'diterima',
                'Pakta_Integritas' => 'uploads/2341720032/Pakta Integritas.pdf',
                'Daftar_Riwayat_Hidup' => 'uploads/2341720032/Daftar Riwayat Hidup.pdf',
                'KHS_cetak_Siakad' => 'uploads/2341720032/KHS.pdf',
                'KTP' => 'uploads/2341720032/KTP.pdf',
                'KTM' => 'uploads/2341720032/KTM.pdf',
                'Surat_Izin_Orang_Tua' => 'uploads/2341720032/Surat Izin Orang Tua.pdf',
                'Kartu_BPJS_Asuransi_lainnya' => 'uploads/2341720032/Kartu BPJS.pdf',
                'SKTM_KIP_Kuliah' => null,
                'Proposal_Magang' => 'uploads/2341720032/Proposal Magang.pdf',
                'CV' => 'uploads/2341720032/CV.pdf',
                'Surat_Tugas' => 'uploads/2341720032/Surat Tugas.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_mahasiswa' => 2,
                'id_lowongan' => 2,
                'status_pengajuan' => 'menunggu',
                'Pakta_Integritas' => 'uploads/2341720051/Pakta Integritas.pdf',
                'Daftar_Riwayat_Hidup' => 'uploads/2341720051/Daftar Riwayat Hidup.pdf',
                'KHS_cetak_Siakad' => 'uploads/2341720051/KHS.pdf',
                'KTP' => 'uploads/2341720051/KTP.pdf',
                'KTM' => 'uploads/2341720051/KTM.pdf',
                'Surat_Izin_Orang_Tua' => 'uploads/2341720051/Surat Izin Orang Tua.pdf',
                'Kartu_BPJS_Asuransi_lainnya' => null,
                'SKTM_KIP_Kuliah' => 'uploads/2341720051/kip.pdf',
                'Proposal_Magang' => 'uploads/2341720051/Proposal Magang.pdf',
                'CV' => 'uploads/2341720051/CV.pdf',
                'Surat_Tugas' => 'uploads/2341720051/Surat Tugas.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_mahasiswa' => 3,
                'id_lowongan' => 3,
                'status_pengajuan' => 'diterima',
                'Pakta_Integritas' => 'uploads/2341720054/Pakta Integritas.pdf',
                'Daftar_Riwayat_Hidup' => 'uploads/2341720054/Daftar Riwayat Hidup.pdf',
                'KHS_cetak_Siakad' => 'uploads/2341720054/KHS.pdf',
                'KTP' => 'uploads/2341720054/KTP.pdf',
                'KTM' => 'uploads/2341720054/KTM.pdf',
                'Surat_Izin_Orang_Tua' => 'uploads/2341720054/Surat Izin Orang Tua.pdf',
                'Kartu_BPJS_Asuransi_lainnya' => 'uploads/2341720054/Kartu BPJS.pdf',
                'SKTM_KIP_Kuliah' => null,
                'Proposal_Magang' => 'uploads/2341720054/Proposal Magang.pdf',
                'CV' => 'uploads/2341720054/CV.pdf',
                'Surat_Tugas' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
