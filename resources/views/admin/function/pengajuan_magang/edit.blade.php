@extends('layouts.admin')
@section('admin')
    <div class="min-h-screen bg-gradient-to-b from-blue-50 to-gray-100 flex items-center justify-center py-12 px-4 sm:px-6">
        <div class="bg-white border border-gray-100 rounded-2xl p-6 sm:p-8 w-full shadow-xl transition-all duration-300">
            <!-- Header -->
            <div class="flex flex-col sm:flex-row sm:items-center gap-4 mb-8 border-b border-gray-100 pb-6">
                <div class="flex-shrink-0 bg-blue-900 rounded-xl p-3 shadow-md text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Form Persetujuan Pengajuan Magang 🧑🏽‍💻</h2>
                    <p class="text-gray-600 mt-1">Mengecek upload berkas mahasiswa dan mengkonfirmasinya </p>
                </div>
            </div>

            <form action="" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf
                <!-- Basic Information Section -->
                <div class="space-y-6">
                    <h3 class="text-lg font-semibold text-gray-800 border-l-4 border-blue-900 rounded-sm pl-3">Informasi
                        Dasar</h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- ID Mahasiswa -->
                        <div class="relative">
                            <label for="id_mahasiswa" class="block text-sm font-medium text-gray-700 mb-1">
                                Nama Mahasiswa <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="id_mahasiswa" id="id_mahasiswa" required
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors bg-white text-gray-800 placeholder-gray-400"
                                value="{{ old('id_mahasiswa', $pengajuan->mahasiswa->nama_mahasiswa) }}">
                        </div>

                        <!-- ID Lowongan -->
                        <div class="relative">
                            <label for="id_lowongan" class="block text-sm font-medium text-gray-700 mb-1">
                                Nama Perusahaan <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="id_lowongan" id="id_lowongan" required
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors bg-white text-gray-800 placeholder-gray-400"
                                value="{{ old('id_lowongan', $pengajuan->lowongan->nama_perusahaan) }}">
                        </div>
                    </div>

                    <!-- Status Pengajuan -->
                    <div class="relative">
                        <label for="status_pengajuan" class="block text-sm font-medium text-gray-700 mb-1">
                            Status Pengajuan <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <select name="status_pengajuan" id="status_pengajuan" required
                                class="appearance-none w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors bg-white text-gray-800">
                                <option value="" disabled>Pilih Status Pengajuan</option>
                                <option value="menunggu" {{ old('status_pengajuan', $pengajuan->status_pengajuan) == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                                <option value="diterima" {{ old('status_pengajuan', $pengajuan->status_pengajuan) == 'diterima' ? 'selected' : '' }}>Diterima</option>
                                <option value="ditolak" {{ old('status_pengajuan', $pengajuan->status_pengajuan) == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Documents Section -->
                <div class="space-y-6">
                    <h3 class="text-lg font-semibold text-gray-800 border-l-4 border-blue-900 rounded-sm pl-3">Dokumen
                        Persyaratan</h3>

                    <!-- Personal Documents -->
                    <div class="space-y-4">
                        <h4 class="text-sm font-medium text-gray-600">
                            <span class="text-red-500">*</span>
                            Dokumen Identitas
                        </h4>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <!-- KTP Upload -->
                            <div>
                                <label for="ktp" class="block text-sm font-medium text-gray-700 mb-1">KTP</label>
                                <div class="file-upload-container">
                                    <input type="file" name="ktp" id="ktp" accept=".pdf,.jpg,.png,.jpeg"
                                        class="hidden file-input" data-target="ktp-preview">
                                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer hover:bg-gray-50 transition-colors file-drop-area"
                                        data-input="ktp">
                                        <div id="ktp-preview"
                                            class="file-preview flex flex-col items-center justify-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                            </svg>
                                            <div>
                                                <p class="text-sm font-medium text-gray-700">Pilih file atau seret &
                                                    letakkan di sini</p>
                                                <p class="text-xs text-gray-500 mt-1">Format JPEG, PNG, PDF, maks 50MB</p>
                                            </div>
                                            <button type="button"
                                                class="mt-2 px-4 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                Pilih File
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- KTM Upload -->
                            <div>
                                <label for="ktm" class="block text-sm font-medium text-gray-700 mb-1">KTM</label>
                                <div class="file-upload-container">
                                    <input type="file" name="ktm" id="ktm" accept=".pdf,.jpg,.png,.jpeg"
                                        class="hidden file-input" data-target="ktm-preview">
                                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer hover:bg-gray-50 transition-colors file-drop-area"
                                        data-input="ktm">
                                        <div id="ktm-preview"
                                            class="file-preview flex flex-col items-center justify-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                            </svg>
                                            <div>
                                                <p class="text-sm font-medium text-gray-700">Pilih file atau seret &
                                                    letakkan di sini</p>
                                                <p class="text-xs text-gray-500 mt-1">Format JPEG, PNG, PDF, maks 50MB</p>
                                            </div>
                                            <button type="button"
                                                class="mt-2 px-4 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                Pilih File
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Kartu BPJS Upload -->
                            <div>
                                <label for="kartu_bpjs" class="block text-sm font-medium text-gray-700 mb-1">Kartu
                                    BPJS/Asuransi Lainnya</label>
                                <div class="file-upload-container">
                                    <input type="file" name="kartu_bpjs" id="kartu_bpjs" accept=".pdf,.jpg,.png,.jpeg"
                                        class="hidden file-input" data-target="bpjs-preview">
                                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer hover:bg-gray-50 transition-colors file-drop-area"
                                        data-input="kartu_bpjs">
                                        <div id="bpjs-preview"
                                            class="file-preview flex flex-col items-center justify-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                            </svg>
                                            <div>
                                                <p class="text-sm font-medium text-gray-700">Pilih file atau seret &
                                                    letakkan di sini</p>
                                                <p class="text-xs text-gray-500 mt-1">Format JPEG, PNG, PDF, maks 50MB</p>
                                            </div>
                                            <button type="button"
                                                class="mt-2 px-4 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                Pilih File
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- SKTM/KIP Kuliah Upload -->
                            <div>
                                <label for="sktm_kip" class="block text-sm font-medium text-gray-700 mb-1">SKTM/KIP
                                    Kuliah</label>
                                <div class="file-upload-container">
                                    <input type="file" name="sktm_kip" id="sktm_kip" accept=".pdf,.jpg,.png,.jpeg"
                                        class="hidden file-input" data-target="sktm-preview">
                                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer hover:bg-gray-50 transition-colors file-drop-area"
                                        data-input="sktm_kip">
                                        <div id="sktm-preview"
                                            class="file-preview flex flex-col items-center justify-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                            </svg>
                                            <div>
                                                <p class="text-sm font-medium text-gray-700">Pilih file atau seret &
                                                    letakkan di sini</p>
                                                <p class="text-xs text-gray-500 mt-1">Format JPEG, PNG, PDF, maks 50MB</p>
                                            </div>
                                            <button type="button"
                                                class="mt-2 px-4 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                Pilih File
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Academic Documents -->
                    <div class="space-y-4">
                        <h4 class="text-sm font-medium text-gray-600">
                            <span class="text-red-500">*</span>
                            Dokumen Akademik dan Magang
                        </h4>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <!-- Pakta Integritas Upload -->
                            <div>
                                <label for="pakta_integritas" class="block text-sm font-medium text-gray-700 mb-1">Pakta
                                    Integritas</label>
                                <div class="file-upload-container">
                                    <input type="file" name="pakta_integritas" id="pakta_integritas" accept=".pdf"
                                        class="hidden file-input" data-target="pakta-preview">
                                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer hover:bg-gray-50 transition-colors file-drop-area"
                                        data-input="pakta_integritas">
                                        <div id="pakta-preview"
                                            class="file-preview flex flex-col items-center justify-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                            </svg>
                                            <div>
                                                <p class="text-sm font-medium text-gray-700">Pilih file atau seret &
                                                    letakkan di sini</p>
                                                <p class="text-xs text-gray-500 mt-1">Format PDF, maks 50MB</p>
                                            </div>
                                            <button type="button"
                                                class="mt-2 px-4 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                Pilih File
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Daftar Riwayat Hidup Upload -->
                            <div>
                                <label for="daftar_riwayat_hidup"
                                    class="block text-sm font-medium text-gray-700 mb-1">Daftar Riwayat Hidup</label>
                                <div class="file-upload-container">
                                    <input type="file" name="daftar_riwayat_hidup" id="daftar_riwayat_hidup" accept=".pdf"
                                        class="hidden file-input" data-target="riwayat-preview">
                                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer hover:bg-gray-50 transition-colors file-drop-area"
                                        data-input="daftar_riwayat_hidup">
                                        <div id="riwayat-preview"
                                            class="file-preview flex flex-col items-center justify-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                            </svg>
                                            <div>
                                                <p class="text-sm font-medium text-gray-700">Pilih file atau seret &
                                                    letakkan di sini</p>
                                                <p class="text-xs text-gray-500 mt-1">Format PDF, maks 50MB</p>
                                            </div>
                                            <button type="button"
                                                class="mt-2 px-4 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                Pilih File
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- KHS/Cetak Siakad Upload -->
                            <div>
                                <label for="khs" class="block text-sm font-medium text-gray-700 mb-1">KHS/Cetak
                                    Siakad</label>
                                <div class="file-upload-container">
                                    <input type="file" name="khs" id="khs" accept=".pdf" class="hidden file-input"
                                        data-target="khs-preview">
                                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer hover:bg-gray-50 transition-colors file-drop-area"
                                        data-input="khs">
                                        <div id="khs-preview"
                                            class="file-preview flex flex-col items-center justify-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                            </svg>
                                            <div>
                                                <p class="text-sm font-medium text-gray-700">Pilih file atau seret &
                                                    letakkan di sini</p>
                                                <p class="text-xs text-gray-500 mt-1">Format PDF, maks 50MB</p>
                                            </div>
                                            <button type="button"
                                                class="mt-2 px-4 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                Pilih File
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Surat Izin Orang Tua Upload -->
                            <div>
                                <label for="surat_izin_orang_tua" class="block text-sm font-medium text-gray-700 mb-1">Surat
                                    Izin Orang Tua</label>
                                <div class="file-upload-container">
                                    <input type="file" name="surat_izin_orang_tua" id="surat_izin_orang_tua" accept=".pdf"
                                        class="hidden file-input" data-target="izin-preview">
                                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer hover:bg-gray-50 transition-colors file-drop-area"
                                        data-input="surat_izin_orang_tua">
                                        <div id="izin-preview"
                                            class="file-preview flex flex-col items-center justify-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                            </svg>
                                            <div>
                                                <p class="text-sm font-medium text-gray-700">Pilih file atau seret &
                                                    letakkan di sini</p>
                                                <p class="text-xs text-gray-500 mt-1">Format PDF, maks 50MB</p>
                                            </div>
                                            <button type="button"
                                                class="mt-2 px-4 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                Pilih File
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Proposal Magang Upload -->
                            <div>
                                <label for="proposal_magang" class="block text-sm font-medium text-gray-700 mb-1">Proposal
                                    Magang</label>
                                <div class="file-upload-container">
                                    <input type="file" name="proposal_magang" id="proposal_magang" accept=".pdf"
                                        class="hidden file-input" data-target="proposal-preview">
                                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer hover:bg-gray-50 transition-colors file-drop-area"
                                        data-input="proposal_magang">
                                        <div id="proposal-preview"
                                            class="file-preview flex flex-col items-center justify-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                            </svg>
                                            <div>
                                                <p class="text-sm font-medium text-gray-700">Pilih file atau seret &
                                                    letakkan di sini</p>
                                                <p class="text-xs text-gray-500 mt-1">Format PDF, maks 50MB</p>
                                            </div>
                                            <button type="button"
                                                class="mt-2 px-4 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                Pilih File
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- CV Upload -->
                            <div>
                                <label for="cv" class="block text-sm font-medium text-gray-700 mb-1">CV</label>
                                <div class="file-upload-container">
                                    <input type="file" name="cv" id="cv" accept=".pdf" class="hidden file-input"
                                        data-target="cv-preview">
                                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer hover:bg-gray-50 transition-colors file-drop-area"
                                        data-input="cv">
                                        <div id="cv-preview"
                                            class="file-preview flex flex-col items-center justify-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                            </svg>
                                            <div>
                                                <p class="text-sm font-medium text-gray-700">Pilih file atau seret &
                                                    letakkan di sini</p>
                                                <p class="text-xs text-gray-500 mt-1">Format PDF, maks 50MB</p>
                                            </div>
                                            <button type="button"
                                                class="mt-2 px-4 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                Pilih File
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h1>{{$pengajuan->CV}}</h1>

                            <iframe src="{{Storage::url($pengajuan->CV)}}" width="100%" height="600px" class="border-0"></iframe>

                            <!-- Surat Tugas Upload -->
                            <div>
                                <label for="surat_tugas" class="block text-sm font-medium text-gray-700 mb-1">Surat
                                    Tugas</label>
                                <div class="file-upload-container">
                                    <input type="file" name="surat_tugas" id="surat_tugas" accept=".pdf"
                                        class="hidden file-input" data-target="tugas-preview">
                                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer hover:bg-gray-50 transition-colors file-drop-area"
                                        data-input="surat_tugas">
                                        <div id="tugas-preview"
                                            class="file-preview flex flex-col items-center justify-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                            </svg>
                                            <div>
                                                <p class="text-sm font-medium text-gray-700">Pilih file atau seret &
                                                    letakkan di sini</p>
                                                <p class="text-xs text-gray-500 mt-1">Format PDF, maks 50MB</p>
                                            </div>
                                            <button type="button"
                                                class="mt-2 px-4 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                Pilih File
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="grid grid-cols-2 gap-5 pt-4">
                        <a href="/admin/pengajuan-magang">
                            <button type="button"
                                class="w-full bg-gray-50 border border-gray-200 text-gray-900 font-medium py-3 px-4 rounded-xl hover:bg-gray-100 cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-800 focus:ring-offset-2 transform transition-all duration-300 hover:scale-[1.01] active:scale-[0.99]">
                                <div class="flex items-center justify-center">
                                    👈🏽 Kembali
                                </div>
                            </button>
                        </a>
                        <div class="">
                            <button type="submit"
                                class="w-full bg-blue-900 text-white font-medium py-3 px-4 rounded-xl hover:bg-blue-950 cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transform transition-all duration-300 hover:scale-[1.01] active:scale-[0.99] shadow-md">
                                <div class="flex items-center justify-center">
                                    Simpan Perubahan 📃
                                </div>
                            </button>
                        </div>
                    </div>
            </form>
        </div>
    </div>

    <!-- Add Modal for File Preview -->
    <div id="preview-modal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="w-full">
                            <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4" id="modal-title"></h3>
                                <div class="mt-2" id="preview-content">
                                    <!-- Preview content will be inserted here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" onclick="closePreviewModal()"
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for file upload handling -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Setup all file inputs
            const fileInputs = document.querySelectorAll('.file-input');
            const dropAreas = document.querySelectorAll('.file-drop-area');

            // Handle click on drop area
            dropAreas.forEach(dropArea => {
                dropArea.addEventListener('click', function () {
                    const inputId = this.dataset.input;
                    document.getElementById(inputId).click();
                });
            });

            // Handle file selection
            fileInputs.forEach(input => {
                input.addEventListener('change', function (e) {
                    const targetId = this.dataset.target;
                    const previewElement = document.getElementById(targetId);
                    const file = this.files[0];

                    if (file) {
                        // Update the preview area with file info
                        updateFilePreview(file, previewElement, this);

                        // Add a selected class to the drop area
                        const dropArea = document.querySelector(`.file-drop-area[data-input="${input.id}"]`);
                        if (dropArea) {
                            dropArea.classList.add('bg-blue-50', 'border-blue-300');
                            dropArea.classList.remove('border-gray-300');
                        }
                    }
                });
            });

            // Handle drag and drop
            dropAreas.forEach(dropArea => {
                ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                    dropArea.addEventListener(eventName, preventDefaults, false);
                });

                function preventDefaults(e) {
                    e.preventDefault();
                    e.stopPropagation();
                }

                ['dragenter', 'dragover'].forEach(eventName => {
                    dropArea.addEventListener(eventName, highlight, false);
                });

                ['dragleave', 'drop'].forEach(eventName => {
                    dropArea.addEventListener(eventName, unhighlight, false);
                });

                function highlight() {
                    dropArea.classList.add('bg-blue-50', 'border-blue-400');
                }

                function unhighlight() {
                    dropArea.classList.remove('bg-blue-50', 'border-blue-400');
                    if (!dropArea.querySelector('.file-preview').innerHTML.includes('Hapus File')) {
                        dropArea.classList.remove('border-blue-300');
                        dropArea.classList.add('border-gray-300');
                    }
                }

                dropArea.addEventListener('drop', handleDrop, false);

                function handleDrop(e) {
                    const inputId = dropArea.dataset.input;
                    const input = document.getElementById(inputId);
                    const dt = e.dataTransfer;
                    const files = dt.files;

                    if (files.length) {
                        input.files = files;
                        // Trigger the change event manually
                        const event = new Event('change', { bubbles: true });
                        input.dispatchEvent(event);
                    }
                }
            });
        });


        // Update the file preview function
        function updateFilePreview(file, previewElement, input) {
            const fileExt = file.name.split('.').pop().toLowerCase();
            let iconPath = '';

            if (fileExt === 'pdf') {
                iconPath = `<svg class="h-12 w-12 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>`;
            } else if (['jpg', 'jpeg', 'png'].includes(fileExt)) {
                iconPath = `<svg class="h-12 w-12 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>`;
            }

            previewElement.innerHTML = `
                        <div class="w-full flex flex-col items-center">
                            ${iconPath}
                            <p class="text-sm font-medium text-gray-800 mt-2">${file.name}</p>
                            <p class="text-xs text-gray-500">${(file.size / (1024 * 1024)).toFixed(2)} MB</p>
                            <div class="flex gap-2 mt-2">
                                <button type="button" class="px-4 py-2 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200 transition-colors text-sm" onclick="previewFile('${input.id}', '${file.name}')">
                                    Preview File
                                </button>
                            </div>
                        </div>
                    `;
        }

        // Add preview modal functions
        function previewFile(inputId, fileName) {
            const input = document.getElementById(inputId);
            const file = input.files[0];
            const modal = document.getElementById('preview-modal');
            const modalTitle = document.getElementById('modal-title');
            const previewContent = document.getElementById('preview-content');

            modalTitle.textContent = fileName;

            if (file) {
                const fileExt = file.name.split('.').pop().toLowerCase();

                if (['jpg', 'jpeg', 'png'].includes(fileExt)) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        previewContent.innerHTML = `
                                    <img src="${e.target.result}" class="max-w-full max-h-[70vh] mx-auto" alt="${file.name}">
                                `;
                    };
                    reader.readAsDataURL(file);
                } else if (fileExt === 'pdf') {
                    const fileUrl = URL.createObjectURL(file);
                    previewContent.innerHTML = `
                                <iframe src="${fileUrl}" width="100%" height="600px" class="border-0"></iframe>
                            `;
                }
            }

            modal.classList.remove('hidden');
        }

        function closePreviewModal() {
            const modal = document.getElementById('preview-modal');
            const previewContent = document.getElementById('preview-content');
            modal.classList.add('hidden');
            previewContent.innerHTML = '';
        }

        // Update event listeners
        document.addEventListener('DOMContentLoaded', function () {
            // ...existing code...

            // Add ESC key listener for modal
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') {
                    closePreviewModal();
                }
            });

            // Close modal when clicking outside
            document.getElementById('preview-modal').addEventListener('click', function (e) {
                if (e.target === this) {
                    closePreviewModal();
                }
            });
        });
    </script>
@endsection