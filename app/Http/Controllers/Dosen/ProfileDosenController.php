<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileDosenController extends Controller
{
    public function index(Request $request)
    {
        // Check if a specific NIDN is provided
        if ($request->has('nidn')) {
            // Get dosen data by NIDN
            $dosen = Dosen::where('nidn', $request->nidn)->first();
            
            // If dosen not found, show error
            if (!$dosen) {
                return redirect()->back()->with('error', 'Data dosen tidak ditemukan!');
            }
            
            // Check if current user is admin or the dosen themselves
            $isOwner = Auth::check() && Auth::user()->dosen && Auth::user()->dosen->id_dosen === $dosen->id_dosen;
            $isAdmin = Auth::check() && Auth::user()->role === 'admin';
            
            // If not authorized, redirect back with error
            if (!$isOwner && !$isAdmin) {
                return redirect()->back()->with('error', 'Anda tidak memiliki akses ke profil ini!');
            }
        } else {
            // Get the authenticated user's dosen data
            $dosen = Auth::user()->dosen;
            
            // If the user doesn't have associated dosen data, redirect with error
            if (!$dosen) {
                return redirect()->back()->with('error', 'Data dosen tidak ditemukan!');
            }
            
            // Always the owner when viewing own profile
            $isOwner = true;
            $isAdmin = Auth::user()->role === 'admin';
        }
        
        // Get program studi data for dropdown
        $prodis = ProgramStudi::all();
        
        return view('dosen.profile', compact('dosen', 'prodis', 'isOwner', 'isAdmin'));
    }
    
    public function update(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'password' => 'nullable|string|min:6|max:100',
            'tanda_tangan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'signature_pad_data' => 'nullable|string',
            'signature_method' => 'required|in:upload,draw',
        ]);
        
        // Get the authenticated user's dosen data
        $dosen = Auth::user()->dosen;
        $user = Auth::user();
        
        // Update user password if provided
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
            $user->save();
        }
        
        // Handle signature upload or drawing
        if ($request->signature_method === 'upload' && $request->hasFile('tanda_tangan')) {
            // Delete previous signature if exists
            if ($dosen->tanda_tangan && Storage::exists('public/'.$dosen->tanda_tangan)) {
                Storage::delete('public/'.$dosen->tanda_tangan);
            }
            
            // Store new signature
            $path = $request->file('tanda_tangan')->store('signatures', 'public');
            $dosen->tanda_tangan = $path;
        } elseif ($request->signature_method === 'draw' && $request->filled('signature_pad_data')) {
            // Convert base64 to image and save
            $image_parts = explode(";base64,", $request->signature_pad_data);
            $image_base64 = base64_decode($image_parts[1]);
            $fileName = 'signature_' . $dosen->id_dosen . '_' . time() . '.png';
            $filePath = 'signatures/' . $fileName;
            
            // Delete previous signature if exists
            if ($dosen->tanda_tangan && Storage::exists('public/'.$dosen->tanda_tangan)) {
                Storage::delete('public/'.$dosen->tanda_tangan);
            }
            
            Storage::put('public/' . $filePath, $image_base64);
            $dosen->tanda_tangan = $filePath;
        }
        
        $dosen->save();
        
        return redirect()->route('dosen.profile')->with('success', 'Profil berhasil diperbarui!');
    }
}
