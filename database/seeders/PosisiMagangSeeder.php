<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PosisiMagangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posisi_magang')->insert([
            [
                'nama_posisi' => 'Frontend Developer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_posisi' => 'Backend Developer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_posisi' => 'Mobile Developer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_posisi' => 'UI/UX Designer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_posisi' => 'Data Analyst',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_posisi' => 'Data Scientist',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_posisi' => 'DevOps Engineer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_posisi' => 'Full Stack Developer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
