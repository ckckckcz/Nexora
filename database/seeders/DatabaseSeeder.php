<?php

namespace Database\Seeders;

use App\Models\EvaluasiMagang;
use App\Models\PenilaianLowongan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ProgramStudiSeeder::class,
            UserSeeder::class,
            MahasiswaSeeder::class,
            DosenSeeder::class,
            SkemaMagangSeeder::class,
            PosisiMagangSeeder::class,
            LowonganMagangSeeder::class,
            BimbinganMagangSeeder::class,
            EvaluasiMagangSeeder::class,
            PengajuanMagangSeeder::class,
            KriteriaSeeder::class,
            PreferensiMahasiswaSeeder::class,
            FeedbackMagangSeeder::class,
            HasilRekomendasiSeeder::class,
            LogAktivitasMagangSeeder::class,
        ]);
    }
}
