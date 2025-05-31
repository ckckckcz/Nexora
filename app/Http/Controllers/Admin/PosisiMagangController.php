<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LowonganMagang;
use App\Models\PosisiMagang;
use Illuminate\Http\Request;
use Validator;

class PosisiMagangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posisis = PosisiMagang::limit(10)->get();
        return view('admin.posisi_magang', compact('posisis'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.function.posisi_magang.tambah');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_posisi' => 'required|string|unique:posisi_magang,nama_posisi',
        ], [
            'nama_posisi.required' => 'Nama Posisi Harus Diisi',
            'nama_posisi.unique' => 'Nama Posisi Sudah Ada',
            'nama_posisi.string' => 'Nama Harus Berupa String',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        PosisiMagang::create([
            'nama_posisi' => $request->nama_posisi,
        ]);

        return redirect()->route('admin.posisi-magang')->with('success', 'Posisi Magang berhasil ditambahkan');
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
        $posisi = PosisiMagang::findOrFail($id);
        return view('admin.function.posisi_magang.edit', compact('posisi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_posisi' => 'required|string',
        ], [
            'nama_posisi.required' => 'Nama Posisi Harus Diisi',
            'nama_posisi.string' => 'Nama Harus Berupa String',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        PosisiMagang::find($id)->create([
            'nama_posisi' => $request->nama_posisi,
        ]);

        return redirect()->route('admin.posisi-magang')->with('success', 'Posisi Magang berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $posisi = PosisiMagang::findOrFail($id);

        $lowonganTerbuka = LowonganMagang::where('id_posisi_magang', $id)->count();

        if ($lowonganTerbuka > 0) {
            return redirect()->route('admin.posisi-magang')->with('error', 'Posisi tidak dapat dihapus karena masih digunakan oleh lowongan".');
        }

        // Jika tidak ada lowongan open, lanjut hapus
        $posisi->delete();

        return redirect()->route('admin.posisi-magang')->with('success', 'Posisi Magang berhasil dihapus.');
    }

}
