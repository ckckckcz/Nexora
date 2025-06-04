<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BimbinganMagangSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('bimbingan_magang')->insert([
            [
                'id_mahasiswa' => 1,
                'id_dosen' => 1,
                'id_lowongan_magang' => 1,
                'status_bimbingan' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_mahasiswa' => 2,
                'id_dosen' => 2,
                'id_lowongan_magang' => 2,
                'status_bimbingan' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_mahasiswa' => 3,
                'id_dosen' => 1,
                'id_lowongan_magang' => 3,
                'status_bimbingan' => 'selesai',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_mahasiswa' => 4,
                'id_dosen' => 2,
                'id_lowongan_magang' => 4,
                'status_bimbingan' => 'selesai',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

