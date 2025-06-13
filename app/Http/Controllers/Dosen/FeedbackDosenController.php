<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\FeedbackMagang;
use App\Models\BimbinganMagang;
use Illuminate\Http\Request;

class FeedbackDosenController extends Controller
{
    public function index()
    {
        $dosen = auth()->user()->dosen;
        
        // Ambil semua bimbingan magang yang dibimbing oleh dosen ini
        $bimbinganIds = BimbinganMagang::where('id_dosen', $dosen->id_dosen)
            ->where('status_bimbingan', 'selesai')
            ->pluck('id_bimbingan');
        
        // Ambil feedback magang berdasarkan bimbingan yang dibimbing dosen
        $feedbackMagang = FeedbackMagang::whereIn('id_bimbingan_magang', $bimbinganIds)
            ->with(['bimbinganMagang.mahasiswa', 'bimbinganMagang.lowongan'])
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('dosen.feedback', compact('feedbackMagang'));
    }

    public function updatePesanDosen(Request $request, $id)
    {
        $dosen = auth()->user()->dosen;
        
        // Validasi bahwa feedback ini adalah untuk mahasiswa yang dibimbing dosen ini
        $feedback = FeedbackMagang::whereHas('bimbinganMagang', function($query) use ($dosen) {
            $query->where('id_dosen', $dosen->id_dosen);
        })->findOrFail($id);
        
        $validated = $request->validate([
            'pesan_dosen' => 'required|string|max:1000',
        ], [
            'pesan_dosen.required' => 'Pesan dosen wajib diisi.',
            'pesan_dosen.max' => 'Pesan dosen maksimal 1000 karakter.',
        ]);
        
        try {
            $feedback->update([
                'pesan_dosen' => $validated['pesan_dosen']
            ]);
            
            return redirect()->back()->with('success', 'Pesan berhasil dikirim ke mahasiswa!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengirim pesan.');
        }
    }
}
