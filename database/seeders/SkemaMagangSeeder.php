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
                'tanggal_mulai' => '2024-03-01',
                'tanggal_selesai' => '2024-06-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_skema_magang' => 'MBKM - Mandiri 6 bulan',
                'tanggal_mulai' => '2024-02-01',
                'tanggal_selesai' => '2024-08-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_skema_magang' => 'MBKM - MSIB 6 Bulan',
                'tanggal_mulai' => '2024-01-15',
                'tanggal_selesai' => '2024-07-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_skema_magang' => 'MBKM - Kewirausahaan',
                'tanggal_mulai' => '2024-04-01',
                'tanggal_selesai' => '2024-10-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
