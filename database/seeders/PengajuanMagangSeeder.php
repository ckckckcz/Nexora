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
                'Pakta_Integritas' => 'pakta_integritas_001.pdf',
                'Daftar_Riwayat_Hidup' => 'cv_mahasiswa_001.pdf',
                'KHS_cetak_Siakad' => 'khs_001.pdf',
                'KTP' => 'ktp_001.pdf',
                'KTM' => 'ktm_001.pdf',
                'Surat_Izin_Orang_Tua' => 'surat_izin_001.pdf',
                'Kartu_BPJS_Asuransi_lainnya' => 'bpjs_001.pdf',
                'SKTM_KIP_Kuliah' => null,
                'Proposal_Magang' => 'proposal_001.pdf',
                'CV' => 'curriculum_vitae_001.pdf',
                'Surat_Tugas' => 'surat_tugas_001.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_mahasiswa' => 2,
                'id_lowongan' => 2,
                'status_pengajuan' => 'menunggu',
                'Pakta_Integritas' => 'pakta_integritas_002.pdf',
                'Daftar_Riwayat_Hidup' => 'cv_mahasiswa_002.pdf',
                'KHS_cetak_Siakad' => 'khs_002.pdf',
                'KTP' => 'ktp_002.pdf',
                'KTM' => 'ktm_002.pdf',
                'Surat_Izin_Orang_Tua' => 'surat_izin_002.pdf',
                'Kartu_BPJS_Asuransi_lainnya' => null,
                'SKTM_KIP_Kuliah' => 'kip_002.pdf',
                'Proposal_Magang' => 'proposal_002.pdf',
                'CV' => 'curriculum_vitae_002.pdf',
                'Surat_Tugas' => 'surat_tugas_002.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_mahasiswa' => 3,
                'id_lowongan' => 3,
                'status_pengajuan' => 'diterima',
                'Pakta_Integritas' => 'pakta_integritas_003.pdf',
                'Daftar_Riwayat_Hidup' => 'cv_mahasiswa_003.pdf',
                'KHS_cetak_Siakad' => 'khs_003.pdf',
                'KTP' => 'ktp_003.pdf',
                'KTM' => 'ktm_003.pdf',
                'Surat_Izin_Orang_Tua' => 'surat_izin_003.pdf',
                'Kartu_BPJS_Asuransi_lainnya' => 'bpjs_003.pdf',
                'SKTM_KIP_Kuliah' => null,
                'Proposal_Magang' => 'proposal_003.pdf',
                'CV' => 'curriculum_vitae_003.pdf',
                'Surat_Tugas' => 'surat_tugas_003.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_mahasiswa' => 4,
                'id_lowongan' => 1,
                'status_pengajuan' => 'ditolak',
                'Pakta_Integritas' => 'pakta_integritas_004.pdf',
                'Daftar_Riwayat_Hidup' => 'cv_mahasiswa_004.pdf',
                'KHS_cetak_Siakad' => 'khs_004.pdf',
                'KTP' => 'ktp_004.pdf',
                'KTM' => 'ktm_004.pdf',
                'Surat_Izin_Orang_Tua' => 'surat_izin_004.pdf',
                'Kartu_BPJS_Asuransi_lainnya' => null,
                'SKTM_KIP_Kuliah' => null,
                'Proposal_Magang' => 'proposal_004.pdf',
                'CV' => 'curriculum_vitae_004.pdf',
                'Surat_Tugas' => 'surat_tugas_004.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
