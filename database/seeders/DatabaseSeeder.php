<?php

namespace Database\Seeders;

use App\Models\EvaluasiMagang;
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
            bimbinganMagangSeeder::class,
            EvaluasiMagangSeeder::class,
            PengajuanMagangSeeder::class,
            PreferensiMahasiswaSeeder::class,
            FeedbackMagangSeeder::class,
            HasilRekomendasiSeeder::class,
            LowonganMagangSeeder::class,
            KriteriaSeeder::class,
            PenilaianBobotSeeder::class,
            logAktivitasMagangSeeder::class,
        ]);
    }
}
