<?php

namespace Database\Seeders;

use App\Models\Dosen;
use Illuminate\Database\Seeder;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dosen = [
            [
                'nidn' => '0001020304',
                'nama_dosen' => 'Dr. Ahmad Wijaya',
                'id_program_studi' => 1,
                'jurusan' => 'Teknik Informatika',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nidn' => '0001020305',
                'nama_dosen' => 'Prof. Sri Mulyani',
                'id_program_studi' => 2,
                'jurusan' => 'Sistem Informasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nidn' => '0001020306',
                'nama_dosen' => 'Dr. Bambang Sutrisno',
                'id_program_studi' => 3,
                'jurusan' => 'Perangkat Lunak Sistem',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Dosen::insert($dosen);
    }
}
