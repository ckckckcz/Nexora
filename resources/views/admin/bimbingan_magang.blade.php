@extends('layouts.admin')
@section('admin')
    <div class="min-h-screen bg-gray-50 p-4 sm:p-6 lg:p-8">
        <header class="mb-8">
            <h1 class="text-3xl font-bold text-blue-900">Manajemen Bimbingan Magang 📝</h1>
            <p class="mt-2 text-gray-600 font-medium">Kelola data bimbingan magang</p>
        </header>

        <section class="bg-white rounded-xl shadow-md">
            <div class="p-4 sm:p-6 flex flex-col gap-4">
                <div class="flex flex-col lg:flex-row sm:items-left sm:justify-between gap-4">
                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:flex-wrap flex-grow">
                        <!-- Search Input -->
                        <div class="relative flex-grow max-w-full sm:max-w-md">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400" id="search-icon"></i>
                            </div>
                            <input type="text" id="search-input"
                                class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm"
                                placeholder="Cari berdasarkan Nama Mahasiswa atau Nama Dosen" />
                        </div>

                        <!-- Filter Dropdown for Status Bimbingan -->
                        <div class="relative w-full sm:w-auto">
                            <button id="status-filter-btn"
                                class="flex items-center gap-2 px-4 py-2 border border-gray-300 rounded-lg bg-white hover:bg-gray-50 focus:outline-none w-full sm:w-auto text-sm">
                                <i class="fas fa-filter text-gray-500" id="filter-icon"></i>
                                <span id="status-filter-text">Semua Status</span>
                                <i class="fas fa-chevron-down text-gray-300" id="status-chevron"></i>
                            </button>
                            <div id="status-dropdown"
                                class="absolute z-10 mt-1 w-full sm:w-48 bg-white rounded-lg shadow-lg border border-gray-200 hidden">
                                <ul class="py-1">
                                    <li><button
                                            class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 text-gray-700"
                                            data-status="Semua">Semua Status</button></li>
                                    <li><button
                                            class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 text-gray-700"
                                            data-status="aktif">Aktif</button></li>
                                    <li><button
                                            class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 text-gray-700"
                                            data-status="selesai">Selesai</button></li>
                                    <li><button
                                            class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 text-gray-700"
                                            data-status="tidak_selesai">Tidak Selesai</button></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Add Bimbingan Magang Button -->
                    <a href="/admin/manajemen-bimbingan-magang/tambah">
                        <button id="add-bimbingan-btn"
                            class="inline-flex items-center px-4 py-2 bg-blue-900 text-white rounded-lg hover:bg-blue-950 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors text-sm w-full sm:w-auto">
                            <i class="fas fa-plus mr-2"></i>
                            <span>Tambah Bimbingan Magang</span>
                        </button>
                    </a>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID Bimbingan
                                </th>
                                <th scope="col"
                                    class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nama Mahasiswa
                                </th>
                                <th scope="col"
                                    class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden sm:table-cell">
                                    Nama Dosen
                                </th>
                                <th scope="col"
                                    class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">
                                    Nama Perusahaan
                                </th>
                                <th scope="col"
                                    class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden lg:table-cell">
                                    Status Bimbingan
                                </th>
                                <th scope="col"
                                    class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody id="bimbingan-table-body" class="bg-white divide-y divide-gray-200">
                            <?php
                            // Data dummy untuk bimbingan magang
                            $bimbingans = [
                                (object) [
                                    'id_bimbingan' => 1,
                                    'mahasiswa' => (object) ['nama' => 'Budi Santoso'],
                                    'dosen' => (object) ['nama' => 'Dr. Ahmad Yani'],
                                    'lowonganMagang' => (object) ['nama_perusahaan' => 'PT Teknologi Maju'],
                                    'status_bimbingan' => 'aktif',
                                    'created_at' => '2025-05-11 08:00:00',
                                    'updated_at' => '2025-05-16 14:30:00',
                                ],
                                (object) [
                                    'id_bimbingan' => 2,
                                    'mahasiswa' => (object) ['nama' => 'Siti Aminah'],
                                    'dosen' => (object) ['nama' => 'Prof. Maria Ulfa'],
                                    'lowonganMagang' => (object) ['nama_perusahaan' => 'CV Inovasi Digital'],
                                    'status_bimbingan' => 'selesai',
                                    'created_at' => '2025-05-01 09:15:00',
                                    'updated_at' => '2025-05-06 11:45:00',
                                ],
                                (object) [
                                    'id_bimbingan' => 3,
                                    'mahasiswa' => (object) ['nama' => 'Rudi Hartono'],
                                    'dosen' => (object) ['nama' => 'Dr. Susanto Raharjo'],
                                    'lowonganMagang' => (object) ['nama_perusahaan' => 'PT Solusi Bersama'],
                                    'status_bimbingan' => 'tidak_selesai',
                                    'created_at' => '2025-05-13 10:20:00',
                                    'updated_at' => '2025-05-18 16:10:00',
                                ],
                            ];
                            ?>
                            @foreach ($bimbingans as $bimbingan)
                                <tr>
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $bimbingan->id_bimbingan }}</td>
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $bimbingan->mahasiswa->nama }}</td>
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900 hidden sm:table-cell">{{ $bimbingan->dosen->nama }}</td>
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900 hidden md:table-cell">{{ $bimbingan->lowonganMagang->nama_perusahaan }}</td>
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm hidden lg:table-cell">
                                        <span class="@if($bimbingan->status_bimbingan == 'selesai') bg-green-100 text-green-800 @elseif($bimbingan->status_bimbingan == 'aktif') bg-yellow-100 text-yellow-800 @else bg-red-100 text-red-800 @endif rounded-full px-2 py-1 text-xs font-medium">
                                            {{ ucfirst($bimbingan->status_bimbingan) }}
                                        </span>
                                    </td>
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="/admin/manajemen-bimbingan-magang/edit/{{ $bimbingan->id_bimbingan }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                                        <form action="/admin/manajemen-bimbingan-magang/hapus/{{ $bimbingan->id_bimbingan }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 ml-4">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div
                    class="px-4 sm:px-6 py-4 bg-white border-t border-gray-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div class="flex-1 flex justify-between sm:hidden">
                        <button
                            class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Sebelumnya</button>
                        <button
                            class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Selanjutnya</button>
                    </div>
                    <div class="sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-gray-700">
                                Menampilkan <span id="start-index" class="font-medium">1</span> sampai <span id="end-index"
                                    class="font-medium">{{ count($bimbingans) }}</span> dari <span id="total-bimbingan" class="font-medium">{{ count($bimbingans) }}</span>
                                data
                            </p>
                        </div>
                        <div>
                            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                <button
                                    class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                    <span class="sr-only">Previous</span>
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor" aria-hidden="true">
                                        <path fillRule="evenodd"
                                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                            clipRule="evenodd" />
                                    </svg>
                                </button>
                                <button aria-current="page"
                                    class="z-10 bg-blue-50 border-blue-500 text-blue-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">1</button>
                                <button
                                    class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                    <span class="sr-only">Next</span>
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 20 20"
                                        fill="currentColor" aria-hidden="true">
                                        <path fillRule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clipRule="evenodd" />
                                    </svg>
                                </button>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection