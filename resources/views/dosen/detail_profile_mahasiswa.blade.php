@extends('layouts.dosen')
@section('dosen')
    <!-- Profile Header with Background Image -->
    {{-- <section
        class="w-full bg-center bg-no-repeat bg-cover bg-[url('https://i.ibb.co.com/1JrpYCGV/profiel-header.png')] h-64 relative">
        <div class="absolute inset-0 bg-gradient-to-b from-black/60 to-black/30"></div>
    </section> --}}

    <!-- Main Profile Content -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-24 relative z-10 pb-16">
        <div class="bg-white rounded-2xl shadow-lg p-6 sm:p-8">
            <!-- Profile Header -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end gap-6">
                <div class="flex flex-col sm:flex-row items-start sm:items-center gap-6">
                    @if($mahasiswa->profile_mahasiswa)
                        <img class="w-32 h-32 rounded-full border-4 border-white shadow-md object-cover"
                            src="{{ Storage::url($mahasiswa->profile_mahasiswa) }}" alt="{{ $mahasiswa->nama_mahasiswa }}'s Profile Photo">
                    @else
                        <div class="w-32 h-32 rounded-full border-4 border-white shadow-md bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-500 text-3xl">{{ substr($mahasiswa->nama_mahasiswa, 0, 1) }}</span>
                        </div>
                    @endif
                    <div>
                        <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 mt-2 sm:mt-0">{{ $mahasiswa->nama_mahasiswa }}</h1>
                        <p class="text-gray-600 mt-1 max-w-2xl">
                            @if($mahasiswa->deskripsi)
                                {{ $mahasiswa->deskripsi }}
                            @else
                                Mahasiswa {{ $mahasiswa->jurusan }}
                            @endif
                        </p>
                        <div class="flex items-center gap-3 mt-2">
                            <span class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                {{ $mahasiswa->lokasi }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-3 mt-4 sm:mt-0">
                    <a href="{{ route('dosen.rekomendasi_magang') }}"
                        class="inline-flex items-center bg-gray-100 hover:bg-gray-200 text-blue-900 font-medium px-5 py-2.5 rounded-xl transition-colors text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        Kembali ke Daftar
                    </a>
                </div>
            </div>

            <!-- Profile Tabs -->
            <div class="mt-8 border-b border-gray-200">
                <nav class="-mb-px flex space-x-8" id="profileTabs">
                    <button data-tab="profile"
                        class="tab-button border-blue-900 text-blue-900 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm active">
                        Profile
                    </button>
                    {{-- <button data-tab="activity"
                        class="tab-button border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                        Log Aktivitas
                    </button> --}}
                </nav>
            </div>

            <!-- Tab Content -->
            <div class="mt-8">
                <!-- Profile Content -->
                <div id="profile-content" class="tab-content grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Left Column -->
                    <div class="lg:col-span-2 space-y-8">
                        <!-- About Section -->
                        <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
                            <h3 class="text-lg font-semibold text-gray-900">Tentang Mahasiswa</h3>
                            <p class="mt-4 text-gray-600">
                                {{ $mahasiswa->deskripsi ?? 'Belum ada deskripsi yang ditambahkan oleh mahasiswa.' }}
                            </p>

                            <!-- Basic Info -->
                            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <h4 class="text-sm font-medium text-gray-500">Data Akademik</h4>
                                    <ul class="mt-2 space-y-3">
                                        <li class="flex items-center text-sm">
                                            <span class="text-gray-500 w-24">NIM</span>
                                            <span class="font-medium text-gray-900">{{ $mahasiswa->nim }}</span>
                                        </li>
                                        <li class="flex items-center text-sm">
                                            <span class="text-gray-500 w-24">Jurusan</span>
                                            <span class="font-medium text-gray-900">{{ $mahasiswa->jurusan }}</span>
                                        </li>
                                        <li class="flex items-center text-sm">
                                            <span class="text-gray-500 w-24">Program Studi</span>
                                            <span class="font-medium text-gray-900">{{ $mahasiswa->programStudi->nama_program_studi ?? 'Tidak ada data' }}</span>
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    <h4 class="text-sm font-medium text-gray-500">Data Personal</h4>
                                    <ul class="mt-2 space-y-3">
                                        <li class="flex items-center text-sm">
                                            <span class="text-gray-500 w-24">Jenis Kelamin</span>
                                            <span class="font-medium text-gray-900">{{ $mahasiswa->jenis_kelamin }}</span>
                                        </li>
                                        <li class="flex items-center text-sm">
                                            <span class="text-gray-500 w-24">Lokasi</span>
                                            <span class="font-medium text-gray-900">{{ $mahasiswa->lokasi ?? 'Tidak ada data' }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Experience Section -->
                        @include('components.ui.user.experience')

                        <!-- Portfolio Section -->
                        @include('components.ui.user.portfolio')
                    </div>

                    <!-- Right Column - Sidebar -->
                    <div class="space-y-6">
                        <!-- Progres Dokumen Magang -->
                        <div class="bg-blue-900/30 border border-blue-200 rounded-2xl p-5">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 bg-blue-900/10 rounded-lg p-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-900" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="ml-4 w-full">
                                    <h3 class="text-sm font-semibold text-blue-900">Progres Dokumen Magang</h3>
                                    <p class="text-xs text-blue-900 mt-1">Kelengkapan dokumen yang diperlukan untuk magang</p>

                                    <!-- Bar Progres -->
                                    <div class="mt-3">
                                        <div class="text-xs font-medium text-blue-900">Progres: 60%</div>
                                        <div class="w-full bg-white/30 rounded-full h-2.5 mt-1">
                                            <div class="bg-blue-900 h-2.5 rounded-full" style="width: 60%"></div>
                                        </div>
                                    </div>

                                    <!-- Daftar Dokumen -->
                                    <div class="mt-4 space-y-2">
                                        <div class="flex items-center group">
                                            <div
                                                class="h-4 w-4 rounded-full bg-blue-900 flex items-center justify-center flex-shrink-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-white"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7" />
                                                </svg>
                                            </div>
                                            <label
                                                class="ml-3 text-sm text-gray-700 group-hover:text-gray-900 transition-colors">Curriculum
                                                Vitae
                                                (CV)</label>
                                        </div>
                                        <div class="flex items-center group">
                                            <div
                                                class="h-4 w-4 rounded-full bg-blue-900 flex items-center justify-center flex-shrink-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-white"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7" />
                                                </svg>
                                            </div>
                                            <label
                                                class="ml-3 text-sm text-gray-700 group-hover:text-gray-900 transition-colors">Surat
                                                Lamaran</label>
                                        </div>
                                        <div class="flex items-center group">
                                            <div class="h-4 w-4 rounded-full border border-white/50 flex-shrink-0"></div>
                                            <label class="ml-3 text-sm text-white/50 transition-colors">Portofolio</label>
                                        </div>
                                        <div class="flex items-center group">
                                            <div class="h-4 w-4 rounded-full border border-white/50 flex-shrink-0"></div>
                                            <label class="ml-3 text-sm text-white/50 transition-colors">Transkrip
                                                Nilai</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Skills -->
                        @include('components.ui.user.skills')
                        <!-- Education -->
                        @include('components.ui.user.education')

                        <!-- Contact -->
                        <div class="bg-white border border-gray-200 rounded-2xl p-5 shadow-sm">
                            <h3 class="text-sm font-medium text-gray-500 mb-3">Informasi Kontak</h3>

                            <div class="space-y-3">
                                <div>
                                    <h4 class="text-xs text-gray-500">Email</h4>
                                    <p class="text-sm text-gray-900 font-medium">{{ $mahasiswa->user->email ?? 'Tidak ada data' }}</p>
                                </div>

                                <div>
                                    <h4 class="text-xs text-gray-500">Telepon</h4>
                                    <p class="text-sm text-gray-900 font-medium">{{ $mahasiswa->nomor_telepon ?? 'Tidak ada data' }}</p>
                                </div>

                                <div>
                                    <h4 class="text-xs text-gray-500">Lokasi</h4>
                                    <p class="text-sm text-gray-900 font-medium">{{ $mahasiswa->lokasi ?? 'Tidak ada data' }}</p>
                                </div>

                                <div class="pt-2">
                                    <h4 class="text-xs text-gray-500 mb-2">Profil Sosial Media</h4>
                                    <div class="flex space-x-3">
                                        @if($mahasiswa->linkedin)
                                        <a href="{{ $mahasiswa->linkedin }}" target="_blank" class="text-gray-500 hover:text-blue-900">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                                            </svg>
                                        </a>
                                        @endif
                                        
                                        @if($mahasiswa->twitter)
                                        <a href="{{ $mahasiswa->twitter }}" target="_blank" class="text-gray-500 hover:text-blue-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                                            </svg>
                                        </a>
                                        @endif
                                        
                                        @if($mahasiswa->github)
                                        <a href="{{ $mahasiswa->github }}" target="_blank" class="text-gray-500 hover:text-gray-900">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.166-1.26-.126-1.732-.126-1.732 1.273-.465 2.6 1.491 2.6 1.491.892 1.533 2.341 1.089 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026.799-.223 1.654-.333 2.504-.337.85.004 1.705.114 2.504.337 1.909-1.296 2.747-1.026 2.747-1.026.546 1.378.202 2.397.1 2.65.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.801.482 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                                            </svg>
                                        </a>
                                        @endif
                                        
                                        @if($mahasiswa->instagram)
                                        <a href="{{ $mahasiswa->instagram }}" target="_blank" class="text-gray-500 hover:text-pink-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                            </svg>
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript for Tab Switching -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tabs = document.querySelectorAll('.tab-button');
            const contents = document.querySelectorAll('.tab-content');

            tabs.forEach(tab => {
                tab.addEventListener('click', function () {
                    // Remove active class from all tabs
                    tabs.forEach(t => {
                        t.classList.remove('border-blue-900', 'text-blue-900', 'active');
                        t.classList.add('border-transparent', 'text-gray-500', 'hover:text-gray-700', 'hover:border-gray-300');
                    });

                    // Add active class to clicked tab
                    tab.classList.add('border-blue-900', 'text-blue-900', 'active');
                    tab.classList.remove('border-transparent', 'text-gray-500', 'hover:text-gray-700', 'hover:border-gray-300');

                    // Hide all content
                    contents.forEach(content => {
                        content.classList.add('hidden');
                    });

                    // Show selected content
                    const targetContent = document.getElementById(`${tab.dataset.tab}-content`);
                    if (targetContent) {
                        targetContent.classList.remove('hidden');
                    }
                });
            });
        });
    </script>
@endsection