@extends('layouts.admin')
@section('admin')
    <div class="min-h-screen bg-gray-50 p-4 sm:p-6 lg:p-8">
        <header class="mb-8">
            <h1 class="text-3xl font-bold text-blue-900">Detail Perhitungan SPK 💪🏽</h1>
            <p class="mt-2 text-gray-600 font-medium">Menghitung Perankingan dengan Metode WMSC dan Vikor</p>
        </header>

        <section class="bg-white rounded-2xl border border-gray-200 p-4 sm:p-6">
            
            <div class="mb-8">
                <p><strong>Keahlian:</strong> {{ implode(', ', $data['keahlian']) }}</p>
                <p><strong>Fasilitas:</strong> {{ implode(', ', $data['fasilitas']) }}</p>
                <p><strong>Status Gaji:</strong> {{ $data['status_gaji'] }}</p>
                <p><strong>Tipe Perusahaan:</strong> {{ $data['tipe_perusahaan'] }}</p>
                <p><strong>Fleksibilitas Kerja:</strong> {{ $data['fleksibilitas_kerja'] }}</p>
            </div>

            <!-- Table for Kriteria -->
            <h2 class="text-xl font-bold text-gray-800 mb-4">Kriteria</h2>
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

            <!-- Table for Matriks -->
            <h2 class="text-xl font-bold text-gray-800 mb-4">Matriks Perbandingan WMSC</h2>
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

            <div class="flex">
                <!-- Table for Best Values -->
                <div class="w-1/2">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Nilai MAX Min Setiap Kriteria di WMSC</h2>
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

            <!-- Table for Matriks Normalisasi -->
            <h2 class="text-xl font-bold text-gray-800 mb-4">Matriks Normalisasi WMSC</h2>
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

            <!-- Perhitungan Score WMSC -->
            <h2 class="text-xl font-bold text-gray-800 mb-4">Score Akhir WMSC</h2>
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

            <h2 class="text-xl font-bold text-gray-800 mb-4">Filter Score >= 0.030 untuk di Proses Vikor</h2>
            <h2 class="text-xl font-bold text-gray-800 mb-4">Matriks Perbandingan Vikor</h2>
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

            <div class="flex">
                <!-- Table for Best Values -->
                <div class="w-1/2">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Nilai MAX Min Setiap Kriteria di Vikor</h2>
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

            <h2 class="text-xl font-bold text-gray-800 mb-4">Matriks Normalisasi Vikor</h2>
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

            <!-- Table for Ranked Alternatives -->
            <h2 class="text-xl font-bold text-gray-800 mb-4">Menghitung Nilai S R dan Q</h2>
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
            
            <!-- Output Section -->
            <h2 class="text-xl font-bold text-gray-800 mb-4">Final Output</h2>
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
        </section>
    </div>
@endsection
