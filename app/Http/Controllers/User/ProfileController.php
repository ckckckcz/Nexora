<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BimbinganMagang;
use App\Models\Mahasiswa;
use App\Models\PengajuanMagang;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index($id)
    {
        $pengajuan = null;
        if (Auth::user()->mahasiswa && auth()->user()->role == 'mahasiswa' && auth()->user()->username == $id) {
            $pengajuan = PengajuanMagang::where('id_mahasiswa', Auth::user()->mahasiswa->id_mahasiswa)->first();
        }
        
        $mahasiswa = Mahasiswa::where('nim', $id)->firstOrFail();
        
        // Get bimbingan data for chat functionality and evaluation
        $bimbingan = null;
        if (auth()->check() && auth()->user()->role == 'mahasiswa' && auth()->user()->username == $id) {
            $bimbingan = \App\Models\BimbinganMagang::with(['dosen', 'mahasiswa'])
                ->where('id_mahasiswa', $mahasiswa->id_mahasiswa)
                ->first();
        }
        
        return view('user.profile', compact('mahasiswa', 'pengajuan', 'bimbingan'));
    }
    
    public function edit($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->firstOrFail();
        if (auth()->user()->username !== $mahasiswa->nim) {
            return redirect()->to('/profile/'.auth()->user()->username)->with('error', 'You do not have permission to edit this profile.');
        }
        return view('user.function.edit_profile', compact('mahasiswa'));
    }

    public function update(Request $request, $nim)
    {
        // Ambil data mahasiswa berdasarkan NIM
        $mahasiswa = Mahasiswa::where('nim', $nim)->firstOrFail();

        // Validasi input (semua field opsional)
        $validated = $request->validate([
            'nama_mahasiswa' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'lokasi' => 'nullable|string|max:255',
            'nomor_telepon' => 'nullable|string|max:20',
            'linkedin' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'github' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'profile_mahasiswa' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
        ]);

        // Update data mahasiswa
        $mahasiswa->nama_mahasiswa = $request->nama_mahasiswa ?? $mahasiswa->nama_mahasiswa;
        $mahasiswa->deskripsi = $request->deskripsi ?? $mahasiswa->deskripsi;
        $mahasiswa->lokasi = $request->lokasi ?? $mahasiswa->lokasi;
        $mahasiswa->nomor_telepon = $request->nomor_telepon ?? $mahasiswa->nomor_telepon;
        $mahasiswa->linkedin = $request->linkedin ?? $mahasiswa->linkedin;
        $mahasiswa->twitter = $request->twitter ?? $mahasiswa->twitter;
        $mahasiswa->github = $request->github ?? $mahasiswa->github;
        $mahasiswa->instagram = $request->instagram ?? $mahasiswa->instagram;

        // Tangani upload gambar profil jika ada
        if ($request->hasFile('profile_mahasiswa')) {
            // Hapus gambar lama jika ada
            if ($mahasiswa->profile_mahasiswa && Storage::exists('public/' . $mahasiswa->profile_mahasiswa)) {
                Storage::delete('public/' . $mahasiswa->profile_mahasiswa);
            }

            // Simpan gambar baru
            $ext = $request->file('profile_mahasiswa')->getClientOriginalExtension();

            // Simpan dengan nama sesuai NIM
            $filename = $mahasiswa->nim . '.' . $ext;

            // Simpan di folder 'user-profiles' dengan nama custom
            $path = $request->file('profile_mahasiswa')->storeAs('user-profiles', $filename, 'public');

            // Simpan path ke database
            $mahasiswa->profile_mahasiswa = $path;
        }

        // Simpan perubahan
        $mahasiswa->save();

        // Redirect dengan pesan sukses
        return redirect()->to('profile/'.auth()->user()->username)->with('success', 'Profil mahasiswa berhasil diperbarui.');
    }
}
