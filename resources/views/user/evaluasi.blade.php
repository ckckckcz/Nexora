@extends('layouts.user')
@section('user')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-indigo-50 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-auto">
        <!-- Enhanced Header Section -->
        <div class="text-center mb-10">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-r from-blue-900 to-blue-700 rounded-3xl shadow-xl mb-6">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                </svg>
            </div>
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Evaluasi & Feedback Magang</h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Lihat testimoni magang Anda dan pesan dari dosen pembimbing</p>
        </div>

        <!-- Enhanced Alert Messages -->
        @if(session('success'))
            <div class="bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-green-400 p-6 mb-8 rounded-xl shadow-lg">
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-4">
                        <svg class="h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-green-800">Berhasil!</h3>
                        <p class="text-green-700">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-gradient-to-r from-red-50 to-pink-50 border-l-4 border-red-400 p-6 mb-8 rounded-xl shadow-lg">
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center mr-4">
                        <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-red-800">Terjadi Kesalahan!</h3>
                        <p class="text-red-700">{{ session('error') }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if(session('warning'))
            <div class="bg-gradient-to-r from-yellow-50 to-orange-50 border-l-4 border-yellow-400 p-6 mb-8 rounded-xl shadow-lg">
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center mr-4">
                        <svg class="h-5 w-5 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-yellow-800">Perhatian!</h3>
                        <p class="text-yellow-700">{{ session('warning') }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if(!$bimbingan)
            <!-- Enhanced No Internship Data -->
            <div class="bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden">
                <div class="p-12 text-center">
                    <div class="w-32 h-32 mx-auto mb-8 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center">
                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Belum Ada Data Magang</h3>
                    <p class="text-lg text-gray-500 mb-8 max-w-md mx-auto">Anda belum menyelesaikan program magang atau belum memiliki bimbingan yang valid untuk melihat evaluasi.</p>
                    <a href="{{ route('user.profile', auth()->user()->username) }}" 
                       class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold rounded-xl hover:from-blue-700 hover:to-blue-800 transition-all duration-200 transform hover:scale-105 shadow-lg">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali ke Profile
                    </a>
                </div>
            </div>
        @else
            <!-- Enhanced Internship Information -->
            <div class="bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden mb-8">
                <div class="bg-gradient-to-r from-blue-900 to-blue-800 px-8 py-6">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-white bg-opacity-20 rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-white">Informasi Magang Anda</h2>
                            <p class="text-blue-100">Detail lengkap program magang yang telah diselesaikan</p>
                        </div>
                    </div>
                </div>
                <div class="p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <div class="bg-gradient-to-br from-blue-50 to-indigo-50 p-6 rounded-2xl border border-blue-100">
                            <div class="flex items-center mb-3">
                                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <h3 class="text-sm font-medium text-blue-600">Nama Mahasiswa</h3>
                            </div>
                            <p class="text-xl font-bold text-gray-900">{{ $mahasiswa->nama_mahasiswa }}</p>
                        </div>
                        
                        <div class="bg-gradient-to-br from-green-50 to-emerald-50 p-6 rounded-2xl border border-green-100">
                            <div class="flex items-center mb-3">
                                <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                                <h3 class="text-sm font-medium text-green-600">Perusahaan</h3>
                            </div>
                            <p class="text-xl font-bold text-gray-900">{{ $bimbingan->lowongan->nama_perusahaan }}</p>
                        </div>
                        
                        <div class="bg-gradient-to-br from-purple-50 to-violet-50 p-6 rounded-2xl border border-purple-100">
                            <div class="flex items-center mb-3">
                                <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C20.832 18.477 19.247 18 17.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                </div>
                                <h3 class="text-sm font-medium text-purple-600">Dosen Pembimbing</h3>
                            </div>
                            <p class="text-xl font-bold text-gray-900">{{ $bimbingan->dosen->nama_dosen }}</p>
                        </div>
                        
                        <div class="bg-gradient-to-br from-yellow-50 to-orange-50 p-6 rounded-2xl border border-yellow-100">
                            <div class="flex items-center mb-3">
                                <div class="w-8 h-8 bg-yellow-100 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <h3 class="text-sm font-medium text-yellow-600">Status Bimbingan</h3>
                            </div>
                            <span class="inline-flex px-4 py-2 text-sm font-bold bg-green-100 text-green-800 rounded-full">
                                ✅ {{ ucfirst($bimbingan->status_bimbingan) }}
                            </span>
                        </div>
                        
                        <div class="bg-gradient-to-br from-red-50 to-pink-50 p-6 rounded-2xl border border-red-100">
                            <div class="flex items-center mb-3">
                                <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    </svg>
                                </div>
                                <h3 class="text-sm font-medium text-red-600">Lokasi</h3>
                            </div>
                            <p class="text-xl font-bold text-gray-900">{{ $bimbingan->lowongan->lokasi }}</p>
                        </div>
                        
                        <div class="bg-gradient-to-br from-gray-50 to-slate-50 p-6 rounded-2xl border border-gray-100">
                            <div class="flex items-center mb-3">
                                <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <h3 class="text-sm font-medium text-gray-600">NIM</h3>
                            </div>
                            <p class="text-xl font-bold text-gray-900">{{ $mahasiswa->nim }}</p>
                        </div>
                    </div>
                </div>
            </div>

            @if($existingFeedback)
                <!-- Enhanced Existing Feedback Display -->
                <div class="bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden mb-8">
                    <div class="bg-gradient-to-r from-green-600 to-emerald-500 px-8 py-6">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-white bg-opacity-20 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-white">Testimoni Magang Anda</h2>
                                <p class="text-green-100">Evaluasi pengalaman magang dan feedback dari dosen pembimbing</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-8">
                        <div class="space-y-8">
                            <!-- Testimoni Mahasiswa -->
                            <div class="bg-gradient-to-br from-blue-50 to-indigo-50 p-6 rounded-2xl border border-blue-200">
                                <h3 class="text-lg font-bold text-blue-800 mb-4 flex items-center">
                                    <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    Testimoni Pengalaman Magang
                                </h3>
                                <div class="bg-white p-6 rounded-xl border border-blue-100 shadow-sm">
                                    <p class="text-gray-700 leading-relaxed text-lg">{{ $existingFeedback->testimoni_magang }}</p>
                                </div>
                            </div>
                            
                            <!-- Pesan Dosen -->
                            @if($existingFeedback->pesan_dosen)
                            <div class="bg-gradient-to-br from-purple-50 to-violet-50 p-6 rounded-2xl border border-purple-200">
                                <h3 class="text-lg font-bold text-purple-800 mb-4 flex items-center">
                                    <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C20.832 18.477 19.247 18 17.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                        </svg>
                                    </div>
                                    Pesan dari Dosen Pembimbing
                                </h3>
                                <div class="bg-white p-6 rounded-xl border border-purple-100 shadow-sm">
                                    <p class="text-gray-700 leading-relaxed text-lg">{{ $existingFeedback->pesan_dosen }}</p>
                                </div>
                            </div>
                            @endif
                            
                            <!-- Feedback Date -->
                            <div class="text-center pt-6 border-t border-gray-200">
                                <p class="text-gray-500">
                                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Data evaluasi dari tanggal: <span class="font-semibold">{{ $existingFeedback->created_at->format('d F Y, H:i') }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <!-- Enhanced Feedback Form -->
                <div class="bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-900 to-blue-800 px-8 py-6">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-white bg-opacity-20 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-white">Berikan Testimoni Anda</h2>
                                <p class="text-blue-100">Ceritakan pengalaman magang Anda untuk membantu mahasiswa lainnya</p>
                            </div>
                        </div>
                    </div>
                    <form action="/evaluasi" method="POST" class="p-8 space-y-8">
                        @csrf
                        
                        <!-- Enhanced Testimoni -->
                        <div class="bg-gradient-to-br from-blue-50 to-indigo-50 p-6 rounded-2xl border border-blue-200">
                            <label for="testimoni_magang" class="block text-lg font-bold text-blue-800 mb-4 flex items-center">
                                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </div>
                                Testimoni Pengalaman Magang <span class="text-red-500">*</span>
                            </label>
                            <textarea name="testimoni_magang" id="testimoni_magang" rows="6" required
                                class="w-full px-6 py-4 rounded-xl border-2 border-blue-200 focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-200 bg-white text-gray-800 text-lg"
                                placeholder="Ceritakan pengalaman magang Anda secara detail... Apa yang dipelajari, tantangan yang dihadapi, manfaat yang diperoleh, dan bagaimana pengalaman ini membantu pengembangan karir Anda.">{{ old('testimoni_magang') }}</textarea>
                            @error('testimoni_magang')
                                <p class="text-red-500 text-sm mt-2 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-center pt-8">
                            <button type="submit" 
                                class="inline-flex items-center px-12 py-5 bg-gradient-to-r from-blue-900 to-blue-700 hover:from-blue-800 hover:to-blue-600 text-white font-bold text-xl rounded-2xl transition-all duration-200 transform hover:scale-105 active:scale-95 shadow-2xl hover:shadow-3xl">
                                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                </svg>
                                Kirim Testimoni
                            </button>
                        </div>
                    </form>
                </div>
            @endif
        @endif
    </div>
</div>
@endsection