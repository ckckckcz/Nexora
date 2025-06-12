@extends('layouts.admin')
@section('admin')
    <div class="min-h-screen bg-gray-50 p-4 sm:p-6 lg:p-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-blue-900">Selamat Datang Kembali Admin ! 🧑🏽‍💻</h1>
            <p class="mt-1 text-gray-600 font-medium">Dashboard Monitoring & Statistik Sistem Magang</p>
        </div>

        <main>
            <!-- Main Stat Cards -->
            <div id="statCardsRef" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                <!-- Total Mahasiswa Magang -->
                <div class="bg-white overflow-hidden shadow-lg rounded-xl transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-blue-900 rounded-xl p-4">
                                <svg class="h-6 w-6 text-[#DEFC79]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 14l9-5-9-5-9 5 9 5z M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Total Mahasiswa Magang</dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl font-bold text-blue-900" data-stat="totalInternStudents">{{ $totalMahasiswaMagang }}</div>
                                        <div class="ml-2 flex items-baseline text-sm font-semibold text-green-600">
                                            <svg class="self-center flex-shrink-0 h-3 w-3 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="sr-only">Meningkat</span>
                                            {{ $pertumbuhanMagang }}%
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Mahasiswa -->
                <div class="bg-white overflow-hidden shadow-lg rounded-xl transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-blue-900 rounded-xl p-4">
                                <svg class="h-6 w-6 text-[#DEFC79]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Total Mahasiswa</dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl font-bold text-blue-900" data-stat="totalStudents">{{ number_format($totalMahasiswa) }}</div>
                                        <div class="ml-2 flex items-baseline text-sm font-semibold text-blue-600">
                                            <span class="text-gray-500">Aktif</span>
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Lowongan Magang -->
                <div class="bg-white overflow-hidden shadow-lg rounded-xl transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-blue-900 rounded-xl p-4">
                                <svg class="h-6 w-6 text-[#DEFC79]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Total Lowongan Magang</dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl font-bold text-blue-900" data-stat="totalVacancies">{{ $totalLowongan }}</div>
                                        <div class="ml-2 flex items-baseline text-sm font-semibold text-green-600">
                                            <span class="text-gray-500">Aktif</span>
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Dosen Pembimbing -->
                <div class="bg-white overflow-hidden shadow-lg rounded-xl transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-blue-900 rounded-xl p-4">
                                <svg class="h-6 w-6 text-[#DEFC79]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Dosen Pembimbing</dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl font-bold text-blue-900" data-stat="totalSupervisors">{{ $totalDosen }}</div>
                                        <div class="ml-2 flex items-baseline text-sm font-semibold text-blue-600">
                                            <span class="text-gray-500">Aktif</span>
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Monitoring dan Statistik Section -->
            <div class="mt-12">
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-blue-900">📊 Monitoring dan Statistik</h2>
                    <p class="mt-1 text-gray-600">Analisis komprehensif sistem magang dan efektivitas rekomendasi</p>
                </div>

                <!-- Statistics Cards Grid -->
                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-8">
                    <!-- Statistik Mahasiswa Mendapat Magang -->
                    <div class="bg-white shadow-lg rounded-xl p-6 transition-all duration-300 hover:shadow-xl">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold text-blue-900">Statistik Magang</h3>
                            <div class="p-2 bg-blue-100 rounded-lg">
                                <svg class="h-5 w-5 text-blue-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                            </div>
                        </div>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Sudah Magang</span>
                                <span class="text-sm font-semibold text-green-600">{{ $statistikMagang['sudah_magang'] }} ({{ $statistikMagang['persentase_sudah'] }}%)</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-green-500 h-2 rounded-full" style="width: {{ $statistikMagang['persentase_sudah'] }}%;"></div>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Sedang Mencari</span>
                                <span class="text-sm font-semibold text-yellow-600">{{ $statistikMagang['sedang_mencari'] }} ({{ $statistikMagang['persentase_mencari'] }}%)</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-yellow-500 h-2 rounded-full" style="width: {{ $statistikMagang['persentase_mencari'] }}%;"></div>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Belum Mulai</span>
                                <span class="text-sm font-semibold text-gray-600">{{ $statistikMagang['belum_mulai'] }} ({{ $statistikMagang['persentase_belum'] }}%)</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-gray-500 h-2 rounded-full" style="width: {{ $statistikMagang['persentase_belum'] }}%;"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Rasio Dosen Pembimbing -->
                    <div class="bg-white shadow-lg rounded-xl p-6 transition-all duration-300 hover:shadow-xl">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold text-blue-900">Rasio Pembimbingan</h3>
                            <div class="p-2 bg-blue-100 rounded-lg">
                                <svg class="h-5 w-5 text-blue-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                                </svg>
                            </div>
                        </div>
                        <div class="text-center mb-4">
                            <div class="text-3xl font-bold text-blue-900">{{ $rasio }}:1</div>
                            <div class="text-sm text-gray-600">Mahasiswa per Dosen</div>
                        </div>
                        <div class="space-y-2">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Optimal (≤ 5:1)</span>
                                <span class="text-green-600">{{ $distribusiBeban['optimal'] }} Dosen</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Normal (6-8:1)</span>
                                <span class="text-yellow-600">{{ $distribusiBeban['normal'] }} Dosen</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Overload (≥ 9:1)</span>
                                <span class="text-red-600">{{ $distribusiBeban['overload'] }} Dosen</span>
                            </div>
                        </div>
                    </div>

                    <!-- Efektivitas Sistem Rekomendasi -->
                </div>

                <!-- Charts Section -->
                {{-- <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-8">
                    <!-- Tren Peminatan Industri -->
                    <div class="bg-white shadow-lg rounded-xl p-6 transition-all duration-300 hover:shadow-xl">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-xl font-bold text-blue-900">Tren Peminatan Bidang Industri</h3>
                            <div class="flex items-center space-x-2">
                                <button class="text-sm text-gray-500 hover:text-blue-900 transition-colors">6 Bulan</button>
                                <span class="text-gray-300">|</span>
                                <button class="text-sm font-medium text-blue-900 border-b-2 border-[#DEFC79]">1 Tahun</button>
                            </div>
                        </div>
                        <div class="space-y-4">
                            @foreach($trenIndustri as $industri)
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="w-3 h-3 rounded-full mr-3" style="background-color: {{ $industri['color'] }}"></div>
                                    <span class="text-sm font-medium">{{ $industri['nama'] }}</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="text-sm text-gray-600 mr-2">{{ $industri['persentase'] }}%</span>
                                    <div class="w-20 bg-gray-200 rounded-full h-2">
                                        <div class="h-2 rounded-full" style="width: {{ $industri['persentase'] }}%; background-color: {{ $industri['color'] }}"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Statistik Dosen Pembimbing -->
                    <div class="bg-white shadow-lg rounded-xl p-6 transition-all duration-300 hover:shadow-xl">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-xl font-bold text-blue-900">Distribusi Dosen Pembimbing</h3>
                            <div class="text-sm text-gray-500">Per Fakultas</div>
                        </div>
                        <div class="space-y-4">
                            @foreach($distribusiFakultas as $fakultas)
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="font-medium text-blue-900">{{ $fakultas['nama'] }}</span>
                                    <span class="text-sm font-semibold">{{ $fakultas['jumlah_dosen'] }} Dosen</span>
                                </div>
                                <div class="flex justify-between text-sm text-gray-600 mb-2">
                                    <span>Membimbing: {{ $fakultas['jumlah_mahasiswa'] }} mahasiswa</span>
                                    <span>Rasio: {{ $fakultas['rasio'] }}:1</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="h-2 rounded-full" style="width: {{ $fakultas['persentase'] }}%; background-color: {{ $fakultas['color'] }}"></div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Chart Aplikasi Magang -->
                <div class="bg-white shadow-lg rounded-xl p-6 transition-all duration-300 hover:shadow-xl mb-8">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-bold text-blue-900">Tren Aplikasi Magang & Efektivitas Sistem</h3>
                        <div class="flex items-center space-x-2">
                            <button class="text-sm text-gray-500 hover:text-blue-900 transition-colors">Bulanan</button>
                            <span class="text-gray-300">|</span>
                            <button class="text-sm font-medium text-blue-900 border-b-2 border-[#DEFC79]">Tahunan</button>
                        </div>
                    </div>
                    <div class="relative h-80">
                        <canvas id="chartRef" height="320"></canvas>
                    </div>
                    <script>
                        // Pass PHP data to JavaScript for chart
                        const chartData = @json($chartData);
                    </script>
                </div> --}}
            </div>
        </main>
    </div>
@endsection