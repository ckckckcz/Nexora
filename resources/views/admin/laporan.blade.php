@extends('layouts.admin')
@section('admin')
    <div class="min-h-screen bg-gray-50 p-4 sm:p-6 lg:p-8">
        <header class="mb-8">
            <h1 class="text-3xl font-bold text-blue-900">Manajemen Laporan Magang 🕰️</h1>
            <p class="mt-2 text-gray-600 font-medium">Kelola data laporan magang</p>
        </header>

        <section class="bg-white rounded-2xl border border-gray-200">
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
                                placeholder="Cari berdasarkan Nama Laporan Magang" />
                        </div>

                        <!-- Filter Dropdown for Internship Reports -->
                        <div class="relative w-full sm:w-auto">
                            <button id="report-filter-btn"
                                class="flex items-center gap-2 px-4 py-2 border border-gray-300 rounded-lg bg-white hover:bg-gray-50 focus:outline-none w-full sm:w-auto text-sm">
                                <i class="fas fa-filter text-gray-500" id="filter-icon"></i>
                                <span id="report-filter-text">Semua Laporan</span>
                                <i class="fas fa-chevron-down text-gray-300" id="report-chevron"></i>
                            </button>
                            <div id="report-dropdown"
                                class="absolute z-10 mt-1 w-full sm:w-56 bg-white rounded-lg shadow-lg border border-gray-200 hidden">
                                <ul class="py-1 max-h-60 overflow-auto">
                                    <li><button
                                            class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 text-gray-700"
                                            data-report="Semua Laporan">Semua Laporan</button></li>
                                    <li><button
                                            class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 text-gray-700"
                                            data-report="PKL 3 Bulan">PKL 3 Bulan</button></li>
                                    <li><button
                                            class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 text-gray-700"
                                            data-report="MBKM - Mandiri 6 Bulan">MBKM - Mandiri 6 Bulan</button></li>
                                    <li><button
                                            class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 text-gray-700"
                                            data-report="MBKM - MSIB 6 Bulan">MBKM - MSIB 6 Bulan</button></li>
                                    <li><button
                                            class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 text-gray-700"
                                            data-report="MBKM - Kewirausahaan">MBKM - Kewirausahaan</button></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-2">
                        <button onclick="exportToPDF()"
                            class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors text-sm w-full sm:w-auto">
                            <i class="fas fa-file-pdf mr-2"></i>
                            <span>Ekspor PDF</span>
                        </button>
                        <button onclick="exportToExcel()"
                            class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors text-sm w-full sm:w-auto">
                            <i class="fas fa-file-excel mr-2"></i>
                            <span>Ekspor Excel</span>
                        </button>
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID Laporan
                                </th>
                                <th scope="col"
                                    class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nama Laporan
                                </th>
                                <th scope="col"
                                    class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden sm:table-cell">
                                    Tanggal Mulai
                                </th>
                                <th scope="col"
                                    class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">
                                    Tanggal Selesai
                                </th>
                                <th scope="col"
                                    class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody id="table-body" class="bg-white divide-y divide-gray-200">
                            <?php
                                // Data dummy untuk laporan magang
                                $reports = [
                                    (object) [
                                        'id_laporan' => 1,
                                        'nama_laporan' => 'PKL 3 Bulan',
                                        'tanggal_mulai' => '2025-06-01',
                                        'tanggal_selesai' => '2025-08-31',
                                    ],
                                    (object) [
                                        'id_laporan' => 2,
                                        'nama_laporan' => 'MBKM - Mandiri 6 Bulan',
                                        'tanggal_mulai' => '2025-07-01',
                                        'tanggal_selesai' => '2025-12-31',
                                    ],
                                    (object) [
                                        'id_laporan' => 3,
                                        'nama_laporan' => 'MBKM - MSIB 6 Bulan',
                                        'tanggal_mulai' => '2025-08-01',
                                        'tanggal_selesai' => '2026-01-31',
                                    ],
                                    (object) [
                                        'id_laporan' => 4,
                                        'nama_laporan' => 'MBKM - Kewirausahaan',
                                        'tanggal_mulai' => '2025-09-01',
                                        'tanggal_selesai' => '2026-02-28',
                                    ],
                                ];
                                ?>
                            @foreach ($reports as $report)
                                <tr>
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $report->id_laporan }}</td>
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $report->nama_laporan }}</td>
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900 hidden sm:table-cell">
                                        {{ date('d-m-Y', strtotime($report->tanggal_mulai)) }}</td>
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900 hidden md:table-cell">
                                        {{ date('d-m-Y', strtotime($report->tanggal_selesai)) }}</td>
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="/admin/manajemen-laporan-magang/edit/{{ $report->id_laporan }}"
                                            class="inline-flex items-center px-3 py-1.5 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200 transition-colors duration-200">Edit</a>
                                        <form action="/admin/manajemen-laporan-magang/hapus/{{ $report->id_laporan }}"
                                            method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center px-3 py-1.5 bg-red-100 text-red-700 rounded-md hover:bg-red-200 transition-colors duration-200"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
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
                                    class="font-medium">{{ count($reports) }}</span> dari <span id="total-report"
                                    class="font-medium">{{ count($reports) }}</span>
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
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
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

    <script>
        function exportToPDF() {
            window.location.href = '/admin/manajemen-laporan-magang/export/pdf';
        }

        function exportToExcel() {
            window.location.href = '/admin/manajemen-laporan-magang/export/excel';
        }
    </script>
@endsection