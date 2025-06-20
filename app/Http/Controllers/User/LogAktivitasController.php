<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BimbinganMagang;
use App\Models\LogAktivitasMagang;
use App\Models\EvaluasiMagang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogAktivitasController extends Controller
{
    public function create() {
        $currentDate = now()->toDateString();
        $userId = auth()->user()->mahasiswa->id_mahasiswa;
        $bimbingan = BimbinganMagang::where('id_mahasiswa', $userId)->first();

        $currentDay = now()->dayOfWeek;
        $isAccessible = $currentDay >= 1 && $currentDay <= 6;

        $existingLog = LogAktivitasMagang::where('id_bimbingan', $bimbingan->id_bimbingan)
            ->whereDate('tanggal', $currentDate)
            ->exists();

        $logAktivitas = LogAktivitasMagang::where('id_bimbingan', $userId)->get()->sortDesc();

        // Query evaluasi magang untuk mahasiswa yang login
        $evaluasiMagang = collect();
        if ($bimbingan) {
            $evaluasiMagang = EvaluasiMagang::where('id_bimbingan_magang', $bimbingan->id_bimbingan)
                ->with(['logAktivitas'])
                ->get();
        }

        return view('user.log_aktivitas', [
            'hasFilledLog' => $existingLog,
            'isAccessible' => $isAccessible,
            'logAktivitas' => $logAktivitas,
            'evaluasiMagang' => $evaluasiMagang
        ]);
    }

    public function store(Request $request) {
        $today = now()->toDateString();
        $userId = auth()->user()->mahasiswa->id_mahasiswa;
        $bimbingan = BimbinganMagang::where('id_mahasiswa', $userId)->first();
        $existingLog = LogAktivitasMagang::where('id_bimbingan', $bimbingan)
            ->whereDate('tanggal', $today)
            ->exists();

        if ($existingLog) {
            return redirect()->back()->withErrors(['error' => 'Anda sudah mengisi log aktivitas hari ini']);
        }

        // Validate and store the log
        $validated = $request->validate([
            'jam_masuk' => 'required',
            'jam_pulang' => 'required',
            'kegiatan' => 'required|string',
        ]);

        LogAktivitasMagang::create([
            'id_bimbingan' => $bimbingan->id_bimbingan,
            'tanggal' => $today,
            'jam_masuk' => $validated['jam_masuk'],
            'jam_pulang' => $validated['jam_pulang'],
            'kegiatan' => $validated['kegiatan'],
            'status_log' => 'diterima',
        ]);

        return redirect()->to('/log-aktivitas')->with('success', 'Log aktivitas berhasil disimpan.');
    }
}
