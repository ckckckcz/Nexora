<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\LogAktivitasMagang;
use App\Models\BimbinganMagang;
use App\Models\EvaluasiMagang;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LogAktivitasMagangController extends Controller
{
    public function index()
    {
        // Get the ID of the logged-in dosen
        $dosenId = Auth::user()->dosen->id_dosen;
        
        // Get bimbingan magang IDs for this dosen
        $bimbinganIds = BimbinganMagang::where('id_dosen', $dosenId)->pluck('id_bimbingan')->toArray();
        
        // Get log aktivitas for the dosen's students
        $logAktivitas = LogAktivitasMagang::whereIn('id_bimbingan', $bimbinganIds)->get();
        
        foreach ($logAktivitas as $log) {
            $log->minggu = Carbon::parse($log->tanggal)->weekOfYear;
        }
        
        // Get evaluations for the dosen's students
        $evaluasi = EvaluasiMagang::whereIn('id_bimbingan_magang', $bimbinganIds)
            ->with(['bimbinganMagang.mahasiswa', 'logAktivitas'])
            ->get();
        // dd($evaluasi);
        // dd($evaluasi->pluck('logAktivitas.tanggal'));

        return view('dosen.log_aktivitas', compact('logAktivitas', 'evaluasi'));
    }

    public function create($id) {
        $evaluasi = EvaluasiMagang::where('id_log_aktifitas',$id)->first();
        // dd($evaluasi);
        return view('dosen.functions.log_aktivitas.tambah', compact('evaluasi'));
    }
    

    public function update(Request $request, String     $id)
    {
        $logAktivitas = LogAktivitasMagang::where('id_log_aktifitas', $id)->first();
        // Validate request data
        $validator = Validator::make($request->all(), [
            'evaluation' => 'required|string|max:500',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Update the log activity
        EvaluasiMagang::updateOrCreate(
        ['id_log_aktifitas' => $id],
        [
            'id_bimbingan_magang' => $logAktivitas->id_bimbingan,
            'komentar' => $request->evaluation,
            'updated_at' => now(),
        ]
        );

        return redirect()->to('dosen/mahasiswa/log-aktivitas')->with('success', 'Log aktivitas berhasil diperbarui.');
    }
}
