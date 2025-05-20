@extends('layouts.admin')
@section('admin')
    <div class="min-h-screen bg-gray-50 p-4 sm:p-6 lg:p-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-blue-900">Selamat Datang Kembali Admin ! 🧑🏽‍💻</h1>
            <p class="mt-1 text-gray-600 font-medium">Jangan Lupa Bahagia Ya !!!</p>
        </div>

        <main>
            <!-- Stat Cards -->
            <div id="statCardsRef" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                <div
                    class="bg-white overflow-hidden shadow-lg rounded-xl transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
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
                                        <div class="text-2xl font-bold text-blue-900" data-stat="totalStudents">1,234</div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white overflow-hidden shadow-lg rounded-xl transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-blue-900 rounded-xl p-4">
                                <svg class="h-6 w-6 text-[#DEFC79]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Total Lowongan Magang</dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl font-bold text-blue-900" data-stat="totalVacancies">567</div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="bg-white overflow-hidden shadow-lg rounded-xl transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
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
                                        <div class="text-2xl font-bold text-blue-900" data-stat="totalStudents">1,234</div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white overflow-hidden shadow-lg rounded-xl transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-blue-900 rounded-xl p-4">
                                <svg class="h-6 w-6 text-[#DEFC79]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Total Lowongan Magang</dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl font-bold text-blue-900" data-stat="totalVacancies">567</div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>

            <!-- Chart and Recent Activities -->
            <div class="mt-8 grid grid-cols-1 gap-6 lg:grid-cols-3">
                <div
                    class="bg-white shadow-lg rounded-xl p-6 lg:col-span-2 chart-container transition-all duration-300 hover:shadow-xl">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-bold text-blue-900">Tren Aplikasi Magang</h3>
                        <div class="flex items-center space-x-2">
                            <button class="text-sm text-gray-500 hover:text-blue-900 transition-colors">Bulanan</button>
                            <span class="text-gray-300">|</span>
                            <button class="text-sm font-medium text-blue-900 border-b-2 border-[#DEFC79]">Tahunan</button>
                        </div>
                    </div>
                    <div class="relative h-80">
                        <canvas id="chartRef" height="320"></canvas>
                    </div>
                </div>

                <div class="bg-white shadow-lg rounded-xl p-6 transition-all duration-300 hover:shadow-xl">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-bold text-blue-900">Aktivitas Mahasiswa Terakhir</h3>
                    </div>
                    <div class="flow-root">
                        <ul id="activitiesRef" class="-my-5 divide-y divide-gray-200">
                            <li class="py-4 transition-all duration-300 hover:bg-gray-50 rounded-lg px-2">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                        <div class="h-10 w-10 rounded-full bg-blue-900 flex items-center justify-center">
                                            <span class="text-xs font-medium text-[#DEFC79]">RA</span>
                                        </div>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-blue-900 truncate">Raka Ardian</p>
                                        <p class="text-sm text-gray-500 truncate">Memperbarui profil</p>
                                    </div>
                                    <div class="flex items-center text-sm text-gray-500">
                                        <svg class="flex-shrink-0 mr-1.5 h-4 w-4 text-gray-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>2 jam yang lalu</span>
                                    </div>
                                </div>
                            </li>
                            <li class="py-4 transition-all duration-300 hover:bg-gray-50 rounded-lg px-2">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                        <div class="h-10 w-10 rounded-full bg-blue-900 flex items-center justify-center">
                                            <span class="text-xs font-medium text-[#DEFC79]">AN</span>
                                        </div>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-blue-900 truncate">Anisa Nur</p>
                                        <p class="text-sm text-gray-500 truncate">Mengajukan aplikasi magang</p>
                                    </div>
                                    <div class="flex items-center text-sm text-gray-500">
                                        <svg class="flex-shrink-0 mr-1.5 h-4 w-4 text-gray-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>3 jam yang lalu</span>
                                    </div>
                                </div>
                            </li>
                            <li class="py-4 transition-all duration-300 hover:bg-gray-50 rounded-lg px-2">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                        <div class="h-10 w-10 rounded-full bg-blue-900 flex items-center justify-center">
                                            <span class="text-xs font-medium text-[#DEFC79]">BP</span>
                                        </div>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-blue-900 truncate">Budi Pratama</p>
                                        <p class="text-sm text-gray-500 truncate">Menerima rekomendasi magang</p>
                                    </div>
                                    <div class="flex items-center text-sm text-gray-500">
                                        <svg class="flex-shrink-0 mr-1.5 h-4 w-4 text-gray-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>5 jam yang lalu</span>
                                    </div>
                                </div>
                            </li>
                            <li class="py-4 transition-all duration-300 hover:bg-gray-50 rounded-lg px-2">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                        <div class="h-10 w-10 rounded-full bg-blue-900 flex items-center justify-center">
                                            <span class="text-xs font-medium text-[#DEFC79]">DS</span>
                                        </div>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-blue-900 truncate">Dina Sari</p>
                                        <p class="text-sm text-gray-500 truncate">Menyelesaikan tes kesesuaian</p>
                                    </div>
                                    <div class="flex items-center text-sm text-gray-500">
                                        <svg class="flex-shrink-0 mr-1.5 h-4 w-4 text-gray-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>1 hari yang lalu</span>
                                    </div>
                                </div>
                            </li>
                            <li class="py-4 transition-all duration-300 hover:bg-gray-50 rounded-lg px-2">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                        <div class="h-10 w-10 rounded-full bg-blue-900 flex items-center justify-center">
                                            <span class="text-xs font-medium text-[#DEFC79]">FH</span>
                                        </div>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-blue-900 truncate">Farhan Hakim</p>
                                        <p class="text-sm text-gray-500 truncate">Mengupload CV baru</p>
                                    </div>
                                    <div class="flex items-center text-sm text-gray-500">
                                        <svg class="flex-shrink-0 mr-1.5 h-4 w-4 text-gray-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>1 hari yang lalu</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Latest Recommendations Table -->
            <div class="mt-8">
                <div class="bg-white shadow-lg rounded-xl overflow-hidden transition-all duration-300 hover:shadow-xl">
                    <div class="px-6 py-5 flex flex-col sm:flex-row sm:items-center sm:justify-between">
                        <h3 class="text-xl font-bold text-blue-900">Daftar Rekomendasi Magang Terbaru</h3>
                        <div class="mt-3 sm:mt-0 flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-2">
                            <div class="relative rounded-lg shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>
                                <input type="text"
                                    class="focus:ring-blue-900 focus:border-blue-900 block w-full pl-10 sm:text-sm border-gray-300 rounded-lg py-2"
                                    placeholder="Cari mahasiswa...">
                            </div>
                            <div class="relative">
                                <button
                                    class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-blue-900 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-900 transition-colors">
                                    <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                                    </svg>
                                    Filter
                                    <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table id="tableRef" class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nama Mahasiswa</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Posisi Rekomendasi</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Skor Kecocokan</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status Aplikasi</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div
                                                class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                                                <span class="text-blue-900 font-medium">RA</span>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-blue-900">Raka Ardian</div>
                                                <div class="text-sm text-gray-500">Teknik Informatika</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Frontend Developer</div>
                                        <div class="text-sm text-gray-500">PT Teknologi Maju</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-blue-900">92%</div>
                                        <div class="w-full bg-gray-200 rounded-full h-1.5 mt-1">
                                            <div class="bg-blue-900 h-1.5 rounded-full" style="width: 92%;"></div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Diterima</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <button
                                            class="text-blue-900 hover:text-blue-700 font-medium transition-colors detail-button"
                                            data-student='{"name":"Raka Ardian","position":"Frontend Developer","company":"PT Teknologi Maju","score":"92%"}'>Lihat
                                            Detail</button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div
                                                class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                                                <span class="text-blue-900 font-medium">AN</span>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-blue-900">Anisa Nur</div>
                                                <div class="text-sm text-gray-500">Sistem Informasi</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Data Analyst</div>
                                        <div class="text-sm text-gray-500">PT Data Solusi</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-blue-900">88%</div>
                                        <div class="w-full bg-gray-200 rounded-full h-1.5 mt-1">
                                            <div class="bg-blue-900 h-1.5 rounded-full" style="width: 88%;"></div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Dalam
                                            Proses</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <button
                                            class="text-blue-900 hover:text-blue-700 font-medium transition-colors detail-button"
                                            data-student='{"name":"Anisa Nur","position":"Data Analyst","company":"PT Data Solusi","score":"88%"}'>Lihat
                                            Detail</button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div
                                                class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                                                <span class="text-blue-900 font-medium">BP</span>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-blue-900">Budi Pratama</div>
                                                <div class="text-sm text-gray-500">Teknik Elektro</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">IoT Engineer</div>
                                        <div class="text-sm text-gray-500">PT Smart Tech</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-blue-900">85%</div>
                                        <div class="w-full bg-gray-200 rounded-full h-1.5 mt-1">
                                            <div class="bg-blue-900 h-1.5 rounded-full" style="width: 85%;"></div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Diajukan</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <button
                                            class="text-blue-900 hover:text-blue-700 font-medium transition-colors detail-button"
                                            data-student='{"name":"Budi Pratama","position":"IoT Engineer","company":"PT Smart Tech","score":"85%"}'>Lihat
                                            Detail</button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div
                                                class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                                                <span class="text-blue-900 font-medium">DS</span>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-blue-900">Dina Sari</div>
                                                <div class="text-sm text-gray-500">Manajemen Bisnis</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Business Analyst</div>
                                        <div class="text-sm text-gray-500">PT Konsultan Bisnis</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-blue-900">79%</div>
                                        <div class="w-full bg-gray-200 rounded-full h-1.5 mt-1">
                                            <div class="bg-blue-900 h-1.5 rounded-full" style="width: 79%;"></div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Ditolak</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <button
                                            class="text-blue-900 hover:text-blue-700 font-medium transition-colors detail-button"
                                            data-student='{"name":"Dina Sari","position":"Business Analyst","company":"PT Konsultan Bisnis","score":"79%"}'>Lihat
                                            Detail</button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div
                                                class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                                                <span class="text-blue-900 font-medium">FH</span>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-blue-900">Farhan Hakim</div>
                                                <div class="text-sm text-gray-500">Desain Komunikasi Visual</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">UI/UX Designer</div>
                                        <div class="text-sm text-gray-500">PT Kreasi Digital</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-blue-900">94%</div>
                                        <div class="w-full bg-gray-200 rounded-full h-1.5 mt-1">
                                            <div class="bg-blue-900 h-1.5 rounded-full" style="width: 94%;"></div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Diterima</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <button
                                            class="text-blue-900 hover:text-blue-700 font-medium transition-colors detail-button"
                                            data-student='{"name":"Farhan Hakim","position":"UI/UX Designer","company":"PT Kreasi Digital","score":"94%"}'>Lihat
                                            Detail</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="bg-white px-6 py-4 border-t border-gray-200">
                        <div class="flex items-center justify-between">
                            <div class="flex-1 flex justify-between sm:hidden">
                                <a href="#"
                                    class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-lg text-blue-900 bg-white hover:bg-gray-50 transition-colors">Sebelumnya</a>
                                <a href="#"
                                    class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-lg text-blue-900 bg-white hover:bg-gray-50 transition-colors">Selanjutnya</a>
                            </div>
                            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                                <div>
                                    <p class="text-sm text-gray-700">Menampilkan <span class="font-medium">1</span> sampai
                                        <span class="font-medium">5</span> dari <span class="font-medium">42</span> hasil
                                    </p>
                                </div>
                                <div>
                                    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px"
                                        aria-label="Pagination">
                                        <a href="#"
                                            class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 transition-colors">
                                            <span class="sr-only">Sebelumnya</span>
                                            <svg class="h-5 w-5 rotate-90" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </a>
                                        <a href="#" aria-current="page"
                                            class="z-10 bg-blue-50 border-blue-900 text-blue-900 relative inline-flex items-center px-4 py-2 border text-sm font-medium">1</a>
                                        <a href="#"
                                            class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium transition-colors">2</a>
                                        <a href="#"
                                            class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium transition-colors">3</a>
                                        <span
                                            class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">...</span>
                                        <a href="#"
                                            class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium transition-colors">8</a>
                                        <a href="#"
                                            class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium transition-colors">9</a>
                                        <a href="#"
                                            class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 transition-colors">
                                            <span class="sr-only">Selanjutnya</span>
                                            <svg class="h-5 w-5 -rotate-90" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Active Internship Listings -->
            <div class="mt-8 mb-8">
                <div class="bg-white shadow-lg rounded-xl overflow-hidden transition-all duration-300 hover:shadow-xl">
                    <div class="px-6 py-5 flex flex-col sm:flex-row sm:items-center sm:justify-between">
                        <h3 class="text-xl font-bold text-blue-900">Daftar Lowongan Magang Aktif</h3>
                        <div class="mt-3 sm:mt-0 flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-2">
                            <div class="relative rounded-lg shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>
                                <input type="text"
                                    class="focus:ring-blue-900 focus:border-blue-900 block w-full pl-10 sm:text-sm border-gray-300 rounded-lg py-2"
                                    placeholder="Cari lowongan...">
                            </div>
                            <div class="relative">
                                <button
                                    class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-blue-900 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-900 transition-colors">
                                    <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                                    </svg>
                                    Filter
                                    <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nama Perusahaan</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Posisi Magang</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Deadline</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Jumlah Pelamar</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status Verifikasi</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div
                                                class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                                                <span class="text-blue-900 font-medium">TM</span>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-blue-900">PT Teknologi Maju</div>
                                                <div class="text-sm text-gray-500">Jakarta</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Frontend Developer</div>
                                        <div class="text-sm text-gray-500">Remote</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">30 Juni 2023</div>
                                        <div class="text-sm text-gray-500">2 minggu lagi</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-blue-900 font-medium">24 pelamar</div>
                                        <div class="w-full bg-gray-200 rounded-full h-1.5 mt-1">
                                            <div class="bg-[#DEFC79] h-1.5 rounded-full" style="width: 60%;"></div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Terverifikasi</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <button
                                            class="text-blue-900 hover:text-blue-700 font-medium transition-colors">Detail</button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div
                                                class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                                                <span class="text-blue-900 font-medium">DS</span>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-blue-900">PT Data Solusi</div>
                                                <div class="text-sm text-gray-500">Bandung</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Data Analyst</div>
                                        <div class="text-sm text-gray-500">Hybrid</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">15 Juli 2023</div>
                                        <div class="text-sm text-gray-500">1 bulan lagi</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-blue-900 font-medium">18 pelamar</div>
                                        <div class="w-full bg-gray-200 rounded-full h-1.5 mt-1">
                                            <div class="bg-[#DEFC79] h-1.5 rounded-full" style="width: 45%;"></div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Terverifikasi</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <button
                                            class="text-blue-900 hover:text-blue-700 font-medium transition-colors">Detail</button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div
                                                class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                                                <span class="text-blue-900 font-medium">ST</span>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-blue-900">PT Smart Tech</div>
                                                <div class="text-sm text-gray-500">Surabaya</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">IoT Engineer</div>
                                        <div class="text-sm text-gray-500">On-site</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">10 Juli 2023</div>
                                        <div class="text-sm text-gray-500">3 minggu lagi</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-blue-900 font-medium">12 pelamar</div>
                                        <div class="w-full bg-gray-200 rounded-full h-1.5 mt-1">
                                            <div class="bg-[#DEFC79] h-1.5 rounded-full" style="width: 30%;"></div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Menunggu
                                            Verifikasi</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <button
                                            class="text-blue-900 hover:text-blue-700 font-medium transition-colors">Detail</button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div
                                                class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                                                <span class="text-blue-900 font-medium">KB</span>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-blue-900">PT Konsultan Bisnis</div>
                                                <div class="text-sm text-gray-500">Jakarta</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Business Analyst</div>
                                        <div class="text-sm text-gray-500">Hybrid</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">5 Agustus 2023</div>
                                        <div class="text-sm text-gray-500">1.5 bulan lagi</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-blue-900 font-medium">9 pelamar</div>
                                        <div class="w-full bg-gray-200 rounded-full h-1.5 mt-1">
                                            <div class="bg-[#DEFC79] h-1.5 rounded-full" style="width: 22%;"></div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Terverifikasi</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <button
                                            class="text-blue-900 hover:text-blue-700 font-medium transition-colors">Detail</button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div
                                                class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                                                <span class="text-blue-900 font-medium">KD</span>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-blue-900">PT Kreasi Digital</div>
                                                <div class="text-sm text-gray-500">Yogyakarta</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">UI/UX Designer</div>
                                        <div class="text-sm text-gray-500">Remote</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">25 Juni 2023</div>
                                        <div class="text-sm text-gray-500">1 minggu lagi</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-blue-900 font-medium">31 pelamar</div>
                                        <div class="w-full bg-gray-200 rounded-full h-1.5 mt-1">
                                            <div class="bg-[#DEFC79] h-1.5 rounded-full" style="width: 78%;"></div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Ditolak</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <button
                                            class="text-blue-900 hover:text-blue-700 font-medium transition-colors">Detail</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="bg-white px-6 py-4 border-t border-gray-200">
                        <div class="flex items-center justify-between">
                            <div class="flex-1 flex justify-between sm:hidden">
                                <a href="#"
                                    class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-lg text-blue-900 bg-white hover:bg-gray-50 transition-colors">Sebelumnya</a>
                                <a href="#"
                                    class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-lg text-blue-900 bg-white hover:bg-gray-50 transition-colors">Selanjutnya</a>
                            </div>
                            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                                <div>
                                    <p class="text-sm text-gray-700">Menampilkan <span class="font-medium">1</span> sampai
                                        <span class="font-medium">5</span> dari <span class="font-medium">28</span> hasil
                                    </p>
                                </div>
                                <div>
                                    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px"
                                        aria-label="Pagination">
                                        <a href="#"
                                            class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 transition-colors">
                                            <span class="sr-only">Sebelumnya</span>
                                            <svg class="h-5 w-5 rotate-90" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </a>
                                        <a href="#" aria-current="page"
                                            class="z-10 bg-blue-50 border-blue-900 text-blue-900 relative inline-flex items-center px-4 py-2 border text-sm font-medium">1</a>
                                        <a href="#"
                                            class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium transition-colors">2</a>
                                        <a href="#"
                                            class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium transition-colors">3</a>
                                        <span
                                            class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">...</span>
                                        <a href="#"
                                            class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium transition-colors">6</a>
                                        <a href="#"
                                            class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 transition-colors">
                                            <span class="sr-only">Selanjutnya</span>
                                            <svg class="h-5 w-5 -rotate-90" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Toast Notification -->
        <div id="toast"
            class="fixed bottom-4 right-4 z-50 bg-blue-900 text-white px-6 py-3 rounded-xl shadow-lg flex items-center transform transition-all duration-500 hidden">
            <div class="mr-3 bg-[#DEFC79] text-blue-900 rounded-full p-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <div id="toastMessage" class="mr-2"></div>
            <button id="closeToast" class="ml-4 text-white hover:text-[#DEFC79] transition-colors">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Detail Modal -->
        <div id="modal" class="fixed inset-0 z-50 overflow-y-auto hidden">
            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div
                    class="inline-block align-bottom bg-white rounded-xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full animate-scale-in">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                <h3 class="text-lg leading-6 font-bold text-blue-900">Detail Rekomendasi Magang</h3>
                                <div class="mt-4">
                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <div class="flex items-center mb-4">
                                            <div
                                                class="h-12 w-12 rounded-full bg-blue-900 flex items-center justify-center">
                                                <span id="modalInitials" class="text-[#DEFC79] font-medium"></span>
                                            </div>
                                            <div class="ml-4">
                                                <h4 id="modalName" class="text-lg font-medium text-blue-900"></h4>
                                                <p id="modalPosition" class="text-sm text-gray-500"></p>
                                            </div>
                                            <div class="ml-auto">
                                                <div id="modalScore" class="text-lg font-bold text-blue-900"></div>
                                                <div class="text-xs text-gray-500">Kecocokan</div>
                                            </div>
                                        </div>
                                        <div class="space-y-3">
                                            <div class="flex justify-between">
                                                <span class="text-sm text-gray-500">Status Aplikasi:</span>
                                                <span id="modalStatus" class="text-sm font-medium text-blue-900">Dalam
                                                    Proses</span>
                                            </div>
                                            <div class="flex justify-between">
                                                <span class="text-sm text-gray-500">Tanggal Aplikasi:</span>
                                                <span class="text-sm">12 Juni 2023</span>
                                            </div>
                                            <div class="flex justify-between">
                                                <span class="text-sm text-gray-500">Jurusan:</span>
                                                <span class="text-sm">Teknik Informatika</span>
                                            </div>
                                            <div class="flex justify-between">
                                                <span class="text-sm text-gray-500">IPK:</span>
                                                <span class="text-sm">3.85</span>
                                            </div>
                                            <div class="flex justify-between">
                                                <span class="text-sm text-gray-500">Keahlian Utama:</span>
                                                <span class="text-sm">React, JavaScript, UI/UX</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <h4 class="font-medium mb-2 text-blue-900">Faktor Kecocokan</h4>
                                        <div class="space-y-2">
                                            <div>
                                                <div class="flex justify-between">
                                                    <span class="text-sm">Keahlian Teknis</span>
                                                    <span id="modalTechScore"
                                                        class="text-sm font-medium text-blue-900">95%</span>
                                                </div>
                                                <div class="w-full bg-gray-200 rounded-full h-2 mt-1">
                                                    <div id="modalTechBar" class="bg-blue-900 h-2 rounded-full"
                                                        style="width: 95%;"></div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="flex justify-between">
                                                    <span class="text-sm">Pengalaman</span>
                                                    <span id="modalExpScore"
                                                        class="text-sm font-medium text-blue-900">80%</span>
                                                </div>
                                                <div class="w-full bg-gray-200 rounded-full h-2 mt-1">
                                                    <div id="modalExpBar" class="bg-blue-900 h-2 rounded-full"
                                                        style="width: 80%;"></div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="flex justify-between">
                                                    <span class="text-sm">Lokasi</span>
                                                    <span id="modalLocScore"
                                                        class="text-sm font-medium text-blue-900">100%</span>
                                                </div>
                                                <div class="w-full bg-gray-200 rounded-full h-2 mt-1">
                                                    <div id="modalLocBar" class="bg-blue-900 h-2 rounded-full"
                                                        style="width: 100%;"></div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="flex justify-between">
                                                    <span class="text-sm">Preferensi Jadwal</span>
                                                    <span id="modalSchScore"
                                                        class="text-sm font-medium text-blue-900">90%</span>
                                                </div>
                                                <div class="w-full bg-gray-200 rounded-full h-2 mt-1">
                                                    <div id="modalSchBar" class="bg-blue-900 h-2 rounded-full"
                                                        style="width: 90%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="button"
                            class="w-full inline-flex justify-center rounded-lg border border-transparent shadow-sm px-4 py-2 bg-blue-900 text-base font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-900 sm:ml-3 sm:w-auto sm:text-sm transition-colors submit-button">
                            Hubungi Mahasiswa
                        </button>
                        <button type="button"
                            class="mt-3 w-full inline-flex justify-center rounded-lg border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-900 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm transition-colors close-modal">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection