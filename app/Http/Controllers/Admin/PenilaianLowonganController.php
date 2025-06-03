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

        // Bangun matriks
        $matriks = [];

        foreach ($lowongan as $l) {
            $baris = [
                'nama_perusahaan' => $l->nama_perusahaan
            ];

            foreach ($kriteria as $k) {
                // Perhatikan penggunaan id_kriteria dan id_lowongan
                $nilai = $penilaian->first(function ($p) use ($l, $k) {
                    return $p->id_lowongan == $l->id_lowongan && $p->id_kriteria == $k->id_kriteria;
                });

                // Gunakan ID kriteria sebagai key (lebih aman)
                $baris[$k->id_kriteria] = $nilai ? $nilai->nilai : null;
            }

            $matriks[] = $baris;
        }

        return view('admin.sistemRekomendasi.pembobotan_lowongan', compact('kriteria', 'matriks'));
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
