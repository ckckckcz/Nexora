<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\LowonganMagang;
use App\Models\Mahasiswa;
use App\Models\PreferensiMahasiswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RekomendasiMagangMahasiswaController extends Controller
{
    /**
     * Display the rekomendasi magang view.
     */
    public function index()
    {
        $bidangKeahlian = LowonganMagang::select('bidang_keahlian')->distinct()->get();
        $tipePerusahaan = LowonganMagang::select('tipe_perusahaan')->distinct()->get();
        $fasilitasPerusahaan = LowonganMagang::select('fasilitas_perusahaan')->distinct()->get();
        $statusGaji = LowonganMagang::select('status_gaji')->distinct()->get();
        $fleksibilitasKerja = LowonganMagang::select('fleksibilitas_kerja')->distinct()->get();

        return view('user.rekomendasi_magang', compact('bidangKeahlian', 'tipePerusahaan', 'fasilitasPerusahaan', 'statusGaji', 'fleksibilitasKerja'));
    }

    /**
     * Fetch bidang keahlian tags from the database.
     */
    public function getBidangKeahlianTags()
    {
        $tags = LowonganMagang::select('bidang_keahlian')->distinct()->get()->pluck('bidang_keahlian')->toArray();

        // Split tags by comma and format them into an array of buttons
        $formattedTags = [];
        foreach ($tags as $tagGroup) {
            $individualTags = explode(',', $tagGroup);
            foreach ($individualTags as $tag) {
                $formattedTags[] = ['name' => trim($tag), 'icon' => '📚'];
            }
        }

        return response()->json($formattedTags);
    }

    /**
     * Store a new preferensi mahasiswa.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Bidang_Keahlian' => 'nullable|array',
            'Tipe_Perusahaan' => 'nullable|string',
            'Fasilitas_Perusahaan' => 'nullable|array',
            'Status_Gaji' => 'nullable|string',
            'Fleksibilitas_Kerja' => 'nullable|string',
        ]);

        $preferensi = [
            'keahlian' => $request->input('Bidang_Keahlian') ?? [],
            'fasilitas' => $request->input('Fasilitas_Perusahaan') ?? [],
            'status_gaji' => $request->input('Status_Gaji'),
            'tipe_perusahaan' => $request->input('Tipe_Perusahaan'),
            'fleksibilitas_kerja' => $request->input('Fleksibilitas_Kerja'),
        ];

        // dd(implode(', ', $preferensi['keahlian']));

        $mahasiswaId = Mahasiswa::where('nim', auth()->user()->username)->first();
        $bobot = $this->calculateSmc($mahasiswaId->id_mahasiswa, $preferensi);

        PreferensiMahasiswa::create([
            'id_mahasiswa' => $mahasiswaId->id_mahasiswa,
            'keahlian' => implode(', ', $preferensi['keahlian']),
            'fasilitas' => implode(', ', $preferensi['fasilitas']),
            'status_gaji' => $preferensi['status_gaji'],
            'tipe_perusahaan' => $preferensi['tipe_perusahaan'],
            'fleksibilitas_kerja' => $preferensi['fleksibilitas_kerja'],
            // 'bobot' => $bobot,
            // 'id_kriteria' => 1, // Add default value
        ]);

        return redirect()->route('user.rekomendasi-magang.hasil')->with('success', 'Preferensi berhasil disimpan.');
    }

    public function hasil()
    {
        $mahasiswaId = Mahasiswa::where('nim', auth()->user()->username)->first()->id_mahasiswa;

        $preferensi = PreferensiMahasiswa::where('id_mahasiswa', $mahasiswaId)->first();

        if (!$preferensi) {
            return redirect()->route('user.rekomendasi_magang')->with('error', 'Preferensi tidak ditemukan.');
        }

        $calculationResult = $this->calculateSmc($mahasiswaId, [
            'keahlian' => explode(', ', $preferensi->keahlian),
            'fasilitas' => explode(', ', $preferensi->fasilitas),
            'status_gaji' => $preferensi->status_gaji,
            'tipe_perusahaan' => $preferensi->tipe_perusahaan,
            'fleksibilitas_kerja' => $preferensi->fleksibilitas_kerja,
        ]);

        $ranking = isset($calculationResult['ranking']) ? $calculationResult['ranking'] : [];
        $scores = isset($calculationResult['scores']) ? $calculationResult['scores'] : [];
        $matriks = isset($calculationResult['matriks'][0]) ? $calculationResult['matriks'][0] : [];

        $skorKecocokan = DB::table('skor_kecocokan')
            ->select('id_mahasiswa', 'id_lowongan', 'skor_total')
            ->where('id_mahasiswa', $mahasiswaId)
            ->distinct()
            ->get();

        return view('user.hasil_rekomendasi', [
            'ranking' => $ranking,
            'scores' => $scores,
            'matriks' => $matriks,
            'skorKecocokan' => $skorKecocokan,
        ]);
    } 

    public function calculateSmc($mahasiswaId, $preferensi) {
        $lowonganList = DB::table('lowongan_magang')
            // ->where('status_lowongan', 'open')
            ->get()
            ->map(function ($lowongan) {
                return [
                    'id' => $lowongan->id_lowongan,
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
            $keahlianCocok = !empty(array_intersect((array) $lowongan['keahlian'], (array) $preferensi['keahlian'] ?? []));
            $vectorLowongan[] = $keahlianCocok ? 5 : 1; // Ensure $keahlianCocok is numeric
            $vectorPreferensi[] = 1;

            // Fasilitas
            $fasilitasCocok = !empty(array_intersect((array) $lowongan['fasilitas'], (array) $preferensi['fasilitas']));
            $vectorLowongan[] = $fasilitasCocok ? 5 : 1;
            $vectorPreferensi[] = 1;

            // Status Gaji
            $gajiCocok = $lowongan['status_gaji'] === $preferensi['status_gaji'];
            $vectorLowongan[] = $gajiCocok ? 5 : 1;
            $vectorPreferensi[] = 1;

            // Tipe Perusahaan
            $tipeCocok = $lowongan['tipe_perusahaan'] === $preferensi['tipe_perusahaan'];
            $vectorLowongan[] = $tipeCocok ? 5 : 1;
            $vectorPreferensi[] = 1;

            // Fleksibilitas
            $fleksibilitasCocok = $lowongan['fleksibilitas_kerja'] === $preferensi['fleksibilitas_kerja'];
            $vectorLowongan[] = $fleksibilitasCocok ? 5 : 1;
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
            DB::table('skor_kecocokan')->insert([ 
                'id_mahasiswa' => $mahasiswaId,
                'id_lowongan' => $lowongan['id'],
                'skor_minat' => $vectorLowongan[0] * 4,
                'skor_fasilitas' => $vectorLowongan[1] * 4,
                'skor_gaji' => $vectorLowongan[2] * 4,
                'skor_tipe' => $vectorLowongan[3] * 4,
                'skor_fleksibilitas' => $vectorLowongan[4] * 4,
                'skor_total' => $smc * 4,
                'updated_at' => now(),
            ]);

            $matriks[] = [
                $vectorLowongan[0] * 4,
                $vectorLowongan[1] * 4,
                $vectorLowongan[2] * 4,
                $vectorLowongan[3] * 4,
                $vectorLowongan[4] * 4,
            ];
        }
        // dd($vectorLowongan, $vectorPreferensi, $smc);

        return $smc * 5;
    }

}
