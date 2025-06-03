@extends('layouts.spk')
@section('spk')
    <div class="min-h-screen bg-gradient-to-b from-blue-50 to-gray-100 flex items-center justify-center py-12 px-4 sm:px-6">
        <div
            class="bg-white border border-gray-100 rounded-2xl p-6 sm:p-8 w-full max-w-6xl shadow-xl transition-all duration-300">

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
                    <h2 class="text-2xl font-bold text-gray-800">Form Pengajuan Magang 🧑🏽‍💻</h2>
                    <p class="text-gray-600 mt-1">Lengkapi data dan unggah dokumen untuk mengajukan magang</p>
                </div>
            </div>

            <form action="" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf

                <!-- Basic Information Section -->
                <div class="space-y-6">
                    <h3 class="text-lg font-semibold text-gray-800 border-l-4 border-blue-900 rounded-sm pl-3">
                        Informasi Dasar
                    </h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- ID Mahasiswa -->
                        <div class="relative">
                            <label for="id_mahasiswa" class="block text-sm font-medium text-gray-700 mb-1">
                                ID Mahasiswa <span class="text-red-500">*</span>
                            </label>
                            <input type="number" name="id_mahasiswa" id="id_mahasiswa" required
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors bg-white text-gray-800 placeholder-gray-400">
                        </div>

                        <!-- ID Lowongan -->
                        <div class="relative">
                            <label for="id_lowongan" class="block text-sm font-medium text-gray-700 mb-1">
                                ID Lowongan <span class="text-red-500">*</span>
                            </label>
                            <input type="number" name="id_lowongan" id="id_lowongan" required
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors bg-white text-gray-800 placeholder-gray-400">
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
                                <option value="menunggu">Menunggu</option>
                                <option value="diterima">Diterima</option>
                                <option value="ditolak">Ditolak</option>
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
                    <h3 class="text-lg font-semibold text-gray-800 border-l-4 border-blue-900 rounded-sm pl-3">
                        Dokumen Persyaratan
                    </h3>

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
                                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer transition-colors file-drop-area"
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
                                                class="mt-2 px-4 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
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
                                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer transition-colors file-drop-area"
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
                                                class="mt-2 px-4 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
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
                                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer transition-colors file-drop-area"
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
                                                class="mt-2 px-4 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
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
                                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer transition-colors file-drop-area"
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
                                                class="mt-2 px-4 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
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
                                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer transition-colors file-drop-area"
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
                                                class="mt-2 px-4 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
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
                                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer transition-colors file-drop-area"
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
                                                class="mt-2 px-4 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
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
                                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer transition-colors file-drop-area"
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
                                                class="mt-2 px-4 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
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
                                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer transition-colors file-drop-area"
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
                                                class="mt-2 px-4 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
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
                                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer transition-colors file-drop-area"
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
                                                class="mt-2 px-4 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
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
                                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer transition-colors file-drop-area"
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
                                                class="mt-2 px-4 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                Pilih File
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Surat Tugas Upload -->
                            <div>
                                <label for="surat_tugas" class="block text-sm font-medium text-gray-700 mb-1">Surat
                                    Tugas</label>
                                <div class="file-upload-container">
                                    <input type="file" name="surat_tugas" id="surat_tugas" accept=".pdf"
                                        class="hidden file-input" data-target="tugas-preview">
                                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer transition-colors file-drop-area"
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
                                                class="mt-2 px-4 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
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
                        <a href="/profile/{{ Auth::user()->username }}">
                            <button type="button"
                                class="w-full bg-gray-50 border border-gray-200 text-gray-900 font-medium py-3 px-4 rounded-xl hover:bg-gray-100 cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-800 focus:ring-offset-2 transform transition-all duration-300 hover:scale-[1.01] active:scale-[0.99]">
                                <div class="flex items-center justify-center">
                                    Kembali ke Profile 👤
                                </div>
                            </button>
                        </a>
                        <button type="submit"
                            class="w-full bg-blue-900 text-white font-medium py-3 px-4 rounded-xl hover:bg-blue-950 cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transform transition-all duration-300 hover:scale-[1.01] active:scale-[0.99]">
                            <div class="flex items-center justify-center">
                                Upload Berkas 📃
                            </div>
                        </button>
                    </div>
                </div>
            </form>
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
                        let fileTypeIcon = '';
                        const fileExt = file.name.split('.').pop().toLowerCase();

                        if (['jpg', 'jpeg', 'png'].includes(fileExt)) {
                            // Create image preview for image files
                            const reader = new FileReader();
                            reader.onload = function (e) {
                                previewElement.innerHTML = `
                                                    <div class="w-full flex flex-col items-center">
                                                        <img src="${e.target.result}" class="h-20 object-contain mb-2" />
                                                        <p class="text-sm font-medium text-gray-800">${file.name}</p>
                                                        <p class="text-xs text-gray-500">${(file.size / (1024 * 1024)).toFixed(2)} MB</p>
                                                        <button type="button" class="mt-2 text-sm text-red-600 hover:text-red-800" onclick="removeFile('${input.id}', '${targetId}')">
                                                            Hapus File
                                                        </button>
                                                    </div>
                                                `;
                            };
                            reader.readAsDataURL(file);
                        } else {
                            // For non-image files (e.g., PDF)
                            let iconPath = '';
                            if (fileExt === 'pdf') {
                                iconPath = `<svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                </svg>`;
                            } else {
                                iconPath = `<svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                </svg>`;
                            }

                            previewElement.innerHTML = `
                                                <div class="w-full flex flex-col items-center">
                                                    ${iconPath}
                                                    <p class="text-sm font-medium text-gray-800 mt-2">${file.name}</p>
                                                    <p class="text-xs text-gray-500">${(file.size / (1024 * 1024)).toFixed(2)} MB</p>
                                                    <button type="button" onclick="removeFile('${input.id}', '${targetId}')"
                                                        class="mt-2 px-4 py-2 bg-blue-900 border border-blue-900 rounded-md text-sm font-medium text-white hover:bg-blue-950 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                                        Hapus File
                                                    </button>
                                                </div>
                                            `;
                        }

                        // Add a selected class to the drop area
                        const dropArea = document.querySelector(`.file-drop-area[data-input="${input.id}"]`);
                        if (dropArea) {
                            dropArea.classList.add('bg-blue-100', 'border-blue-900');
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
                    dropArea.classList.add('bg-blue-100', 'border-blue-900');
                }

                function unhighlight() {
                    dropArea.classList.remove('bg-blue-100', 'border-blue-900');
                    if (!dropArea.querySelector('.file-preview').innerHTML.includes('Hapus File')) {
                        dropArea.classList.remove('border-blue-900');
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

        // Function to remove a file
        function removeFile(inputId, previewId) {
            const input = document.getElementById(inputId);
            const preview = document.getElementById(previewId);
            const dropArea = document.querySelector(`.file-drop-area[data-input="${inputId}"]`);

            // Clear the file input
            input.value = '';

            // Reset the preview
            const accept = input.accept.includes('.pdf') ? 'Format PDF, maks 50MB' : 'Format JPEG, PNG, PDF, maks 50MB';
            preview.innerHTML = `
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                                <div>
                                    <p class="text-sm font-medium text-gray-700">Pilih file atau seret & letakkan di sini</p>
                                    <p class="text-xs text-gray-500 mt-1">${accept}</p>
                                </div>
                                <button type="button" class="mt-2 px-4 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Pilih File
                                </button>
                            `;

            // Reset the drop area styling
            if (dropArea) {
                dropArea.classList.remove('bg-blue-100', 'border-blue-900');
                dropArea.classList.add('border-gray-300');
            }
        }
    </script>
@endsection