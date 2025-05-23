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
                'id_bimbingan' => 5,
                'tanggal' => '2024-03-01',
                'jam_masuk' => '08:00:00',
                'jam_pulang' => '17:00:00',
                'kegiatan' => 'Orientasi perusahaan dan pengenalan tim development. Mempelajari workflow dan tools yang digunakan dalam pengembangan aplikasi.',
                'status_log' => 'diterima',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_bimbingan' => 6,
                'tanggal' => '2024-03-02',
                'jam_masuk' => '08:00:00',
                'jam_pulang' => '17:00:00',
                'kegiatan' => 'Setup environment development dan instalasi tools. Mulai mempelajari codebase existing project.',
                'status_log' => 'diterima',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_bimbingan' => 7,
                'tanggal' => '2024-02-01',
                'jam_masuk' => '09:00:00',
                'jam_pulang' => '18:00:00',
                'kegiatan' => 'Pelatihan dasar digital marketing dan pengenalan platform media sosial yang digunakan perusahaan.',
                'status_log' => 'diterima',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
