@extends('layouts.admin')
@section('admin')
    <div class="min-h-screen bg-gray-50 p-4 sm:p-6 lg:p-8">
        <header class="mb-8">
            <h1 class="text-3xl font-bold text-blue-900">Manajemen Akun Mahasiswa 🧑🏽‍🎓</h1>
            <p class="mt-2 text-gray-600 font-medium">Kelola data dan akun mahasiswa</p>
        </header>

        <!-- Top Internship Placements Podium -->
        <section class="mb-10 bg-white rounded-xl shadow-md p-6">
            <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                <span class="mr-2 text-yellow-500" id="award-icon"></span>
                Mahasiswa dengan Penempatan Magang Terbaik
            </h2>

            <div class="flex flex-col md:flex-row items-end justify-center gap-4 md:gap-8 mt-8 mb-4">
                <!-- Second Place -->
                <div class="order-2 md:order-1 flex flex-col items-center">
                    <div class="relative">
                        <div class="w-20 h-20 rounded-full bg-gray-200 overflow-hidden border-2 border-gray-400">
                            <img src="/placeholder.svg?height=80&width=80" alt="Reza Mahendra"
                                class="w-full h-full object-cover" />
                        </div>
                        <div
                            class="absolute -bottom-2 -right-2 bg-gray-400 text-white rounded-full w-8 h-8 flex items-center justify-center font-bold shadow-md">
                            2
                        </div>
                    </div>
                    <div class="h-32 md:h-40 w-24 bg-gray-400 rounded-t-lg mt-4 flex items-center justify-center shadow-md">
                        <div class="text-center px-2">
                            <p class="font-bold text-white text-sm truncate">Reza Mahendra</p>
                            <p class="text-white text-xs truncate">Tokopedia</p>
                            <p class="text-white text-xs mt-1">9.5</p>
                        </div>
                    </div>
                </div>

                <!-- First Place -->
                <div class="order-1 md:order-2 flex flex-col items-center">
                    <div class="relative">
                        <div class="w-24 h-24 rounded-full bg-gray-200 overflow-hidden border-2 border-yellow-500">
                            <img src="/placeholder.svg?height=80&width=80" alt="Dian Permata"
                                class="w-full h-full object-cover" />
                        </div>
                        <div
                            class="absolute -bottom-2 -right-2 bg-yellow-500 text-white rounded-full w-10 h-10 flex items-center justify-center font-bold shadow-md">
                            1
                        </div>
                    </div>
                    <div
                        class="h-40 md:h-52 w-28 bg-gradient-to-b from-yellow-400 to-yellow-500 rounded-t-lg mt-4 flex items-center justify-center shadow-md">
                        <div class="text-center px-2">
                            <p class="font-bold text-white text-sm truncate">Dian Permata</p>
                            <p class="text-white text-xs truncate">Google Indonesia</p>
                            <p class="text-white text-xs mt-1">9.8</p>
                        </div>
                    </div>
                </div>

                <!-- Third Place -->
                <div class="order-3 flex flex-col items-center">
                    <div class="relative">
                        <div class="w-20 h-20 rounded-full bg-gray-200 overflow-hidden border-2 border-amber-700">
                            <img src="/placeholder.svg?height=80&width=80" alt="Anisa Putri"
                                class="w-full h-full object-cover" />
                        </div>
                        <div
                            class="absolute -bottom-2 -right-2 bg-amber-700 text-white rounded-full w-8 h-8 flex items-center justify-center font-bold shadow-md">
                            3
                        </div>
                    </div>
                    <div
                        class="h-24 md:h-32 w-24 bg-amber-700 rounded-t-lg mt-4 flex items-center justify-center shadow-md">
                        <div class="text-center px-2">
                            <p class="font-bold text-white text-sm truncate">Anisa Putri</p>
                            <p class="text-white text-xs truncate">Gojek</p>
                            <p class="text-white text-xs mt-1">9.3</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="h-4 bg-gray-200 rounded-t-lg w-full mt-0"></div>
        </section>

        <!-- Student Management Table -->
        <section class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="p-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div class="flex flex-col sm:flex-row gap-3 flex-grow">
                    <!-- Search Input -->
                    <div class="relative flex-grow max-w-md">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-400" id="search-icon"></span>
                        </div>
                        <input type="text" id="search-input"
                            class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Cari berdasarkan NIM atau Nama" />
                    </div>

                    <!-- Filter Dropdowns -->
                    <div class="flex flex-wrap gap-3">
                        <!-- Department Filter -->
                        <div class="relative">
                            <button id="department-filter-btn"
                                class="flex items-center gap-2 px-4 py-2 border border-gray-300 rounded-lg bg-white hover:bg-gray-50 focus:outline-none">
                                <span class="text-gray-500" id="filter-icon"></span>
                                <span id="department-filter-text">Semua Jurusan</span>
                                <span class="text-gray-500" id="department-chevron"></span>
                            </button>
                            <div id="department-dropdown"
                                class="absolute z-10 mt-1 w-56 bg-white rounded-lg shadow-lg border border-gray-200 hidden">
                                <ul class="py-1 max-h-60 overflow-auto">
                                    <li><button
                                            class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 text-gray-700"
                                            data-dept="Semua Jurusan">Semua Jurusan</button></li>
                                    <li><button
                                            class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 text-gray-700"
                                            data-dept="Teknik Informatika">Teknik Informatika</button></li>
                                    <li><button
                                            class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 text-gray-700"
                                            data-dept="Sistem Informasi">Sistem Informasi</button></li>
                                    <li><button
                                            class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 text-gray-700"
                                            data-dept="Teknik Elektro">Teknik Elektro</button></li>
                                    <li><button
                                            class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 text-gray-700"
                                            data-dept="Teknik Sipil">Teknik Sipil</button></li>
                                    <li><button
                                            class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 text-gray-700"
                                            data-dept="Manajemen Bisnis">Manajemen Bisnis</button></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Gender Filter -->
                        <div class="relative">
                            <button id="gender-filter-btn"
                                class="flex items-center gap-2 px-4 py-2 border border-gray-300 rounded-lg bg-white hover:bg-gray-50 focus:outline-none">
                                <span class="text-gray-500" id="gender-filter-icon"></span>
                                <span id="gender-filter-text">Semua Jenis Kelamin</span>
                                <span class="text-gray-500" id="gender-chevron"></span>
                            </button>
                            <div id="gender-dropdown"
                                class="absolute z-10 mt-1 w-48 bg-white rounded-lg shadow-lg border border-gray-200 hidden">
                                <ul class="py-1">
                                    <li><button
                                            class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 text-gray-700"
                                            data-gender="Semua">Semua Jenis Kelamin</button></li>
                                    <li><button
                                            class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 text-gray-700"
                                            data-gender="L">Laki-laki</button></li>
                                    <li><button
                                            class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 text-gray-700"
                                            data-gender="P">Perempuan</button></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add Student Button -->
                <button id="add-student-btn"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                    <span id="plus-icon"></span>
                    <span>Tambah Mahasiswa</span>
                </button>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIM
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                                Mahasiswa</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Program Studi</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Jurusan</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis
                                Kelamin</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tanggal Daftar</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody id="student-table-body" class="bg-white divide-y divide-gray-200"></tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="px-6 py-4 bg-white border-t border-gray-200 flex items-center justify-between">
                <div class="flex-1 flex justify-between sm:hidden">
                    <button
                        class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Sebelumnya</button>
                    <button
                        class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Selanjutnya</button>
                </div>
                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm text-gray-700">
                            Menampilkan <span id="start-index" class="font-medium">1</span> sampai <span id="end-index"
                                class="font-medium"></span> dari <span id="total-students" class="font-medium"></span> data
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
        </section>
    </div>
@endsection