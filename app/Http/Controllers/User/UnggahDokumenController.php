<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PengajuanMagang;
use App\Models\LowonganMagang;
use App\Models\PosisiMagang;
use App\Models\SkemaMagang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Storage;

class UnggahDokumenController extends Controller
{
    public function createOrUpdate() {
        $id_mahasiswa = Auth::user()->mahasiswa->id_mahasiswa;
        $existingPengajuan = PengajuanMagang::where('id_mahasiswa', $id_mahasiswa)->exists();
        $lowongan = LowonganMagang::all();
        $pengajuan = PengajuanMagang::where('id_mahasiswa', $id_mahasiswa)
        ->where('id_mahasiswa', $id_mahasiswa)
        ->first();

        if ($pengajuan != null) {
            $files = [
                'ktp' => $pengajuan->KTP ? $pengajuan->KTP : null,
                'ktm' => $pengajuan->KTM ? $pengajuan->KTM : null,
                'kartu_bpjs' => $pengajuan->Kartu_BPJS_Asuransi_lainnya ? $pengajuan->Kartu_BPJS_Asuransi_lainnya : null,
                'sktm_kip' => $pengajuan->SKTM_KIP_Kuliah ? $pengajuan->SKTM_KIP_Kuliah : null,
                'pakta_integritas' => $pengajuan->Pakta_Integritas ? $pengajuan->Pakta_Integritas : null,
                'daftar_riwayat_hidup' => $pengajuan->Daftar_Riwayat_Hidup ? $pengajuan->Daftar_Riwayat_Hidup : null,
                'khs' => $pengajuan->KHS_cetak_Siakad ? $pengajuan->KHS_cetak_Siakad : null,
                'surat_izin_orang_tua' => $pengajuan->Surat_Izin_Orang_Tua ? $pengajuan->Surat_Izin_Orang_Tua : null,
                'proposal_magang' => $pengajuan->Proposal_Magang ? $pengajuan->Proposal_Magang : null,
                'cv' => $pengajuan->CV ? $pengajuan->CV : null,
                'surat_tugas' => $pengajuan->Surat_Tugas ? $pengajuan->Surat_Tugas : null,
            ];
        }
        
        if ($pengajuan) {
            if ($pengajuan->status_pengajuan !== 'ditolak' && $existingPengajuan) {
                // User can update the documents
                return redirect()->to('profile/'. auth()->user()->username)->with('toast', [
                    'type' => 'warning',
                    'message' => 'Anda sudah mengajukan magang dan tidak dapat mengakses halaman ini.'
                ]);
            } else if ($pengajuan->status_pengajuan === 'ditolak') {
                return view('user.function.edit_upload', compact('lowongan', 'files', 'pengajuan'));
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
            return redirect()->back()->withErrors($validator)->withInput()->with('toast', [
                'type' => 'danger',
                'message' => 'Terjadi kesalahan validasi. Periksa format dan ukuran file Anda.'
            ]);
        }

        $username = auth()->user()->username;
        $destinationPath = storage_path('/storage/app/public/uploads/' . $username);

        // Create the directory if it doesn't exist
        if (!\File::exists($destinationPath)) {
            \File::makeDirectory($destinationPath, 0777, true);
        }

        // Jabarkan request sesuai urutan form
        $data = [];
        // 1. CV
        if ($request->hasFile('CV')) {
            $file = $request->file('CV');
            $filename = 'CV.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);
            $data['CV'] = 'uploads/' . $username . '/' . $filename;
        }
        // 2. Daftar Riwayat Hidup
        if ($request->hasFile('Daftar_Riwayat_Hidup')) {
            $file = $request->file('Daftar_Riwayat_Hidup');
            $filename = 'Daftar Riwayat Hidup.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);
            $data['Daftar_Riwayat_Hidup'] = 'uploads/' . $username . '/' . $filename;
        }
        // 3. Kartu BPJS/Asuransi lainnya
        if ($request->hasFile('Kartu_BPJS_Asuransi_lainnya')) {
            $file = $request->file('Kartu_BPJS_Asuransi_lainnya');
            $filename = 'Kartu BPJS.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);
            $data['Kartu_BPJS_Asuransi_lainnya'] = 'uploads/' . $username . '/' . $filename;
        }
        // 4. KHS cetak Siakad
        if ($request->hasFile('KHS_cetak_Siakad')) {
            $file = $request->file('KHS_cetak_Siakad');
            $filename = 'KHS.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);
            $data['KHS_cetak_Siakad'] = 'uploads/' . $username . '/' . $filename;
        }
        // 5. KTM
        if ($request->hasFile('KTM')) {
            $file = $request->file('KTM');
            $filename = 'KTM.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);
            $data['KTM'] = 'uploads/' . $username . '/' . $filename;
        }
        // 6. KTP
        if ($request->hasFile('KTP')) {
            $file = $request->file('KTP');
            $filename = 'KTP.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);
            $data['KTP'] = 'uploads/' . $username . '/' . $filename;
        }
        // 7. Pakta Integritas
        if ($request->hasFile('Pakta_Integritas')) {
            $file = $request->file('Pakta_Integritas');
            $filename = 'Pakta Integritas.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);
            $data['Pakta_Integritas'] = 'uploads/' . $username . '/' . $filename;
        }
        // 8. Proposal Magang
        if ($request->hasFile('Proposal_Magang')) {
            $file = $request->file('Proposal_Magang');
            $filename = 'Proposal Magang.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);
            $data['Proposal_Magang'] = 'uploads/' . $username . '/' . $filename;
        }
        // 9. SKTM/KIP Kuliah (nullable)
        if ($request->hasFile('SKTM_KIP_Kuliah')) {
            $file = $request->file('SKTM_KIP_Kuliah');
            $filename = 'SKTM.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);
            $data['SKTM_KIP_Kuliah'] = 'uploads/' . $username . '/' . $filename;
        }
        // 10. Surat Izin Orang Tua
        if ($request->hasFile('Surat_Izin_Orang_Tua')) {
            $file = $request->file('Surat_Izin_Orang_Tua');
            $filename = 'Surat Izin Orang Tua.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);
            $data['Surat_Izin_Orang_Tua'] = 'uploads/' . $username . '/' . $filename;
        }

        if ($pengajuan) {
            $pengajuan->update($data);
            return redirect()->back()->with('toast', [
                'type' => 'success',
                'message' => 'Dokumen berhasil diperbarui.'
            ]);
        } else {
            $data['id_mahasiswa'] = $id_mahasiswa;
            $data['id_lowongan'] = $id_lowongan;
            $data['status_pengajuan'] = 'menunggu';
            PengajuanMagang::create($data);
            return redirect()->back()->with('toast', [
                'type' => 'success',
                'message' => 'Dokumen berhasil diunggah.'
            ]);
        }
    }

    public function createOrUpdateWithLowongan() {
        $id_mahasiswa = Auth::user()->mahasiswa->id_mahasiswa;
        $existingPengajuan = PengajuanMagang::where('id_mahasiswa', $id_mahasiswa)->exists();
        $skemaMagangs = SkemaMagang::all();
        $posisiMagangs = PosisiMagang::all();

        return view('user.unggah_dokumen_perusahaan', compact('skemaMagangs', 'posisiMagangs'));
    }
    public function storeOrUpdateWithLowongan(Request $request, $id_lowongan) {
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
            // Tambahan untuk lowongan magang
            'nama_perusahaan' => 'required|string',
            'id_skema_magang' => 'required|exists:skema_magang,id_skema_magang',
            'id_posisi_magang' => 'required|exists:posisi_magang,id_posisi_magang',
            'deskripsi' => 'required|min:10',
            'lokasi' => 'required|string',
            'bidang_keahlian' => 'required|string',
            'status_lowongan' => 'required',
            'tipe_perusahaan' => 'required|string',
            'fasilitas_perusahaan' => 'nullable|string',
            'status_gaji' => 'required|string',
            'fleksibilitas_kerja' => 'required|string',
            'tanggal_pendaftaran' => 'required|date',
            'tanggal_penutupan' => 'required|date|after_or_equal:tanggal_pendaftaran',
        ], [
            'nama_perusahaan.required' => 'Nama Perusahaan Harus Diisi',
            'id_skema_magang.required' => 'Skema Magang Harus Diisi',
            'id_posisi_magang.required' => 'Posisi Magang Harus Diisi',
            'deskripsi.required' => 'Deskripsi Harus Diisi',
            'lokasi.required' => 'Lokasi Harus Diisi',
            'bidang_keahlian.required' => 'Bidang Harus Diisi',
            'status_lowongan.required' => 'Status Harus Diisi',
            'tipe_perusahaan.required' => 'Tipe Perusahaan Harus Diisi',
            'status_gaji.required' => 'Status Gaji Harus Diisi',
            'fleksibilitas_kerja.required' => 'Fleksibilitas Kerja Harus Diisi',
            'tanggal_pendaftaran.required' => 'Tanggal Pendaftaran Harus Diisi',
            'tanggal_penutupan.required' => 'Tanggal Penutupan Harus Diisi',
            'tanggal_penutupan.after_or_equal' => 'Tanggal Penutupan harus setelah atau sama dengan Tanggal Pendaftaran',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('toast', [
                'type' => 'danger',
                'message' => 'Terjadi kesalahan validasi. Periksa kembali semua input Anda.'
            ]);
        }

        LowonganMagang::create([
            'nama_perusahaan' => $request->nama_perusahaan,
            'id_skema_magang' => $request->id_skema_magang,
            'id_posisi_magang' => $request->id_posisi_magang,
            'deskripsi' => $request->deskripsi,
            'lokasi' => $request->lokasi,
            'bidang_keahlian' => $request->bidang_keahlian,
            'status_lowongan' => $request->status_lowongan,
            'fasilitas_perusahaan' => $request->fasilitas_perusahaan,
            'status_gaji' => $request->status_gaji,
            'fleksibilitas_kerja' => $request->fleksibilitas_kerja,
            'tanggal_pendaftaran' => $request->tanggal_pendaftaran,
            'tanggal_penutupan' => $request->tanggal_penutupan,
        ]);

        $username = auth()->user()->username;
        $destinationPath = storage_path('/storage/app/public/uploads/' . $username);

        // Create the directory if it doesn't exist
        if (!\File::exists($destinationPath)) {
            \File::makeDirectory($destinationPath, 0777, true);
        }

        // Jabarkan request sesuai urutan form
        $data = [];
        // 1. CV
        if ($request->hasFile('CV')) {
            $file = $request->file('CV');
            $filename = 'CV.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);
            $data['CV'] = 'uploads/' . $username . '/' . $filename;
        }
        // 2. Daftar Riwayat Hidup
        if ($request->hasFile('Daftar_Riwayat_Hidup')) {
            $file = $request->file('Daftar_Riwayat_Hidup');
            $filename = 'Daftar Riwayat Hidup.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);
            $data['Daftar_Riwayat_Hidup'] = 'uploads/' . $username . '/' . $filename;
        }
        // 3. Kartu BPJS/Asuransi lainnya
        if ($request->hasFile('Kartu_BPJS_Asuransi_lainnya')) {
            $file = $request->file('Kartu_BPJS_Asuransi_lainnya');
            $filename = 'Kartu BPJS.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);
            $data['Kartu_BPJS_Asuransi_lainnya'] = 'uploads/' . $username . '/' . $filename;
        }
        // 4. KHS cetak Siakad
        if ($request->hasFile('KHS_cetak_Siakad')) {
            $file = $request->file('KHS_cetak_Siakad');
            $filename = 'KHS.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);
            $data['KHS_cetak_Siakad'] = 'uploads/' . $username . '/' . $filename;
        }
        // 5. KTM
        if ($request->hasFile('KTM')) {
            $file = $request->file('KTM');
            $filename = 'KTM.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);
            $data['KTM'] = 'uploads/' . $username . '/' . $filename;
        }
        // 6. KTP
        if ($request->hasFile('KTP')) {
            $file = $request->file('KTP');
            $filename = 'KTP.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);
            $data['KTP'] = 'uploads/' . $username . '/' . $filename;
        }
        // 7. Pakta Integritas
        if ($request->hasFile('Pakta_Integritas')) {
            $file = $request->file('Pakta_Integritas');
            $filename = 'Pakta Integritas.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);
            $data['Pakta_Integritas'] = 'uploads/' . $username . '/' . $filename;
        }
        // 8. Proposal Magang
        if ($request->hasFile('Proposal_Magang')) {
            $file = $request->file('Proposal_Magang');
            $filename = 'Proposal Magang.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);
            $data['Proposal_Magang'] = 'uploads/' . $username . '/' . $filename;
        }
        // 9. SKTM/KIP Kuliah (nullable)
        if ($request->hasFile('SKTM_KIP_Kuliah')) {
            $file = $request->file('SKTM_KIP_Kuliah');
            $filename = 'SKTM.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);
            $data['SKTM_KIP_Kuliah'] = 'uploads/' . $username . '/' . $filename;
        }
        // 10. Surat Izin Orang Tua
        if ($request->hasFile('Surat_Izin_Orang_Tua')) {
            $file = $request->file('Surat_Izin_Orang_Tua');
            $filename = 'Surat Izin Orang Tua.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);
            $data['Surat_Izin_Orang_Tua'] = 'uploads/' . $username . '/' . $filename;
        }

        if ($pengajuan) {
            $pengajuan->update($data);
            return redirect()->back()->with('toast', [
                'type' => 'success',
                'message' => 'Dokumen dan lowongan magang berhasil diperbarui.'
            ]);
        } else {
            $data['id_mahasiswa'] = $id_mahasiswa;
            $data['id_lowongan'] = $id_lowongan;
            $data['status_pengajuan'] = 'menunggu';
            PengajuanMagang::create($data);
            return redirect()->back()->with('toast', [
                'type' => 'success',
                'message' => 'Dokumen dan lowongan magang berhasil diunggah.'
            ]);
        }
    }

    public function update($id, Request $request) {
        $pengajuan = PengajuanMagang::findOrFail($id);

        // Validasi hanya untuk file yang diupload
        $rules = [
            'Pakta_Integritas' => 'mimes:pdf|max:2048',
            'Daftar_Riwayat_Hidup' => 'mimes:pdf|max:2048',
            'KHS_cetak_Siakad' => 'mimes:pdf|max:2048',
            'KTP' => 'mimes:pdf|max:2048',
            'KTM' => 'mimes:pdf|max:2048',
            'Surat_Izin_Orang_Tua' => 'mimes:pdf|max:2048',
            'Kartu_BPJS_Asuransi_lainnya' => 'mimes:pdf|max:2048',
            'SKTM_KIP_Kuliah' => 'mimes:pdf|max:2048',
            'Proposal_Magang' => 'mimes:pdf|max:2048',
            'CV' => 'mimes:pdf|max:2048',
        ];

        $inputRules = [];
        foreach ($rules as $field => $rule) {
            if ($request->hasFile($field)) {
                $inputRules[$field] = $rule;
            }
        }

        $validator = \Validator::make($request->all(), $inputRules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('toast', [
                'type' => 'danger',
                'message' => 'Terjadi kesalahan validasi. Periksa format dan ukuran file Anda.'
            ]);
        }

        $username = auth()->user()->username;
        $destinationPath = storage_path('/storage/app/public/uploads/' . $username);

        if (!\File::exists($destinationPath)) {
            \File::makeDirectory($destinationPath, 0777, true);
        }

        $data = [];
        // Proses hanya file yang diupload
        $fields = [
            'CV' => 'CV',
            'Daftar_Riwayat_Hidup' => 'Daftar Riwayat Hidup',
            'Kartu_BPJS_Asuransi_lainnya' => 'Kartu BPJS',
            'KHS_cetak_Siakad' => 'KHS',
            'KTM' => 'KTM',
            'KTP' => 'KTP',
            'Pakta_Integritas' => 'Pakta Integritas',
            'Proposal_Magang' => 'Proposal Magang',
            'SKTM_KIP_Kuliah' => 'SKTM',
            'Surat_Izin_Orang_Tua' => 'Surat Izin Orang Tua',
        ];
        foreach ($fields as $field => $filenamePrefix) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $filename = $filenamePrefix . '.' . $file->getClientOriginalExtension();
                $file->move($destinationPath, $filename);
                $data[$field] = 'uploads/' . $username . '/' . $filename;
            }
        }

        // Update hanya field yang ada
        if (!empty($data)) {
            $pengajuan->update($data);
        }

        return redirect()->back()->with('toast', [
            'type' => 'success',
            'message' => 'Dokumen berhasil diperbarui.'
        ]);
    }

    public function exportPengajuan($id) {
        // Check if the user is authenticated and has a mahasiswa profile
        if (!Auth::check() || !Auth::user()->mahasiswa) {
            return redirect()->back()->with('toast', [
                'type' => 'danger',
                'message' => 'Anda tidak memiliki akses untuk mengunduh dokumen ini.'
            ]);
        }

        // Fetch the PengajuanMagang record
        $pengajuan = PengajuanMagang::findOrFail($id);

        // Check if the user owns the pengajuan
        if ($pengajuan->id_mahasiswa !== Auth::user()->mahasiswa->id_mahasiswa) {
            return redirect()->back()->with('toast', [
                'type' => 'danger',
                'message' => 'Anda tidak diizinkan mengunduh dokumen ini karena bukan milik Anda.'
            ]);
        }

        // Check if the status is valid for download
        if (in_array($pengajuan->status_pengajuan, ['ditolak', 'menunggu'])) {
            return redirect()->back()->with('toast', [
                'type' => 'danger',
                'message' => 'Dokumen tidak dapat diunduh karena status pengajuan ' . $pengajuan->status_pengajuan . '.'
            ]);
        }

        // Check if the CV file exists
        if (!$pengajuan->CV || !Storage::disk('public')->exists($pengajuan->CV)) {
            return redirect()->back()->with('toast', [
                'type' => 'danger',
                'message' => 'File CV tidak ditemukan.'
            ]);
        }

        // Ensure the file is a PDF
        $fileExtension = pathinfo($pengajuan->CV, PATHINFO_EXTENSION);
        if (strtolower($fileExtension) !== 'pdf') {
            return redirect()->back()->with('toast', [
                'type' => 'danger',
                'message' => 'File CV harus berformat PDF.'
            ]);
        }

        // Generate a safe filename
        $filename = 'Pengajuan_Magang_' . $pengajuan->id_mahasiswa . '_' . time() . '.pdf';

        // Return the file download response
        return Storage::disk('public')->download($pengajuan->CV, $filename);
    }
}
