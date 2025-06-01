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
                'Pakta_Integritas' => 'uploads/2341720032/pakta_integritas.pdf',
                'Daftar_Riwayat_Hidup' => 'uploads/2341720032/cv_mahasiswa.pdf',
                'KHS_cetak_Siakad' => 'uploads/2341720032/khs.pdf',
                'KTP' => 'uploads/2341720032/ktp.pdf',
                'KTM' => 'uploads/2341720032/ktm.pdf',
                'Surat_Izin_Orang_Tua' => 'uploads/2341720032/surat_izin.pdf',
                'Kartu_BPJS_Asuransi_lainnya' => 'uploads/2341720032/kartu_bpjs.pdf',
                'SKTM_KIP_Kuliah' => null,
                'Proposal_Magang' => 'uploads/2341720032/proposal.pdf',
                'CV' => 'uploads/2341720032/curriculum_vitae.pdf',
                'Surat_Tugas' => 'uploads/2341720032/surat_tugas.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_mahasiswa' => 2,
                'id_lowongan' => 2,
                'status_pengajuan' => 'menunggu',
                'Pakta_Integritas' => 'uploads/2341720051/pakta_integritas.pdf',
                'Daftar_Riwayat_Hidup' => 'uploads/2341720051/cv_mahasiswa.pdf',
                'KHS_cetak_Siakad' => 'uploads/2341720051/khs.pdf',
                'KTP' => 'uploads/2341720051/ktp.pdf',
                'KTM' => 'uploads/2341720051/ktm.pdf',
                'Surat_Izin_Orang_Tua' => 'uploads/2341720051/surat_izin.pdf',
                'Kartu_BPJS_Asuransi_lainnya' => null,
                'SKTM_KIP_Kuliah' => 'uploads/2341720051/kip.pdf',
                'Proposal_Magang' => 'uploads/2341720051/proposal.pdf',
                'CV' => 'uploads/2341720051/curriculum_vitae.pdf',
                'Surat_Tugas' => 'uploads/2341720051/surat_tugas.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_mahasiswa' => 3,
                'id_lowongan' => 3,
                'status_pengajuan' => 'diterima',
                'Pakta_Integritas' => 'uploads/2341720054/pakta_integritas.pdf',
                'Daftar_Riwayat_Hidup' => 'uploads/2341720054/cv_mahasiswa.pdf',
                'KHS_cetak_Siakad' => 'uploads/2341720054/khs.pdf',
                'KTP' => 'uploads/2341720054/ktp.pdf',
                'KTM' => 'uploads/2341720054/ktm.pdf',
                'Surat_Izin_Orang_Tua' => 'uploads/2341720054/surat_izin.pdf',
                'Kartu_BPJS_Asuransi_lainnya' => 'uploads/2341720054/kartu_bpjs.pdf',
                'SKTM_KIP_Kuliah' => null,
                'Proposal_Magang' => 'uploads/2341720054/proposal.pdf',
                'CV' => 'uploads/2341720054/curriculum_vitae.pdf',
                'Surat_Tugas' => 'uploads/2341720054/surat_tugas.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
