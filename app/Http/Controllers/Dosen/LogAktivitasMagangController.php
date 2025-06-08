<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\LogAktivitasMagang;
use App\Models\BimbinganMagang;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LogAktivitasMagangController extends Controller
{
    public function index()
    {
        // Filter log aktivitas berdasarkan id_bimbingan dari dosen yang login
        $logAktivitas = LogAktivitasMagang::where('id_bimbingan', auth()->user()->dosen->id_dosen)->get();

        foreach ($logAktivitas as $log) {
            $log->minggu = Carbon::parse($log->tanggal)->weekOfYear;
        }

        return view('dosen.log_aktivitas', compact('logAktivitas'));
    }
}
