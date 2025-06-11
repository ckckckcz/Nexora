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

                    <!-- Alasan Penolakan -->
                    <div id="alasan-penolakan-container" class="relative" style="display: none;">
                        <label for="alasan_penolakan" class="block text-sm font-medium text-gray-700 mb-1">
                            Alasan Penolakan <span class="text-red-500">*</span>
                        </label>
                        <textarea name="alasan_penolakan" id="alasan_penolakan" rows="4"
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors bg-white text-gray-800 placeholder-gray-400"
                            placeholder="Masukkan alasan penolakan pengajuan magang...">{{ old('alasan_penolakan', $pengajuan->alasan_penolakan) }}</textarea>
                        <p class="text-xs text-gray-500 mt-1">Maksimal 1000 karakter</p>
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
                            <!-- KTP Display -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">KTP</label>
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
                            </div>

                            <!-- KTM Display -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">KTM</label>
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

                            <!-- Kartu BPJS Display -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Kartu BPJS/Asuransi
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

                            <!-- SKTM/KIP Kuliah Display -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">SKTM/KIP Kuliah</label>
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
                        </div>
                    </div>

                    <!-- Academic Documents -->
                    <div class="space-y-4">
                        <h4 class="text-sm font-medium text-gray-600">
                            <span class="text-red-500">*</span>
                            Dokumen Akademik dan Magang
                        </h4>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <!-- Pakta Integritas Display -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Pakta Integritas</label>
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

                            <!-- Daftar Riwayat Hidup Display -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Daftar Riwayat Hidup</label>
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

                            <!-- KHS/Cetak Siakad Display -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">KHS/Cetak Siakad</label>
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

                            <!-- Surat Izin Orang Tua Display -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Surat Izin Orang Tua</label>
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

                            <!-- Proposal Magang Display -->
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

                            <!-- CV Display -->
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

                            <!-- Surat Tugas Upload -->
                            <div>
                                <label for="Surat_Tugas" class="block text-sm font-medium text-gray-700 mb-1">Surat
                                    Tugas</label>
                                <div class="file-upload-container">
                                    <input type="file" name="Surat_Tugas" id="surat_tugas" accept=".pdf"
                                        class="hidden file-input" data-target="tugas-preview">
                                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer hover:bg-gray-50 transition-colors file-drop-area"
                                        data-input="surat_tugas">
                                        <div id="tugas-preview"
                                            class="file-preview flex flex-col items-center justify-center gap-2">
                                            @if($files['surat_tugas'])
                                                @php
                                                    $fileName = basename($files['surat_tugas']);
                                                    $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
                                                @endphp
                                                <svg class="h-10 w-10 text-green-500" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <div>
                                                    <p class="text-sm font-medium text-gray-700">File sudah ada: {{ $fileName }}
                                                    </p>
                                                    <p class="text-xs text-gray-500 mt-1">Upload file baru untuk mengganti</p>
                                                </div>
                                                <div class="flex gap-2 mt-2">
                                                    <button type="button"
                                                        onclick="previewExistingFile('{{ Storage::url($files['surat_tugas']) }}', '{{ $fileName }}')"
                                                        class="px-3 py-1 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200 transition-colors text-sm">
                                                        Lihat File
                                                    </button>
                                                    <button type="button"
                                                        class="px-4 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                        Pilih File Baru
                                                    </button>
                                                </div>
                                            @else
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
                                            @endif
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
            // Handle status pengajuan dropdown change
            const statusSelect = document.getElementById('status_pengajuan');
            const alasanContainer = document.getElementById('alasan-penolakan-container');
            const alasanTextarea = document.getElementById('alasan_penolakan');

            function toggleAlasanPenolakan() {
                if (statusSelect.value === 'ditolak') {
                    alasanContainer.style.display = 'block';
                    alasanTextarea.setAttribute('required', 'required');
                } else {
                    alasanContainer.style.display = 'none';
                    alasanTextarea.removeAttribute('required');
                    alasanTextarea.value = '';
                }
            }

            // Check initial state
            toggleAlasanPenolakan();

            // Listen for changes
            statusSelect.addEventListener('change', toggleAlasanPenolakan);

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

        function closePreviewModal() {
            const modal = document.getElementById('preview-modal');
            const previewContent = document.getElementById('preview-content');
            modal.classList.add('hidden');
            previewContent.innerHTML = '';
        }

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
    </script>
@endsection