@extends('layouts.dosen')
@section('dosen')
    <div class="min-h-screen bg-gray-50 p-4 sm:p-6 lg:p-8">
        <header class="mb-8">
            <h1 class="text-3xl font-bold text-blue-900">Manajemen Rekomendasi Magang 📚</h1>
            <p class="mt-2 text-gray-600 font-medium">Kelola data Rekomendasi Magang</p>
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
                                placeholder="Cari berdasarkan Kode atau Nama Program Studi" />
                        </div>

                        <!-- Filter Dropdown for Program Studi -->
                        <div class="relative w-full sm:w-auto">
                            <button id="program-studi-filter-btn"
                                class="flex items-center gap-2 px-4 py-2 border border-gray-300 rounded-lg bg-white hover:bg-gray-50 focus:outline-none w-full sm:w-auto text-sm">
                                <i class="fas fa-filter text-gray-500" id="filter-icon"></i>
                                <span id="program-studi-filter-text">Semua Program Studi</span>
                                <i class="fas fa-chevron-down text-gray-300" id="program-studi-chevron"></i>
                            </button>
                            <div id="program-studi-dropdown"
                                class="absolute z-10 mt-1 w-full sm:w-56 bg-white rounded-lg shadow-lg border border-gray-200 hidden">
                                <ul class="py-1 max-h-60 overflow-auto">
                                    <li><button
                                            class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 text-gray-700"
                                            data-program-studi="Semua Program Studi">Semua Program Studi</button></li>
                                    <li><button
                                            class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 text-gray-700"
                                            data-program-studi="Teknik Informatika">Teknik Informatika</button></li>
                                    <li><button
                                            class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 text-gray-700"
                                            data-program-studi="Sistem Informasi">Sistem Informasi</button></li>
                                    <li><button
                                            class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 text-gray-700"
                                            data-program-studi="Teknik Elektro">Teknik Elektro</button></li>
                                    <li><button
                                            class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 text-gray-700"
                                            data-program-studi="Teknik Sipil">Teknik Sipil</button></li>
                                    <li><button
                                            class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 text-gray-700"
                                            data-program-studi="Manajemen Bisnis">Manajemen Bisnis</button></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Add Program Studi Button -->

                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Kode Program Studi
                                </th>
                                <th scope="col"
                                    class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden sm:table-cell">
                                    Nama Program Studi
                                </th>
                                <th scope="col"
                                    class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody id="program-studi-table-body" class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-4 py-4 text-sm text-gray-900 sm:px-6 whitespace-nowrap">
                                    testing
                                </td>
                                <td class="hidden sm:table-cell px-4 py-4 text-sm text-gray-900 whitespace-nowrap">
                                    testing
                                </td>
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                    <a href="/dosen/rekomendasi-magang/edit/"
                                        class="inline-flex items-center px-3 py-1.5 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200 transition-colors duration-200">
                                        Edit
                                    </a>
                                    <form action="/dosen/rekomendasi-magang/hapus/" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center px-3 py-1.5 bg-red-100 text-red-700 rounded-md hover:bg-red-200 transition-colors duration-200"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
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
                                    class="font-medium"></span> dari <span id="total-program-studi"
                                    class="font-medium"></span>
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
