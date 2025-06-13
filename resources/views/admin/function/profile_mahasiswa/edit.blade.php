@extends('layouts.admin')
@section('admin')
    <div class="min-h-screen bg-gray-50 p-4 sm:p-6 lg:p-8">
        <header class="mb-8">
            <h1 class="text-3xl font-bold text-blue-900">Edit Data Mahasiswa 🧑🏽‍🎓</h1>
        </header>

        <section class="bg-white rounded-2xl border border-gray-200 transition-shadow duration-300 hover:shadow-lg">
            <div class="p-4 sm:p-6 flex flex-col gap-6">
                <form action="/admin/profile/mahasiswa/edit/{{ $mahasiswa->id_mahasiswa }}" method="POST" class="flex flex-col gap-6">
                    @csrf
                    @method('PUT')
                    <!-- NIM dan Nama Mahasiswa -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div class="flex flex-col gap-2">
                            <label for="nim" class="text-sm font-medium text-gray-700 transition-colors duration-200">NIM</label>
                            <input type="text" id="nim" name="nim"
                                class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm transition-colors duration-200"
                                placeholder="Masukkan NIM (contoh: 2341720xxx)" value="{{ old('nim', $mahasiswa->nim) }}" required maxlength="20">
                            @error('nim')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="nama_mahasiswa" class="text-sm font-medium text-gray-700 transition-colors duration-200">Nama Mahasiswa</label>
                            <input type="text" id="nama_mahasiswa" name="nama_mahasiswa"
                                class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm transition-colors duration-200"
                                placeholder="Masukkan Nama Mahasiswa" value="{{ old('nama_mahasiswa', $mahasiswa->nama_mahasiswa) }}" required maxlength="100">
                            @error('nama_mahasiswa')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Program Studi -->
                    <div class="flex flex-col gap-2">
                        <label for="id_program_studi" class="text-sm font-medium text-gray-700 transition-colors duration-200">Program Studi</label>
                        <div class="relative">
                            <select id="id_program_studi" name="id_program_studi"
                                class="appearance-none block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm transition-colors duration-200 bg-white cursor-pointer"
                                required>
                                <option value="" disabled selected>Pilih Program Studi</option>
                                @foreach($prodis as $prodi)
                                    <option value="{{ $prodi->id_program_studi }}" {{ old('id_program_studi', $prodi->id_program_studi) == $mahasiswa->id_program_studi ? 'selected' : '' }}>{{ $prodi->nama_program_studi }}</option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4 transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                </svg>
                            </div>
                        </div>
                        @error('id_program_studi')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Jurusan -->
                    <div class="flex flex-col gap-2">
                        <label for="jurusan" class="text-sm font-medium text-gray-700 transition-colors duration-200">Jurusan</label>
                        <input type="text" id="jurusan" name="jurusan"
                            class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm transition-colors duration-200"
                            value="Teknologi Informasi" readonly required maxlength="100">
                        @error('jurusan')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Jenis Kelamin -->
                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-medium text-gray-700">Jenis Kelamin</label>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <label class="flex items-center gap-2">
                                <input type="radio" name="jenis_kelamin" value="L"
                                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 transition-opacity duration-200" required {{ old('jenis_kelamin', $mahasiswa->jenis_kelamin ?? '') == 'L' ? 'checked' : '' }}>
                                <span class="text-sm text-gray-700 transition-colors duration-200">Laki-laki</span>
                            </label>
                            <label class="flex items-center gap-2">
                                <input type="radio" name="jenis_kelamin" value="P"
                                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 transition-opacity duration-200" required {{ old('jenis_kelamin', $mahasiswa->jenis_kelamin ?? '') == 'P' ? 'checked' : '' }}>
                                <span class="text-sm text-gray-700 transition-colors duration-200">Perempuan</span>
                            </label>
                        </div>
                        @error('jenis_kelamin')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

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