@extends('layouts.admin')
@section('admin')
    <div class="min-h-screen bg-gray-50 p-4 sm:p-6 lg:p-8">
        <header class="mb-8">
            <h1 class="text-3xl font-bold text-blue-900">Manajemen Akun Mahasiswa 🧑🏽‍🎓</h1>
            <p class="mt-2 text-gray-600 font-medium">Kelola data dan akun mahasiswa</p>
        </header>

        <!-- Top Internship Placements Podium -->
        <div class="w-full mx-auto">
            <section class="mb-10 bg-white rounded-xl shadow-lg p-4 sm:p-6 border border-gray-100 relative overflow-hidden">
                <!-- Background decoration -->
                <div class="absolute -top-10 -right-10 w-32 h-32 sm:w-40 sm:h-40 bg-yellow-100 rounded-full opacity-50">
                </div>
                <div class="absolute -bottom-10 -left-10 w-32 h-32 sm:w-40 sm:h-40 bg-blue-100 rounded-full opacity-50">
                </div>

                <h2
                    class="text-xl sm:text-2xl font-bold text-gray-900 lg:flex-row flex-col mb-4 sm:mb-6 flex sm:items-center relative z-10">
                    <span class="mr-2 sm:mr-3 text-yellow-500">
                        <i class="fas fa-trophy"></i>
                    </span>
                    Mahasiswa dengan Penempatan Magang Terbaik
                </h2>

                <div class="flex flex-col w-full items-center justify-center gap-4 sm:gap-6 mt-16 relative z-10">
                    <!-- Podium Container -->
                    <div class="w-full flex flex-row items-end justify-center gap-4 sm:gap-6">
                        <!-- Second Place -->
                        <div
                            class="order-2 md:order-1 flex flex-col items-center w-full sm:w-1/3 transition-all duration-300 podium-hover">
                            <div class="relative">
                                <div
                                    class="w-16 h-16 sm:w-20 sm:h-20 rounded-full gradient-image-second overflow-hidden border-2 border-gray-400 shadow-lg">
                                    <img src="https://i.pinimg.com/564x/de/59/64/de5964357fbe534e11c7bf60cc2e1b8d.jpg"
                                        alt="Reza Mahendra" class="w-full h-full object-cover" />
                                </div>
                                <div
                                    class="absolute -bottom-2 -right-2 gradient-second-place-number text-white rounded-full w-6 h-6 sm:w-8 sm:h-8 text-sm flex items-center justify-center font-bold shadow-md">
                                    2
                                </div>
                                <div class="absolute top-1 right-1 text-gray-600 text-sm sm:text-base">
                                    <i class="fas fa-medal"></i>
                                </div>
                            </div>
                            <div
                                class="w-full h-24 sm:h-32 gradient-second-place rounded-t-xl mt-2 sm:mt-4 flex items-center justify-center shadow-lg relative overflow-hidden">
                                <div class="absolute top-0 left-0 w-full h-1 sm:h-2 bg-gray-300 opacity-30"></div>
                                <div class="text-center px-4 sm:px-6">
                                    <p class="font-bold text-white text-xs sm:text-sm truncate">Reza Mahendra</p>
                                    <p class="text-white text-xs truncate">Tokopedia</p>
                                    <div class="flex items-center justify-center mt-1">
                                        <i class="fas fa-star text-yellow-300 text-xs mr-1"></i>
                                        <p class="text-white text-xs">9.5</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- First Place -->
                        <div class="order-1 md:order-2 flex flex-col items-center w-full sm:w-1/3 animate-bounce-slow">
                            <div class="relative">
                                <div
                                    class="w-20 h-20 sm:w-28 sm:h-28 rounded-full gradient-image-first overflow-hidden border-2 sm:border-3 border-yellow-500 shadow-xl shine-effect">
                                    <img src="https://i.pinimg.com/originals/66/8c/11/668c116f1b0032a7ff2e423955d9ac5a.jpg"
                                        alt="Dian Permata" class="w-full h-full object-cover" />
                                </div>
                                <div
                                    class="absolute -bottom-2 sm:-bottom-3 -right-2 sm:-right-3 gradient-first-place-number text-white rounded-full w-8 sm:w-12 h-8 sm:h-12 flex items-center justify-center font-bold shadow-lg">
                                    1
                                </div>
                                <div class="absolute top-[-2px] sm:top-[-15px] text-yellow-500 text-lg sm:text-2xl"
                                    style="left: 50%; transform: translateX(-50%); display: inline-block;">
                                    <i class="fas fa-crown"></i>
                                </div>
                            </div>
                            <div
                                class="w-full h-32 sm:h-44 gradient-first-place rounded-t-xl mt-2 sm:mt-4 flex items-center justify-center shadow-xl relative overflow-hidden">
                                <div class="absolute top-0 left-0 w-full h-2 sm:h-3 bg-white opacity-30"></div>
                                <div
                                    class="absolute -right-4 sm:-right-6 -bottom-4 sm:-bottom-6 w-8 sm:w-12 h-8 sm:h-12 bg-yellow-300 rounded-full opacity-30">
                                </div>
                                <div
                                    class="absolute -left-4 sm:-left-6 -bottom-4 sm:-bottom-6 w-8 sm:w-12 h-8 sm:h-12 bg-yellow-300 rounded-full opacity-30">
                                </div>
                                <div class="text-center px-4 sm:px-6">
                                    <p class="font-bold text-white text-sm sm:text-base truncate">Dian Permata</p>
                                    <p class="text-white text-xs sm:text-sm truncate">Google Indonesia</p>
                                    <div class="flex items-center justify-center mt-1 sm:mt-2">
                                        <i class="fas fa-star text-white text-xs sm:text-sm mr-1"></i>
                                        <p class="text-white text-xs sm:text-sm font-bold">9.8</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Third Place -->
                        <div
                            class="order-3 flex flex-col items-center w-full sm:w-1/3 transition-all duration-300 podium-hover">
                            <div class="relative">
                                <div
                                    class="w-16 h-16 sm:w-20 sm:h-20 rounded-full gradient-image-third overflow-hidden border-2 border-amber-700 shadow-lg">
                                    <img src="https://i.pinimg.com/736x/4e/11/da/4e11da0c5c9ff3e8e17e4980b2526212.jpg"
                                        alt="Anisa Putri" class="w-full h-full object-cover" />
                                </div>
                                <div
                                    class="absolute -bottom-2 -right-2 gradient-third-place-number text-white rounded-full w-6 h-6 sm:w-8 sm:h-8 flex items-center justify-center font-bold shadow-md">
                                    3
                                </div>
                                <div class="absolute top-1 right-1 text-amber-600 text-sm sm:text-base">
                                    <i class="fas fa-medal"></i>
                                </div>
                            </div>
                            <div
                                class="w-full h-20 sm:h-24 gradient-third-place rounded-t-xl mt-2 sm:mt-4 flex items-center justify-center shadow-lg relative overflow-hidden">
                                <div class="absolute top-0 left-0 w-full h-1 sm:h-2 bg-amber-500 opacity-30"></div>
                                <div class="text-center px-4 sm:px-6">
                                    <p class="font-bold text-white text-xs sm:text-sm truncate">Anisa Putri</p>
                                    <p class="text-white text-xs truncate">Gojek</p>
                                    <div class="flex items-center justify-center mt-1">
                                        <i class="fas fa-star text-yellow-300 text-xs mr-1"></i>
                                        <p class="text-white text-xs">9.3</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Podium base -->
                    <div class="w-full h-4 sm:h-6 gradient-podium-base rounded-t-xl shadow-inner relative">
                        <div class="absolute top-0 left-0 w-full h-0.5 sm:h-1 bg-white opacity-50"></div>
                        <!-- Decorative elements -->
                        <div class="absolute -top-2 sm:-top-3 left-1/4 text-yellow-500 text-xs sm:text-sm">
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="absolute -top-2 sm:-top-3 right-1/4 text-yellow-500 text-xs sm:text-sm">
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>

                <!-- Confetti decoration -->
                <div class="absolute top-4 sm:top-10 left-4 sm:left-10 text-yellow-500 opacity-20 text-xs sm:text-sm">
                    <i class="fas fa-certificate"></i>
                </div>
                <div class="absolute bottom-8 sm:bottom-20 right-4 sm:right-10 text-blue-500 opacity-20 text-xs sm:text-sm">
                    <i class="fas fa-certificate"></i>
                </div>
                <div class="absolute top-8 sm:top-20 right-4 sm:right-20 text-red-500 opacity-20 text-xs sm:text-sm">
                    <i class="fas fa-certificate"></i>
                </div>
            </section>
        </div>

        <!-- Student Management Table -->
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
                                placeholder="Cari berdasarkan NIM atau Nama" />
                        </div>

                        <!-- Filter Dropdowns -->
                        <div class="flex flex-row gap-3">
                            <!-- Department Filter -->
                            <div class="relative w-full sm:w-auto">
                                <button id="department-filter-btn"
                                    class="flex items-center gap-2 px-4 py-2 border border-gray-300 rounded-lg bg-white hover:bg-gray-50 focus:outline-none w-full sm:w-auto text-sm">
                                    <i class="fas fa-filter text-gray-500" id="filter-icon"></i>
                                    <span id="department-filter-text">Semua Jurusan</span>
                                    <i class="fas fa-chevron-down text-gray-300" id="department-chevron"></i>
                                </button>
                                <div id="department-dropdown"
                                    class="absolute z-10 mt-1 w-full sm:w-56 bg-white rounded-lg shadow-lg border border-gray-200 hidden">
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
                            <div class="relative w-full sm:w-auto">
                                <button id="gender-filter-btn"
                                    class="flex items-center gap-2 px-4 py-2 border border-gray-300 rounded-lg bg-white hover:bg-gray-50 focus:outline-none w-full sm:w-auto text-sm">
                                    <i class="fas fa-venus-mars text-gray-500" id="gender-filter-icon"></i>
                                    <span id="gender-filter-text">Semua Jenis Kelamin</span>
                                    <i class="fas fa-chevron-down text-gray-300" id="gender-chevron"></i>
                                </button>
                                <div id="gender-dropdown"
                                    class="absolute z-10 mt-1 w-full sm:w-48 bg-white rounded-lg shadow-lg border border-gray-200 hidden">
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
                    <a href="/admin/manajemen-akun/mahasiswa/tambah">
                        <button id="add-student-btn"
                            class="inline-flex items-center px-4 py-2 bg-blue-900 text-white rounded-lg hover:bg-blue-950 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors text-sm w-full sm:w-auto">
                            <span id="plus-icon"></span>
                            <span>Tambah Mahasiswa</span>
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
                                    NIM
                                </th>
                                <th scope="col"
                                    class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nama
                                    Mahasiswa</th>
                                <th scope="col"
                                    class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden sm:table-cell">
                                    Program Studi</th>
                                <th scope="col"
                                    class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">
                                    Jurusan</th>
                                <th scope="col"
                                    class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden lg:table-cell">
                                    Jenis Kelamin</th>
                                <th scope="col"
                                    class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden xl:table-cell">
                                    Tanggal Daftar</th>
                                <th scope="col"
                                    class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody id="student-table-body" class="bg-white divide-y divide-gray-200"></tbody>
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
                                    class="font-medium"></span> dari <span id="total-students" class="font-medium"></span>
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