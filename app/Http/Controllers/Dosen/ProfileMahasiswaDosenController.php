<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\View\View;

class ProfileMahasiswaDosenController extends Controller
{
    public function index(): View
    {
        $mahasiswas = Mahasiswa::all();

        return view('dosen.profile_mahasiswa', [
            'mahasiswas' => $mahasiswas,
        ]);
    }
}
