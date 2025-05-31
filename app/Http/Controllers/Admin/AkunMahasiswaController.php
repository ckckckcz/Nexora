<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;

class AkunMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colleges = User::where('role', 'mahasiswa')->limit(10)->get();
        return view('admin.manajemenAkun.mahasiswa', compact('colleges'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mahasiswa = User::findOrFail($id);
        return view('admin.function.mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Define validation rules
        $rules = [
            'username' => 'required|string|max:50',
            'email' => 'required|email',
        ];

        // Add password validation only if password is provided
        if ($request->filled('password')) {
            $rules['password'] = 'min:8|required_with:confirm_password';
            $rules['confirm_password'] = 'min:8|same:password';
        }

        // Custom error messages
        $messages = [
            'username.required' => 'Username Harus Diisi',
            'username.unique' => 'Username Sudah Digunakan',
            'password.min' => 'Password Minimal 8 Karakter',
            'password.confirmed' => 'Konfirmasi Password Tidak Cocok',
            'email.required' => 'Email Harus Diisi',
            'email.email' => 'Format Email Tidak Valid',
        ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Prepare data for update
        $updateData = [
            'username' => $request->username,
            'email' => $request->email,
            'role' => 'mahasiswa',
        ];

        // Only include password in update if provided
        if ($request->filled('password')) {
            $updateData['password'] = bcrypt($request->password);
        }

        // Update the user
        User::find($id)->update($updateData);

        return redirect()->route('admin.manajemen-akun.mahasiswa')->with('success', 'Data Akun Mahasiswa berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mahasiswa = User::findOrFail($id);

        $mahasiswa->delete();

        return redirect()->route('admin.manajemen-akun.mahasiswa')->with('success', 'Data Mahasiswa berhasil dihapus.');
    }
}
