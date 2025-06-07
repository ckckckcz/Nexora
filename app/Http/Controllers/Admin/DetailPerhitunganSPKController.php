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
        $preferensi = PreferensiMahasiswa::where('id_mahasiswa', $id)->get();
        $kriteria = Kriteria::all();
        $preferensiMahasiswa = $preferensi->first();

        $data = [
            'keahlian' => explode(',', $preferensiMahasiswa->keahlian ?? ''),
            'fasilitas' => explode(',', $preferensiMahasiswa->fasilitas ?? ''),
            'status_gaji' => $preferensiMahasiswa->status_gaji ?? null,
            'tipe_perusahaan' => $preferensiMahasiswa->tipe_perusahaan ?? null,
            'fleksibilitas_kerja' => $preferensiMahasiswa->fleksibilitas_kerja ?? null,
        ];


        $spk = new SpkController();

        $matriks = $spk->matriksPerbandingan($data);
        $normalisasi = $spk->normalisasiWmsc($matriks);
        $wmscScore = $spk->scoreWmsc($normalisasi);
        $filtered = $spk->filterWmsc($wmscScore, $matriks);
        $vikor = $spk->hitungVIKOR($filtered[0]);
        $output = $spk->ValidasiAkhir($vikor, $wmscScore, $filtered[0]);
        dd($vikor);
        
        return view('admin.sistemRekomendasi.detail_spk',compact($vikor, $preferensiMahasiswa, $kriteria, $matriks, $normalisasi, $filtered, $output));
    }
}
