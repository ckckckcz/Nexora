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

        return view('dosen.log_aktivitas', compact('logAktivitas', 'evaluasi'));
    }
    
    /**
     * Save evaluation for a log activity
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveEvaluation(Request $request)
    {
        // Validate request data
        $validator = Validator::make($request->all(), [
            'log_id' => 'required|exists:log_aktivitas_magang,id_log_aktivitas',
            'evaluation' => 'required|string|max:500',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }
        
        try {
            // Get the log activity
            $logAktivitas = LogAktivitasMagang::findOrFail($request->log_id);
            
            // Check if the dosen has permission to evaluate this log
            $dosenId = Auth::user()->dosen->id_dosen;
            $bimbingan = BimbinganMagang::where('id_bimbingan', $logAktivitas->id_bimbingan)
                                       ->where('id_dosen', $dosenId)
                                       ->first();
            
            if (!$bimbingan) {
                return response()->json([
                    'success' => false,
                    'message' => 'Anda tidak memiliki akses untuk mengevaluasi log aktivitas ini'
                ], 403);
            }
            
            // Create or update the evaluation
            $evaluasi = EvaluasiMagang::updateOrCreate(
                ['id_log_aktivitas' => $request->log_id],
                [
                    'id_bimbingan_magang' => $logAktivitas->id_bimbingan,
                    'komentar' => $request->evaluation,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
            
            return response()->json([
                'success' => true,
                'message' => 'Evaluasi berhasil disimpan',
                'data' => $evaluasi
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }
}
