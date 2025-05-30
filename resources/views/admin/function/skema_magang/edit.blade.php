@extends('layouts.admin')
@section('admin')
    <div class="min-h-screen bg-gray-50 p-4 sm:p-6 lg:p-8">
        <header class="mb-8">
            <h1 class="text-3xl font-bold text-blue-900">Edit Data Skema Magang 📅</h1>
        </header>

        

        <section class="bg-white rounded-2xl border border-gray-200 transition-shadow duration-300 hover:shadow-lg">
            <div class="p-4 sm:p-6 flex flex-col gap-6">
                <form action="/admin/skema-magang/edit/{{ $skemaMagang->id_skema_magang }}" method="POST" class="flex flex-col gap-6">
                    @csrf
                    @method('PUT')
                    <!-- Nama Skema Magang -->
                    <div class="flex flex-col gap-2">
                        <label for="nama_skema"
                            class="text-sm font-medium text-gray-700 transition-colors duration-200">Nama Skema Magang</label>
                        <div class="relative">
                            <select id="nama_skema" name="nama_skema"
                                class="appearance-none block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm transition-colors duration-200 bg-white cursor-pointer"
                                required>
                                <option value="" disabled>Pilih Skema Magang</option>
                                <option value="pkl_3_bulan" {{ $skemaMagang->nama_skema_magang == 'pkl_3_bulan' ? 'selected' : '' }}>PKL 3 Bulan</option>
                                <option value="MBKM - Mandiri 6 bulan" {{ $skemaMagang->nama_skema_magang == 'MBKM - Mandiri 6 bulan' ? 'selected' : '' }}>MBKM - Mandiri 6 Bulan</option>
                                <option value="MBKM - MSIB 6 Bulan" {{ $skemaMagang->nama_skema_magang == 'MBKM - MSIB 6 Bulan' ? 'selected' : '' }}>MBKM - MSIB 6 Bulan</option>
                                <option value="MBKM - Kewirausahaan" {{ $skemaMagang->nama_skema_magang == 'MBKM - Kewirausahaan' ? 'selected' : '' }}>MBKM - Kewirausahaan</option>
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4 transition-transform duration-200"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                        @error('nama_skema')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Tanggal Mulai -->
                    <div class="flex flex-col gap-2">
                        <label for="tanggal_mulai"
                            class="text-sm font-medium text-gray-700 transition-colors duration-200">Tanggal Mulai</label>
                        <input type="date" id="tanggal_mulai" name="tanggal_mulai"
                            class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm transition-colors duration-200"
                            required value="{{ old('tanggal_mulai', $skemaMagang->tanggal_mulai) }}">
                        @error('tanggal_mulai')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Tanggal Selesai -->
                    <div class="flex flex-col gap-2">
                        <label for="tanggal_selesai"
                            class="text-sm font-medium text-gray-700 transition-colors duration-200">Tanggal Selesai</label>
                        <input type="date" id="tanggal_selesai" name="tanggal_selesai"
                            class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm transition-colors duration-200"
                            required value="{{ old('tanggal_selesai', $skemaMagang->tanggal_selesai) }}">
                        @error('tanggal_selesai')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Submit and Cancel Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3 pt-1">
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-blue-900 text-white rounded-lg hover:bg-blue-950 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200 text-sm">
                            Simpan
                        </button>
                        <a href="/admin/skema-magang"
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