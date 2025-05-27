@extends('layouts.admin')
@section('admin')
    <div class="min-h-screen bg-gray-50 p-4 sm:p-6 lg:p-8">
        <header class="mb-8">
            <h1 class="text-3xl font-bold text-blue-900">Manajemen Pengajuan Magang 💼</h1>
            <p class="mt-2 text-gray-600 font-medium">Kelola data pengajuan magang</p>
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
                                placeholder="Cari berdasarkan Nama Perusahaan atau Lokasi" />
                        </div>

                        <!-- Filter Dropdown for Status Lowongan -->
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
                                            data-status="open">Open</button></li>
                                    <li><button
                                            class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 text-gray-700"
                                            data-status="close">Close</button></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Add Lowongan Magang Button -->
                    {{-- <a href="/admin/lowongan-magang/tambah">
                        <button id="add-lowongan-btn"
                            class="inline-flex items-center px-4 py-2 bg-blue-900 text-white rounded-lg hover:bg-blue-950 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors text-sm w-full sm:w-auto">
                            <i class="fas fa-plus mr-2"></i>
                            <span>Tambah Lowongan Magang</span>
                        </button>
                    </a> --}}
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="table-auto w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 text-left">Nama Mahasiswa</th>
                                <th class="px-4 py-2 text-left">Judul Lowongan</th>
                                <th class="px-4 py-2 text-left">Status</th>
                                <th class="px-4 py-2 text-left">Tanggal Pengajuan</th>
                                <th class="px-4 py-2 text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b">
                                <td class="px-4 py-2">MAHASISWA 1</td>
                                <td class="px-4 py-2">PLISS ACC BOS</td>
                                <td class="px-4 py-2">
                                    <span class="bg-yellow-400 text-white px-2 py-1 rounded text-sm">Menunggu</span>
                                </td>
                                <td class="px-4 py-2">20-10-2025</td>
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="/admin/pengajuan-magang/edit" class="text-blue-600 hover:text-blue-900">Edit</a>
                                    <form action="/admin/pengajuan-magang/hapus" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 ml-4">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    {{-- VERSI DINAMIS DISINI --}}
                    {{-- <table class="table-auto w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 text-left">Nama Mahasiswa</th>
                                <th class="px-4 py-2 text-left">Judul Lowongan</th>
                                <th class="px-4 py-2 text-left">Status</th>
                                <th class="px-4 py-2 text-left">Tanggal Pengajuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pengajuans as $pengajuan)
                            <tr class="border-b">
                                <td class="px-4 py-2">{{ $pengajuan->mahasiswa->nama }}</td>
                                <td class="px-4 py-2">{{ $pengajuan->lowongan->judul }}</td>
                                <td class="px-4 py-2">
                                    @if($pengajuan->status_pengajuan === 'menunggu')
                                    <span class="bg-yellow-400 text-white px-2 py-1 rounded text-sm">Menunggu</span>
                                    @elseif($pengajuan->status_pengajuan === 'diterima')
                                    <span class="bg-green-500 text-white px-2 py-1 rounded text-sm">Diterima</span>
                                    @elseif($pengajuan->status_pengajuan === 'ditolak')
                                    <span class="bg-red-500 text-white px-2 py-1 rounded text-sm">Ditolak</span>
                                    @else
                                    <span class="bg-gray-400 text-white px-2 py-1 rounded text-sm">Tidak Diketahui</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2">{{ $pengajuan->created_at->format('d-m-Y H:i') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> --}}
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
                                    class="font-medium"></span> dari <span id="total-lowongan" class="font-medium"></span>
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
@endsection