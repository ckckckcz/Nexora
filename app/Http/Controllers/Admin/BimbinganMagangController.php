<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BimbinganMagang;
use App\Models\Dosen;
use App\Models\LowonganMagang;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Validator;
use function PHPUnit\Framework\returnArgument;

class BimbinganMagangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guidances = BimbinganMagang::limit(10)->get();
        return view('admin.bimbingan_magang', compact('guidances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mahasiswas = Mahasiswa::all();
        $dosens = Dosen::all();
        $lowongans = LowonganMagang::all();
        return view('admin.function.bimbingan_magang.tambah', compact('mahasiswas', 'dosens', 'lowongans'));
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
        
        BimbinganMagang::create([
            'id_mahasiswa' => $request->id_mahasiswa,
            'id_dosen' => $request->id_dosen,
            'id_lowongan_magang' => $request->id_lowongan_magang,
            'status_bimbingan' => $request->status_bimbingan,
        ]);

        return redirect()->route('admin.bimbingan-magang')->with('success', 'Bimbingan Magang berhasil ditambahkan');
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
        $bimbinganMagang = BimbinganMagang::findOrFail($id);
        $mahasiswas = Mahasiswa::all();
        $dosens = Dosen::all();
        $lowongans = LowonganMagang::all();
        return view('admin.function.bimbingan_magang.edit', compact('bimbinganMagang', 'mahasiswas', 'dosens', 'lowongans'));
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
        
        BimbinganMagang::find($id)->update([
            'id_mahasiswa' => $request->id_mahasiswa,
            'id_dosen' => $request->id_dosen,
            'id_lowongan_magang' => $request->id_lowongan_magang,
            'status_bimbingan' => $request->status_bimbingan,
        ]);

        return redirect()->route('admin.bimbingan-magang')->with('success', 'Bimbingan Magang berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
