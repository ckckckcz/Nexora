@extends('layouts.spk')
@section('spk')
    <div class="min-h-screen bg-gradient-to-b from-blue-50 to-gray-100 flex items-center justify-center py-12 px-4 sm:px-6">
        <div class="bg-white border border-gray-100 rounded-2xl p-6 sm:p-8 w-full max-w-2xl shadow-xl transition-all duration-300">
            <!-- Header -->
            <div class="flex flex-col sm:flex-row sm:items-center gap-4 mb-8 border-b border-gray-100 pb-6">
                <div class="flex-shrink-0 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl p-3 shadow-md text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Form Pengajuan Magang</h2>
                    <p class="text-gray-600 mt-1">Lengkapi data dan unggah dokumen untuk mengajukan magang</p>
                </div>
            </div>

            <form action="" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf
                
                <!-- Basic Information Section -->
                <div class="space-y-6">
                    <h3 class="text-lg font-semibold text-gray-800 border-l-4 border-blue-500 pl-3">Informasi Dasar</h3>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- ID Mahasiswa -->
                        <div class="relative">
                            <label for="id_mahasiswa" class="block text-sm font-medium text-gray-700 mb-1">
                                ID Mahasiswa <span class="text-red-500">*</span>
                            </label>
                            <input type="number" name="id_mahasiswa" id="id_mahasiswa" required
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors bg-white text-gray-800 placeholder-gray-400 shadow-sm">
                        </div>

                        <!-- ID Lowongan -->
                        <div class="relative">
                            <label for="id_lowongan" class="block text-sm font-medium text-gray-700 mb-1">
                                ID Lowongan <span class="text-red-500">*</span>
                            </label>
                            <input type="number" name="id_lowongan" id="id_lowongan" required
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors bg-white text-gray-800 placeholder-gray-400 shadow-sm">
                        </div>
                    </div>

                    <!-- Status Pengajuan -->
                    <div class="relative">
                        <label for="status_pengajuan" class="block text-sm font-medium text-gray-700 mb-1">
                            Status Pengajuan <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <select name="status_pengajuan" id="status_pengajuan" required
                                class="appearance-none w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors bg-white text-gray-800 shadow-sm">
                                <option value="menunggu">Menunggu</option>
                                <option value="diterima">Diterima</option>
                                <option value="ditolak">Ditolak</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Documents Section -->
                <div class="space-y-6">
                    <h3 class="text-lg font-semibold text-gray-800 border-l-4 border-blue-500 pl-3">Dokumen Persyaratan</h3>
                    
                    <!-- Personal Documents -->
                    <div class="space-y-4">
                        <h4 class="text-sm font-medium text-gray-600">Dokumen Identitas</h4>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div class="group">
                                <label for="ktp" class="block text-sm font-medium text-gray-700 mb-1">KTP</label>
                                <div class="relative">
                                    <input type="file" name="ktp" id="ktp" accept=".pdf,.jpg,.png"
                                        class="absolute inset-0 w-full h-full opacity-0 z-10 cursor-pointer"
                                        onchange="updateFileName(this, 'ktp-label')">
                                    <div class="w-full px-4 py-2.5 rounded-lg border border-gray-300 bg-white text-gray-500 flex items-center justify-between group-hover:border-blue-500 transition-colors">
                                        <span id="ktp-label" class="text-sm truncate">Pilih file</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 group-hover:text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="group">
                                <label for="ktm" class="block text-sm font-medium text-gray-700 mb-1">KTM</label>
                                <div class="relative">
                                    <input type="file" name="ktm" id="ktm" accept=".pdf,.jpg,.png"
                                        class="absolute inset-0 w-full h-full opacity-0 z-10 cursor-pointer"
                                        onchange="updateFileName(this, 'ktm-label')">
                                    <div class="w-full px-4 py-2.5 rounded-lg border border-gray-300 bg-white text-gray-500 flex items-center justify-between group-hover:border-blue-500 transition-colors">
                                        <span id="ktm-label" class="text-sm truncate">Pilih file</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 group-hover:text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="group">
                                <label for="kartu_bpjs" class="block text-sm font-medium text-gray-700 mb-1">Kartu BPJS/Asuransi</label>
                                <div class="relative">
                                    <input type="file" name="kartu_bpjs" id="kartu_bpjs" accept=".pdf,.jpg,.png"
                                        class="absolute inset-0 w-full h-full opacity-0 z-10 cursor-pointer"
                                        onchange="updateFileName(this, 'bpjs-label')">
                                    <div class="w-full px-4 py-2.5 rounded-lg border border-gray-300 bg-white text-gray-500 flex items-center justify-between group-hover:border-blue-500 transition-colors">
                                        <span id="bpjs-label" class="text-sm truncate">Pilih file</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 group-hover:text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="group">
                                <label for="sktm_kip" class="block text-sm font-medium text-gray-700 mb-1">SKTM/KIP Kuliah</label>
                                <div class="relative">
                                    <input type="file" name="sktm_kip" id="sktm_kip" accept=".pdf"
                                        class="absolute inset-0 w-full h-full opacity-0 z-10 cursor-pointer"
                                        onchange="updateFileName(this, 'sktm-label')">
                                    <div class="w-full px-4 py-2.5 rounded-lg border border-gray-300 bg-white text-gray-500 flex items-center justify-between group-hover:border-blue-500 transition-colors">
                                        <span id="sktm-label" class="text-sm truncate">Pilih file</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 group-hover:text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Academic Documents -->
                    <div class="space-y-4">
                        <h4 class="text-sm font-medium text-gray-600">Dokumen Akademik</h4>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div class="group">
                                <label for="cv" class="block text-sm font-medium text-gray-700 mb-1">CV</label>
                                <div class="relative">
                                    <input type="file" name="cv" id="cv" accept=".pdf"
                                        class="absolute inset-0 w-full h-full opacity-0 z-10 cursor-pointer"
                                        onchange="updateFileName(this, 'cv-label')">
                                    <div class="w-full px-4 py-2.5 rounded-lg border border-gray-300 bg-white text-gray-500 flex items-center justify-between group-hover:border-blue-500 transition-colors">
                                        <span id="cv-label" class="text-sm truncate">Pilih file</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 group-hover:text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="group">
                                <label for="daftar_riwayat_hidup" class="block text-sm font-medium text-gray-700 mb-1">Daftar Riwayat Hidup</label>
                                <div class="relative">
                                    <input type="file" name="daftar_riwayat_hidup" id="daftar_riwayat_hidup" accept=".pdf"
                                        class="absolute inset-0 w-full h-full opacity-0 z-10 cursor-pointer"
                                        onchange="updateFileName(this, 'riwayat-label')">
                                    <div class="w-full px-4 py-2.5 rounded-lg border border-gray-300 bg-white text-gray-500 flex items-center justify-between group-hover:border-blue-500 transition-colors">
                                        <span id="riwayat-label" class="text-sm truncate">Pilih file</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 group-hover:text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="group">
                                <label for="khs" class="block text-sm font-medium text-gray-700 mb-1">KHS/Cetak Siakad</label>
                                <div class="relative">
                                    <input type="file" name="khs" id="khs" accept=".pdf"
                                        class="absolute inset-0 w-full h-full opacity-0 z-10 cursor-pointer"
                                        onchange="updateFileName(this, 'khs-label')">
                                    <div class="w-full px-4 py-2.5 rounded-lg border border-gray-300 bg-white text-gray-500 flex items-center justify-between group-hover:border-blue-500 transition-colors">
                                        <span id="khs-label" class="text-sm truncate">Pilih file</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 group-hover:text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="group">
                                <label for="proposal_magang" class="block text-sm font-medium text-gray-700 mb-1">Proposal Magang</label>
                                <div class="relative">
                                    <input type="file" name="proposal_magang" id="proposal_magang" accept=".pdf"
                                        class="absolute inset-0 w-full h-full opacity-0 z-10 cursor-pointer"
                                        onchange="updateFileName(this, 'proposal-label')">
                                    <div class="w-full px-4 py-2.5 rounded-lg border border-gray-300 bg-white text-gray-500 flex items-center justify-between group-hover:border-blue-500 transition-colors">
                                        <span id="proposal-label" class="text-sm truncate">Pilih file</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 group-hover:text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Additional Documents -->
                    <div class="space-y-4">
                        <h4 class="text-sm font-medium text-gray-600">Dokumen Pendukung</h4>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div class="group">
                                <label for="pakta_integritas" class="block text-sm font-medium text-gray-700 mb-1">Pakta Integritas</label>
                                <div class="relative">
                                    <input type="file" name="pakta_integritas" id="pakta_integritas" accept=".pdf"
                                        class="absolute inset-0 w-full h-full opacity-0 z-10 cursor-pointer"
                                        onchange="updateFileName(this, 'pakta-label')">
                                    <div class="w-full px-4 py-2.5 rounded-lg border border-gray-300 bg-white text-gray-500 flex items-center justify-between group-hover:border-blue-500 transition-colors">
                                        <span id="pakta-label" class="text-sm truncate">Pilih file</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 group-hover:text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="group">
                                <label for="surat_izin_orang_tua" class="block text-sm font-medium text-gray-700 mb-1">Surat Izin Orang Tua</label>
                                <div class="relative">
                                    <input type="file" name="surat_izin_orang_tua" id="surat_izin_orang_tua" accept=".pdf"
                                        class="absolute inset-0 w-full h-full opacity-0 z-10 cursor-pointer"
                                        onchange="updateFileName(this, 'izin-label')">
                                    <div class="w-full px-4 py-2.5 rounded-lg border border-gray-300 bg-white text-gray-500 flex items-center justify-between group-hover:border-blue-500 transition-colors">
                                        <span id="izin-label" class="text-sm truncate">Pilih file</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 group-hover:text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="group">
                                <label for="surat_tugas" class="block text-sm font-medium text-gray-700 mb-1">Surat Tugas</label>
                                <div class="relative">
                                    <input type="file" name="surat_tugas" id="surat_tugas" accept=".pdf"
                                        class="absolute inset-0 w-full h-full opacity-0 z-10 cursor-pointer"
                                        onchange="updateFileName(this, 'tugas-label')">
                                    <div class="w-full px-4 py-2.5 rounded-lg border border-gray-300 bg-white text-gray-500 flex items-center justify-between group-hover:border-blue-500 transition-colors">
                                        <span id="tugas-label" class="text-sm truncate">Pilih file</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 group-hover:text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white font-medium py-3 px-4 rounded-xl hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transform transition-all duration-300 hover:scale-[1.01] active:scale-[0.99] shadow-md">
                        <div class="flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Ajukan Magang
                        </div>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript for file input display -->
    <script>
        function updateFileName(input, labelId) {
            const label = document.getElementById(labelId);
            if (input.files && input.files.length > 0) {
                label.textContent = input.files[0].name;
            } else {
                label.textContent = 'Pilih file';
            }
        }
    </script>
@endsection