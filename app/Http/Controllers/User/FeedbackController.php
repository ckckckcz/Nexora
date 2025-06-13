<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\BimbinganMagang;
use Illuminate\Http\Request;
use App\Models\FeedbackMagang;

class FeedbackController extends Controller
{
    public function index()
    {
        $mahasiswa = auth()->user()->mahasiswa;
        
        // Ambil data bimbingan magang yang sudah selesai
        $bimbingan = BimbinganMagang::where('id_mahasiswa', $mahasiswa->id_mahasiswa)
            ->where('status_bimbingan', 'selesai')
            ->with(['dosen', 'lowongan'])
            ->first();
        
        // Ambil feedback yang sudah ada (jika ada)
        $existingFeedback = null;
        if ($bimbingan) {
            $existingFeedback = FeedbackMagang::where('id_bimbingan_magang', $bimbingan->id_bimbingan)->first();
        }
        
        return view('user.evaluasi', compact('bimbingan', 'existingFeedback', 'mahasiswa'));
    }

    public function store(Request $request)
    {
        $mahasiswa = auth()->user()->mahasiswa;
        
        $bimbingan = BimbinganMagang::where('id_mahasiswa', $mahasiswa->id_mahasiswa)
            ->where('status_bimbingan', 'selesai')
            ->first();

        if (!$bimbingan) {
            return redirect()->back()->with('error', 'Anda belum menyelesaikan magang atau tidak memiliki bimbingan yang valid.');
        }

        // Cek apakah sudah ada feedback
        $existingFeedback = FeedbackMagang::where('id_bimbingan_magang', $bimbingan->id_bimbingan)->first();
        
        if ($existingFeedback) {
            return redirect()->back()->with('warning', 'Anda sudah memberikan feedback untuk magang ini.');
        }

        // Validasi input
        $validated = $request->validate([
            'testimoni_magang' => 'required|string|max:1000',
        ]);

        $validated['id_bimbingan_magang'] = $bimbingan->id_bimbingan;

        // Simpan feedback ke database
        FeedbackMagang::create($validated);

        return redirect()->back()->with('success', 'Feedback berhasil disimpan. Terima kasih atas evaluasi Anda!');
    }
}
