<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HasilRekomendasiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('hasil_rekomendasi')->insert([
            [
                'id_mahasiswa' => 1,
                'id_dosen' => 1,
                'nilai_akhir' => 85.75,
                'ranking' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_mahasiswa' => 2,
                'id_dosen' => 1,
                'nilai_akhir' => 82.50,
                'ranking' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_mahasiswa' => 3,
                'id_dosen' => 2,
                'nilai_akhir' => 88.25,
                'ranking' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
