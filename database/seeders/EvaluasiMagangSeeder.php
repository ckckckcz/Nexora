<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EvaluasiMagangSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('evaluasi_magang')->insert([
            [
                'id_bimbingan_magang' => 1,
                'id_log_aktifitas' => 1,
                'komentar' => 'Mahasiswa menunjukkan kemajuan yang baik dalam memahami konsep programming. Perlu lebih banyak latihan dalam debugging dan optimasi kode.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_bimbingan_magang' => 2,
                'id_log_aktifitas' => 2,
                'komentar' => 'Kreativitas dalam membuat konten media sosial sangat baik. Disarankan untuk lebih memperdalam analisis data engagement.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_bimbingan_magang' => 3,
                'id_log_aktifitas' => 3,
                'komentar' => 'Hasil desain UI/UX sangat memuaskan. Mahasiswa telah menyelesaikan proyek dengan baik dan sesuai timeline.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
