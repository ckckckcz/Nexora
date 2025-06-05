<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PreferensiMahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('preferensi_mahasiswa')->insert([
            [
                'id_mahasiswa' => 1,
                // 'id_kriteria' => 1,
                // 'bobot' => 100.0,
                // 'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_mahasiswa' => 1,
                // 'id_kriteria' => 2,
                // 'bobot' => 50.0,
                // 'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_mahasiswa' => 1,
                // 'id_kriteria' => 3,
                // 'bobot' => 75.0,
                // 'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_mahasiswa' => 2,
                // 'id_kriteria' => 1,
                // 'bobot' => 100.0,
                // 'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_mahasiswa' => 2,
                // 'id_kriteria' => 3,
                // 'bobot' => 75.0,
                // 'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_mahasiswa' => 3,
                // 'id_kriteria' => 2,
                // 'bobot' => 25.0,
                // 'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_mahasiswa' => 3,
                // 'id_kriteria' => 4,
                // 'bobot' => 50.0,
                // 'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
