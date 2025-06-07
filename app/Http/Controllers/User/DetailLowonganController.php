<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\LowonganMagang;
use App\Models\SkemaMagang;
use Illuminate\Http\Request;

class DetailLowonganController extends Controller
{
    public function index() {
        $lowongans = LowonganMagang::limit(20)->get();

        return view('user.lowongan', compact('lowongans'));
    }

    public function view($id) {
        $lowongan = LowonganMagang::with(['skemaMagang', 'posisiMagang'])->findOrFail($id);
        return view('user.detail_lowongan', compact('lowongan'));
    }
}
