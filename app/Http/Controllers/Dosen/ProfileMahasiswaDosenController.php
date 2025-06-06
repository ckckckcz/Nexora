<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\BimbinganMagang;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class ProfileMahasiswaDosenController extends Controller
{
    public function index(): View
    {
        $id_dosen = Auth::user()->dosen->id_dosen;
        $mahasiswas = BimbinganMagang::where('id_dosen', $id_dosen)
            ->with('mahasiswa')
            ->get()
            ->pluck('mahasiswa');

        return view('dosen.profile_mahasiswa', [
            'mahasiswas' => $mahasiswas,
        ]);
    }
}
