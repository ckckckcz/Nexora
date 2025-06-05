<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use App\Models\LowonganMagang;
use App\Models\PenilaianLowongan;
use App\Models\PreferensiMahasiswa; // Added import for PreferensiMahasiswa
use App\Models\SkorKecocokan;
use Illuminate\Support\Facades\DB; // Added import for DB
use Illuminate\Support\Facades\Validator; // Added import for Validator
use Illuminate\Http\Request;

class PenilaianLowonganController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data
        $kriteria = DB::table('kriteria')->get();
        $lowongan = DB::table('lowongan_magang')->get();
        $penilaian = DB::table('penilaian_lowongan')->get();

        // Bangun matriks Perbandingan
        $bestValues = [];
        $worstValues = [];

        // Inisialisasi bestValues dan worstValues dengan nilai awal null
        foreach ($kriteria as $k) {
            $bestValues[$k->id_kriteria] = null;
            $worstValues[$k->id_kriteria] = null;
        }

        // Fetch data from SkorKecocokan for id_mahasiswa = 3
        $skorData = SkorKecocokan::where('id_mahasiswa', 3)->get();

        // Build matrix comparison
        $matriks = [];
        foreach ($skorData as $item) {
            $matriks[$item->id_lowongan] = [
                'nama_perusahaan' => $item->lowongan->nama_perusahaan,
                'skor_minat' => $item->skor_minat,
                'skor_fasilitas' => $item->skor_fasilitas,
                'skor_gaji' => $item->skor_gaji,
                'skor_tipe' => $item->skor_tipe,
                'skor_fleksibilitas' => $item->skor_fleksibilitas,
                'skor_total' => $item->skor_total,
            ];
        }
        // dd($matriks);

        // Map score keys to numeric keys
        $scoreKeys = [
            1 => 'skor_minat',
            2 => 'skor_fasilitas',
            3 => 'skor_gaji',
            4 => 'skor_tipe',
            5 => 'skor_fleksibilitas',
        ];

        // Initialize bestValues and worstValues
        foreach ($scoreKeys as $key => $scoreKey) {
            $bestValues[$key] = null; // Initialize best value
            $worstValues[$key] = null; // Initialize worst value
        }

        // Calculate bestValues and worstValues
        foreach ($matriks as $baris) {
            foreach ($scoreKeys as $key => $scoreKey) {
                $nilai = $baris[$scoreKey] ?? null;

                if (is_numeric($nilai)) {
                    // Update bestValues
                    if ($bestValues[$key] === null || $nilai > $bestValues[$key]) {
                        $bestValues[$key] = $nilai;
                    }

                    // Update worstValues
                    if ($worstValues[$key] === null || $nilai < $worstValues[$key]) {
                        $worstValues[$key] = $nilai;
                    }
                }
            }
        }
        // dd( $bestValues, $worstValues);
        
        // Normalisasi matriks
        $matriksNormalisasi = [];
        foreach ($matriks as $idLowongan => $baris) {
            $barisNormalisasi = [
                'nama_perusahaan' => $baris['nama_perusahaan']
            ];
            foreach ($scoreKeys as $key => $scoreKey) {
                $nilai = $baris[$scoreKey] ?? null;

                // Perform normalization based on criteria type
                if (is_numeric($nilai) && isset($bestValues[$key]) && isset($worstValues[$key]) && $bestValues[$key] != $worstValues[$key]) {
                    if ($kriteria->where('id_kriteria', $key)->first()->tipe == 'Benefit') {
                        $barisNormalisasi[$key] = ($nilai - $worstValues[$key]) / ($bestValues[$key] - $worstValues[$key]);
                    } else {
                        $barisNormalisasi[$key] = ($bestValues[$key] - $nilai) / ($bestValues[$key] - $worstValues[$key]);
                    }
                } else {
                    $barisNormalisasi[$key] = 0; // Default to 0 if division by zero occurs
                }
            }
            $matriksNormalisasi[$idLowongan] = $barisNormalisasi;
        }
        // dd( $matriksNormalisasi);
        
        // Calculate the weighted matrix
        $weights = [ 
            1 => 2,
            2 => 1,
            3 => 2,
            4 => 3,
            5 => 3,
        ];
        $matriksTerbobot = [];
        foreach ($matriksNormalisasi as $barisNormalisasi) {
            $barisTerbobot = [
                'nama_perusahaan' => $barisNormalisasi['nama_perusahaan']
            ];
            foreach ($kriteria as $k) {
                $nilaiNormalisasi = $barisNormalisasi[$k->id_kriteria] ?? 0;
                $bobot = $weights[$k->id_kriteria] ?? 1; // Default to 1 if weight is not defined

                // Ensure $nilaiNormalisasi is numeric before performing multiplication
                if (is_numeric($nilaiNormalisasi)) {
                    $barisTerbobot[$k->id_kriteria] = $nilaiNormalisasi * $bobot;
                } else {
                    $barisTerbobot[$k->id_kriteria] = 0; // Default to 0 if $nilaiNormalisasi is not numeric
                }
            }
            $matriksTerbobot[] = $barisTerbobot;
        }
        // dd($matriksTerbobot);
        
        // Calculate S and R values using the weighted matrix
        $sValues = [];
        $rValues = [];
        foreach ($matriksTerbobot as $baris) {
            $s = 0;
            $r = 0;
            foreach ($kriteria as $k) {
                $nilaiTerbobot = $baris[$k->id_kriteria] ?? 0;
                $s += $nilaiTerbobot;
                $r = max($r, $nilaiTerbobot);
            }
            $sValues[] = ['nama_perusahaan' => $baris['nama_perusahaan'], 's' => $s];
            $rValues[] = ['nama_perusahaan' => $baris['nama_perusahaan'], 'r' => $r];
        }
        // dd($sValues, $rValues);

        // Calculate Q values
        $v = 0.5; // Weight for the strategy of maximum group utility

        // Ensure compatibility with array structure
        $sBest = max(array_column($sValues, 's') ?: [0]);
        $sWorst = min(array_column($sValues, 's') ?: [0]);
        $rBest = max(array_column($rValues, 'r') ?: [0]);
        $rWorst = min(array_column($rValues, 'r') ?: [0]);
        // dd($sBest, $rBest, $sWorst, $rWorst);

        $qValues = [];
        foreach ($matriksNormalisasi as $idLowongan => $baris) {
            $sValue = $sValues[$idLowongan]['s'] ?? 0;
            $rValue = $rValues[$idLowongan]['r'] ?? 0;

            if (is_numeric($sValue) && is_numeric($rValue) && $sWorst != $sBest && $rWorst != $rBest) {
                $q = $v * (($sValue - $sBest) / ($sWorst - $sBest)) + (1 - $v) * (($rValue - $rBest) / ($rWorst - $rBest));
            } else {
                $q = 0; // Default to 0 if division by zero occurs
            }

            $qValues[] = ['nama_perusahaan' => $baris['nama_perusahaan'], 'q' => $q];
        }

        // dd($qValues);

        
        // Rank the alternatives
        $rankedAlternatives = [];
        foreach ($qValues as $index => $qValue) {
            $rankedAlternatives[] = [
                'nama_perusahaan' => $qValue['nama_perusahaan'],
                's' => $sValues[$index]['s'] ?? 0,
                'r' => $rValues[$index]['r'] ?? 0,
                'q' => $qValue['q'],
            ];
        }

        // dd($qValues);

        // Sort by Q value (ascending)
        usort($rankedAlternatives, function ($a, $b) {
            return $a['q'] <=> $b['q'];
        });

        return view('admin.sistemRekomendasi.pembobotan_lowongan', compact('kriteria', 'rankedAlternatives', 'matriks', 'matriksNormalisasi', 'matriksTerbobot', 'sValues', 'rValues', 'qValues', 'bestValues', 'worstValues'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.function.kriteria.tambah');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_kriteria' => 'required|string',
            'tipe' => 'required|String',
            'keterangan' => 'required',
        ], [
            'nama_kriteria.required' => 'Nama Kriteria Harus Diisi',
            'tipe.required' => 'Tipe Kriteria Harus Diisi',
            'keterangan.required' => 'Keterangan Harus Diisi',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        Kriteria::create([
            'nama_kriteria' => $request->nama_kriteria,
            'tipe' => $request->tipe,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->to('admin/sistem-rekomendasi/manajemen-kriteria')->with('success', 'Kriteria Magang berhasil ditambahkan');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kriteria = Kriteria::findOrFail($id);
        return view('admin.function.kriteria.edit', compact('kriteria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_kriteria' => 'required|string',
            'tipe' => 'required|String',
            'keterangan' => 'required',
        ], [
            'nama_kriteria.required' => 'Nama Kriteria Harus Diisi',
            'tipe.required' => 'Tipe Kriteria Harus Diisi',
            'keterangan.required' => 'Keterangan Harus Diisi',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        Kriteria::find($id)->update([
            'nama_kriteria' => $request->nama_skema,
            'tipe' => $request->tanggal_mulai,
            'keterangan' => $request->tanggal_selesai,
        ]);

        return redirect()->to('admin/sistem-rekomendasi/manajemen-kriteria')->with('success', 'Kriteria Magang berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kriteria = Kriteria::findOrFail($id);

        $penilaianLowongan = PenilaianLowongan::where('id_kriteria', $id)->count();
        $preferensiMahasiswa = PreferensiMahasiswa::where('id_kriteria', $id)->count();

        if ($penilaianLowongan > 0) {
            return redirect()->to('admin/sistem-rekomendasi/manajemen-kriteria')->with('error', 'Kriteria tidak dapat dihapus karena masih digunakan oleh lowongan".');
        } else if ($preferensiMahasiswa > 0) {
            return redirect()->to('admin/sistem-rekomendasi/manajemen-kriteria')->with('error', 'Kriteria tidak dapat dihapus karena masih digunakan oleh preferensi mahasiswa".');

        }

        $kriteria->delete();

        return redirect()->to('admin/sistem-rekomendasi/manajemen-kriteria')->with('success', 'Kriteria Magang berhasil dihapus.');
    }
}
