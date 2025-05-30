<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BimbinganMagang;
use App\Models\LowonganMagang;
use App\Models\PengajuanMagang;
use App\Models\PosisiMagang;
use App\Models\SkemaMagang;
use Illuminate\Http\Request;
use Validator;

class LowonganMagangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vacancies = LowonganMagang::limit(10)->get();
        return view('admin.lowongan_magang', compact('vacancies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $skemaMagangs = SkemaMagang::all();
        $posisiMagangs = PosisiMagang::all();
        return view('admin.function.lowongan_magang.tambah', compact('skemaMagangs', 'posisiMagangs'));
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
        
        LowonganMagang::create([
            'nama_perusahaan' => $request->nama_perusahaan,
            'id_skema_magang' => $request->id_skema_magang,
            'id_posisi_magang' => $request->id_posisi_magang,
            'deskripsi' => $request->deskripsi,
            'lokasi' => $request->lokasi,
            'bidang_keahlian' => $request->bidang_keahlian,
            'status_lowongan' => $request->status_lowongan,
        ]);

        return redirect()->route('admin.lowongan-magang')->with('success', 'Lowongan Magang berhasil ditambahkan');
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
        $lowongan = LowonganMagang::find($id);
        $skemaMagangs = SkemaMagang::all();
        $posisiMagangs = PosisiMagang::all();
        return view('admin.function.lowongan_magang.edit', compact('lowongan', 'skemaMagangs', 'posisiMagangs'));
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
