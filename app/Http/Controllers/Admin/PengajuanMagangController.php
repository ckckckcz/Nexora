<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LowonganMagang;
use App\Models\Mahasiswa;
use App\Models\PengajuanMagang;
use Illuminate\Http\Request;
use Storage;
use Validator;

class PengajuanMagangController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengajuans = PengajuanMagang::limit(10)->get();
        return view('admin.pengajuan_magang', compact('pengajuans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $pengajuan = PengajuanMagang::findOrFail($id);
        $lowongan = LowonganMagang::all();
        $mahasiswa = Mahasiswa::all();
        // dd($pengajuan->KTP);

        return view('admin.function.pengajuan_magang.edit', compact('lowongan', 'mahasiswa', 'pengajuan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_perusahaan' => 'required|string',
            'id_skema_magang' => 'required|exists:skema_magang,id_skema_magang',
            'id_posisi_magang' => 'required|exists:posisi_magang,id_posisi_magang',
            'deskripsi' => 'required|min:10',
            'lokasi' => 'required|string',
            'bidang_keahlian' => 'required|string',
            'status_lowongan' => 'required',
        ], [
            'nama_perusahaan.required' => 'Nama Perusahaan Harus Diisi',
            'id_skema_magang.required' => 'Skema Magang Harus Diisi',
            'id_posisi_magang.required' => 'Posisi Magang Harus Diisi',
            'deskripsi.required' => 'Deskripsi Harus Diisi',
            'lokasi.required' => 'Lokasi Harus Diisi',
            'bidang_keahlian.required' => 'Bidang Harus Diisi',
            'status_lowongan.required' => 'Status Harus Diisi', 
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        LowonganMagang::find($id)->update([
            'nama_perusahaan' => $request->nama_perusahaan,
            'id_skema_magang' => $request->id_skema_magang,
            'id_posisi_magang' => $request->id_posisi_magang,
            'deskripsi' => $request->deskripsi,
            'lokasi' => $request->lokasi,
            'bidang_keahlian' => $request->bidang_keahlian,
            'status_lowongan' => $request->status_lowongan,
        ]);

        return redirect()->route('admin.lowongan-magang')->with('success', 'Lowongan Magang berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lowongan = LowonganMagang::findOrFail($id);

        // Cek apakah masih ada program studi di mahasiswa dan dosen 
        $checkBimbingan = BimbinganMagang::where('id_lowongan_magang', $id)->count();
        $chekPengajuan = PengajuanMagang::where('id_lowongan', $id)->count();

        if ($checkBimbingan > 0 || $chekPengajuan > 0) {
            return redirect()->route('admin.lowongan-magang')->with('error', 'Lowongan Magang tidak dapat dihapus karena masih digunakan oleh mahasiswa dan dosen.');
        }

        // Jika tidak ada lowongan open, lanjut hapus
        $lowongan->delete();

        return redirect()->route('admin.lowongan-magang')->with('success', 'Lowongan Magang berhasil dihapus.');
    }
}
