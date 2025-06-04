<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenilaianLowonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data sample untuk penilaian lowongan
        $penilaianLowongan = [
            // Lowongan 1
            [
                'id_lowongan' => 1,
                'id_kriteria' => 1,
                'nilai' => 8.5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_lowongan' => 1,
                'id_kriteria' => 2,
                'nilai' => 9.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_lowongan' => 1,
                'id_kriteria' => 3,
                'nilai' => 7.5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_lowongan' => 1,
                'id_kriteria' => 4,
                'nilai' => 8.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_lowongan' => 1,
                'id_kriteria' => 5,
                'nilai' => 7.8,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Lowongan 2
            [
                'id_lowongan' => 2,
                'id_kriteria' => 1,
                'nilai' => 7.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_lowongan' => 2,
                'id_kriteria' => 2,
                'nilai' => 8.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_lowongan' => 2,
                'id_kriteria' => 3,
                'nilai' => 9.5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_lowongan' => 2,
                'id_kriteria' => 4,
                'nilai' => 8.2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_lowongan' => 2,
                'id_kriteria' => 5,
                'nilai' => 7.5,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Lowongan 3
            [
                'id_lowongan' => 3,
                'id_kriteria' => 1,
                'nilai' => 6.5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_lowongan' => 3,
                'id_kriteria' => 2,
                'nilai' => 7.5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_lowongan' => 3,
                'id_kriteria' => 3,
                'nilai' => 8.5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_lowongan' => 3,
                'id_kriteria' => 4,
                'nilai' => 7.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_lowongan' => 3,
                'id_kriteria' => 5,
                'nilai' => 8.8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert data ke tabel penilaian_lowongan
        DB::table('penilaian_lowongan')->insert($penilaianLowongan);
    }
}
