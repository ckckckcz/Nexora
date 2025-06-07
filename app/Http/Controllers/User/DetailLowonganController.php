<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\LowonganMagang;
use Illuminate\Http\Request;

class DetailLowonganController extends Controller
{
    public function index() {
        $lowongans = LowonganMagang::limit(20)->get();

        return view('user.lowongan', compact('lowongans'));
    }

    public function view($id) {
        $lowongan = LowonganMagang::where('id_lowongan', $id)->first()->get();

        return view('user.detail-lowongan.view', compact('lowongan'));
    }
}
