<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LogAktivitasMagangSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('log_aktivitas_magang')->insert([
            [
                'id_bimbingan' => 1,
                'tanggal' => '2025-03-01',
                'jam_masuk' => '08:00:00',
                'jam_pulang' => '17:00:00',
                'kegiatan' => 'Orientasi perusahaan dan pengenalan tim development. Mempelajari workflow dan tools yang digunakan dalam pengembangan aplikasi.',
                'status_log' => 'diterima',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_bimbingan' => 1,
                'tanggal' => '2025-03-02',
                'jam_masuk' => '08:00:00',
                'jam_pulang' => '17:00:00',
                'kegiatan' => 'Testing.',
                'status_log' => 'diterima',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_bimbingan' => 2,
                'tanggal' => '2025-02-05',
                'jam_masuk' => '08:00:00',
                'jam_pulang' => '17:00:00',
                'kegiatan' => 'Setup environment development dan instalasi tools. Mulai mempelajari codebase existing project.',
                'status_log' => 'diterima',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_bimbingan' => 3,
                'tanggal' => '2025-01-15',
                'jam_masuk' => '09:00:00',
                'jam_pulang' => '18:00:00',
                'kegiatan' => 'Pelatihan dasar digital marketing dan pengenalan platform media sosial yang digunakan perusahaan.',
                'status_log' => 'diterima',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_bimbingan' => 4,
                'tanggal' => '2025-04-01',
                'jam_masuk' => '08:00:00',
                'jam_pulang' => '17:00:00',
                'kegiatan' => 'Setup environment development dan instalasi tools. Mulai mempelajari codebase existing project.',
                'status_log' => 'diterima',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
