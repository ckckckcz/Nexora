<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PengajuanMagang;
use App\Models\LowonganMagang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnggahDokumenController extends Controller
{
    public function createOrUpdate() {
        $id_mahasiswa = Auth::user()->mahasiswa->id_mahasiswa;
        $existingPengajuan = PengajuanMagang::where('id_mahasiswa', $id_mahasiswa)->exists();
        $lowongan = LowonganMagang::all();
        $pengajuan = PengajuanMagang::where('id_mahasiswa', $id_mahasiswa)
        ->where('id_mahasiswa', $id_mahasiswa)
        ->first();
        
        if ($pengajuan) {
            if ($pengajuan->status_pengajuan !== 'ditolak' && $existingPengajuan) {
                // User can update the documents
                return redirect()->to('profile/'. auth()->user()->username)->with('error', 'Anda sudah mengajukan magang dan tidak dapat mengakses halaman ini.');
            }
        }
        
        return view('user.function.unggah_dokumen', compact('lowongan'));
    }
    
    public function storeOrUpdate(Request $request) {
        $id_mahasiswa = auth()->user()->mahasiswa->id_mahasiswa;
        $id_lowongan = $request->input('id_lowongan');
        $pengajuan = PengajuanMagang::where('id_mahasiswa', $id_mahasiswa)
        ->where('id_mahasiswa', $id_mahasiswa)
        ->first();
        
        $validator = \Validator::make($request->all(), [
            'Pakta_Integritas' => 'required|mimes:pdf|max:2048',
            'Daftar_Riwayat_Hidup' => 'required|mimes:pdf|max:2048',
            'KHS_cetak_Siakad' => 'required|mimes:pdf|max:2048',
            'KTP' => 'required|mimes:pdf|max:2048',
            'KTM' => 'required|mimes:pdf|max:2048',
            'Surat_Izin_Orang_Tua' => 'required|mimes:pdf|max:2048',
            'Kartu_BPJS_Asuransi_lainnya' => 'required|mimes:pdf|max:2048',
            'SKTM_KIP_Kuliah' => 'nullable|mimes:pdf|max:2048',
            'Proposal_Magang' => 'required|mimes:pdf|max:2048',
            'CV' => 'required|mimes:pdf|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->except('_token');

        $filenames = ['CV', 'Daftar Riwayat Hidup', 'Kartu BPJS', 'KHS', 'KTM', 'KTP', 'Pakta Integritas', 'Proposal Magang', 'SKTM', 'Surat Izin Orang Tua', 'Surat Tugas'];
        $i = 0;
        foreach ($data as $key => $file) {
            if ($request->hasFile($key)) {
                $username = auth()->user()->username;
                $filename = $filenames[$i] . '.' . $file->getClientOriginalExtension();
                $destinationPath = storage_path('app/public/uploads/' . $username);

                // Create the directory if it doesn't exist
                if (!\File::exists($destinationPath)) {
                    \File::makeDirectory($destinationPath, 0777, true);
                }

                $file->move($destinationPath, $filename);
                $data[$key] = 'storage/app/public/uploads/' . $username . '/' . $filename;
                $i++;
            } else {
                unset($data[$key]);
            }
        }

        if ($pengajuan) {
            $pengajuan->update($data);
            return redirect()->back()->with('success', 'Dokumen berhasil diperbarui.');
        } else {
            $data['id_mahasiswa'] = $id_mahasiswa;
            $data['id_lowongan'] = $id_lowongan;
            $data['status_pengajuan'] = 'menunggu';
            PengajuanMagang::create($data);
            return redirect()->back()->with('success', 'Dokumen berhasil diunggah.');
        }
    }
}
