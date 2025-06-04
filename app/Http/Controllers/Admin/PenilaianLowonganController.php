<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use App\Models\LowonganMagang;
use App\Models\PenilaianLowongan;
use App\Models\PreferensiMahasiswa; // Added import for PreferensiMahasiswa
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
        $matriks = [];
        $bestValues = [];
        $worstValues = [];

        // Inisialisasi bestValues dan worstValues dengan nilai awal null
        foreach ($kriteria as $k) {
            $bestValues[$k->id_kriteria] = null;
            $worstValues[$k->id_kriteria] = null;
        }

        foreach ($lowongan as $l) {
            $baris = [
                'nama_perusahaan' => $l->nama_perusahaan
            ];

            foreach ($kriteria as $k) {
                // Perhatikan penggunaan id_kriteria dan id_lowongan
                $nilai = $penilaian->first(function ($p) use ($l, $k) {
                    return $p->id_lowongan == $l->id_lowongan && $p->id_kriteria == $k->id_kriteria;
                });

                $nilaiKriteria = $nilai ? $nilai->nilai : null;
                $baris[$k->id_kriteria] = $nilaiKriteria;

                // Menentukan nilai best dan worst
                if ($nilaiKriteria !== null) {
                    if ($bestValues[$k->id_kriteria] === null || $nilaiKriteria > $bestValues[$k->id_kriteria]) {
                        $bestValues[$k->id_kriteria] = $nilaiKriteria;
                    }
                    if ($worstValues[$k->id_kriteria] === null || $nilaiKriteria < $worstValues[$k->id_kriteria]) {
                        $worstValues[$k->id_kriteria] = $nilaiKriteria;
                    }
                }
            }
            
            $matriks[] = $baris;
        }
        
        // Normalisasi matriks
        $matriksNormalisasi = [];
        foreach ($matriks as $baris) {
            $barisNormalisasi = [
                'nama_perusahaan' => $baris['nama_perusahaan']
            ];
            foreach ($kriteria as $k) {
                $nilai = $baris[$k->id_kriteria] ?? null;

                // Ensure $nilai is numeric and $bestValues/$worstValues are arrays before accessing offsets
                if (is_numeric($nilai) && isset($bestValues[$k->id_kriteria]) && isset($worstValues[$k->id_kriteria])) {
                    if ($k->tipe == 'Benefit') {
                        $barisNormalisasi[$k->id_kriteria] = ($nilai - $worstValues[$k->id_kriteria]) / ($bestValues[$k->id_kriteria] - $worstValues[$k->id_kriteria]);
                    } else {
                        $barisNormalisasi[$k->id_kriteria] = ($bestValues[$k->id_kriteria] - $nilai) / ($bestValues[$k->id_kriteria] - $worstValues[$k->id_kriteria]);
                    }
                } else {
                    $barisNormalisasi[$k->id_kriteria] = null; // Default to null if values are invalid
                }
            }
            $matriksNormalisasi[] = $barisNormalisasi;
        }
        // dd($matriksNormalisasi);
        
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

        // Calculate Q values
        $v = 0.5; // Weight for the strategy of maximum group utility
        $sBest = min(array_column($sValues, 's'));
        $sWorst = max(array_column($sValues, 's'));
        $rBest = min(array_column($rValues, 'r'));
        $rWorst = max(array_column($rValues, 'r'));
        $qValues = [];
        foreach (range(0, count($matriksNormalisasi) - 1) as $i) {
            // Ensure $sValues and $rValues are numeric before performing calculations
            $sValue = $sValues[$i]['s'] ?? 0;
            $rValue = $rValues[$i]['r'] ?? 0;

            if (is_numeric($sValue) && is_numeric($rValue) && $sWorst != $sBest && $rWorst != $rBest) {
                $q = $v * (($sValue - $sBest) / ($sWorst - $sBest)) + (1 - $v) * (($rValue - $rBest) / ($rWorst - $rBest));
            } else {
                $q = 0; // Default to 0 if values are not numeric or division by zero occurs
            }

            $qValues[] =  ['nama_perusahaan' => $matriksNormalisasi[$i]['nama_perusahaan'], 'q' => $q];
        }

        // dd($qValues);
        
        // Rank the alternatives
        $rankedAlternatives = [];
        foreach (range(0, count($matriksNormalisasi) - 1) as $i) {
            $rankedAlternatives[] = [
                'nama_perusahaan' => $matriksNormalisasi[$i]['nama_perusahaan'],
                's' => $sValues[$i]['s'],
                'r' => $rValues[$i]['r'],
                'q' => $qValues[$i]['q'],
            ];
        }
        // dd($rankedAlternatives);

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
