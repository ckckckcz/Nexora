<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SpkController;
use App\Models\HasilRekomendasi;
use App\Models\Kriteria;
use App\Models\LowonganMagang;
use App\Models\PenilaianLowongan;
use App\Models\PreferensiMahasiswa; // Added import for PreferensiMahasiswa
use App\Models\SkorKecocokan;
use Illuminate\Support\Facades\DB; // Added import for DB
use Illuminate\Support\Facades\Validator; // Added import for Validator
use Illuminate\Http\Request;

class DetailPerhitunganSPKController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $preferensiMahasiswa = PreferensiMahasiswa::with('mahasiswa')->get();
        
        return view('admin.sistemRekomendasi.index_spk', compact('preferensiMahasiswa'));
    }
    
    public function show($id)
    {
        $preferensi = PreferensiMahasiswa::where('id_mahasiswa', $id)->get()->toArray();
        $lowongan = LowonganMagang::all()->keyBy('nama_perusahaan')->keys()->toArray();
        $kriteria = Kriteria::all();

        $data = [
            'keahlian' => array_map('trim',(explode(',', $preferensi[0]['keahlian']))) ?? [],
            'fasilitas' => array_map('trim',(explode(',', $preferensi[0]['fasilitas']))) ?? [],
            'status_gaji' => $preferensi[0]['status_gaji'] ?? null,
            'tipe_perusahaan' => $preferensi[0]['tipe_perusahaan'] ?? null,
            'fleksibilitas_kerja' => $preferensi[0]['fleksibilitas_kerja'] ?? null,
        ];

        $spk = new SpkController();

        $matriks = $spk->matriksPerbandingan($data);
        $normalisasi = $spk->normalisasiWmsc($matriks);
        $wmscScore = $spk->scoreWmsc($normalisasi);
        $filtered = $spk->filterWmsc($wmscScore, $matriks);
        $vikor = $spk->hitungVIKOR($filtered[0]);
        $output = $spk->ValidasiAkhir($vikor, $wmscScore, $filtered[0]);

        $final = [];
        foreach ($output as $row) {
            $lowonganMagang = LowonganMagang::find($row['id_lowongan']);
            $final[$lowonganMagang->nama_perusahaan] = [
                'id_lowongan' => $row['id_lowongan'],
                'wmsc' => $row['wmsc'],
                'qi' => $row['qi'],
                'ranking' => $row['ranking'],
            ];
        }
        
        $matriksPerbandingan = [];
        $matriksNormalisasiWmsc = [];
        $matriksWmscScore = [];
        $matriksPerbandinganVikor = [];
        foreach ($matriks as $index => $item) {
            $new_key = $lowongan[$index];
            $key_kriteria = $kriteria[$index]['nama_kriteria'];
            $matriksPerbandingan[$new_key] = $item;
            $matriksWmscScore[$new_key] = $wmscScore[$index];
            $maxMinKriteria[$key_kriteria] = [$vikor['nilai_max'][$index] ?? null, $vikor['nilai_min'][$index] ?? null];
        }
        
        foreach ($normalisasi as $index => $item) {
            $new_key = $lowongan[$index];
            $matriksNormalisasiWmsc[$new_key] = $item;
        }
        
        foreach ($filtered[0] as $index => $item) {
            $new_key = $lowongan[$index];
            $matriksPerbandinganVikor[$new_key] = $item;
        }
        
        $nilaiMaxMinVikor = [];
        foreach ($vikor['nilai_max'] as $index => $max) {
            $key_kriteria = $kriteria[$index]['nama_kriteria'];
            $min = $vikor['nilai_min'][$index];
            $nilaiMaxMinVikor[$key_kriteria] = [$max, $min];
        }
        
        $matriksNormalisasiVikor = [];
        $rankedAlternatives = [];
        $final = [];
        foreach($vikor['normalisasi'] as $index => $item) {
            $new_key = $lowongan[$index];
            $matriksNormalisasiVikor[$new_key] = $item;
            $rankedAlternatives[] = [
                'nama_perusahaan' => $new_key ?? 'Unknown',
                's' => $vikor['s'][$index] ?? null,
                'q' => $vikor['q'][$index] ?? null,
                'r' => $vikor['r'][$index] ?? null,
            ];
            $final[$new_key] = $output[$index] ?? null;
        }

        $sValues = array_map(fn($alt) => ['nama_perusahaan' => $alt['nama_perusahaan'], 's' => $alt['s']], $rankedAlternatives);
        $rValues = array_map(fn($alt) => ['nama_perusahaan' => $alt['nama_perusahaan'], 'r' => $alt['r']], $rankedAlternatives);
        $qValues = array_map(fn($alt) => ['nama_perusahaan' => $alt['nama_perusahaan'], 'q' => $alt['q']], $rankedAlternatives);


        return view('admin.sistemRekomendasi.detail_spk', compact(
            'data',
            'kriteria',
            'matriksPerbandingan',
            'maxMinKriteria',
            'normalisasi',
            'matriksNormalisasiWmsc',
            'matriksWmscScore',
            'matriksPerbandinganVikor',
            'nilaiMaxMinVikor',
            'matriksNormalisasiVikor',
            'rankedAlternatives',
            'final',
        ));
    }
}
