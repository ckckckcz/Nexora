@extends('layouts.admin')
@section('admin')
    <div class="min-h-screen bg-gray-50 p-4 sm:p-6 lg:p-8">
        <header class="mb-8">
            <h1 class="text-3xl font-bold text-blue-900">Detail Perhitungan SPK 💪🏽</h1>
            <p class="mt-2 text-gray-600 font-medium">Menghitung Perankingan dengan Metode WMSC dan Vikor</p>
        </header>

        <section class="bg-white rounded-2xl border border-gray-200 p-4 sm:p-6 space-y-6">
            <!-- Input Parameters -->
            <div x-data="{ open: false }" class="border rounded-lg overflow-hidden">
                <button @click="open = !open" class="w-full px-4 py-3 flex justify-between items-center bg-gray-50 hover:bg-gray-100">
                    <h2 class="text-lg font-semibold text-gray-800">Parameter Input</h2>
                    <svg :class="{'rotate-180': open}" class="w-5 h-5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition class="p-4">
                    <p><strong>Keahlian:</strong> {{ implode(', ', $data['keahlian']) }}</p>
                    <p><strong>Fasilitas:</strong> {{ implode(', ', $data['fasilitas']) }}</p>
                    <p><strong>Status Gaji:</strong> {{ $data['status_gaji'] }}</p>
                    <p><strong>Tipe Perusahaan:</strong> {{ $data['tipe_perusahaan'] }}</p>
                    <p><strong>Fleksibilitas Kerja:</strong> {{ $data['fleksibilitas_kerja'] }}</p>
                </div>
            </div>

            <!-- Kriteria Table -->
            <div x-data="{ open: false }" class="border rounded-lg overflow-hidden">
                <button @click="open = !open" class="w-full px-4 py-3 flex justify-between items-center bg-gray-50 hover:bg-gray-100">
                    <h2 class="text-lg font-semibold text-gray-800">Kriteria</h2>
                    <svg :class="{'rotate-180': open}" class="w-5 h-5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition class="overflow-x-auto">
                    <!-- Table for Kriteria -->
                    <table class="min-w-full divide-y divide-gray-200 mb-8">
                        <thead class="bg-gray-50"></thead>
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Kriteria</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tipe</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($kriteria as $k)
                                <tr>
                                    <td class="px-4 py-4 text-sm text-gray-900">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-4 text-sm text-gray-900">{{ ucwords($k->nama_kriteria) }}</td>
                                    <td class="px-4 py-4 text-sm text-gray-900">{{ $k->tipe }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- WMSC Section -->
            <div x-data="{ open: false }" class="border rounded-lg overflow-hidden">
                <button @click="open = !open" class="w-full px-4 py-3 flex justify-between items-center bg-gray-50 hover:bg-gray-100">
                    <h2 class="text-lg font-semibold text-gray-800">Matriks Perbandingan WMSC</h2>
                    <svg :class="{'rotate-180': open}" class="w-5 h-5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition class="overflow-x-auto">
                    <!-- Table for Matriks -->
                    <table class="min-w-full divide-y divide-gray-200 mb-8">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Perusahaan</th>
                                @foreach ($kriteria as $k)
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ $k->nama_kriteria }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($matriksPerbandingan as $companyName => $rowValues)
                                <tr>
                                    <td class="px-4 py-4 text-sm text-gray-900">{{ $companyName }}</td>
                                    @foreach ($rowValues as $r)
                                        <td class="px-4 py-4 text-sm text-gray-900">{{ $r ?? '-' }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- WMSC Max Min Values -->
            <div x-data="{ open: false }" class="border rounded-lg overflow-hidden">
                <button @click="open = !open" class="w-full px-4 py-3 flex justify-between items-center bg-gray-50 hover:bg-gray-100">
                    <h2 class="text-lg font-semibold text-gray-800">Nilai MAX Min Setiap Kriteria di WMSC</h2>
                    <svg :class="{'rotate-180': open}" class="w-5 h-5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition class="overflow-x-auto">
                    <!-- Table for Best Values -->
                    <table class="min-w-full divide-y divide-gray-200 mb-8">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kriteria</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nilai MAX</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nilai MIN</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($maxMinKriteria as $kriteriaId => $value)
                            <tr>
                                <td class="px-4 py-4 text-sm text-gray-900">{{ ucwords($kriteriaId) }}</td>
                                <td class="px-4 py-4 text-sm text-gray-900">{{ $value[0] }}</td>
                                <td class="px-4 py-4 text-sm text-gray-900">{{ $value[1] }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="2" class="px-4 py-4 text-sm text-gray-500 text-center">No data available</td>
                            </tr>
                            @endforelse
                            </tbody>
                    </table>
                </div>
            </div>

            <!-- WMSC Normalization -->
            <div x-data="{ open: false }" class="border rounded-lg overflow-hidden">
                <button @click="open = !open" class="w-full px-4 py-3 flex justify-between items-center bg-gray-50 hover:bg-gray-100">
                    <h2 class="text-lg font-semibold text-gray-800">Matriks Normalisasi WMSC</h2>
                    <svg :class="{'rotate-180': open}" class="w-5 h-5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition class="overflow-x-auto">
                    <!-- Table for Matriks Normalisasi -->
                    <table class="min-w-full divide-y divide-gray-200 mb-8">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Perusahaan</th>
                                @foreach ($kriteria as $k)
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ $k->nama_kriteria }}
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($matriksNormalisasiWmsc as $companyName => $rowValues)
                                <tr>
                                    <td class="px-4 py-4 text-sm text-gray-900">{{ $companyName }}</td>
                                    @foreach ($rowValues as $r)
                                        <td class="px-4 py-4 text-sm text-gray-900">{{ $r ?? '-' }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- WMSC Final Score -->
            <div x-data="{ open: false }" class="border rounded-lg overflow-hidden">
                <button @click="open = !open" class="w-full px-4 py-3 flex justify-between items-center bg-gray-50 hover:bg-gray-100">
                    <h2 class="text-lg font-semibold text-gray-800">Score Akhir WMSC</h2>
                    <svg :class="{'rotate-180': open}" class="w-5 h-5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition class="overflow-x-auto">
                    <!-- Perhitungan Score WMSC -->
                    <table class="min-w-full divide-y divide-gray-200 mb-8">
                        <thead class="bg-gray-50">
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($matriksWmscScore as $key => $item)
                                <tr>
                                    <td class="px-4 py-4 text-sm text-gray-900">{{ $key }}</td>
                                    <td class="px-4 py-4 text-sm text-gray-900">{{ $item }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Vikor Matrix -->
            <div x-data="{ open: false }" class="border rounded-lg overflow-hidden">
                <button @click="open = !open" class="w-full px-4 py-3 flex justify-between items-center bg-gray-50 hover:bg-gray-100">
                    <h2 class="text-lg font-semibold text-gray-800">Matriks Perbandingan Vikor</h2>
                    <svg :class="{'rotate-180': open}" class="w-5 h-5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition class="overflow-x-auto">
                    <!-- Table for Matriks Perbandingan Vikor -->
                    <table class="min-w-full divide-y divide-gray-200 mb-8">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Perusahaan</th>
                                @foreach ($kriteria as $k)
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ $k->nama_kriteria }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($matriksPerbandinganVikor as $companyName => $rowValues)
                                <tr>
                                    <td class="px-4 py-4 text-sm text-gray-900">{{ $companyName }}</td>
                                    @foreach ($rowValues as $r)
                                        <td class="px-4 py-4 text-sm text-gray-900">{{ $r ?? '-' }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Vikor Max Min -->
            <div x-data="{ open: false }" class="border rounded-lg overflow-hidden">
                <button @click="open = !open" class="w-full px-4 py-3 flex justify-between items-center bg-gray-50 hover:bg-gray-100">
                    <h2 class="text-lg font-semibold text-gray-800">Nilai MAX Min Setiap Kriteria di Vikor</h2>
                    <svg :class="{'rotate-180': open}" class="w-5 h-5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition class="overflow-x-auto">
                    <!-- Table for Best Values -->
                    <table class="min-w-full divide-y divide-gray-200 mb-8">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kriteria</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nilai MAX</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nilai MIN</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($nilaiMaxMinVikor as $kriteriaId => $value)
                            <tr>
                                <td class="px-4 py-4 text-sm text-gray-900">{{ ucwords($kriteriaId) }}</td>
                                <td class="px-4 py-4 text-sm text-gray-900">{{ $value[0] }}</td>
                                <td class="px-4 py-4 text-sm text-gray-900">{{ $value[1] }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="2" class="px-4 py-4 text-sm text-gray-500 text-center">No data available</td>
                            </tr>
                            @endforelse
                            </tbody>
                    </table>
                </div>
            </div>

            <!-- Vikor Normalization -->
            <div x-data="{ open: false }" class="border rounded-lg overflow-hidden">
                <button @click="open = !open" class="w-full px-4 py-3 flex justify-between items-center bg-gray-50 hover:bg-gray-100">
                    <h2 class="text-lg font-semibold text-gray-800">Matriks Normalisasi Vikor</h2>
                    <svg :class="{'rotate-180': open}" class="w-5 h-5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition class="overflow-x-auto">
                    <!-- Table for Matriks Normalisasi Vikor -->
                    <table class="min-w-full divide-y divide-gray-200 mb-8">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Perusahaan</th>
                                @foreach ($kriteria as $k)
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ $k->nama_kriteria }}
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($matriksNormalisasiVikor as $companyName => $rowValues)
                                <tr>
                                    <td class="px-4 py-4 text-sm text-gray-900">{{ $companyName }}</td>
                                    @foreach ($rowValues as $r)
                                        <td class="px-4 py-4 text-sm text-gray-900">{{ $r ?? '-' }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- S R Q Values -->
            <div x-data="{ open: false }" class="border rounded-lg overflow-hidden">
                <button @click="open = !open" class="w-full px-4 py-3 flex justify-between items-center bg-gray-50 hover:bg-gray-100">
                    <h2 class="text-lg font-semibold text-gray-800">Menghitung Nilai S R dan Q</h2>
                    <svg :class="{'rotate-180': open}" class="w-5 h-5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition class="overflow-x-auto">
                    <!-- Table for Ranked Alternatives -->
                    <table class="min-w-full divide-y divide-gray-200 mb-8">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Perusahaan</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">S</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">R</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Q</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($rankedAlternatives as $alt)
                                <tr>
                                    <td class="px-4 py-4 text-sm text-gray-900">{{ $alt['nama_perusahaan'] }}</td>
                                    <td class="px-4 py-4 text-sm text-gray-900">{{ $alt['s'] ?? '-' }}</td>
                                    <td class="px-4 py-4 text-sm text-gray-900">{{ $alt['r'] ?? '-' }}</td>
                                    <td class="px-4 py-4 text-sm text-gray-900">{{ $alt['q'] ?? '-' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-4 py-4 text-sm text-gray-500 text-center">No data available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Final Output -->
            <div x-data="{ open: true }" class="border rounded-lg overflow-hidden">
                <button @click="open = !open" class="w-full px-4 py-3 flex justify-between items-center bg-gray-50 hover:bg-gray-100">
                    <h2 class="text-lg font-semibold text-gray-800">Final Output</h2>
                    <svg :class="{'rotate-180': open}" class="w-5 h-5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition class="overflow-x-auto">
                    <!-- Table for Final Output -->
                    <table class="min-w-full table-auto text-sm text-gray-800">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">WMSC</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">QI</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Ranking</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($final as $companyName => $row)
                                <tr>
                                    <td class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ $companyName }}</td>
                                    <td class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ $row['wmsc'] }}</td>
                                    <td class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ $row['qi'] }}</td>
                                    <td class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ $row['ranking'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

    @push('scripts')
    <script src="//unpkg.com/alpinejs" defer></script>
    @endpush
@endsection
