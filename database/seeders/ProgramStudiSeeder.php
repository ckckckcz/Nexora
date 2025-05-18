<?php

namespace Database\Seeders;

use App\Models\ProgramStudi;
use Illuminate\Database\Seeder;

class ProgramStudiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programStudi = [
            [
                'kode_program_studi' => 'TI',
                'nama_program_studi' => 'Teknik Informatika',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_program_studi' => 'SIB',
                'nama_program_studi' => 'Sistem Informasi Bisnis',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_program_studi' => 'PPLS',
                'nama_program_studi' => 'Perangkat Lunak Sistem',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        ProgramStudi::insert($programStudi);
    }
}
