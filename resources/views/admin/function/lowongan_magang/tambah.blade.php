@extends('layouts.admin')
@section('admin')
    <div class="min-h-screen bg-gray-50 p-4 sm:p-6 lg:p-8">
        <header class="mb-8">
            <h1 class="text-3xl font-bold text-blue-900">Tambah Data Lowongan Magang 💼</h1>
        </header>

        <section class="bg-white rounded-2xl border border-gray-200 transition-shadow duration-300 hover:shadow-lg">
            <div class="p-4 sm:p-6 flex flex-col gap-6">
                <form action="/admin/lowongan-magang/tambah" method="POST" class="flex flex-col gap-6">
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
                                @foreach($skemaMagangs as $skema)
                                    <option value="{{ $skema->id_skema_magang }}">{{ strtoupper($skema->nama_skema_magang) }}</option>
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
                                @foreach($posisiMagangs as $posisi)
                                    <option value="{{ $posisi->id_posisi_magang }}">{{ $posisi->nama_posisi }}</option>
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

                    <!-- Tipe Perusahaan -->
                    <div class="flex flex-col gap-2">
                        <label for="tipe_perusahaan" class="text-sm font-medium text-gray-700">Tipe Perusahaan</label>
                        <select id="tipe_perusahaan" name="tipe_perusahaan"
                            class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm"
                            required>
                            <option value="" disabled selected>Pilih Tipe Perusahaan</option>
                            <option value="BUMN">BUMN</option>
                            <option value="PT">PT</option>
                            <option value="CV">CV</option>
                            <option value="startup">Startup</option>
                        </select>
                        @error('tipe_perusahaan')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Fasilitas Perusahaan -->
                    <div class="flex flex-col gap-2">
                        <label for="fasilitas_perusahaan" class="text-sm font-medium text-gray-700">Fasilitas Perusahaan</label>
                        <textarea id="fasilitas_perusahaan" name="fasilitas_perusahaan"
                            class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm"
                            placeholder="Masukkan Fasilitas Perusahaan" rows="3"></textarea>
                        @error('fasilitas_perusahaan')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Status Gaji -->
                    <div class="flex flex-col gap-2">
                        <label for="status_gaji" class="text-sm font-medium text-gray-700">Status Gaji</label>
                        <select id="status_gaji" name="status_gaji"
                            class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm"
                            required>
                            <option value="" disabled selected>Pilih Status Gaji</option>
                            <option value="dibayar">Gaji</option>
                            <option value="tidak dibayar">Tidak Di Gaji</option>
                        </select>
                        @error('status_gaji')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Fleksibilitas Kerja -->
                    <div class="flex flex-col gap-2">
                        <label for="fleksibilitas_kerja" class="text-sm font-medium text-gray-700">Fleksibilitas Kerja</label>
                        <select id="fleksibilitas_kerja" name="fleksibilitas_kerja"
                            class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm"
                            required>
                            <option value="" disabled selected>Pilih Fleksibilitas Kerja</option>
                            <option value="remote">Remote</option>
                            <option value="onsite">Onsite</option>
                            <option value="hybrid">Hybrid</option>
                        </select>
                        @error('fleksibilitas_kerja')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Tanggal Pendaftaran & Penutupan (Sejajar) -->
                    <div class="flex flex-col sm:flex-row gap-4">
                        <div class="flex flex-col gap-2 w-full">
                            <label for="tanggal_pendaftaran" class="text-sm font-medium text-gray-700">Tanggal Pendaftaran</label>
                            <input type="date" id="tanggal_pendaftaran" name="tanggal_pendaftaran"
                                class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm"
                                required>
                            @error('tanggal_pendaftaran')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col gap-2 w-full">
                            <label for="tanggal_penutupan" class="text-sm font-medium text-gray-700">Tanggal Penutupan</label>
                            <input type="date" id="tanggal_penutupan" name="tanggal_penutupan"
                                class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm"
                                required>
                            @error('tanggal_penutupan')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit and Cancel Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3 pt-1">
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-blue-900 text-white rounded-lg hover:bg-blue-950 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200 text-sm">
                            Simpan
                        </button>
                        <a href="/admin/lowongan-magang"
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