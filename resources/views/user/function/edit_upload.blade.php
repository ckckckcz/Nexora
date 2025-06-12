@extends('layouts.spk')
@php
    $fileName = basename($files['ktp']);
    $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
@endphp
@section('spk')
    <div class="min-h-screen bg-gradient-to-b from-blue-50 to-gray-100 flex items-center justify-center py-12 px-4 sm:px-6">
        <div class="bg-white border border-gray-100 rounded-2xl p-6 sm:p-8 w-full max-w-6xl shadow-xl transition-all duration-300">
            <!-- Tab Navigation -->
            <div class="mb-6">
                <ul class="flex border-b border-gray-200">
                    <li class="mr-1">
                        <a href="#" class="inline-block py-2 px-4 text-blue-900 font-semibold border-b-2 border-blue-900">Edit Dokumen</a>
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
            <div class="mb-8 p-5 bg-red-50 rounded-xl border border-blue-100">
                <h3 class="text-2xl font-semibold text-gray-800 mb-3">
                    <span class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-red-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10" />
                        </svg>
                        Alasan Penolakan
                    </span>
                </h3>
                <p class="text-gray-600 text-xl mb-4">{{ $pengajuan->alasan_penolakan }}</p>
            </div>

            <form action="/unggah-dokumen/update/{{$pengajuan->id_pengajuan}}" method="POST" enctype="multipart/form-data" class="space-y-8">
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
                            <input type="text" name="nama_perusahaan" id="nama_perusahaan" 
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors bg-white text-gray-800 placeholder-gray-400" value="{{ $pengajuan->lowongan->nama_perusahaan }}" disabled>
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
                                <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Preview KTP</label>
                                <div class="border border-gray-300 rounded-lg p-4 bg-gray-50">
                                    @if($files['ktp'])
                                        @php
                                            $fileName = basename($files['ktp']);
                                            $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
                                        @endphp
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center space-x-3">
                                                @if(in_array(strtolower($fileExt), ['jpg', 'jpeg', 'png']))
                                                    <svg class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                @else
                                                    <svg class="h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                    </svg>
                                                @endif
                                                <div>
                                                    <p class="text-sm font-medium text-gray-700">{{ $fileName }}</p>
                                                    <p class="text-xs text-gray-500">{{ strtoupper($fileExt) }}</p>
                                                </div>
                                            </div>
                                            <button type="button"
                                                onclick="previewExistingFile('{{ Storage::url($files['ktp']) }}', '{{ $fileName }}')"
                                                class="px-3 py-1 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200 transition-colors text-sm">
                                                Lihat File
                                            </button>
                                        </div>
                                    @else
                                        <p class="text-sm text-gray-500 italic">Tidak ada file</p>
                                    @endif
                                </div>
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
                                <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Preview KTM</label>
                                <div class="border border-gray-300 rounded-lg p-4 bg-gray-50">
                                    @if($files['ktm'])
                                        @php
                                            $fileName = basename($files['ktm']);
                                            $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
                                        @endphp
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center space-x-3">
                                                @if(in_array(strtolower($fileExt), ['jpg', 'jpeg', 'png']))
                                                    <svg class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                @else
                                                    <svg class="h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                    </svg>
                                                @endif
                                                <div>
                                                    <p class="text-sm font-medium text-gray-700">{{ $fileName }}</p>
                                                    <p class="text-xs text-gray-500">{{ strtoupper($fileExt) }}</p>
                                                </div>
                                            </div>
                                            <button type="button"
                                                onclick="previewExistingFile('{{ Storage::url($files['ktm']) }}', '{{ $fileName }}')"
                                                class="px-3 py-1 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200 transition-colors text-sm">
                                                Lihat File
                                            </button>
                                        </div>
                                    @else
                                        <p class="text-sm text-gray-500 italic">Tidak ada file</p>
                                    @endif
                                </div>
                            </div>
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
                                <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Preview Kartu BPJS/Asuransi
                                    Lainnya</label>
                                <div class="border border-gray-300 rounded-lg p-4 bg-gray-50">
                                    @if($files['kartu_bpjs'])
                                        @php
                                            $fileName = basename($files['kartu_bpjs']);
                                            $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
                                        @endphp
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center space-x-3">
                                                @if(in_array(strtolower($fileExt), ['jpg', 'jpeg', 'png']))
                                                    <svg class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                @else
                                                    <svg class="h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                    </svg>
                                                @endif
                                                <div>
                                                    <p class="text-sm font-medium text-gray-700">{{ $fileName }}</p>
                                                    <p class="text-xs text-gray-500">{{ strtoupper($fileExt) }}</p>
                                                </div>
                                            </div>
                                            <button type="button"
                                                onclick="previewExistingFile('{{ Storage::url($files['kartu_bpjs']) }}', '{{ $fileName }}')"
                                                class="px-3 py-1 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200 transition-colors text-sm">
                                                Lihat File
                                            </button>
                                        </div>
                                    @else
                                        <p class="text-sm text-gray-500 italic">Tidak ada file</p>
                                    @endif
                                </div>
                            </div>
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
                                <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Preview SKTM/KIP Kuliah</label>
                                <div class="border border-gray-300 rounded-lg p-4 bg-gray-50">
                                    @if($files['sktm_kip'])
                                        @php
                                            $fileName = basename($files['sktm_kip']);
                                            $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
                                        @endphp
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center space-x-3">
                                                @if(in_array(strtolower($fileExt), ['jpg', 'jpeg', 'png']))
                                                    <svg class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                @else
                                                    <svg class="h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                    </svg>
                                                @endif
                                                <div>
                                                    <p class="text-sm font-medium text-gray-700">{{ $fileName }}</p>
                                                    <p class="text-xs text-gray-500">{{ strtoupper($fileExt) }}</p>
                                                </div>
                                            </div>
                                            <button type="button"
                                                onclick="previewExistingFile('{{ Storage::url($files['sktm_kip']) }}', '{{ $fileName }}')"
                                                class="px-3 py-1 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200 transition-colors text-sm">
                                                Lihat File
                                            </button>
                                        </div>
                                    @else
                                        <p class="text-sm text-gray-500 italic">Tidak ada file</p>
                                    @endif
                                </div>
                            </div>
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
                                <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Preview Pakta Integritas</label>
                                <div class="border border-gray-300 rounded-lg p-4 bg-gray-50">
                                    @if($files['pakta_integritas'])
                                        @php
                                            $fileName = basename($files['pakta_integritas']);
                                            $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
                                        @endphp
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center space-x-3">
                                                <svg class="h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                </svg>
                                                <div>
                                                    <p class="text-sm font-medium text-gray-700">{{ $fileName }}</p>
                                                    <p class="text-xs text-gray-500">{{ strtoupper($fileExt) }}</p>
                                                </div>
                                            </div>
                                            <button type="button"
                                                onclick="previewExistingFile('{{ Storage::url($files['pakta_integritas']) }}', '{{ $fileName }}')"
                                                class="px-3 py-1 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200 transition-colors text-sm">
                                                Lihat File
                                            </button>
                                        </div>
                                    @else
                                        <p class="text-sm text-gray-500 italic">Tidak ada file</p>
                                    @endif
                                </div>
                            </div>
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
                                <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Preview Daftar Riwayat Hidup</label>
                                <div class="border border-gray-300 rounded-lg p-4 bg-gray-50">
                                    @if($files['daftar_riwayat_hidup'])
                                        @php
                                            $fileName = basename($files['daftar_riwayat_hidup']);
                                            $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
                                        @endphp
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center space-x-3">
                                                <svg class="h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                </svg>
                                                <div>
                                                    <p class="text-sm font-medium text-gray-700">{{ $fileName }}</p>
                                                    <p class="text-xs text-gray-500">{{ strtoupper($fileExt) }}</p>
                                                </div>
                                            </div>
                                            <button type="button"
                                                onclick="previewExistingFile('{{ Storage::url($files['daftar_riwayat_hidup']) }}', '{{ $fileName }}')"
                                                class="px-3 py-1 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200 transition-colors text-sm">
                                                Lihat File
                                            </button>
                                        </div>
                                    @else
                                        <p class="text-sm text-gray-500 italic">Tidak ada file</p>
                                    @endif
                                </div>
                            </div>
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
                                <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Preview KHS/Cetak Siakad</label>
                                <div class="border border-gray-300 rounded-lg p-4 bg-gray-50">
                                    @if($files['khs'])
                                        @php
                                            $fileName = basename($files['khs']);
                                            $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
                                        @endphp
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center space-x-3">
                                                <svg class="h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                </svg>
                                                <div>
                                                    <p class="text-sm font-medium text-gray-700">{{ $fileName }}</p>
                                                    <p class="text-xs text-gray-500">{{ strtoupper($fileExt) }}</p>
                                                </div>
                                            </div>
                                            <button type="button"
                                                onclick="previewExistingFile('{{ Storage::url($files['khs']) }}', '{{ $fileName }}')"
                                                class="px-3 py-1 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200 transition-colors text-sm">
                                                Lihat File
                                            </button>
                                        </div>
                                    @else
                                        <p class="text-sm text-gray-500 italic">Tidak ada file</p>
                                    @endif
                                </div>
                            </div>

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
                                <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Preview Surat Izin Orang Tua</label>
                                <div class="border border-gray-300 rounded-lg p-4 bg-gray-50">
                                    @if($files['surat_izin_orang_tua'])
                                        @php
                                            $fileName = basename($files['surat_izin_orang_tua']);
                                            $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
                                        @endphp
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center space-x-3">
                                                <svg class="h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                </svg>
                                                <div>
                                                    <p class="text-sm font-medium text-gray-700">{{ $fileName }}</p>
                                                    <p class="text-xs text-gray-500">{{ strtoupper($fileExt) }}</p>
                                                </div>
                                            </div>
                                            <button type="button"
                                                onclick="previewExistingFile('{{ Storage::url($files['surat_izin_orang_tua']) }}', '{{ $fileName }}')"
                                                class="px-3 py-1 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200 transition-colors text-sm">
                                                Lihat File
                                            </button>
                                        </div>
                                    @else
                                        <p class="text-sm text-gray-500 italic">Tidak ada file</p>
                                    @endif
                                </div>
                            </div>
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
                                <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Proposal Magang</label>
                                <div class="border border-gray-300 rounded-lg p-4 bg-gray-50">
                                    @if($files['proposal_magang'])
                                        @php
                                            $fileName = basename($files['proposal_magang']);
                                            $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
                                        @endphp
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center space-x-3">
                                                <svg class="h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                </svg>
                                                <div>
                                                    <p class="text-sm font-medium text-gray-700">{{ $fileName }}</p>
                                                    <p class="text-xs text-gray-500">{{ strtoupper($fileExt) }}</p>
                                                </div>
                                            </div>
                                            <button type="button"
                                                onclick="previewExistingFile('{{ Storage::url($files['proposal_magang']) }}', '{{ $fileName }}')"
                                                class="px-3 py-1 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200 transition-colors text-sm">
                                                Lihat File
                                            </button>
                                        </div>
                                    @else
                                        <p class="text-sm text-gray-500 italic">Tidak ada file</p>
                                    @endif
                                </div>
                            </div>
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
                                <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">CV</label>
                                <div class="border border-gray-300 rounded-lg p-4 bg-gray-50">
                                    @if($files['cv'])
                                        @php
                                            $fileName = basename($files['cv']);
                                            $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
                                        @endphp
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center space-x-3">
                                                <svg class="h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                </svg>
                                                <div>
                                                    <p class="text-sm font-medium text-gray-700">{{ $fileName }}</p>
                                                    <p class="text-xs text-gray-500">{{ strtoupper($fileExt) }}</p>
                                                </div>
                                            </div>
                                            <button type="button"
                                                onclick="previewExistingFile('{{ Storage::url($files['cv']) }}', '{{ $fileName }}')"
                                                class="px-3 py-1 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200 transition-colors text-sm">
                                                Lihat File
                                            </button>
                                        </div>
                                    @else
                                        <p class="text-sm text-gray-500 italic">Tidak ada file</p>
                                    @endif
                                </div>
                            </div>
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

        function previewExistingFile(fileUrl, fileName) {
            const modal = document.getElementById('preview-modal');
            const modalTitle = document.getElementById('modal-title');
            const previewContent = document.getElementById('preview-content');

            modalTitle.textContent = fileName;

            const fileExt = fileName.split('.').pop().toLowerCase();

            if (['jpg', 'jpeg', 'png'].includes(fileExt)) {
                previewContent.innerHTML = `
                            <img src="${fileUrl}" class="max-w-full max-h-[70vh] mx-auto" alt="${fileName}">
                        `;
            } else if (fileExt === 'pdf') {
                previewContent.innerHTML = `
                            <iframe src="${fileUrl}" width="100%" height="600px" class="border-0"></iframe>
                        `;
            } else {
                previewContent.innerHTML = `
                            <div class="text-center py-8">
                                <p class="text-gray-500">Pratinjau tidak tersedia untuk file ini.</p>
                                <a href="${fileUrl}" target="_blank" class="mt-4 inline-block px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                    Unduh File
                                </a>
                            </div>
                        `;
            }

            modal.classList.remove('hidden');
        }


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
