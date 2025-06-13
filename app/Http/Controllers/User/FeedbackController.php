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
        
        // Ambil feedback yang sudah ada (jika ada) - termasuk yang hanya ada pesan_dosen
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
        
        // Cek apakah testimoni sudah pernah diisi
        if ($existingFeedback && !empty(trim($existingFeedback->testimoni_magang))) {
            return redirect()->back()->with('warning', 'Anda sudah memberikan testimoni untuk magang ini.');
        }

        // Validasi input
        $validated = $request->validate([
            'testimoni_magang' => 'required|string|min:50|max:1000',
        ], [
            'testimoni_magang.required' => 'Testimoni magang wajib diisi.',
            'testimoni_magang.min' => 'Testimoni magang minimal 50 karakter.',
            'testimoni_magang.max' => 'Testimoni magang maksimal 1000 karakter.',
        ]);

        try {
            if ($existingFeedback) {
                // Update existing record
                $existingFeedback->update([
                    'testimoni_magang' => $validated['testimoni_magang']
                ]);
            } else {
                // Create new record
                FeedbackMagang::create([
                    'id_bimbingan_magang' => $bimbingan->id_bimbingan,
                    'testimoni_magang' => $validated['testimoni_magang']
                ]);
            }
            
            return redirect()->back()->with('success', 'Testimoni berhasil disimpan. Terima kasih atas evaluasi Anda!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan testimoni. Silakan coba lagi.');
        }
    }
}
