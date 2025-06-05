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
            'nama_kriteria' => 'minat keahlian',
            'tipe' => 'benefit',
            'keterangan' => 'Kriteria penilaian berdasarkan keahlian yang disediakan oleh perusahaan',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'nama_kriteria' => 'fasilitas perusahaan',
            'tipe' => 'benefit',
            'keterangan' => 'Kriteria penilaian berdasarkan kelengkapan fasilitas yang disediakan perusahaan untuk mahasiswa magang',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'nama_kriteria' => 'status gaji',
            'tipe' => 'benefit',
            'keterangan' => 'Kriteria penilaian berdasarkan apakah perusahaan ini memberikan gaji ke anak magang apa tidak',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'nama_kriteria' => 'tipe perusahaan',
            'tipe' => 'benefit',
            'keterangan' => 'Kriteria penilaian berdasarkan tipe perusahaan apakah perusahaan tersebut BUMN CV PT atau startup',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'nama_kriteria' => 'fleksibilitas kerja',
            'tipe' => 'benefit',
            'keterangan' => 'Kriteria fleksibilitas kerja berdasarkan jenis bekerja nya apakah wfh onsite remote',
            'created_at' => now(),
            'updated_at' => now(),
        ],
    ]);
}
}
