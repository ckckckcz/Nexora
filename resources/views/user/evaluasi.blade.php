@extends('layouts.user')
@section('user')
<div class="min-h-screen bg-gradient-to-br from-gray-100 via-blue-50 to-indigo-100 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <!-- Header Section with gradient background -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-600 to-blue-800 rounded-2xl mb-4 shadow-lg">
                <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.518 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-gray-800 mb-2">Evaluasi & Feedback Magang</h1>
            <p class="text-gray-500">Berikan penilaian dan masukan untuk pengalaman magang Anda</p>
        </div>

        @if(session('success'))
            <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-6">
                <div class="flex">
                    <svg class="h-5 w-5 text-green-400 mr-3 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <p class="text-sm text-green-700">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-6">
                <div class="flex">
                    <svg class="h-5 w-5 text-red-400 mr-3 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                    <p class="text-sm text-red-700">{{ session('error') }}</p>
                </div>
            </div>
        @endif

        @if(session('warning'))
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-6">
                <div class="flex">
                    <svg class="h-5 w-5 text-yellow-400 mr-3 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    <p class="text-sm text-yellow-700">{{ session('warning') }}</p>
                </div>
            </div>
        @endif

        @if(!$bimbingan)
            <!-- No Data State -->
            <div class="bg-white rounded-lg shadow-sm p-8 text-center">
                <div class="w-16 h-16 mx-auto mb-4 bg-gray-100 rounded-full flex items-center justify-center">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Belum Ada Data Magang</h3>
                <p class="text-gray-500 mb-4">Anda belum menyelesaikan program magang atau belum memiliki bimbingan yang valid.</p>
                <a href="{{ route('user.profile', auth()->user()->username) }}" 
                   class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                    Kembali ke Profile
                </a>
            </div>
        @else
            <!-- Informasi Magang Card -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden mb-6">
                <div class="bg-gradient-to-r from-blue-600 to-blue-700 text-white hover:from-blue-700 hover:to-blue-800 transition-all duration-200 transform hover:scale-105 px-6 py-4">
                    <h2 class="text-lg font-semibold text-white">Informasi Magang</h2>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <div class="text-sm text-gray-500 mb-1">Nama Mahasiswa</div>
                            <div class="font-semibold text-gray-900">{{ $mahasiswa->nama_mahasiswa }}</div>
                        </div>
                        <div>
                            <div class="text-sm text-gray-500 mb-1">NIM</div>
                            <div class="font-semibold text-gray-900">{{ $mahasiswa->nim }}</div>
                        </div>
                        <div>
                            <div class="text-sm text-gray-500 mb-1">Perusahaan</div>
                            <div class="font-semibold text-gray-900">{{ $bimbingan->lowongan->nama_perusahaan }}</div>
                        </div>
                        <div>
                            <div class="text-sm text-gray-500 mb-1">Dosen Pembimbing</div>
                            <div class="font-semibold text-gray-900">{{ $bimbingan->dosen->nama_dosen }}</div>
                        </div>
                        <div>
                            <div class="text-sm text-gray-500 mb-1">Status Bimbingan</div>
                            <span class="inline-flex px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded">
                                Selesai
                            </span>
                        </div>
                        <div>
                            <div class="text-sm text-gray-500 mb-1">Lokasi</div>
                            <div class="font-semibold text-gray-900">{{ $bimbingan->lowongan->lokasi }}</div>
                        </div>
                    </div>
                </div>
            </div>

            @if($existingFeedback)
                <!-- Feedback Card -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="bg-green-500 px-6 py-4">
                        <h2 class="text-lg font-semibold text-white">Feedback & Pesan</h2>
                    </div>
                    <div class="p-6">
                        <!-- Pesan Dosen - Always show if exists -->
                        @if($existingFeedback->pesan_dosen && !empty(trim($existingFeedback->pesan_dosen)))
                        <div class="mb-6">
                            <div class="text-sm text-gray-500 mb-2">Pesan dari Dosen Pembimbing</div>
                            <div class="bg-blue-50 p-4 rounded-xl">
                                <div class="text-gray-700 leading-relaxed">
                                    {{ $existingFeedback->pesan_dosen }}
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- Testimoni Magang - Only show if exists -->
                        @if($existingFeedback->testimoni_magang && !empty(trim($existingFeedback->testimoni_magang)))
                        <div class="mb-6">
                            <div class="text-sm text-gray-500 mb-2">Testimoni Magang Anda</div>
                            <div class="bg-gray-50 p-4 rounded-xl">
                                <div class="text-gray-700 leading-relaxed">
                                    {{ $existingFeedback->testimoni_magang }}
                                </div>
                            </div>
                            
                            <!-- Status Badge for completed testimoni -->
                            <div class="mt-4 pt-4 border-t border-gray-200">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    Testimoni Telah Diberikan
                                </span>
                            </div>
                        @endif
                        
                        <!-- Feedback Date -->
                        <div class="text-xs text-gray-400 mt-5">
                            @if($existingFeedback->testimoni_magang && !empty(trim($existingFeedback->testimoni_magang)))
                                Testimoni diberikan pada: {{ $existingFeedback->updated_at->format('d F Y, H:i') }}
                            @else
                                Data feedback: {{ $existingFeedback->created_at->format('d F Y, H:i') }}
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Form Testimoni - Show if testimoni not yet filled -->
                @if(!$existingFeedback->testimoni_magang || empty(trim($existingFeedback->testimoni_magang)))
                <div class="bg-white rounded-lg shadow-sm overflow-hidden mt-6">
                    <div class="bg-blue-600 px-6 py-4">
                        <h2 class="text-lg font-semibold text-white">Berikan Testimoni Anda</h2>
                        <p class="text-blue-100 text-sm mt-1">Bagikan pengalaman magang Anda untuk membantu mahasiswa lain</p>
                    </div>
                    <form action="/evaluasi" method="POST" class="p-6">
                        @csrf
                        
                        <div class="mb-6">
                            <label for="testimoni_magang" class="block text-sm font-medium text-gray-700 mb-2">
                                Testimoni Pengalaman Magang <span class="text-red-500">*</span>
                            </label>
                            <textarea name="testimoni_magang" id="testimoni_magang" rows="6" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-1 focus:ring-blue-500 focus:border-blue-500 resize-none"
                                placeholder="Ceritakan pengalaman magang Anda secara detail, termasuk skills yang didapat, tantangan yang dihadapi, dan manfaat yang dirasakan...">{{ old('testimoni_magang') }}</textarea>
                            @error('testimoni_magang')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            <div class="text-xs text-gray-500 mt-1">
                                Minimal 50 karakter, maksimal 1000 karakter
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" 
                                class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors disabled:opacity-50">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                    </svg>
                                    Kirim Testimoni
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
                @endif
            @else
                <!-- Form Feedback - Only shown when no existing feedback at all -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="bg-blue-600 px-6 py-4">
                        <h2 class="text-lg font-semibold text-white">Berikan Testimoni Anda</h2>
                        <p class="text-blue-100 text-sm mt-1">Bagikan pengalaman magang Anda untuk membantu mahasiswa lain</p>
                    </div>
                    <form action="/evaluasi" method="POST" class="p-6">
                        @csrf
                        
                        <div class="mb-6">
                            <label for="testimoni_magang" class="block text-sm font-medium text-gray-700 mb-2">
                                Testimoni Pengalaman Magang <span class="text-red-500">*</span>
                            </label>
                            <textarea name="testimoni_magang" id="testimoni_magang" rows="6" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-1 focus:ring-blue-500 focus:border-blue-500 resize-none"
                                placeholder="Ceritakan pengalaman magang Anda secara detail, termasuk skills yang didapat, tantangan yang dihadapi, dan manfaat yang dirasakan...">{{ old('testimoni_magang') }}</textarea>
                            @error('testimoni_magang')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            <div class="text-xs text-gray-500 mt-1">
                                Minimal 50 karakter, maksimal 1000 karakter
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" 
                                class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors disabled:opacity-50">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                    </svg>
                                    Kirim Testimoni
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            @endif
        @endif
    </div>
</div>
@endsection