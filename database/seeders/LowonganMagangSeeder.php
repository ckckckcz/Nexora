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
        'nama_perusahaan' => 'PT. Inovasi Kreatif',
        'tipe_perusahaan' => 'startup',
        'fasilitas_perusahaan' => 'Laptop kerja, Ruang kerja nyaman, Makan siang gratis',
        'status_gaji' => 'dibayar',
        'fleksibilitas_kerja' => 'onsite',
        'id_skema_magang' => 1,
        'id_posisi_magang' => 3,
        'deskripsi' => 'Magang sebagai UI/UX Designer untuk mengembangkan interface aplikasi mobile dan web yang user-friendly dan menarik.',
        'lokasi' => 'Yogyakarta',
        'bidang_keahlian' => 'UI/UX Design, Graphic Design, Prototyping',
        'status_lowongan' => 'open',
        'tanggal_pendaftaran' => '2025-06-01',
        'tanggal_penutupan' => '2025-06-30',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'nama_perusahaan' => 'PT. Data Analytics Pro',
        'tipe_perusahaan' => 'BUMN',
        'fasilitas_perusahaan' => 'Training, Sertifikat, Akses ke data perusahaan',
        'status_gaji' => 'dibayar',
        'fleksibilitas_kerja' => 'hybrid',
        'id_skema_magang' => 2,
        'id_posisi_magang' => 4,
        'deskripsi' => 'Program magang Data Analyst untuk menganalisis big data dan membuat laporan bisnis yang mendukung pengambilan keputusan strategis.',
        'lokasi' => 'Surabaya',
        'bidang_keahlian' => 'Data Analysis, Statistics, Business Intelligence',
        'status_lowongan' => 'close',
        'tanggal_pendaftaran' => '2025-05-01',
        'tanggal_penutupan' => '2025-05-31',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'nama_perusahaan' => 'StartUp Tech Indonesia',
        'tipe_perusahaan' => 'CV',
        'fasilitas_perusahaan' => 'Mentoring bisnis, Networking, Ruang kreatif',
        'status_gaji' => 'tidak dibayar',
        'fleksibilitas_kerja' => 'remote',
        'id_skema_magang' => 3,
        'id_posisi_magang' => 5,
        'deskripsi' => 'Kesempatan magang sebagai Business Development untuk membantu mengembangkan strategi bisnis dan mencari peluang kerjasama baru.',
        'lokasi' => 'Jakarta Pusat',
        'bidang_keahlian' => 'Business Development, Strategic Planning, Partnership',
        'status_lowongan' => 'open',
        'tanggal_pendaftaran' => '2025-06-05',
        'tanggal_penutupan' => '2025-07-05',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'nama_perusahaan' => 'PT. Digital Transformation',
        'tipe_perusahaan' => 'PT',
        'fasilitas_perusahaan' => 'Pelatihan AI, Akses ke Sistem Cloud Perusahaan, Lingkungan kerja profesional',
        'status_gaji' => 'dibayar',
        'fleksibilitas_kerja' => 'onsite',
        'id_skema_magang' => 4,
        'id_posisi_magang' => 6,
        'deskripsi' => 'Program magang sebagai Data Scientist untuk menganalisis data dan membuat model prediksi yang akurat.',
        'lokasi' => 'Bandung',
        'bidang_keahlian' => 'Data Science, Machine Learning, Deep Learning',
        'status_lowongan' => 'close',
        'tanggal_pendaftaran' => '2025-05-15',
        'tanggal_penutupan' => '2025-06-15',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'nama_perusahaan' => 'PT. XYZ',
        'tipe_perusahaan' => 'PT',
        'fasilitas_perusahaan' => 'Pelatihan Fullstack, Laptop Kerja, Lingkungan kerja profesional',
        'status_gaji' => 'tidak dibayar',
        'fleksibilitas_kerja' => 'remote',
        'id_skema_magang' => 3,
        'id_posisi_magang' => 8,
        'deskripsi' => 'Program magang sebagai Full Stack Developer yang akan mengurusi urusan frontend seperti next js dan backend  rust.',
        'lokasi' => 'Solo',
        'bidang_keahlian' => 'Frontend Developer, Backend Developer, Database Engineer',
        'status_lowongan' => 'close',
        'tanggal_pendaftaran' => '2025-04-01',
        'tanggal_penutupan' => '2025-10-01',
        'created_at' => now(),
        'updated_at' => now(),
    ]
]);

    }
}
