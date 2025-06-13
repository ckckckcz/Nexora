@extends('layouts.user')
@section('user')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-indigo-50 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <!-- Header Section -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-blue-900 to-blue-700 rounded-2xl shadow-lg mb-4">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Evaluasi & Feedback Magang</h1>
            <p class="text-lg text-gray-600">Berikan penilaian dan masukan untuk pengalaman magang Anda</p>
        </div>

        @if(session('success'))
            <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-6 rounded-lg">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-green-700">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6 rounded-lg">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-red-700">{{ session('error') }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if(!$bimbingan)
            <!-- No Internship Data -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                <div class="p-8 text-center">
                    <div class="w-24 h-24 mx-auto mb-4 bg-gray-100 rounded-full flex items-center justify-center">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
            </div>
        @else
            <!-- Internship Information -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden mb-6">
                <div class="bg-gradient-to-r from-blue-900 to-blue-800 px-6 py-4">
                    <h2 class="text-xl font-semibold text-white">Informasi Magang</h2>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Nama Mahasiswa</h3>
                            <p class="text-lg font-semibold text-gray-900">{{ $mahasiswa->nama_mahasiswa }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">NIM</h3>
                            <p class="text-lg font-semibold text-gray-900">{{ $mahasiswa->nim }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Perusahaan</h3>
                            <p class="text-lg font-semibold text-gray-900">{{ $bimbingan->lowongan->nama_perusahaan }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Dosen Pembimbing</h3>
                            <p class="text-lg font-semibold text-gray-900">{{ $bimbingan->dosen->nama_dosen }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Status Bimbingan</h3>
                            <span class="inline-flex px-2 py-1 text-xs font-semibold bg-green-100 text-green-800 rounded-full">
                                {{ ucfirst($bimbingan->status_bimbingan) }}
                            </span>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Lokasi</h3>
                            <p class="text-lg font-semibold text-gray-900">{{ $bimbingan->lowongan->lokasi }}</p>
                        </div>
                    </div>
                </div>
            </div>

            @if($existingFeedback)
                <!-- Existing Feedback Display -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-green-600 to-green-500 px-6 py-4">
                        <h2 class="text-xl font-semibold text-white">Evaluasi Dosen</h2>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <div>
                                <h3 class="text-sm font-medium text-gray-500 mb-1">Catatan Evaluasi</h3>
                                <p class="text-gray-900 bg-gray-50 p-3 rounded-lg">{{ $existingFeedback->testimoni_magang }}</p>
                            </div>
                            
                            @if(isset($existingFeedback->rating_perusahaan))
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <h3 class="text-sm font-medium text-gray-500 mb-1">Rating Perusahaan</h3>
                                    <div class="flex items-center">
                                        @for($i = 1; $i <= 5; $i++)
                                            <svg class="w-5 h-5 {{ $i <= $existingFeedback->rating_perusahaan ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.518 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                            </svg>
                                        @endfor
                                        <span class="ml-2 text-sm text-gray-600">({{ $existingFeedback->rating_perusahaan }}/5)</span>
                                    </div>
                                </div>
                                <div>
                                    <h3 class="text-sm font-medium text-gray-500 mb-1">Rating Sistem</h3>
                                    <div class="flex items-center">
                                        @for($i = 1; $i <= 5; $i++)
                                            <svg class="w-5 h-5 {{ $i <= $existingFeedback->rating_sistem ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.518 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                            </svg>
                                        @endfor
                                        <span class="ml-2 text-sm text-gray-600">({{ $existingFeedback->rating_sistem }}/5)</span>
                                    </div>
                                </div>
                            </div>
                            @endif
                            
                            @if($existingFeedback->saran_perbaikan)
                            <div>
                                <h3 class="text-sm font-medium text-gray-500 mb-1">Saran Perbaikan</h3>
                                <p class="text-gray-900 bg-gray-50 p-3 rounded-lg">{{ $existingFeedback->saran_perbaikan }}</p>
                            </div>
                            @endif
                            
                            <div class="text-sm text-gray-500">
                                Feedback diberikan pada: {{ $existingFeedback->created_at->format('d F Y, H:i') }}
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <!-- Feedback Form -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-900 to-blue-800 px-6 py-4">
                        <h2 class="text-xl font-semibold text-white">Berikan Feedback Anda</h2>
                    </div>
                    <form action="/evaluasi" method="POST" class="p-6 space-y-6">
                        @csrf
                        
                        <!-- Testimoni -->
                        <div>
                            <label for="testimoni_magang" class="block text-sm font-medium text-gray-700 mb-2">
                                Testimoni Pengalaman Magang <span class="text-red-500">*</span>
                            </label>
                            <textarea name="testimoni_magang" id="testimoni_magang" rows="4" required
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                placeholder="Ceritakan pengalaman magang Anda, apa yang dipelajari, tantangan yang dihadapi, dan manfaat yang diperoleh...">{{ old('testimoni_magang') }}</textarea>
                            @error('testimoni_magang')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Rating Section -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Rating Perusahaan -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Rating Perusahaan <span class="text-red-500">*</span>
                                </label>
                                <div class="space-y-2">
                                    @for($i = 5; $i >= 1; $i--)
                                    <label class="flex items-center cursor-pointer">
                                        <input type="radio" name="rating_perusahaan" value="{{ $i }}" required
                                            class="sr-only rating-input" data-target="perusahaan">
                                        <div class="flex items-center">
                                            @for($j = 1; $j <= 5; $j++)
                                                <svg class="w-5 h-5 {{ $j <= $i ? 'text-yellow-400' : 'text-gray-300' }} mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.518 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                                </svg>
                                            @endfor
                                            <span class="ml-2 text-sm text-gray-600">{{ $i }} Bintang</span>
                                        </div>
                                    </label>
                                    @endfor
                                </div>
                                @error('rating_perusahaan')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Rating Sistem -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Rating Sistem Rekomendasi <span class="text-red-500">*</span>
                                </label>
                                <div class="space-y-2">
                                    @for($i = 5; $i >= 1; $i--)
                                    <label class="flex items-center cursor-pointer">
                                        <input type="radio" name="rating_sistem" value="{{ $i }}" required
                                            class="sr-only rating-input" data-target="sistem">
                                        <div class="flex items-center">
                                            @for($j = 1; $j <= 5; $j++)
                                                <svg class="w-5 h-5 {{ $j <= $i ? 'text-yellow-400' : 'text-gray-300' }} mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.518 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                                </svg>
                                            @endfor
                                            <span class="ml-2 text-sm text-gray-600">{{ $i }} Bintang</span>
                                        </div>
                                    </label>
                                    @endfor
                                </div>
                                @error('rating_sistem')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Saran Perbaikan -->
                        <div>
                            <label for="saran_perbaikan" class="block text-sm font-medium text-gray-700 mb-2">
                                Saran Perbaikan (Opsional)
                            </label>
                            <textarea name="saran_perbaikan" id="saran_perbaikan" rows="3"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                placeholder="Berikan saran untuk perbaikan sistem atau pengalaman magang di masa depan...">{{ old('saran_perbaikan') }}</textarea>
                            @error('saran_perbaikan')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end pt-4">
                            <button type="submit" 
                                class="bg-gradient-to-r from-blue-900 to-blue-700 hover:from-blue-800 hover:to-blue-600 text-white font-semibold py-3 px-8 rounded-xl transition-all duration-200 transform hover:scale-[1.02] active:scale-[0.98] shadow-lg">
                                📝 Kirim Feedback
                            </button>
                        </div>
                    </form>
                </div>
            @endif
        @endif
    </div>
</div>

<script>
// Interactive rating system
document.addEventListener('DOMContentLoaded', function() {
    const ratingInputs = document.querySelectorAll('.rating-input');
    
    ratingInputs.forEach(input => {
        input.addEventListener('change', function() {
            // Update visual feedback for selected rating
            const target = this.getAttribute('data-target');
            const value = parseInt(this.value);
            
            // You can add visual feedback here if needed
            console.log(`Rating ${target}: ${value} stars`);
        });
    });
});
</script>
@endsection