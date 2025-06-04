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
                'nilai' => 5.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_lowongan' => 1,
                'id_kriteria' => 2,
                'nilai' => 4.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_lowongan' => 1,
                'id_kriteria' => 3,
                'nilai' => 2.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_lowongan' => 1,
                'id_kriteria' => 4,
                'nilai' => 3.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_lowongan' => 1,
                'id_kriteria' => 5,
                'nilai' => 6.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Lowongan 2
            [
                'id_lowongan' => 2,
                'id_kriteria' => 1,
                'nilai' => 3.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_lowongan' => 2,
                'id_kriteria' => 2,
                'nilai' => 5.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_lowongan' => 2,
                'id_kriteria' => 3,
                'nilai' => 4.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_lowongan' => 2,
                'id_kriteria' => 4,
                'nilai' => 5.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_lowongan' => 2,
                'id_kriteria' => 5,
                'nilai' => 3.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Lowongan 3
            [
                'id_lowongan' => 3,
                'id_kriteria' => 1,
                'nilai' => 5.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_lowongan' => 3,
                'id_kriteria' => 2,
                'nilai' => 3.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_lowongan' => 3,
                'id_kriteria' => 3,
                'nilai' => 4.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_lowongan' => 3,
                'id_kriteria' => 4,
                'nilai' => 5.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_lowongan' => 3,
                'id_kriteria' => 5,
                'nilai' => 4.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert data ke tabel penilaian_lowongan
        DB::table('penilaian_lowongan')->insert($penilaianLowongan);
    }
}
