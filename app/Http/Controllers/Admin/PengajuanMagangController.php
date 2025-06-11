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
        
        // Prepare file data for display
        $files = [
            'ktp' => $pengajuan->KTP,
            'ktm' => $pengajuan->KTM,
            'kartu_bpjs' => $pengajuan->Kartu_BPJS_Asuransi_lainnya,
            'sktm_kip' => $pengajuan->SKTM_KIP_Kuliah,
            'pakta_integritas' => $pengajuan->Pakta_Integritas,
            'daftar_riwayat_hidup' => $pengajuan->Daftar_Riwayat_Hidup,
            'khs' => $pengajuan->KHS_cetak_Siakad,
            'surat_izin_orang_tua' => $pengajuan->Surat_Izin_Orang_Tua,
            'proposal_magang' => $pengajuan->Proposal_Magang,
            'cv' => $pengajuan->CV,
            'surat_tugas' => $pengajuan->Surat_Tugas,
        ];

        return view('admin.function.pengajuan_magang.edit', compact('lowongan', 'mahasiswa', 'pengajuan', 'files'));
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
            'Surat_Tugas' => 'nullable|file|mimes:pdf|max:51200', // 50MB
        ], [
            'status_pengajuan.required' => 'Status pengajuan harus diisi.',
            'status_pengajuan.in' => 'Status pengajuan tidak valid.',
            'alasan_penolakan.max' => 'Alasan penolakan tidak boleh lebih dari 1000 karakter.',
            'Surat_Tugas.mimes' => 'Surat tugas harus berformat PDF.',
            'Surat_Tugas.max' => 'Surat tugas tidak boleh lebih dari 50MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'status_pengajuan' => $request->status_pengajuan,
            'alasan_penolakan' => $request->status_pengajuan === 'ditolak' ? $request->alasan_penolakan : null,
        ];

        if ($request->hasFile('Surat_Tugas')) {
            // Delete old file if exists
            if ($pengajuan->Surat_Tugas && Storage::exists($pengajuan->Surat_Tugas)) {
                Storage::delete($pengajuan->Surat_Tugas);
            }
            $data['Surat_Tugas'] = $request->file('Surat_Tugas')->store('surat_tugas', 'public');
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
