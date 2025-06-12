@extends('layouts.spk')
@section('spk')
    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-indigo-50 py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-blue-900 to-blue-700 rounded-2xl shadow-lg mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Edit Dokumen Pengajuan Magang</h1>
                <p class="text-lg text-gray-600">Perbarui dokumen yang diperlukan berdasarkan feedback admin</p>
            </div>

            <div class="bg-gradient-to-r from-red-50 to-pink-50 border-l-4 border-red-400 rounded-xl p-6 mb-8 shadow-lg">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4.5c-.77-.833-2.694-.833-3.464 0L3.34 16.5c-.77.833.192 2.5 1.732 2.5z" />
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4 flex-1">
                        <h3 class="text-lg font-semibold text-red-800 mb-2">
                            Alasan Penolakan Dokumen
                        </h3>
                        <div class="bg-white rounded-lg p-4 border border-red-200">
                            <p class="text-gray-700 leading-relaxed">{{ $pengajuan->alasan_penolakan }}</p>
                        </div>
                        <div class="mt-3 text-sm text-red-700">
                            <p><strong>Catatan:</strong> Harap perbaiki dokumen sesuai dengan feedback di atas sebelum mengunggah ulang.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Form Container -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                <!-- Tab Header -->
                <div class="bg-gradient-to-r from-blue-900 to-blue-800 px-6 py-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <h2 class="text-xl font-semibold text-white">Update Dokumen Persyaratan</h2>
                    </div>
                </div>

                <form action="/unggah-dokumen/update/{{$pengajuan->id_pengajuan}}" method="POST" enctype="multipart/form-data" class="p-6 space-y-8">
                    @csrf
                    
                    <!-- Basic Information Section -->
                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <div class="w-6 h-6 bg-blue-900 rounded-md flex items-center justify-center mr-3">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            Informasi Pengajuan
                        </h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Nama Mahasiswa</label>
                                <input type="text" value="{{ Auth::user()->mahasiswa->nama_mahasiswa }}" disabled
                                    class="w-full px-4 py-3 rounded-lg border-gray-300 bg-gray-100 text-gray-600 font-medium">
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Perusahaan Tujuan</label>
                                <input type="text" value="{{ $pengajuan->lowongan->nama_perusahaan }}" disabled
                                    class="w-full px-4 py-3 rounded-lg border-gray-300 bg-gray-100 text-gray-600 font-medium">
                            </div>
                        </div>
                    </div>

                    <!-- Documents Section -->
                    <div class="space-y-6">
                        <h3 class="text-xl font-bold text-gray-900 flex items-center">
                            <div class="w-8 h-8 bg-gradient-to-r from-blue-900 to-blue-700 rounded-xl flex items-center justify-center mr-3">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            Dokumen Persyaratan
                        </h3>

                        <!-- Personal Documents -->
                        <div class="bg-blue-50 rounded-xl p-6 border border-blue-200">
                            <h4 class="text-lg font-semibold text-blue-900 mb-4">📄 Dokumen Identitas</h4>
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                
                                <!-- KTP Upload -->
                                <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-200">
                                    <label class="block text-sm font-semibold text-gray-800 mb-3">KTP <span class="text-red-500">*</span></label>
                                    
                                    <!-- Current File Preview -->
                                    @if($files['ktp'])
                                        <div class="mb-4 p-3 bg-green-50 rounded-lg border border-green-200">
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center space-x-3">
                                                    <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                                                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <p class="text-sm font-medium text-green-800">File Saat Ini</p>
                                                        <p class="text-xs text-green-600">{{ basename($files['ktp']) }}</p>
                                                    </div>
                                                </div>
                                                <button type="button" onclick="previewFile('{{ Storage::url($files['ktp']) }}', '{{ basename($files['ktp']) }}')"
                                                    class="px-3 py-1 bg-green-100 text-green-700 rounded-md hover:bg-green-200 transition-colors text-sm font-medium">
                                                    👁️ Lihat
                                                </button>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- New File Upload -->
                                    <div class="space-y-3">
                                        <p class="text-sm text-gray-600">Upload file baru (opsional):</p>
                                        <div class="file-upload-container">
                                            <input type="file" name="KTP" id="ktp" accept=".pdf,.jpg,.png,.jpeg" class="hidden file-input" data-target="ktp-preview">
                                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center cursor-pointer transition-all hover:border-blue-400 hover:bg-blue-50 file-drop-area" data-input="ktp">
                                                <div id="ktp-preview" class="file-preview">
                                                    <svg class="w-8 h-8 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                                    </svg>
                                                    <p class="text-sm font-medium text-gray-700">Klik atau seret file ke sini</p>
                                                    <p class="text-xs text-gray-500 mt-1">JPEG, PNG, PDF (maks 50MB)</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- KTM Upload -->
                                <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-200">
                                    <label class="block text-sm font-semibold text-gray-800 mb-3">KTM <span class="text-red-500">*</span></label>
                                    
                                    @if($files['ktm'])
                                        <div class="mb-4 p-3 bg-green-50 rounded-lg border border-green-200">
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center space-x-3">
                                                    <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                                                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <p class="text-sm font-medium text-green-800">File Saat Ini</p>
                                                        <p class="text-xs text-green-600">{{ basename($files['ktm']) }}</p>
                                                    </div>
                                                </div>
                                                <button type="button" onclick="previewFile('{{ Storage::url($files['ktm']) }}', '{{ basename($files['ktm']) }}')"
                                                    class="px-3 py-1 bg-green-100 text-green-700 rounded-md hover:bg-green-200 transition-colors text-sm font-medium">
                                                    👁️ Lihat
                                                </button>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="space-y-3">
                                        <p class="text-sm text-gray-600">Upload file baru (opsional):</p>
                                        <div class="file-upload-container">
                                            <input type="file" name="KTM" id="ktm" accept=".pdf,.jpg,.png,.jpeg" class="hidden file-input" data-target="ktm-preview">
                                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center cursor-pointer transition-all hover:border-blue-400 hover:bg-blue-50 file-drop-area" data-input="ktm">
                                                <div id="ktm-preview" class="file-preview">
                                                    <svg class="w-8 h-8 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                                    </svg>
                                                    <p class="text-sm font-medium text-gray-700">Klik atau seret file ke sini</p>
                                                    <p class="text-xs text-gray-500 mt-1">JPEG, PNG, PDF (maks 50MB)</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- BPJS/Asuransi -->
                                <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-200">
                                    <label class="block text-sm font-semibold text-gray-800 mb-3">Kartu BPJS/Asuransi</label>
                                    
                                    @if($files['kartu_bpjs'])
                                        <div class="mb-4 p-3 bg-green-50 rounded-lg border border-green-200">
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center space-x-3">
                                                    <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                                                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <p class="text-sm font-medium text-green-800">File Saat Ini</p>
                                                        <p class="text-xs text-green-600">{{ basename($files['kartu_bpjs']) }}</p>
                                                    </div>
                                                </div>
                                                <button type="button" onclick="previewFile('{{ Storage::url($files['kartu_bpjs']) }}', '{{ basename($files['kartu_bpjs']) }}')"
                                                    class="px-3 py-1 bg-green-100 text-green-700 rounded-md hover:bg-green-200 transition-colors text-sm font-medium">
                                                    👁️ Lihat
                                                </button>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="space-y-3">
                                        <p class="text-sm text-gray-600">Upload file baru (opsional):</p>
                                        <div class="file-upload-container">
                                            <input type="file" name="Kartu_BPJS_Asuransi_lainnya" id="kartu_bpjs" accept=".pdf,.jpg,.png,.jpeg" class="hidden file-input" data-target="bpjs-preview">
                                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center cursor-pointer transition-all hover:border-blue-400 hover:bg-blue-50 file-drop-area" data-input="kartu_bpjs">
                                                <div id="bpjs-preview" class="file-preview">
                                                    <svg class="w-8 h-8 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                                    </svg>
                                                    <p class="text-sm font-medium text-gray-700">Klik atau seret file ke sini</p>
                                                    <p class="text-xs text-gray-500 mt-1">JPEG, PNG, PDF (maks 50MB)</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- SKTM/KIP -->
                                <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-200">
                                    <label class="block text-sm font-semibold text-gray-800 mb-3">SKTM/KIP Kuliah</label>
                                    
                                    @if($files['sktm_kip'])
                                        <div class="mb-4 p-3 bg-green-50 rounded-lg border border-green-200">
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center space-x-3">
                                                    <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                                                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <p class="text-sm font-medium text-green-800">File Saat Ini</p>
                                                        <p class="text-xs text-green-600">{{ basename($files['sktm_kip']) }}</p>
                                                    </div>
                                                </div>
                                                <button type="button" onclick="previewFile('{{ Storage::url($files['sktm_kip']) }}', '{{ basename($files['sktm_kip']) }}')"
                                                    class="px-3 py-1 bg-green-100 text-green-700 rounded-md hover:bg-green-200 transition-colors text-sm font-medium">
                                                    👁️ Lihat
                                                </button>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="space-y-3">
                                        <p class="text-sm text-gray-600">Upload file baru (opsional):</p>
                                        <div class="file-upload-container">
                                            <input type="file" name="SKTM_KIP_Kuliah" id="sktm_kip" accept=".pdf,.jpg,.png,.jpeg" class="hidden file-input" data-target="sktm-preview">
                                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center cursor-pointer transition-all hover:border-blue-400 hover:bg-blue-50 file-drop-area" data-input="sktm_kip">
                                                <div id="sktm-preview" class="file-preview">
                                                    <svg class="w-8 h-8 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                                    </svg>
                                                    <p class="text-sm font-medium text-gray-700">Klik atau seret file ke sini</p>
                                                    <p class="text-xs text-gray-500 mt-1">JPEG, PNG, PDF (maks 50MB)</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Academic Documents Section -->
                        <div class="bg-yellow-50 rounded-xl p-6 border border-yellow-200">
                            <h4 class="text-lg font-semibold text-yellow-900 mb-4">📚 Dokumen Akademik & Magang</h4>
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                
                                <!-- Pakta Integritas Upload -->
                                <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-200">
                                    <label class="block text-sm font-semibold text-gray-800 mb-3">Pakta Integritas <span class="text-red-500">*</span></label>
                                    
                                    @if($files['pakta_integritas'])
                                        <div class="mb-4 p-3 bg-green-50 rounded-lg border border-green-200">
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center space-x-3">
                                                    <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                                                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <p class="text-sm font-medium text-green-800">File Saat Ini</p>
                                                        <p class="text-xs text-green-600">{{ basename($files['pakta_integritas']) }}</p>
                                                    </div>
                                                </div>
                                                <button type="button" onclick="previewFile('{{ Storage::url($files['pakta_integritas']) }}', '{{ basename($files['pakta_integritas']) }}')"
                                                    class="px-3 py-1 bg-green-100 text-green-700 rounded-md hover:bg-green-200 transition-colors text-sm font-medium">
                                                    👁️ Lihat
                                                </button>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="space-y-3">
                                        <p class="text-sm text-gray-600">Upload file baru (opsional):</p>
                                        <div class="file-upload-container">
                                            <input type="file" name="Pakta_Integritas" id="pakta_integritas" accept=".pdf" class="hidden file-input" data-target="pakta-preview">
                                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center cursor-pointer transition-all hover:border-blue-400 hover:bg-blue-50 file-drop-area" data-input="pakta_integritas">
                                                <div id="pakta-preview" class="file-preview">
                                                    <svg class="w-8 h-8 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                                    </svg>
                                                    <p class="text-sm font-medium text-gray-700">Klik atau seret file ke sini</p>
                                                    <p class="text-xs text-gray-500 mt-1">PDF (maks 50MB)</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Daftar Riwayat Hidup Upload -->
                                <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-200">
                                    <label class="block text-sm font-semibold text-gray-800 mb-3">Daftar Riwayat Hidup <span class="text-red-500">*</span></label>
                                    
                                    @if($files['daftar_riwayat_hidup'])
                                        <div class="mb-4 p-3 bg-green-50 rounded-lg border border-green-200">
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center space-x-3">
                                                    <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                                                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <p class="text-sm font-medium text-green-800">File Saat Ini</p>
                                                        <p class="text-xs text-green-600">{{ basename($files['daftar_riwayat_hidup']) }}</p>
                                                    </div>
                                                </div>
                                                <button type="button" onclick="previewFile('{{ Storage::url($files['daftar_riwayat_hidup']) }}', '{{ basename($files['daftar_riwayat_hidup']) }}')"
                                                    class="px-3 py-1 bg-green-100 text-green-700 rounded-md hover:bg-green-200 transition-colors text-sm font-medium">
                                                    👁️ Lihat
                                                </button>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="space-y-3">
                                        <p class="text-sm text-gray-600">Upload file baru (opsional):</p>
                                        <div class="file-upload-container">
                                            <input type="file" name="Daftar_Riwayat_Hidup" id="daftar_riwayat_hidup" accept=".pdf" class="hidden file-input" data-target="riwayat-preview">
                                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center cursor-pointer transition-all hover:border-blue-400 hover:bg-blue-50 file-drop-area" data-input="daftar_riwayat_hidup">
                                                <div id="riwayat-preview" class="file-preview">
                                                    <svg class="w-8 h-8 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                                    </svg>
                                                    <p class="text-sm font-medium text-gray-700">Klik atau seret file ke sini</p>
                                                    <p class="text-xs text-gray-500 mt-1">PDF (maks 50MB)</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- KHS/Cetak Siakad Upload -->
                                <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-200">
                                    <label class="block text-sm font-semibold text-gray-800 mb-3">KHS/Cetak Siakad <span class="text-red-500">*</span></label>
                                    
                                    @if($files['khs'])
                                        <div class="mb-4 p-3 bg-green-50 rounded-lg border border-green-200">
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center space-x-3">
                                                    <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                                                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <p class="text-sm font-medium text-green-800">File Saat Ini</p>
                                                        <p class="text-xs text-green-600">{{ basename($files['khs']) }}</p>
                                                    </div>
                                                </div>
                                                <button type="button" onclick="previewFile('{{ Storage::url($files['khs']) }}', '{{ basename($files['khs']) }}')"
                                                    class="px-3 py-1 bg-green-100 text-green-700 rounded-md hover:bg-green-200 transition-colors text-sm font-medium">
                                                    👁️ Lihat
                                                </button>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="space-y-3">
                                        <p class="text-sm text-gray-600">Upload file baru (opsional):</p>
                                        <div class="file-upload-container">
                                            <input type="file" name="KHS_cetak_Siakad" id="khs" accept=".pdf" class="hidden file-input" data-target="khs-preview">
                                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center cursor-pointer transition-all hover:border-blue-400 hover:bg-blue-50 file-drop-area" data-input="khs">
                                                <div id="khs-preview" class="file-preview">
                                                    <svg class="w-8 h-8 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                                    </svg>
                                                    <p class="text-sm font-medium text-gray-700">Klik atau seret file ke sini</p>
                                                    <p class="text-xs text-gray-500 mt-1">PDF (maks 50MB)</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Surat Izin Orang Tua Upload -->
                                <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-200">
                                    <label class="block text-sm font-semibold text-gray-800 mb-3">Surat Izin Orang Tua <span class="text-red-500">*</span></label>
                                    
                                    @if($files['surat_izin_orang_tua'])
                                        <div class="mb-4 p-3 bg-green-50 rounded-lg border border-green-200">
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center space-x-3">
                                                    <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                                                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <p class="text-sm font-medium text-green-800">File Saat Ini</p>
                                                        <p class="text-xs text-green-600">{{ basename($files['surat_izin_orang_tua']) }}</p>
                                                    </div>
                                                </div>
                                                <button type="button" onclick="previewFile('{{ Storage::url($files['surat_izin_orang_tua']) }}', '{{ basename($files['surat_izin_orang_tua']) }}')"
                                                    class="px-3 py-1 bg-green-100 text-green-700 rounded-md hover:bg-green-200 transition-colors text-sm font-medium">
                                                    👁️ Lihat
                                                </button>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="space-y-3">
                                        <p class="text-sm text-gray-600">Upload file baru (opsional):</p>
                                        <div class="file-upload-container">
                                            <input type="file" name="Surat_Izin_Orang_Tua" id="surat_izin_orang_tua" accept=".pdf" class="hidden file-input" data-target="izin-preview">
                                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center cursor-pointer transition-all hover:border-blue-400 hover:bg-blue-50 file-drop-area" data-input="surat_izin_orang_tua">
                                                <div id="izin-preview" class="file-preview">
                                                    <svg class="w-8 h-8 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                                    </svg>
                                                    <p class="text-sm font-medium text-gray-700">Klik atau seret file ke sini</p>
                                                    <p class="text-xs text-gray-500 mt-1">PDF (maks 50MB)</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Proposal Magang Upload -->
                                <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-200">
                                    <label class="block text-sm font-semibold text-gray-800 mb-3">Proposal Magang <span class="text-red-500">*</span></label>
                                    
                                    @if($files['proposal_magang'])
                                        <div class="mb-4 p-3 bg-green-50 rounded-lg border border-green-200">
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center space-x-3">
                                                    <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                                                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <p class="text-sm font-medium text-green-800">File Saat Ini</p>
                                                        <p class="text-xs text-green-600">{{ basename($files['proposal_magang']) }}</p>
                                                    </div>
                                                </div>
                                                <button type="button" onclick="previewFile('{{ Storage::url($files['proposal_magang']) }}', '{{ basename($files['proposal_magang']) }}')"
                                                    class="px-3 py-1 bg-green-100 text-green-700 rounded-md hover:bg-green-200 transition-colors text-sm font-medium">
                                                    👁️ Lihat
                                                </button>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="space-y-3">
                                        <p class="text-sm text-gray-600">Upload file baru (opsional):</p>
                                        <div class="file-upload-container">
                                            <input type="file" name="Proposal_Magang" id="proposal_magang" accept=".pdf" class="hidden file-input" data-target="proposal-preview">
                                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center cursor-pointer transition-all hover:border-blue-400 hover:bg-blue-50 file-drop-area" data-input="proposal_magang">
                                                <div id="proposal-preview" class="file-preview">
                                                    <svg class="w-8 h-8 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                                    </svg>
                                                    <p class="text-sm font-medium text-gray-700">Klik atau seret file ke sini</p>
                                                    <p class="text-xs text-gray-500 mt-1">PDF (maks 50MB)</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- CV Upload -->
                                <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-200">
                                    <label class="block text-sm font-semibold text-gray-800 mb-3">CV <span class="text-red-500">*</span></label>
                                    
                                    @if($files['cv'])
                                        <div class="mb-4 p-3 bg-green-50 rounded-lg border border-green-200">
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center space-x-3">
                                                    <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                                                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <p class="text-sm font-medium text-green-800">File Saat Ini</p>
                                                        <p class="text-xs text-green-600">{{ basename($files['cv']) }}</p>
                                                    </div>
                                                </div>
                                                <button type="button" onclick="previewFile('{{ Storage::url($files['cv']) }}', '{{ basename($files['cv']) }}')"
                                                    class="px-3 py-1 bg-green-100 text-green-700 rounded-md hover:bg-green-200 transition-colors text-sm font-medium">
                                                    👁️ Lihat
                                                </button>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="space-y-3">
                                        <p class="text-sm text-gray-600">Upload file baru (opsional):</p>
                                        <div class="file-upload-container">
                                            <input type="file" name="CV" id="cv" accept=".pdf" class="hidden file-input" data-target="cv-preview">
                                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center cursor-pointer transition-all hover:border-blue-400 hover:bg-blue-50 file-drop-area" data-input="cv">
                                                <div id="cv-preview" class="file-preview">
                                                    <svg class="w-8 h-8 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                                    </svg>
                                                    <p class="text-sm font-medium text-gray-700">Klik atau seret file ke sini</p>
                                                    <p class="text-xs text-gray-500 mt-1">PDF (maks 50MB)</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200">
                            <a href="/profile/{{ Auth::user()->username }}" 
                               class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-800 font-semibold py-4 px-6 rounded-xl transition-all duration-200 text-center">
                                ← Kembali ke Profile
                            </a>
                            <button type="submit" 
                                    class="flex-1 bg-gradient-to-r from-blue-900 to-blue-700 hover:from-blue-800 hover:to-blue-600 text-white font-semibold py-4 px-6 rounded-xl transition-all duration-200 transform hover:scale-[1.02] active:scale-[0.98] shadow-lg">
                                ✅ Update Dokumen
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Enhanced File Preview Modal -->
    <div id="preview-modal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-black bg-opacity-50">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" onclick="closeModal()"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            
            <div class="inline-block w-full max-w-6xl p-0 my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-2xl rounded-2xl">
                <!-- Modal Header -->
                <div class="flex items-center justify-between px-6 py-4 bg-gradient-to-r from-blue-900 to-blue-800 text-white">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                        <div>
                            <h3 id="modal-title" class="text-lg font-semibold"></h3>
                            <p id="modal-subtitle" class="text-sm text-blue-100"></p>
                        </div>
                    </div>
                    <button onclick="closeModal()" class="p-2 text-white hover:bg-white hover:bg-opacity-20 rounded-lg transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                
                <!-- Modal Content -->
                <div class="px-6 py-4">
                    <div id="preview-content" class="w-full"></div>
                </div>
                
                <!-- Modal Footer -->
                <div class="flex items-center justify-between px-6 py-4 bg-gray-50 border-t">
                    <div id="file-info" class="text-sm text-gray-600"></div>
                    <div class="flex space-x-3">
                        <button onclick="closeModal()" 
                                class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-colors">
                            Tutup
                        </button>
                        <a id="download-link" href="#" target="_blank" 
                           class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Download
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Enhanced file upload and preview functionality
        document.addEventListener('DOMContentLoaded', function() {
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
                        const fileExt = file.name.split('.').pop().toLowerCase();
                        const fileSize = (file.size / (1024 * 1024)).toFixed(2);

                        if (['jpg', 'jpeg', 'png'].includes(fileExt)) {
                            // Create image preview for image files
                            const reader = new FileReader();
                            reader.onload = function (e) {
                                previewElement.innerHTML = `
                                    <div class="w-full flex flex-col items-center">
                                        <img src="${e.target.result}" class="h-20 object-contain mb-2 cursor-pointer" 
                                             onclick="previewNewFile('${e.target.result}', '${file.name}', 'image', '${fileSize} MB')" />
                                        <p class="text-sm font-medium text-gray-800">${file.name}</p>
                                        <p class="text-xs text-gray-500">${fileSize} MB</p>
                                        <button type="button" class="mt-2 text-sm text-blue-600 hover:text-blue-800" 
                                                onclick="previewNewFile('${e.target.result}', '${file.name}', 'image', '${fileSize} MB')">
                                            👁️ Preview
                                        </button>
                                        <button type="button" class="mt-1 text-sm text-red-600 hover:text-red-800" 
                                                onclick="removeFile('${input.id}', '${targetId}')">
                                            🗑️ Hapus
                                        </button>
                                    </div>
                                `;
                            };
                            reader.readAsDataURL(file);
                        } else {
                            // For non-image files (e.g., PDF)
                            const reader = new FileReader();
                            reader.onload = function (e) {
                                let iconPath = '';
                                if (fileExt === 'pdf') {
                                    iconPath = `<svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                    </svg>`;
                                }

                                previewElement.innerHTML = `
                                    <div class="w-full flex flex-col items-center">
                                        <div class="cursor-pointer" onclick="previewNewFile('${e.target.result}', '${file.name}', 'pdf', '${fileSize} MB')">
                                            ${iconPath}
                                        </div>
                                        <p class="text-sm font-medium text-gray-800 mt-2">${file.name}</p>
                                        <p class="text-xs text-gray-500">${fileSize} MB</p>
                                        <button type="button" class="mt-2 text-sm text-blue-600 hover:text-blue-800" 
                                                onclick="previewNewFile('${e.target.result}', '${file.name}', 'pdf', '${fileSize} MB')">
                                            👁️ Preview
                                        </button>
                                        <button type="button" class="mt-1 text-sm text-red-600 hover:text-red-800" 
                                                onclick="removeFile('${input.id}', '${targetId}')">
                                            🗑️ Hapus
                                        </button>
                                    </div>
                                `;
                            };
                            reader.readAsDataURL(file);
                        }

                        // Add visual feedback to drop area
                        const dropArea = document.querySelector(`.file-drop-area[data-input="${input.id}"]`);
                        if (dropArea) {
                            dropArea.classList.add('bg-blue-100', 'border-blue-400');
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
                    dropArea.classList.add('bg-blue-100', 'border-blue-400');
                }

                function unhighlight() {
                    dropArea.classList.remove('bg-blue-100', 'border-blue-400');
                    if (!dropArea.querySelector('.file-preview').innerHTML.includes('Hapus')) {
                        dropArea.classList.remove('border-blue-400');
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

        // Preview existing files from server
        function previewFile(fileUrl, fileName) {
            const modal = document.getElementById('preview-modal');
            const modalTitle = document.getElementById('modal-title');
            const modalSubtitle = document.getElementById('modal-subtitle');
            const previewContent = document.getElementById('preview-content');
            const fileInfo = document.getElementById('file-info');
            const downloadLink = document.getElementById('download-link');

            modalTitle.textContent = fileName;
            modalSubtitle.textContent = 'File yang tersimpan';
            downloadLink.href = fileUrl;
            
            const fileExt = fileName.split('.').pop().toLowerCase();
            
            if (['jpg', 'jpeg', 'png'].includes(fileExt)) {
                previewContent.innerHTML = `
                    <div class="flex justify-center">
                        <img src="${fileUrl}" class="max-w-full max-h-[70vh] object-contain rounded-lg shadow-lg" alt="${fileName}">
                    </div>
                `;
                fileInfo.textContent = `Format: ${fileExt.toUpperCase()} • Gambar`;
            } else if (fileExt === 'pdf') {
                previewContent.innerHTML = `
                    <div class="w-full">
                        <iframe src="${fileUrl}" width="100%" height="600px" class="border-0 rounded-lg shadow-lg"></iframe>
                    </div>
                `;
                fileInfo.textContent = `Format: PDF • Dokumen`;
            } else {
                previewContent.innerHTML = `
                    <div class="text-center py-16">
                        <div class="w-24 h-24 mx-auto mb-4 bg-gray-100 rounded-full flex items-center justify-center">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <h4 class="text-lg font-medium text-gray-900 mb-2">Preview tidak tersedia</h4>
                        <p class="text-gray-500 mb-4">File ini tidak dapat ditampilkan secara langsung.</p>
                        <p class="text-sm text-gray-400">Gunakan tombol download untuk melihat file.</p>
                    </div>
                `;
                fileInfo.textContent = `Format: ${fileExt.toUpperCase()} • File`;
            }

            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        // Preview newly uploaded files
        function previewNewFile(fileData, fileName, fileType, fileSize) {
            const modal = document.getElementById('preview-modal');
            const modalTitle = document.getElementById('modal-title');
            const modalSubtitle = document.getElementById('modal-subtitle');
            const previewContent = document.getElementById('preview-content');
            const fileInfo = document.getElementById('file-info');
            const downloadLink = document.getElementById('download-link');

            modalTitle.textContent = fileName;
            modalSubtitle.textContent = 'File baru yang akan diupload';
            downloadLink.style.display = 'none'; // Hide download for new files
            
            if (fileType === 'image') {
                previewContent.innerHTML = `
                    <div class="flex justify-center">
                        <img src="${fileData}" class="max-w-full max-h-[70vh] object-contain rounded-lg shadow-lg" alt="${fileName}">
                    </div>
                `;
                fileInfo.textContent = `Ukuran: ${fileSize} • Gambar baru`;
            } else if (fileType === 'pdf') {
                previewContent.innerHTML = `
                    <div class="w-full">
                        <iframe src="${fileData}" width="100%" height="600px" class="border-0 rounded-lg shadow-lg"></iframe>
                    </div>
                `;
                fileInfo.textContent = `Ukuran: ${fileSize} • PDF baru`;
            }

            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            const modal = document.getElementById('preview-modal');
            const downloadLink = document.getElementById('download-link');
            
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
            downloadLink.style.display = 'flex'; // Reset download link visibility
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
                dropArea.classList.remove('bg-blue-100', 'border-blue-400');
                dropArea.classList.add('border-gray-300');
            }
        }

        // Close modal when pressing ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModal();
            }
        });
    </script>
@endsection
