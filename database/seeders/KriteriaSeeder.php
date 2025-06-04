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
            'nama_kriteria' => 'minat keahlian',
            'tipe' => 'benefit',
            'keterangan' => 'Kriteria penilaian berdasarkan kesesuaian antara minat dan keahlian mahasiswa dengan posisi magang yang ditawarkan',
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
            'nama_kriteria' => 'tipe perusahaan',
            'tipe' => 'benefit',
            'keterangan' => 'Kriteria penilaian berdasarkan jenis atau kategori perusahaan (misalnya startup, BUMN, multinasional) yang sesuai dengan preferensi mahasiswa',
            'created_at' => now(),
            'updated_at' => now(),
        ],
    ]);
}
}
