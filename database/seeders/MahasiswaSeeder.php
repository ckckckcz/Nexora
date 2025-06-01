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
                'nim' => '2341720032',
                'nama_mahasiswa' => 'Cakra Wangsa',
                'id_program_studi' => 1, // Teknik Informatika
                'jurusan' => 'Teknik Informatika',
                'jenis_kelamin' => 'L',
                'id_user' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nim' => '2341720051',
                'nama_mahasiswa' => 'Tri Sukma Sarah',
                'id_program_studi' => 2, // Sistem Informasi
                'jurusan' => 'Sistem Informasi',
                'jenis_kelamin' => 'P',
                'id_user' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nim' => '2341720054',
                'nama_mahasiswa' => 'Galung Erlyan Tama',
                'id_program_studi' => 3, //PPLS
                'jurusan' => 'Perangkat Lunak Sistem',
                'jenis_kelamin' => 'L',
                'id_user' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nim' => '2341720209',
                'nama_mahasiswa' => 'Riovaldo Alfiyan',
                'id_program_studi' => 1,
                'jurusan' => 'Teknik Informatika',
                'jenis_kelamin' => 'L',
                'id_user' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Mahasiswa::insert($mahasiswa);
    }
}
