<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\PreferensiMahasiswa;
use App\Models\LowonganMagang;
use App\Models\PenilaianLowongan;
use App\Models\HasilRekomendasi;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RekomendasiController extends Controller
{
    public function calculateVikor(Request $request)
    {
        $mahasiswaId = Auth::id();
        $preferensi = PreferensiMahasiswa::where('id_mahasiswa', $mahasiswaId)->get();
        $kriteria = Kriteria::all();
        $lowongan = LowonganMagang::all();
        $penilaian = PenilaianLowongan::all();

        // Step 1: Build decision matrix
        $decisionMatrix = [];
        foreach ($lowongan as $l) {
            $row = [];
            foreach ($kriteria as $k) {
                $nilai = $penilaian->where('id_lowongan', $l->id_lowongan)
                                  ->where('id_kriteria', $k->id_kriteria)
                                  ->first()->nilai ?? 0;
                $row[$k->id_kriteria] = $nilai;
            }
            $decisionMatrix[$l->id_lowongan] = $row;
        }


        // Step 2: Normalize decision matrix
        $normalizedMatrix = [];
        foreach ($kriteria as $k) {
            $values = array_column($decisionMatrix, $k->id_kriteria);
            $max = max($values);
            $min = min($values);
            foreach ($lowongan as $l) {
                $value = $decisionMatrix[$l->id_lowongan][$k->id_kriteria];
                if ($k->tipe == 'benefit') {
                    $normalizedMatrix[$l->id_lowongan][$k->id_kriteria] = ($max - $value) / ($max - $min + 1e-10);
                } else {
                    $normalizedMatrix[$l->id_lowongan][$k->id_kriteria] = ($value - $min) / ($max - $min + 1e-10);
                }
            }
        }

        // Step 3: Apply weights
        $weightedMatrix = [];
        $bobot = $preferensi->pluck('bobot', 'id_kriteria')->toArray();
        foreach ($lowongan as $l) {
            foreach ($kriteria as $k) {
                $weightedMatrix[$l->id_lowongan][$k->id_kriteria] =
                ($bobot[$k->id_kriteria] ?? $k->bobot) * $normalizedMatrix[$l->id_lowongan][$k->id_kriteria];
            }
        }

        // Step 4: Calculate S and R
        $S = [];
        $R = [];
        foreach ($lowongan as $l) {
            $S[$l->id_lowongan] = array_sum($weightedMatrix[$l->id_lowongan]);
            $R[$l->id_lowongan] = max($weightedMatrix[$l->id_lowongan]);
        }

        // Step 5: Calculate Q
        $S_min = min($S);
        $S_max = max($S);
        $R_min = min($R);
        $R_max = max($R);
        $v = 0.5; // Strategy coefficient
        $Q = [];
        foreach ($lowongan as $l) {
            $Q[$l->id_lowongan] = $v * ($S[$l->id_lowongan] - $S_min) / ($S_max - $S_min + 1e-10) +
            (1 - $v) * ($R[$l->id_lowongan] - $R_min) / ($R_max - $R_min + 1e-10);
        }
        dd($Q);

        // Step 6: Rank and save results
        asort($Q);
        $ranking = 1;
        foreach ($Q as $id_lowongan => $nilai_akhir) {
            HasilRekomendasi::updateOrCreate(
                ['id_mahasiswa' => $mahasiswaId, 'id_lowongan' => $id_lowongan],
                ['nilai_akhir' => $nilai_akhir, 'ranking' => $ranking]
            );
            $ranking++;
        }

        return redirect()->route('rekomendasi.index')->with('success', 'Rekomendasi berhasil dihitung.');
    }

    public function calculateSmc($mahasiswaId, $preferensi) {
        $lowonganList = DB::table('lowongan_magang')
            ->where('status_lowongan', 'open')
            ->get()
            ->map(function ($lowongan) {
                return [
                    'id' => $lowongan->id,
                    'keahlian' => explode(', ', $lowongan->bidang_keahlian),
                    'fasilitas' => explode(', ', $lowongan->fasilitas_perusahaan),
                    'status_gaji' => $lowongan->status_gaji,
                    'tipe_perusahaan' => $lowongan->tipe_perusahaan,
                    'fleksibilitas_kerja' => $lowongan->fleksibilitas_kerja,
                ];
            })->toArray();
        
        $matriks = [];
        foreach ($lowonganList as $lowongan) {
            $vectorLowongan = [];
            $vectorPreferensi = [];

            // Minat Keahlian
            $keahlianCocok = !empty(array_intersect($lowongan['keahlian'], $preferensi['keahlian']));
            $vectorLowongan[] = $keahlianCocok ? 1 : 0;
            $vectorPreferensi[] = 1;

            // Fasilitas
            $fasilitasCocok = !empty(array_intersect($lowongan['fasilitas'], $preferensi['fasilitas']));
            $vectorLowongan[] = $fasilitasCocok ? 1 : 0;
            $vectorPreferensi[] = 1;

            // Status Gaji
            $gajiCocok = $lowongan['status_gaji'] === $preferensi['status_gaji'];
            $vectorLowongan[] = $gajiCocok ? 1 : 0;
            $vectorPreferensi[] = 1;

            // Tipe Perusahaan
            $tipeCocok = $lowongan['tipe_perusahaan'] === $preferensi['tipe_perusahaan'];
            $vectorLowongan[] = $tipeCocok ? 1 : 0;
            $vectorPreferensi[] = 1;

            // Fleksibilitas
            $fleksibilitasCocok = $lowongan['fleksibilitas_kerja'] === $preferensi['fleksibilitas_kerja'];
            $vectorLowongan[] = $fleksibilitasCocok ? 1 : 0;
            $vectorPreferensi[] = 1;

            // Hitung SMC
            $matches = 0;
            $total = count($vectorLowongan);
            for ($i = 0; $i < $total; $i++) {
                if ($vectorLowongan[$i] === $vectorPreferensi[$i]) {
                    $matches++;
                }
            }
            $smc = $total ? $matches / $total : 0;

            // Simpan skor
            DB::table('skor_kecocokan')->updateOrInsert(
                ['mahasiswa_id' => $mahasiswaId, 'lowongan_id' => $lowongan['id']],
                [
                    'skor_minat' => $vectorLowongan[0] * 5,
                    'skor_fasilitas' => $vectorLowongan[1] * 5,
                    'skor_gaji' => $vectorLowongan[2] * 5,
                    'skor_tipe' => $vectorLowongan[3] * 5,
                    'skor_fleksibilitas' => $vectorLowongan[4] * 5,
                    'skor_total' => $smc * 5,
                    'updated_at' => now()
                ]
            );

            $matriks[] = [
                $vectorLowongan[0] * 5,
                $vectorLowongan[1] * 5,
                $vectorLowongan[2] * 5,
                $vectorLowongan[3] * 5,
                $vectorLowongan[4] * 5
            ];
        }
    }

    public function setRekomendasiDosen(Request $request, $id_hasil_rekomendasi)
    {
        $hasil = HasilRekomendasi::findOrFail($id_hasil_rekomendasi);
        $hasil->update(['rekomendasi_dosen' => $request->rekomendasi_dosen]);
        return redirect()->back()->with('success', 'Rekomendasi dosen updated.');
    }

    public function index()
    {
        $mahasiswaId = Auth::id();
        $hasil = HasilRekomendasi::where('id_mahasiswa', $mahasiswaId)
                                ->with('lowongan')
                                ->orderBy('ranking')
                                ->get();
        dd($hasil);
        return view('rekomendasi.index', compact('hasil'));
    }
}
