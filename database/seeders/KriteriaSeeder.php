<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kriteria')->insert([
            [
                'nama_kriteria' => 'relevansi dari bidang studi',
                'tipe' => 'benefit',
                'keterangan' => 'Kriteria penilaian berdasarkan kesesuaian bidang magang dengan program studi mahasiswa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kriteria' => 'jarak lokasi',
                'tipe' => 'cost',
                'keterangan' => 'Kriteria penilaian berdasarkan jarak lokasi magang dari tempat tinggal mahasiswa (semakin dekat semakin baik)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kriteria' => 'konversi ke karyawan tetap',
                'tipe' => 'benefit',
                'keterangan' => 'Kriteria penilaian berdasarkan peluang mahasiswa untuk diangkat menjadi karyawan tetap setelah magang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kriteria' => 'reputasi perusahaan',
                'tipe' => 'benefit',
                'keterangan' => 'Kriteria penilaian berdasarkan reputasi dan kredibilitas perusahaan di industri',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kriteria' => 'fasilitas perusahaan',
                'tipe' => 'benefit',
                'keterangan' => 'Kriteria penilaian berdasarkan kelengkapan fasilitas yang disediakan perusahaan untuk mahasiswa magang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kriteria' => 'koneksi perusahaan',
                'tipe' => 'benefit',
                'keterangan' => 'Kriteria penilaian berdasarkan jaringan dan koneksi perusahaan yang dapat bermanfaat untuk karir mahasiswa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kriteria' => 'beban kerja',
                'tipe' => 'cost',
                'keterangan' => 'Kriteria penilaian berdasarkan tingkat beban kerja yang diberikan (semakin ringan semakin baik)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
