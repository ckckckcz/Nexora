<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use App\Models\LowonganMagang;
use App\Models\PenilaianLowongan;
use DB;
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
                $nilai = $baris[$k->id_kriteria];
                if ($nilai !== null) {
                    if ($k->tipe == 'Benefit') {
                        $barisNormalisasi[$k->id_kriteria] = ($nilai - $worstValues[$k->id_kriteria]) / ($bestValues[$k->id_kriteria] - $worstValues[$k->id_kriteria]);
                    } else {
                        $barisNormalisasi[$k->id_kriteria] = ($bestValues[$k->id_kriteria] - $nilai) / ($bestValues[$k->id_kriteria] - $worstValues[$k->id_kriteria]);
                    }
                } else {
                    $barisNormalisasi[$k->id_kriteria] = null;
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
                $barisTerbobot[$k->id_kriteria] = $nilaiNormalisasi * $bobot;
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
            $sValues[] = $s;
            $rValues[] = $r;
        }
        // dd($sValues);
        // dd($rValues);

        // Calculate Q values
        $v = 0.5; // Weight for the strategy of maximum group utility
        $sBest = min($sValues);
        $sWorst = max($sValues);
        $rBest = min($rValues);
        $rWorst = max($rValues);
        $qValues = [];
        foreach (range(0, count($matriksNormalisasi) - 1) as $i) {
            $q = $v * (($sValues[$i] - $sBest) / ($sWorst - $sBest)) + (1 - $v) * (($rValues[$i] - $rBest) / ($rWorst - $rBest));
            $qValues[] = $q;
        }

        // dd($qValues);
        
        // Rank the alternatives
        $rankedAlternatives = [];
        foreach (range(0, count($matriksNormalisasi) - 1) as $i) {
            $rankedAlternatives[] = [
                'nama_perusahaan' => $matriksNormalisasi[$i]['nama_perusahaan'],
                's' => $sValues[$i],
                'r' => $rValues[$i],
                'q' => $qValues[$i],
            ];
        }
        // dd($rankedAlternatives);

        // Sort by Q value (ascending)
        usort($rankedAlternatives, function ($a, $b) {
            return $a['q'] <=> $b['q'];
        });

        return view('admin.sistemRekomendasi.pembobotan_lowongan', compact('kriteria', 'rankedAlternatives'));
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
