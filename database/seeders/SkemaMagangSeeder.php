<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkemaMagangSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('skema_magang')->insert([
            [
                'nama_skema_magang' => 'pkl_3_bulan',
                'tanggal_mulai' => '2025-03-01',
                'tanggal_selesai' => '2025-06-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_skema_magang' => 'MBKM - Mandiri 6 bulan',
                'tanggal_mulai' => '2025-02-05',
                'tanggal_selesai' => '2024-08-05',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_skema_magang' => 'MBKM - MSIB 6 Bulan',
                'tanggal_mulai' => '2025-01-15',
                'tanggal_selesai' => '2025-07-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_skema_magang' => 'MBKM - Kewirausahaan',
                'tanggal_mulai' => '2025-04-01',
                'tanggal_selesai' => '2025-10-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
