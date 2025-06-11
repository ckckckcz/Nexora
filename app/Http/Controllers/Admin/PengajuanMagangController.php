<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LowonganMagang;
use App\Models\Mahasiswa;
use App\Models\BimbinganMagang;
use App\Models\PengajuanMagang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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
        $pengajuan = PengajuanMagang::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'status_pengajuan' => 'required|in:menunggu,diterima,ditolak',
            'alasan_penolakan' => 'nullable|string|max:1000',
            'surat_tugas' => 'nullable|file|mimes:pdf|max:51200', // 50MB
        ], [
            'status_pengajuan.required' => 'Status pengajuan harus diisi.',
            'status_pengajuan.in' => 'Status pengajuan tidak valid.',
            'alasan_penolakan.max' => 'Alasan penolakan tidak boleh lebih dari 1000 karakter.',
            'surat_tugas.mimes' => 'Surat tugas harus berformat PDF.',
            'surat_tugas.max' => 'Surat tugas tidak boleh lebih dari 50MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'status_pengajuan' => $request->status_pengajuan,
            'alasan_penolakan' => $request->status_pengajuan === 'ditolak' ? $request->alasan_penolakan : null,
        ];

        if ($request->hasFile('surat_tugas')) {
            // Delete old file if exists
            if ($pengajuan->surat_tugas && Storage::exists($pengajuan->surat_tugas)) {
                Storage::delete($pengajuan->surat_tugas);
            }
            $data['surat_tugas'] = $request->file('surat_tugas')->store('surat_tugas', 'public');
        }

        $pengajuan->update($data);

        return redirect()->route('admin.pengajuan-magang')->with('success', 'Pengajuan magang berhasil diperbarui.');
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
