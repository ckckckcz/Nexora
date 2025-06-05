<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\LowonganMagang;
use App\Models\PreferensiMahasiswa;
use DB;
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
            'id_mahasiswa' => 'required|exists:mahasiswa,id_mahasiswa',
            'id_kriteria' => 'required|exists:kriteria,id_kriteria',
            'Bidang Keahlian' => 'nullable|array',
            'Tipe Perusahaan' => 'nullable|string',
            'Fasilitas Perusahaan' => 'nullable|array',
            'Status Gaji' => 'nullable|string',
            'Fleksibilitas Kerja' => 'nullable|string',
        ]);

        $mahasiswaId = $request->input('id_mahasiswa');
        $preferensi = [
            'keahlian' => $request->input('Bidang Keahlian') ?? [],
            'fasilitas' => $request->input('Fasilitas Perusahaan') ?? [],
            'status_gaji' => $request->input('Status Gaji'),
            'tipe_perusahaan' => $request->input('Tipe Perusahaan'),
            'fleksibilitas_kerja' => $request->input('Fleksibilitas Kerja'),
        ];

        $bobot = $this->calculateSmc($mahasiswaId, $preferensi);
        dd($request);

        $data = [
            'id_mahasiswa' => $request->input('id_mahasiswa'),
            'id_kriteria' => $request->input('id_kriteria'),
            'keahlian' => implode(', ', $preferensi['keahlian']),
            'fasilitas' => implode(', ', $preferensi['fasilitas']),
            'status_gaji' => $preferensi['status_gaji'],
            'tipe_perusahaan' => $preferensi['tipe_perusahaan'],
            'fleksibilitas_kerja' => $preferensi['fleksibilitas_kerja'],
            'bobot' => $bobot,
        ];

        PreferensiMahasiswa::create($data);

        
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
        return $smc * 5;
    }
}
