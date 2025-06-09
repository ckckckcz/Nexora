<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\BimbinganMagang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DosenDashboardController extends Controller
{
    public function index()
    {
        // Get the authenticated user's dosen ID
        $dosenId = Auth::user()->dosen->id_dosen;
        
        // Count the number of students supervised by this dosen
        $totalStudents = BimbinganMagang::where('id_dosen', $dosenId)->count();
        
        // Count the number of active supervisions
        $activeSupervisions = BimbinganMagang::where('id_dosen', $dosenId)
                                            ->where('status_bimbingan', 'aktif')
                                            ->count();
        
        // Count the number of completed supervisions
        $completedSupervisions = BimbinganMagang::where('id_dosen', $dosenId)
                                               ->where('status_bimbingan', 'selesai')
                                               ->count();
                                               
        // Get the list of students being supervised 
        $studentList = BimbinganMagang::with('mahasiswa')
                                     ->where('id_dosen', $dosenId)
                                     ->get();
        
        return view('dosen.dashboard', compact(
            'totalStudents', 
            'activeSupervisions', 
            'completedSupervisions',
            'studentList'
        ));
    }
}
