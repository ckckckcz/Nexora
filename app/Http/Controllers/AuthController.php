<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login() 
    { 
        if(Auth::check()){ // jika sudah login, maka redirect ke halaman home
            return redirect('/'); 
        } 
        return view('auth.login'); 
    }  
    public function postlogin(Request $request) 
    { 
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->except('password'));
        }
        
        // Coba login dengan username dan password yang diberikan
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            // Berhasil login
            $user = Auth::user();
            
            return redirect()->intended('/admin/dashboard');
        }
        
        // Coba cek apakah username adalah NIM mahasiswa
        $mahasiswa = Mahasiswa::where('nim', $request->username)->first();
        if ($mahasiswa) {
            $user = User::find($mahasiswa->id_user);
            if ($user && Hash::check($request->password, $user->password)) {
                Auth::login($user);
                return redirect()->intended('/');
            }
        }
        
        // Coba cek apakah username adalah NIDN dosen
        $dosen = Dosen::where('nidn', $request->username)->first();
        if ($dosen) {
            $user = User::find($dosen->id_user);
            if ($user && Hash::check($request->password, $user->password)) {
                Auth::login($user);
                return redirect()->intended('/dosen/dashboard');
            }
        }
        
        return redirect()->back()
            ->withErrors(['username' => 'Username tidak ditemukan', 'password' => 'Password salah'])
            ->withInput($request->except('password'));
    }  
    public function logout(Request $request) 
    { 
        Auth::logout(); 
 
        $request->session()->invalidate(); 
        $request->session()->regenerateToken();             
        return redirect('login'); 
    } 
}
