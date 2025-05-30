@extends('layouts.admin')
@section('admin')
    <div class="min-h-screen bg-gray-50 p-4 sm:p-6 lg:p-8">
        <header class="mb-8">
            <h1 class="text-3xl font-bold text-blue-900">Tambah Data Bimbingan Magang 📝</h1>
        </header>

        <section class="bg-white rounded-2xl border border-gray-200 transition-shadow duration-300 hover:shadow-lg">
            <div class="p-4 sm:p-6 flex flex-col gap-6">
                <form action="/admin/bimbingan-magang/tambah" method="POST" class="flex flex-col gap-6">
                    @csrf
                    <!-- Mahasiswa -->
                    <div class="flex flex-col gap-2">
                        <label for="id_mahasiswa"
                            class="text-sm font-medium text-gray-700 transition-colors duration-200">Mahasiswa</label>
                        <div class="relative">
                            <select id="id_mahasiswa" name="id_mahasiswa"
                                class="appearance-none block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm transition-colors duration-200 bg-white cursor-pointer"
                                required>
                                <option value="" disabled selected>Pilih Mahasiswa</option>
                                <!-- Dynamic options to be populated from Mahasiswa table -->
                                @foreach($mahasiswas as $mahasiswa)
                                <option value="{{ $mahasiswa->id_mahasiswa }}">{{ $mahasiswa->nama_mahasiswa }} ({{ $mahasiswa->nim }})</option>
                                @endforeach
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4 transition-transform duration-200"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                        @error('id_mahasiswa')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Dosen -->
                    <div class="flex flex-col gap-2">
                        <label for="id_dosen" class="text-sm font-medium text-gray-700 transition-colors duration-200">Dosen
                            Pembimbing</label>
                        <div class="relative">
                            <select id="id_dosen" name="id_dosen"
                                class="appearance-none block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm transition-colors duration-200 bg-white cursor-pointer"
                                required>
                                <option value="" disabled selected>Pilih Dosen</option>
                                <!-- Dynamic options to be populated from Dosen table -->
                                @foreach($dosens as $dosen)
                                    <option value="{{ $dosen->id_dosen }}">{{ $dosen->nama_dosen }} ({{ $dosen->nidn }})</option>
                                @endforeach
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4 transition-transform duration-200"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                        @error('id_dosen')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Lowongan Magang -->
                    <div class="flex flex-col gap-2">
                        <label for="id_lowongan_magang"
                            class="text-sm font-medium text-gray-700 transition-colors duration-200">Lowongan Magang</label>
                        <div class="relative">
                            <select id="id_lowongan_magang" name="id_lowongan_magang"
                                class="appearance-none block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm transition-colors duration-200 bg-white cursor-pointer"
                                required>
                                <option value="" disabled selected>Pilih Lowongan Magang</option>
                                <!-- Dynamic options to be populated from Lowongan Magang table -->
                                @foreach($lowongans as $lowongan)
                                    <option value="{{ $lowongan->id_lowongan }}">{{ $lowongan->nama_perusahaan }} - {{
                                        $lowongan->posisiMagang->nama_posisi }}
                                    </option>
                                @endforeach
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4 transition-transform duration-200"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                        @error('id_lowongan_magang')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Status Bimbingan -->
                    <div class="flex flex-col gap-2">
                        <label for="status_bimbingan"
                            class="text-sm font-medium text-gray-700 transition-colors duration-200">Status
                            Bimbingan</label>
                        <div class="relative">
                            <select id="status_bimbingan" name="status_bimbingan"
                                class="appearance-none block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm transition-colors duration-200 bg-white cursor-pointer"
                                required>
                                <option value="" disabled >Pilih Status</option>
                                <option value="aktif" selected>Aktif</option>
                                <option value="selesai">Selesai</option>
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4 transition-transform duration-200"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                        @error('status_bimbingan')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Submit and Cancel Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3 pt-1">
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-blue-900 text-white rounded-lg hover:bg-blue-950 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200 text-sm">
                            Simpan
                        </button>
                        <a href="/admin/bimbingan-magang"
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
        document.addEventListener('DOMContentLoaded', function () {
            const selects = document.querySelectorAll('select');

            selects.forEach(select => {
                // Tambahkan event listener untuk focus
                select.addEventListener('focus', function () {
                    const arrow = this.parentElement.querySelector('svg');
                    arrow.style.transform = 'rotate(180deg)';
                });

                // Tambahkan event listener untuk blur
                select.addEventListener('blur', function () {
                    const arrow = this.parentElement.querySelector('svg');
                    arrow.style.transform = 'rotate(0deg)';
                });
            });
        });
    </script>
@endsection