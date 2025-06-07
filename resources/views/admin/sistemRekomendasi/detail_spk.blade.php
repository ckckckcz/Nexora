@extends('layouts.admin')
@section('admin')
    <div class="min-h-screen bg-gray-50 p-4 sm:p-6 lg:p-8">
        <header class="mb-8">
            <h1 class="text-3xl font-bold text-blue-900">Manajemen Pembobotan Lowongan 💪🏽</h1>
            <p class="mt-2 text-gray-600 font-medium">Kelola data Pembobotan lowongan</p>
        </header>

        <section class="bg-white rounded-2xl border border-gray-200 p-4 sm:p-6">
            <!-- Table for Kriteria -->
            <h2 class="text-xl font-bold text-gray-800 mb-4">Kriteria</h2>
            <table class="min-w-full divide-y divide-gray-200 mb-8">
                <thead class="bg-gray-50"></thead>
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Kriteria</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tipe</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($kriteria as $k)
                        <tr>
                            <td class="px-4 py-4 text-sm text-gray-900">{{ $k->id_kriteria }}</td>
                            <td class="px-4 py-4 text-sm text-gray-900">{{ $k->nama_kriteria }}</td>
                            <td class="px-4 py-4 text-sm text-gray-900">{{ $k->tipe }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Table for Ranked Alternatives -->
            <h2 class="text-xl font-bold text-gray-800 mb-4">Ranked Alternatives</h2>
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

            <!-- Table for Matriks -->
            <h2 class="text-xl font-bold text-gray-800 mb-4">Matriks</h2>
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
                    @foreach ($matriks as $row)
                        <tr>
                            <td class="px-4 py-4 text-sm text-gray-900">{{ $row['nama_perusahaan'] ?? 'Unknown' }}</td>
                            @foreach ($kriteria as $k)
                                <td class="px-4 py-4 text-sm text-gray-900">{{ $row[$k->id_kriteria] ?? '-' }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Table for Best Values -->
            <h2 class="text-xl font-bold text-gray-800 mb-4">Best Values</h2>
            <table class="min-w-full divide-y divide-gray-200 mb-8">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kriteria</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Best Value</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($bestValues as $kriteriaId => $value)
                        <tr>
                            <td class="px-4 py-4 text-sm text-gray-900">{{ $kriteriaId }}</td>
                            <td class="px-4 py-4 text-sm text-gray-900">{{ $value }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="px-4 py-4 text-sm text-gray-500 text-center">No data available</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Table for Worst Values -->
            <h2 class="text-xl font-bold text-gray-800 mb-4">Worst Values</h2>
            <table class="min-w-full divide-y divide-gray-200 mb-8">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kriteria</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Worst Value</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($worstValues as $kriteriaId => $value)
                        <tr>
                            <td class="px-4 py-4 text-sm text-gray-900">{{ $kriteriaId }}</td>
                            <td class="px-4 py-4 text-sm text-gray-900">{{ $value }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="px-4 py-4 text-sm text-gray-500 text-center">No data available</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Table for Matriks Normalisasi -->
            <h2 class="text-xl font-bold text-gray-800 mb-4">Matriks Normalisasi</h2>
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
                    @forelse ($matriksNormalisasi as $row)
                        <tr>
                            <td class="px-4 py-4 text-sm text-gray-900">{{ $row['nama_perusahaan'] ?? 'Unknown' }}</td>
                            @foreach ($kriteria as $k)
                                <td class="px-4 py-4 text-sm text-gray-900">{{ $row[$k->id_kriteria] ?? '-' }}</td>
                            @endforeach
                        </tr>
                    @empty
                        <tr>
                            <td colspan="{{ count($kriteria) + 1 }}" class="px-4 py-4 text-sm text-gray-500 text-center">No data
                                available</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Table for Matriks Terbobot -->
            <h2 class="text-xl font-bold text-gray-800 mb-4">Matriks Terbobot</h2>
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
                    @foreach ($matriksTerbobot as $row)
                        <tr>
                            <td class="px-4 py-4 text-sm text-gray-900">{{ $row['nama_perusahaan'] ?? 'Unknown' }}</td>
                            @foreach ($kriteria as $k)
                                <td class="px-4 py-4 text-sm text-gray-900">{{ $row[$k->id_kriteria] ?? '-' }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Table for S Values -->
            <h2 class="text-xl font-bold text-gray-800 mb-4">S Values</h2>
            <table class="min-w-full divide-y divide-gray-200 mb-8">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Perusahaan</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">S</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($rankedAlternatives as $alt)
                        <tr>
                            <td class="px-4 py-4 text-sm text-gray-900">{{ $alt['nama_perusahaan'] ?? 'Unknown' }}</td>
                            <td class="px-4 py-4 text-sm text-gray-900">{{ $alt['s'] ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Table for R Values -->
            <h2 class="text-xl font-bold text-gray-800 mb-4">R Values</h2>
            <table class="min-w-full divide-y divide-gray-200 mb-8">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Perusahaan</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">R</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($rankedAlternatives as $alt)
                        <tr>
                            <td class="px-4 py-4 text-sm text-gray-900">{{ $alt['nama_perusahaan'] ?? 'Unknown' }}</td>
                            <td class="px-4 py-4 text-sm text-gray-900">{{ $alt['r'] ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Table for Q Values -->
            <h2 class="text-xl font-bold text-gray-800 mb-4">Q Values</h2>
            <table class="min-w-full divide-y divide-gray-200 mb-8">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Perusahaan</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Q</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($rankedAlternatives as $alt)
                        <tr>
                            <td class="px-4 py-4 text-sm text-gray-900">{{ $alt['nama_perusahaan'] ?? 'Unknown' }}</td>
                            <td class="px-4 py-4 text-sm text-gray-900">{{ $alt['q'] ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Output Section -->
            <h2 class="text-xl font-bold text-gray-800 mb-4">Final Output</h2>
            <table class="min-w-full table-auto text-sm text-gray-800">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID Lowongan</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">WMSC</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">QI</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Ranking</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($output as $row)
                        <tr>
                            <td class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ $row['id_lowongan'] }}</td>
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