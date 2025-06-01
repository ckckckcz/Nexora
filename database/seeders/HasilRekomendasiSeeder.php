<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HasilRekomendasiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('hasil_rekomendasi')->insert([
            [
                'id_mahasiswa' => 1,
                'id_lowongan' => 1,
                'nilai_akhir' => 87.5,
                'ranking' => 1,
                'rekomendasi_dosen' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_mahasiswa' => 2,
                'id_lowongan' => 1,
                'nilai_akhir' => 82.0,
                'ranking' => 2,
                'rekomendasi_dosen' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_mahasiswa' => 3,
                'id_lowongan' => 2,
                'nilai_akhir' => 90.2,
                'ranking' => 1,
                'rekomendasi_dosen' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

