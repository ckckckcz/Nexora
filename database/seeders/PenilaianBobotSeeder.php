<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenilaianBobotSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('penilaian_bobot')->insert([
            [
                'id_kriteria' => 1,
                'nilai' => 100.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_kriteria' => 2,
                'nilai' => 50.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_kriteria' => 3,
                'nilai' => 75.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_kriteria' => 4,
                'nilai' => 50.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_kriteria' => 5,
                'nilai' => 75.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
