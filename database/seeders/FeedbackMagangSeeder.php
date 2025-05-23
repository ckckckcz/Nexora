<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeedbackMagangSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('feedback_magang')->insert([
            [
                'id_bimbingan_magang' => 5,
                'testimoni_magang' => 'Pengalaman magang di PT. Teknologi Maju sangat berharga. Saya belajar banyak tentang pengembangan aplikasi web dan teknologi terkini. Tim sangat supportive dan memberikan guidance yang baik.',
                'pesan_dosen' => 'Pertahankan semangat belajar dan terus kembangkan skill programming. Jangan lupa untuk selalu update progress secara berkala.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_bimbingan_magang' => 6,
                'testimoni_magang' => 'Magang sebagai Digital Marketing Specialist membuka wawasan saya tentang dunia pemasaran digital. Banyak tools dan strategi baru yang saya pelajari.',
                'pesan_dosen' => 'Manfaatkan pengalaman ini untuk mengembangkan portfolio digital marketing. Terus eksplorasi trend terbaru di bidang ini.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_bimbingan_magang' => 7,
                'testimoni_magang' => 'Sebagai UI/UX Designer magang, saya mendapat kesempatan untuk terlibat dalam proyek nyata dan berinteraksi langsung dengan user. Pengalaman yang sangat valuable.',
                'pesan_dosen' => 'Hasil karya desain yang telah dibuat sangat bagus. Lanjutkan untuk membuat case study dari proyek-proyek yang telah dikerjakan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
