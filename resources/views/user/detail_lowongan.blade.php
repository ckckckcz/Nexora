@extends('layouts.user')
@section('user')
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 py-4 sm:py-8 px-4">
        <div class="max-w-7xl mx-auto">
            <!-- Header Section -->
            <div class="bg-white rounded-xl sm:rounded-2xl shadow-xl overflow-hidden mb-6 sm:mb-8">
                <div class="bg-gradient-to-r from-blue-900 to-blue-800 px-4 sm:px-6 lg:px-8 py-4 sm:py-6">
                    <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold text-white mb-2 break-words">{{ $lowongan->nama_perusahaan }}</h1>
                    <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4 space-y-2 sm:space-y-0 text-blue-100">
                        <span class="flex items-center text-sm sm:text-base">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="break-words">{{ $lowongan->lokasi }}</span>
                        </span>
                        <span class="flex items-center text-sm sm:text-base">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="break-words">{{ $lowongan->tanggal_pendaftaran }} - {{ $lowongan->tanggal_penutupan }}</span>
                        </span>
                    </div>
                </div>
                
                <!-- Status Badge -->
                <div class="px-4 sm:px-6 lg:px-8 py-3 sm:py-4 bg-white">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-3 sm:space-y-0">
                        <span class="inline-flex items-center px-3 sm:px-4 py-2 rounded-full text-xs sm:text-sm font-medium w-fit
                            @if($lowongan->status_lowongan == 'Aktif') 
                                bg-green-100 text-green-800
                            @elseif($lowongan->status_lowongan == 'Tutup')
                                bg-red-100 text-red-800
                            @else
                                bg-yellow-100 text-yellow-800
                            @endif">
                            <svg class="w-3 h-3 sm:w-4 sm:h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $lowongan->status_lowongan }}
                        </span>
                        
                        <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-2 space-y-1 sm:space-y-0">
                            <span class="text-xs sm:text-sm text-gray-700 font-medium">Posisi:</span>
                            <span class="px-2 sm:px-3 py-1 bg-blue-900 text-white rounded-full text-xs sm:text-sm font-medium break-words">
                                {{ $lowongan->posisiMagang->nama_posisi ?? 'Tidak ada' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 lg:gap-8">
                <!-- Left Column - Main Info -->
                <div class="xl:col-span-2 space-y-6">
                    <!-- Description Card -->
                    <div class="bg-white rounded-lg sm:rounded-xl shadow-lg p-4 sm:p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-8 h-8 sm:w-10 sm:h-10 bg-[#DEFC79] rounded-lg flex items-center justify-center mr-3 flex-shrink-0">
                                <svg class="w-4 h-4 sm:w-6 sm:h-6 text-blue-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <h2 class="text-lg sm:text-xl font-bold text-gray-800">Deskripsi Lowongan</h2>
                        </div>
                        <div class="prose prose-gray max-w-none">
                            <p class="text-sm sm:text-base text-gray-700 leading-relaxed whitespace-pre-line break-words">{{ $lowongan->deskripsi }}</p>
                        </div>
                    </div>

                    <!-- Company Details -->
                    <div class="bg-white rounded-lg sm:rounded-xl shadow-lg p-4 sm:p-6">
                        <div class="flex items-center mb-4 sm:mb-6">
                            <div class="w-8 h-8 sm:w-10 sm:h-10 bg-blue-900 rounded-lg flex items-center justify-center mr-3 flex-shrink-0">
                                <svg class="w-4 h-4 sm:w-6 sm:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                            <h2 class="text-lg sm:text-xl font-bold text-gray-800">Detail Perusahaan</h2>
                        </div>
                        
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6">
                            <div class="space-y-4">
                                <div class="p-3 sm:p-4 bg-gray-50 rounded-lg">
                                    <h3 class="font-semibold text-gray-800 mb-2 flex items-center text-sm sm:text-base">
                                        <span class="w-2 h-2 bg-[#DEFC79] rounded-full mr-2 flex-shrink-0"></span>
                                        <span class="break-words">Status Gaji</span>
                                    </h3>
                                    <p class="text-gray-700 text-sm sm:text-base break-words">{{ $lowongan->status_gaji }}</p>
                                </div>
                                
                                <div class="p-3 sm:p-4 bg-gray-50 rounded-lg">
                                    <h3 class="font-semibold text-gray-800 mb-2 flex items-center text-sm sm:text-base">
                                        <span class="w-2 h-2 bg-blue-900 rounded-full mr-2 flex-shrink-0"></span>
                                        <span class="break-words">Bidang Keahlian</span>
                                    </h3>
                                    <p class="text-gray-700 text-sm sm:text-base break-words">{{ $lowongan->bidang_keahlian }}</p>
                                </div>
                            </div>
                            
                            <div class="space-y-4">
                                <div class="p-3 sm:p-4 bg-gray-50 rounded-lg">
                                    <h3 class="font-semibold text-gray-800 mb-2 flex items-center text-sm sm:text-base">
                                        <span class="w-2 h-2 bg-[#DEFC79] rounded-full mr-2 flex-shrink-0"></span>
                                        <span class="break-words">Tipe Perusahaan</span>
                                    </h3>
                                    <p class="text-gray-700 text-sm sm:text-base break-words">{{ $lowongan->tipe_perusahaan }}</p>
                                </div>
                                <div class="p-3 sm:p-4 bg-gray-50 rounded-lg">
                                    <h3 class="font-semibold text-gray-800 mb-2 flex items-center text-sm sm:text-base">
                                        <span class="w-2 h-2 bg-blue-900 rounded-full mr-2 flex-shrink-0"></span>
                                        <span class="break-words">Fasilitas Perusahaan</span>
                                    </h3>
                                    <p class="text-gray-700 text-sm sm:text-base break-words">{{ $lowongan->fasilitas_perusahaan }}</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Sidebar -->
                <div class="space-y-6">
                    <!-- Quick Info Card -->
                    <div class="bg-white rounded-lg sm:rounded-xl shadow-lg p-4 sm:p-6 xl:top-8">
                        <div class="flex items-center mb-4">
                            <div class="w-8 h-8 sm:w-10 sm:h-10 bg-[#DEFC79] rounded-lg flex items-center justify-center mr-3 flex-shrink-0">
                                <svg class="w-4 h-4 sm:w-6 sm:h-6 text-blue-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h2 class="text-base sm:text-lg font-bold text-gray-800">Informasi Magang</h2>
                        </div>
                        
                        <div class="space-y-4">
                            <div class="border-l-4 border-blue-900 pl-3 sm:pl-4">
                                <h3 class="font-semibold text-gray-800 text-xs sm:text-sm">Fleksibilitas Kerja</h3>
                                <p class="text-gray-700 mt-1 text-sm sm:text-base break-words">{{ $lowongan->fleksibilitas_kerja }}</p>
                            </div>
                            
                            <div class="border-l-4 border-[#DEFC79] pl-3 sm:pl-4">
                                <h3 class="font-semibold text-gray-800 text-xs sm:text-sm">Skema Magang</h3>
                                <p class="text-gray-700 mt-1 text-sm sm:text-base break-words">{{ strtoupper($lowongan->skemaMagang->nama_skema_magang) ?? 'Tidak ada' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Timeline Card -->
                    <div class="bg-white rounded-lg sm:rounded-xl shadow-lg p-4 sm:p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-8 h-8 sm:w-10 sm:h-10 bg-blue-900 rounded-lg flex items-center justify-center mr-3 flex-shrink-0">
                                <svg class="w-4 h-4 sm:w-6 sm:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h2 class="text-base sm:text-lg font-bold text-gray-800">Timeline</h2>
                        </div>
                        
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-3 h-3 bg-[#DEFC79] rounded-full mt-2 mr-3"></div>
                                <div class="min-w-0 flex-1">
                                    <h3 class="font-semibold text-gray-800 text-xs sm:text-sm">Tanggal Pendaftaran</h3>
                                    <p class="text-gray-600 text-xs sm:text-sm break-words">{{ $lowongan->tanggal_pendaftaran }}</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-3 h-3 bg-blue-900 rounded-full mt-2 mr-3"></div>
                                <div class="min-w-0 flex-1">
                                    <h3 class="font-semibold text-gray-800 text-xs sm:text-sm">Tanggal Penutupan</h3>
                                    <p class="text-gray-600 text-xs sm:text-sm break-words">{{ $lowongan->tanggal_penutupan }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Button -->
                    <div class="bg-gradient-to-r cursor-pointer from-blue-900 to-blue-800 rounded-lg sm:rounded-xl shadow-lg p-4 sm:p-6 text-center">
                        <h3 class="text-white font-bold mb-2 text-sm sm:text-base">Tertarik dengan lowongan ini?</h3>
                        <p class="text-blue-100 text-xs sm:text-sm mb-4">Daftar sekarang dan mulai perjalanan magang Anda!</p>
                        @auth
                            <a href="/unggah-dokumen" class="cursor-pointer">
                                <button class="w-full bg-[#DEFC79] cursor-pointer text-blue-900 font-bold py-2 sm:py-3 px-4 sm:px-6 rounded-lg hover:bg-[#d4f066] transition duration-200 shadow-md text-sm sm:text-base">
                                    Daftar Sekarang
                                </button>
                            </a>
                        @else
                        <a href="/login" class="cursor-pointer">
                            <button class="w-full bg-[#DEFC79] cursor-pointer text-blue-900 font-bold py-2 sm:py-3 px-4 sm:px-6 rounded-lg hover:bg-[#d4f066] transition duration-200 shadow-md text-sm sm:text-base">
                                Daftar Sekarang
                            </button>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection