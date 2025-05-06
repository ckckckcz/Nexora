<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mahasiswa = [
            [
                'nim' => '2020001',
                'nama_mahasiswa' => 'Cakra Wangsa',
                'id_program_studi' => 1, // Teknik Informatika
                'jurusan' => 'Teknik Informatika',
                'jenis_kelamin' => 'L',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nim' => '2020002',
                'nama_mahasiswa' => 'Tri Sukma Sarah',
                'id_program_studi' => 2, // Sistem Informasi
                'jurusan' => 'Sistem Informasi',
                'jenis_kelamin' => 'P',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nim' => '2020003',
                'nama_mahasiswa' => 'Galung Erlyan Tama',
                'id_program_studi' => 3, //PPLS
                'jurusan' => 'Perangkat Lunak Sistem',
                'jenis_kelamin' => 'L',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Mahasiswa::insert($mahasiswa);
    }
}
