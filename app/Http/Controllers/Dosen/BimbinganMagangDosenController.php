<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\BimbinganMagang;
use App\Models\Dosen;
use App\Models\LowonganMagang;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Validator;

class BimbinganMagangDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $guidances = BimbinganMagang::with('mahasiswa', 'dosen', 'lowongan')
                ->where('id_dosen', auth()->user()->dosen->id_dosen)
                ->get();
            return view('dosen.bimbingan_magang', compact('guidances'));
        } catch (\Exception $e) {
            // Jika error, kirim array kosong
            $guidances = collect([]);
            return view('dosen.bimbingan_magang', compact('guidances'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_mahasiswa' => 'required|exists:mahasiswa,id_mahasiswa',
            'id_dosen' => 'required|exists:dosen,id_dosen',
            'id_lowongan_magang' => 'required|exists:lowongan_magang,id_lowongan',
            'status_bimbingan' => 'required',
        ], [
            'id_mahasiswa.required' => 'Nama Mahasiswa Harus Diisi',
            'id_dosen.required' => 'Nama Dosen Harus Diisi',
            'id_lowongan_magang.required' => 'Lowongan Harus Diisi',
            'status_bimbingan.required' => 'Status Bimbingan Harus Diisi',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if (BimbinganMagang::where('id_mahasiswa', $request->id_mahasiswa)->exists()) {
            return redirect()->back()->withErrors(['error' => 'Bimbingan Magang sudah ada']);
        }

        // Simpan data bimbingan magang
        BimbinganMagang::create([
            'id_mahasiswa' => $request->id_mahasiswa,
            'id_dosen' => $request->id_dosen,
            'id_lowongan_magang' => $request->id_lowongan_magang,
            'status_bimbingan' => $request->status_bimbingan,
        ]);

        return redirect()->back()->with('success', 'Bimbingan Magang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dosenId = auth()->user()->id_dosen;
        $guidance = BimbinganMagang::with('mahasiswa', 'dosen', 'lowongan')
            ->where('id_bimbingan', $id)
            ->where('id_dosen', $dosenId)
            ->firstOrFail();
        return view('dosen.bimbingan_magang_detail', compact('guidance'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $guidance = BimbinganMagang::findOrFail($id);
        $mahasiswas = Mahasiswa::all();
        $dosens = Dosen::all();
        $lowongans = LowonganMagang::all();

        return view('dosen.bimbingan_magang_edit', compact('guidance', 'mahasiswas', 'dosens', 'lowongans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'id_mahasiswa' => 'required|exists:mahasiswa,id_mahasiswa',
            'id_dosen' => 'required|exists:dosen,id_dosen',
            'id_lowongan_magang' => 'required|exists:lowongan_magang,id_lowongan',
            'status_bimbingan' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $guidance = BimbinganMagang::findOrFail($id);
        $guidance->update($request->all());

        return redirect()->route('dosen.bimbingan-magang')->with('success', 'Bimbingan Magang berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guidance = BimbinganMagang::findOrFail($id);
        $guidance->delete();

        return redirect()->back()->with('success', 'Bimbingan Magang berhasil dihapus');
    }
}
