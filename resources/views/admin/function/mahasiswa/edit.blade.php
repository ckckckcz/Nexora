@extends('layouts.admin')
@section('admin')
    <div class="min-h-screen bg-gray-50 p-4 sm:p-6 lg:p-8">
        <header class="mb-8">
            <h1 class="text-3xl font-bold text-blue-900">Edit Data Mahasiswa 🧑🏽‍🎓</h1>
        </header>

        <section class="bg-white rounded-2xl border border-gray-200 transition-shadow duration-300 hover:shadow-lg">
            <div class="p-4 sm:p-6 flex flex-col gap-6">
                <form action="/admin/manajemen-akun/mahasiswa/edit/{{ $mahasiswa->id_user }}" method="POST" class="flex flex-col gap-6">
                    @csrf
                    @method('PUT')
                    <!-- Username Dan Email -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div class="flex flex-col gap-2">
                            <label for="username" class="text-sm font-medium text-gray-700 transition-colors duration-200">username</label>
                            <input type="text" id="username" name="username"
                                class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm transition-colors duration-200"
                                placeholder="Masukkan username (contoh: 2341720xxx)" value="{{ old('username', $mahasiswa->username) }}" required maxlength="20">
                            @error('username')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="email" class="text-sm font-medium text-gray-700 transition-colors duration-200">Email Mahasiswa</label>
                            <input type="text" id="email" name="email"
                                class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm transition-colors duration-200"
                                placeholder="Masukkan Email Mahasiswa" value="{{ old('email', $mahasiswa->email) }}" required maxlength="100">
                            @error('email')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="password" class="text-sm font-medium text-gray-700 transition-colors duration-200">Password</label>
                        <input type="password" id="password" name="password"
                            class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm transition-colors duration-200" placeholder="Masukkan Password"  maxlength="100">
                        @error('password')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="confirm_password" class="text-sm font-medium text-gray-700 transition-colors duration-200">Konfirmasi Pasword</label>
                        <input type="password" id="confirm_password" name="confirm_password"
                            class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm transition-colors duration-200" placeholder="Masukkan Ulang Password" maxlength="100">
                        @error('confirm_password')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <p>tinggalkan password kosong jika tidak ingin diubah</p>

                    <!-- Submit and Cancel Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3 pt-1">
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-blue-900 text-white rounded-lg hover:bg-blue-950 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200 text-sm">
                            Simpan
                        </button>
                        <a href="/admin/manajemen-akun/mahasiswa"
                            class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 transition-colors duration-200 text-center">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </section>
    </div>

    <script>
        // Script untuk animasi dropdown yang minimalis
        document.addEventListener('DOMContentLoaded', function() {
            const selects = document.querySelectorAll('select');
            
            selects.forEach(select => {
                // Tambahkan event listener untuk focus
                select.addEventListener('focus', function() {
                    const arrow = this.parentElement.querySelector('svg');
                    arrow.style.transform = 'rotate(180deg)';
                });
                
                // Tambahkan event listener untuk blur
                select.addEventListener('blur', function() {
                    const arrow = this.parentElement.querySelector('svg');
                    arrow.style.transform = 'rotate(0deg)';
                });
            });
        });
    </script>
@endsection