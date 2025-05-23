<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kriteria')->insert([
            [
                'nama_kriteria' => 'keahlian yang spesifik',
                'bobot' => 4.00,
                'tipe' => 'benefit',
                'keterangan' => 'Kriteria penilaian berdasarkan dengan kesesuaian keahlian mahasiswa dengan bidang magang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kriteria' => 'lokasi',
                'bobot' => 2.00,
                'tipe' => 'benefit',
                'keterangan' => 'Kriteria penilaian berdasarkan dengan lokasi magang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kriteria' => 'pembobotan tempat magang',
                'bobot' => 3.00,
                'tipe' => 'benefit',
                'keterangan' => 'Kriteria penilaian berdasarkan dengan pembobotan tempat magang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kriteria' => 'prioritas mahasiswa dinamis',
                'bobot' => 2.00,
                'tipe' => 'benefit',
                'keterangan' => 'Kriteria penilaian berdasarkan dengan prioritas mahasiswa dinamis',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kriteria' => 'Jarak Tempat Tinggal',
                'bobot' => 3.00,
                'tipe' => 'cost',
                'keterangan' => 'Jarak dari tempat tinggal ke lokasi magang (semakin dekat semakin baik)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
