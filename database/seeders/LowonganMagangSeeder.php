<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LowonganMagangSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('lowongan_magang')->insert([
            [
                'nama_perusahaan' => 'PT. Teknologi Maju',
                'id_skema_magang' => 1,
                'id_posisi_magang' => 1,
                'deskripsi' => 'Kesempatan magang sebagai Software Developer di PT. Teknologi Maju. Mahasiswa akan belajar mengembangkan aplikasi web dan mobile menggunakan teknologi terkini.',
                'lokasi' => 'Jakarta Selatan',
                'bidang_keahlian' => 'Programming, Web Development, Mobile Development',
                'status_lowongan' => 'open',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_perusahaan' => 'CV. Digital Solutions',
                'id_skema_magang' => 2,
                'id_posisi_magang' => 2,
                'deskripsi' => 'Program magang untuk posisi Digital Marketing Specialist. Mahasiswa akan mempelajari strategi pemasaran digital, social media marketing, dan content creation.',
                'lokasi' => 'Bandung',
                'bidang_keahlian' => 'Digital Marketing, Social Media, Content Creation',
                'status_lowongan' => 'open',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_perusahaan' => 'PT. Inovasi Kreatif',
                'id_skema_magang' => 1,
                'id_posisi_magang' => 3,
                'deskripsi' => 'Magang sebagai UI/UX Designer untuk mengembangkan interface aplikasi mobile dan web yang user-friendly dan menarik.',
                'lokasi' => 'Yogyakarta',
                'bidang_keahlian' => 'UI/UX Design, Graphic Design, Prototyping',
                'status_lowongan' => 'open',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_perusahaan' => 'PT. Data Analytics Pro',
                'id_skema_magang' => 3,
                'id_posisi_magang' => 4,
                'deskripsi' => 'Program magang Data Analyst untuk menganalisis big data dan membuat laporan bisnis yang mendukung pengambilan keputusan strategis.',
                'lokasi' => 'Surabaya',
                'bidang_keahlian' => 'Data Analysis, Statistics, Business Intelligence',
                'status_lowongan' => 'close',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_perusahaan' => 'StartUp Tech Indonesia',
                'id_skema_magang' => 4,
                'id_posisi_magang' => 5,
                'deskripsi' => 'Kesempatan magang sebagai Business Development untuk membantu mengembangkan strategi bisnis dan mencari peluang kerjasama baru.',
                'lokasi' => 'Jakarta Pusat',
                'bidang_keahlian' => 'Business Development, Strategic Planning, Partnership',
                'status_lowongan' => 'open',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
