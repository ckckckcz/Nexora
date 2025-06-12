@extends('layouts.spk')
@section('spk')
    <div class="min-h-screen bg-gradient-to-b from-blue-50 to-gray-100 flex items-center justify-center py-12 px-4 sm:px-6">
        <div class="bg-white border border-gray-100 rounded-2xl p-6 sm:p-8 w-full max-w-6xl shadow-xl transition-all duration-300">
            <!-- Tab Navigation -->
            <div class="mb-6">
                <ul class="flex border-b border-gray-200">
                    <li class="mr-1">
                        <a href="/unggah-dokumen" class="inline-block py-2 px-4 text-blue-900 font-semibold border-b-2 border-blue-900">Unggah Dokumen</a>
                    </li>
                    <li class="mr-1">
                        <a href="/unggah-dokumen-perusahaan" class="inline-block py-2 px-4 text-gray-600 hover:text-blue-900">Unggah Dokumen + Bio Data Perusahaan</a>
                    </li>
                </ul>
            </div>

            <!-- Header -->
            <div class="flex flex-col sm:flex-row sm:items-center gap-4 mb-8 border-b border-gray-100 pb-6">
                <div class="flex-shrink-0 bg-blue-900 rounded-xl p-3 shadow-md text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Form Pengajuan Magang 🧑🏽‍💻</h2>
                    <p class="text-gray-600 mt-1">Lengkapi data dan unggah dokumen untuk mengajukan magang</p>
                </div>
            </div>

            <!-- Download Template Section -->
            <div class="mb-8 p-5 bg-blue-50 rounded-xl border border-blue-100">
                <h3 class="text-lg font-semibold text-gray-800 mb-3">
                    <span class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10" />
                        </svg>
                        Template Dokumen
                    </span>
                </h3>
                <p class="text-gray-600 text-sm mb-4">Download template dokumen berikut untuk memudahkan proses pengajuan magang Anda:</p>
                
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div class="bg-white p-4 rounded-lg border border-gray-200 shadow-sm flex flex-col">
                        <div class="flex items-start mb-3">
                            <div class="bg-blue-100 p-2 rounded-lg mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-semibold text-gray-800">Riwayat Hidup</h4>
                                <p class="text-xs text-gray-500 mt-1">Format Doc (100 KB)</p>
                            </div>
                        </div>
                        <a href="{{ route('download.template', ['file' => 'riwayat-hidup']) }}" class="mt-auto">
                            <button type="button" class="w-full bg-blue-900 text-white text-sm font-medium py-2 px-4 rounded-lg hover:bg-blue-800 transition-colors flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                                Download Template
                            </button>
                        </a>
                    </div>
                    
                    <div class="bg-white p-4 rounded-lg border border-gray-200 shadow-sm flex flex-col">
                        <div class="flex items-start mb-3">
                            <div class="bg-blue-100 p-2 rounded-lg mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-semibold text-gray-800">Izin Orang Tua</h4>
                                <p class="text-xs text-gray-500 mt-1">Format Docs (85 KB)</p>
                            </div>
                        </div>
                        <a href="{{ route('download.template', ['file' => 'izin-ortu']) }}" class="mt-auto">
                            <button type="button" class="w-full bg-blue-900 text-white text-sm font-medium py-2 px-4 rounded-lg hover:bg-blue-800 transition-colors flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                                Download Template
                            </button>
                        </a>
                    </div>
                    
                    <div class="bg-white p-4 rounded-lg border border-gray-200 shadow-sm flex flex-col">
                        <div class="flex items-start mb-3">
                            <div class="bg-blue-100 p-2 rounded-lg mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-semibold text-gray-800">Pakta Integritas</h4>
                                <p class="text-xs text-gray-500 mt-1">Format Docs (120 KB)</p>
                            </div>
                        </div>
                        <a href="{{ route('download.template', ['file' => 'pakta-integritas']) }}" class="mt-auto">
                            <button type="button" class="w-full bg-blue-900 text-white text-sm font-medium py-2 px-4 rounded-lg hover:bg-blue-800 transition-colors flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                                Download Template
                            </button>
                        </a>
                    </div>
                </div>
            </div>

            <form action="/unggah-dokumen/" method="POST" enctype="multipart/form-data" class="space-y-8">
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
                                Nama Mahasiswa <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="id_mahasiswa" id="id_mahasiswa" 
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors bg-white text-gray-800 placeholder-gray-400" value="{{ Auth::user()->mahasiswa->nama_mahasiswa }}"" disabled>
                        </div>
                        <!-- ID Lowongan -->
                        <div class="relative">
                            <label for="id_lowongan" class="block text-sm font-medium text-gray-700 mb-1">
                                Nama Perusahaaan <span class="text-red-500">*</span>
                            </label>
                            <select name="id_lowongan" id="id_lowongan"
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors bg-white text-gray-800">
                                <option value="">Pilih Lowongan</option>
                                @foreach ($lowongan as $item)
                                    <option value="{{ $item->id_lowongan }}">{{ $item->nama_perusahaan }}</option>
                                @endforeach
                            </select>
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
                                <label for="KTP" class="block text-sm font-medium text-gray-700 mb-1">KTP</label>
                                <div class="file-upload-container">
                                    <input type="file" name="KTP" id="ktp" accept=".pdf,.jpg,.png,.jpeg"
                                        class="hidden file-input" data-target="ktp-preview">
                                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer transition-colors file-drop-area"
                                        data-input="ktp">
                                        <div id="ktp-preview" class="file-preview flex flex-col items-center justify-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                            </svg>
                                            <div>
                                                <p class="text-sm font-medium text-gray-700">Pilih file atau seret & letakkan di sini</p>
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
                                <label for="KTM" class="block text-sm font-medium text-gray-700 mb-1">KTM</label>
                                <div class="file-upload-container">
                                    <input type="file" name="KTM" id="ktm" accept=".pdf,.jpg,.png,.jpeg"
                                        class="hidden file-input" data-target="ktm-preview">
                                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer transition-colors file-drop-area"
                                        data-input="ktm">
                                        <div id="ktm-preview" class="file-preview flex flex-col items-center justify-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                            </svg>
                                            <div>
                                                <p class="text-sm font-medium text-gray-700">Pilih file atau seret & letakkan di sini</p>
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
                                <label for="Kartu_BPJS_Asuransi_lainnya" class="block text-sm font-medium text-gray-700 mb-1">Kartu BPJS/Asuransi Lainnya</label>
                                <div class="file-upload-container">
                                    <input type="file" name="Kartu_BPJS_Asuransi_lainnya" id="kartu_bpjs" accept=".pdf,.jpg,.png,.jpeg"
                                        class="hidden file-input" data-target="bpjs-preview">
                                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer transition-colors file-drop-area"
                                        data-input="kartu_bpjs">
                                        <div id="bpjs-preview" class="file-preview flex flex-col items-center justify-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                            </svg>
                                            <div>
                                                <p class="text-sm font-medium text-gray-700">Pilih file atau seret & letakkan di sini</p>
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
                                <label for="SKTM_KIP_Kuliah" class="block text-sm font-medium text-gray-700 mb-1">SKTM/KIP Kuliah</label>
                                <div class="file-upload-container">
                                    <input type="file" name="SKTM_KIP_Kuliah" id="sktm_kip" accept=".pdf,.jpg,.png,.jpeg"
                                        class="hidden file-input" data-target="sktm-preview">
                                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer transition-colors file-drop-area"
                                        data-input="sktm_kip">
                                        <div id="sktm-preview" class="file-preview flex flex-col items-center justify-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                            </svg>
                                            <div>
                                                <p class="text-sm font-medium text-gray-700">Pilih file atau seret & letakkan di sini</p>
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
                                <label for="Pakta_Integritas" class="block text-sm font-medium text-gray-700 mb-1">Pakta Integritas</label>
                                <div class="file-upload-container">
                                    <input type="file" name="Pakta_Integritas" id="pakta_integritas" accept=".pdf"
                                        class="hidden file-input" data-target="pakta-preview">
                                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer transition-colors file-drop-area"
                                        data-input="pakta_integritas">
                                        <div id="pakta-preview" class="file-preview flex flex-col items-center justify-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                            </svg>
                                            <div>
                                                <p class="text-sm font-medium text-gray-700">Pilih file atau seret & letakkan di sini</p>
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
                                <label for="Daftar_Riwayat_Hidup" class="block text-sm font-medium text-gray-700 mb-1">Daftar Riwayat Hidup</label>
                                <div class="file-upload-container">
                                    <input type="file" name="Daftar_Riwayat_Hidup" id="daftar_riwayat_hidup" accept=".pdf"
                                        class="hidden file-input" data-target="riwayat-preview">
                                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer transition-colors file-drop-area"
                                        data-input="daftar_riwayat_hidup">
                                        <div id="riwayat-preview" class="file-preview flex flex-col items-center justify-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                            </svg>
                                            <div>
                                                <p class="text-sm font-medium text-gray-700">Pilih file atau seret & letakkan di sini</p>
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
                                <label for="KHS_cetak_Siakad" class="block text-sm font-medium text-gray-700 mb-1">KHS/Cetak Siakad</label>
                                <div class="file-upload-container">
                                    <input type="file" name="KHS_cetak_Siakad" id="khs" accept=".pdf" class="hidden file-input"
                                        data-target="khs-preview">
                                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer transition-colors file-drop-area"
                                        data-input="khs">
                                        <div id="khs-preview" class="file-preview flex flex-col items-center justify-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                            </svg>
                                            <div>
                                                <p class="text-sm font-medium text-gray-700">Pilih file atau seret & letakkan di sini</p>
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
                                <label for="Surat_Izin_Orang_Tua" class="block text-sm font-medium text-gray-700 mb-1">Surat Izin Orang Tua</label>
                                <div class="file-upload-container">
                                    <input type="file" name="Surat_Izin_Orang_Tua" id="surat_izin_orang_tua" accept=".pdf"
                                        class="hidden file-input" data-target="izin-preview">
                                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer transition-colors file-drop-area"
                                        data-input="surat_izin_orang_tua">
                                        <div id="izin-preview" class="file-preview flex flex-col items-center justify-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                            </svg>
                                            <div>
                                                <p class="text-sm font-medium text-gray-700">Pilih file atau seret & letakkan di sini</p>
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
                                <label for="Proposal_Magang" class="block text-sm font-medium text-gray-700 mb-1">Proposal Magang</label>
                                <div class="file-upload-container">
                                    <input type="file" name="Proposal_Magang" id="proposal_magang" accept=".pdf"
                                        class="hidden file-input" data-target="proposal-preview">
                                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer transition-colors file-drop-area"
                                        data-input="proposal_magang">
                                        <div id="proposal-preview" class="file-preview flex flex-col items-center justify-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                            </svg>
                                            <div>
                                                <p class="text-sm font-medium text-gray-700">Pilih file atau seret & letakkan di sini</p>
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
                                <label for="CV" class="block text-sm font-medium text-gray-700 mb-1">CV</label>
                                <div class="file-upload-container">
                                    <input type="file" name="CV" id="cv" accept=".pdf" class="hidden file-input"
                                        data-target="cv-preview">
                                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer transition-colors file-drop-area"
                                        data-input="cv">
                                        <div id="cv-preview" class="file-preview flex flex-col items-center justify-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                            </svg>
                                            <div>
                                                <p class="text-sm font-medium text-gray-700">Pilih file atau seret & letakkan di sini</p>
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
                        const event = new Event('change', { bubbles: true });
                        input.dispatchEvent(event);
                    }
                }
            });
        });

        function removeFile(inputId, previewId) {
            const input = document.getElementById(inputId);
            const preview = document.getElementById(previewId);
            const dropArea = document.querySelector(`.file-drop-area[data-input="${inputId}"]`);

            input.value = '';
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
            if (dropArea) {
                dropArea.classList.remove('bg-blue-100', 'border-blue-900');
                dropArea.classList.add('border-gray-300');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const jenisMagangSelect = document.getElementById('jenis_magang');
            const idLowonganInput = document.getElementById('id_lowongan');

            jenisMagangSelect.addEventListener('change', function() {
                if (this.value === 'mandiri') {
                    idLowonganInput.disabled = false;
                    idLowonganInput.required = true;
                    idLowonganInput.placeholder = 'Masukkan ID Lowongan';
                    idLowonganInput.classList.remove('bg-gray-100');
                } else {
                    idLowonganInput.disabled = true;
                    idLowonganInput.required = false;
                    idLowonganInput.value = '';
                    idLowonganInput.placeholder = 'Input dinonaktifkan untuk Magang Rekomendasi';
                    idLowonganInput.classList.add('bg-gray-100');
                }
            });
        });
    </script>
@endsection
