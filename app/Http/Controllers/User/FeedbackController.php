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
        return view('user.evaluasi');
    }

    public function store(Request $request)
    {
        $bimbingan = BimbinganMagang::where('id_mahasiswa', auth()->user()->mahasiswa->id_mahasiswa)
            ->where('status_bimbingan', 'selesai')
            ->first();

        // Validasi input
        $validated = $request->validate([
            'id_bimbingan_magang' => $bimbingan->id_bimbingan,
            'testimoni_magang' => 'required|string|max:1000',
        ]);

        // Simpan feedback ke database menggunakan model FeedbackMagang
        FeedbackMagang::create($validated);

        return redirect()->back()->with('success', 'Feedback berhasil disimpan.');
    }
}
