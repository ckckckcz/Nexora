@extends('layouts.admin')
@section('admin')
    <div class="min-h-screen bg-gray-50 p-4 sm:p-6 lg:p-8">
        <header class="mb-8">
            <h1 class="text-3xl font-bold text-blue-900">Edit Data Lowongan Magang 💼</h1>
        </header>

        <section class="bg-white rounded-xl shadow-md transition-shadow duration-300 hover:shadow-lg">
            <div class="p-4 sm:p-6 flex flex-col gap-6">
                <form action="" method="POST" class="flex flex-col gap-6">
                    @csrf
                    <!-- Nama Perusahaan -->
                    <div class="flex flex-col gap-2">
                        <label for="nama_perusahaan"
                            class="text-sm font-medium text-gray-700 transition-colors duration-200">Nama Perusahaan</label>
                        <input type="text" id="nama_perusahaan" name="nama_perusahaan"
                            class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm transition-colors duration-200"
                            placeholder="Masukkan Nama Perusahaan" required maxlength="50">
                        @error('nama_perusahaan')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Skema Magang -->
                    <div class="flex flex-col gap-2">
                        <label for="id_skema_magang"
                            class="text-sm font-medium text-gray-700 transition-colors duration-200">Skema Magang</label>
                        <div class="relative">
                            <select id="id_skema_magang" name="id_skema_magang"
                                class="appearance-none block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm transition-colors duration-200 bg-white cursor-pointer"
                                required>
                                <option value="" disabled selected>Pilih Skema Magang</option>
                                <!-- Dynamic options to be populated from Skema Magang table -->
                                {{-- @foreach($skemaMagangs as $skema)
                                    <option value="{{ $skema->id }}">{{ $skema->nama_skema }}</option>
                                @endforeach --}}
                                <option value="skema1">Skema Magang 1</option>
                                <option value="skema2">Skema Magang 2</option>
                                <option value="skema3">Skema Magang 3</option>
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4 transition-transform duration-200"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                        @error('id_skema_magang')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Posisi Magang -->
                    <div class="flex flex-col gap-2">
                        <label for="id_posisi_magang"
                            class="text-sm font-medium text-gray-700 transition-colors duration-200">Posisi Magang</label>
                        <div class="relative">
                            <select id="id_posisi_magang" name="id_posisi_magang"
                                class="appearance-none block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm transition-colors duration-200 bg-white cursor-pointer"
                                required>
                                <option value="" disabled selected>Pilih Posisi Magang</option>
                                <!-- Dynamic options to be populated from Posisi Magang table -->
                                {{-- @foreach($posisiMagangs as $posisi)
                                    <option value="{{ $posisi->id }}">{{ $posisi->nama_posisi }}</option>
                                @endforeach --}}
                                <option value="posisi1">Posisi Magang 1</option>
                                <option value="posisi2">Posisi Magang 2</option>
                                <option value="posisi3">Posisi Magang 3</option>
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4 transition-transform duration-200"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                        @error('id_posisi_magang')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div class="flex flex-col gap-2">
                        <label for="deskripsi"
                            class="text-sm font-medium text-gray-700 transition-colors duration-200">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi"
                            class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm transition-colors duration-200"
                            placeholder="Masukkan Deskripsi Lowongan" required rows="5"></textarea>
                        @error('deskripsi')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Lokasi -->
                    <div class="flex flex-col gap-2">
                        <label for="lokasi"
                            class="text-sm font-medium text-gray-700 transition-colors duration-200">Lokasi</label>
                        <input type="text" id="lokasi" name="lokasi"
                            class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm transition-colors duration-200"
                            placeholder="Masukkan Lokasi (contoh: Jakarta)" required maxlength="100">
                        @error('lokasi')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Bidang Keahlian -->
                    <div class="flex flex-col gap-2">
                        <label for="bidang_keahlian"
                            class="text-sm font-medium text-gray-700 transition-colors duration-200">Bidang Keahlian</label>
                        <textarea id="bidang_keahlian" name="bidang_keahlian"
                            class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm transition-colors duration-200"
                            placeholder="Masukkan Bidang Keahlian" required rows="5"></textarea>
                        @error('bidang_keahlian')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Status Lowongan -->
                    <div class="flex flex-col gap-2">
                        <label for="status_lowongan"
                            class="text-sm font-medium text-gray-700 transition-colors duration-200">Status Lowongan</label>
                        <div class="relative">
                            <select id="status_lowongan" name="status_lowongan"
                                class="appearance-none block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm transition-colors duration-200 bg-white cursor-pointer"
                                required>
                                <option value="" disabled selected>Pilih Status</option>
                                <option value="open">Open</option>
                                <option value="close">Close</option>
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4 transition-transform duration-200"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                        @error('status_lowongan')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Submit and Cancel Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3 pt-1">
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-blue-900 text-white rounded-lg hover:bg-blue-950 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200 text-sm">
                            Simpan
                        </button>
                        <a href="http://127.0.0.1:8000/admin/manajemen-lowongan-magang"
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