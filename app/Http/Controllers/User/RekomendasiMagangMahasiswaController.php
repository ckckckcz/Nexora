<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SpkController;
use App\Models\HasilRekomendasi;
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

        $mahasiswaId = Mahasiswa::where('nim', auth()->user()->username)->first();

        $spk = new SpkController();

        $matriks = $spk->matriksPerbandingan($preferensi);
        $normalisasi = $spk->normalisasiWmsc($matriks);
        $wmscScore = $spk->scoreWmsc($normalisasi);
        $filtered = $spk->filterWmsc($wmscScore, $matriks);
        $vikor = $spk->hitungVIKOR($filtered[0]);
        $output = $spk->ValidasiAkhir($vikor, $wmscScore, $filtered[0]);

        PreferensiMahasiswa::updateOrCreate(
            ['id_mahasiswa' => $mahasiswaId->id_mahasiswa],
            [
                'id_mahasiswa' => $mahasiswaId->id_mahasiswa,
                'keahlian' => implode(', ', $preferensi['keahlian']),
                'fasilitas' => implode(', ', $preferensi['fasilitas']),
                'status_gaji' => $preferensi['status_gaji'],
                'tipe_perusahaan' => $preferensi['tipe_perusahaan'],
                'fleksibilitas_kerja' => $preferensi['fleksibilitas_kerja'],
            ],
        );

        foreach($output as &$i) {
            $i['id_mahasiswa'] = $mahasiswaId->id_mahasiswa;
        } 

        foreach ($output as $item) {
            HasilRekomendasi::updateOrCreate(
                ['id_mahasiswa' => $item['id_mahasiswa'], 'id_lowongan' => $item['id_lowongan']],
                [
                    'wmsc' => $item['wmsc'],
                    'qi' => $item['qi'],
                    'ranking' => $item['ranking'],
                ]
            );
        }
            
        return redirect()->route('user.rekomendasi-magang.hasil')->with('success', 'Preferensi berhasil disimpan.');
    }

    public function hasil()
    {
        $mahasiswa = Mahasiswa::where('nim', auth()->user()->username)->first();
        $hasilRekomendasi = HasilRekomendasi::with('lowongan')
            ->where('id_mahasiswa', $mahasiswa->id_mahasiswa)
            ->orderBy('ranking', 'asc')
            ->limit(3)
            ->get();

        return view('user.hasil_rekomendasi', compact('hasilRekomendasi'));
    }


    
}
