<div id="dashboard-sidebar" class="h-screen relative">
    <!-- Mobile Menu Button -->
    <button id="mobile-menu-button"
        class="md:hidden fixed top-4 left-4 z-50 bg-white p-2 rounded-md shadow-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-green-500"
        aria-label="Toggle mobile menu" aria-expanded="false">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    <!-- Mobile Backdrop -->
    <div id="mobile-backdrop"
        class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden md:hidden transition-opacity duration-300"></div>

    <!-- Sidebar -->
    <div id="sidebar"
        class="fixed top-0 left-0 h-full bg-white border-r border-gray-200 transition-all duration-300 ease-in-out shadow-sm z-40 md:flex flex-col w-64 -translate-x-full md:translate-x-0 overflow-hidden"
        data-expanded="true">

        <!-- Logo Section -->
        <div class="p-4 border-b border-gray-200 flex items-center justify-between h-16">
            <a href="#" class="flex items-center">
                <svg class="w-6 h-6 text-[#DEFC79] mr-1" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2L4 7v10l8 5 8-5V7l-8-5z" />
                </svg>
                <span
                    class="text-lg font-semibold text-blue-900 ml-3 transition-opacity duration-200 whitespace-nowrap sidebar-text">Nexora</span>
            </a>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 overflow-y-auto py-2 px-3 space-y-1" id="nav-container">
            <!-- Dashboard -->
            <a href="/dosen/dashboard"
                class="flex items-center text-gray-700 hover:bg-[#DEFC79]/50 hover:text-blue-900 rounded-md px-3 py-2.5 font-medium text-sm group relative {{ request()->routeIs('dashboard') ? 'bg-[#DEFC79] text-[#DEFC79]' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5 flex-shrink-0 {{ request()->routeIs('dashboard') ?: 'text-gray-500' }} group-hover:text-blue-900 transition-colors duration-200"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span class="ml-3 transition-all duration-200 whitespace-nowrap sidebar-text">Dashboard</span>
            </a>

            <!-- User Management Section -->
            <div x-data="{ open: false }" class="space-y-1">
                <button @click="open = !open" type="button"
                    class="flex items-center justify-between w-full text-gray-700 hover:bg-[#DEFC79]/50 hover:text-blue-900 rounded-md px-3 py-2.5 font-medium text-sm group relative {{ request()->routeIs('users.*') ? 'bg-green-50 text-[#DEFC79]' : '' }}">
                    <div class="flex items-center min-w-0">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 flex-shrink-0 {{ request()->routeIs('users.*') ? 'text-[#DEFC79]' : 'text-gray-500' }} group-hover:text-blue-900 transition-colors duration-200"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <span class="ml-3 transition-all duration-200 whitespace-nowrap sidebar-text">Mahasiswa</span>
                    </div>
                    <svg x-bind:class="open ? 'transform rotate-89' : ''"
                        class="h-4 w-4 {{ request()->routeIs('users.*') ? 'text-[#DEFC79]' : 'text-gray-500' }} group-hover:text-blue-900 transition-transform duration-200 flex-shrink-0 sidebar-arrow"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100" class="pl-10 space-y-1 sidebar-submenu">
                    {{-- <a href="/dosen/mahasiswa/profile"
                        class="flex items-center text-sm text-gray-600 hover:bg-[#DEFC79]/50 hover:text-blue-900 rounded-md px-3 py-2 font-medium {{ request()->routeIs('users.students') ? 'bg-green-50 text-[#DEFC79] font-medium' : '' }}">
                        <span class="transition-all duration-200 whitespace-nowrap sidebar-text">Profile
                            Mahasiswa</span>
                    </a> --}}
                    <a href="/dosen/mahasiswa/log-aktivitas"
                        class="flex items-center text-sm text-gray-600 hover:bg-[#DEFC79]/50 hover:text-blue-900 rounded-md px-3 py-2 font-medium {{ request()->routeIs('users.supervisors') ? 'bg-green-50 text-[#DEFC79] font-medium' : '' }}">
                        <span class="transition-all duration-200 whitespace-nowrap sidebar-text">Log Aktivitas</span>
                    </a>
                </div>
            </div>
            <div x-data="{ open: false }" class="space-y-1">
                <button @click="open = !open" type="button"
                    class="flex items-center justify-between w-full text-gray-700 hover:bg-[#DEFC79]/50 hover:text-blue-900 rounded-md px-3 py-2.5 font-medium text-sm group relative {{ request()->routeIs('users.*') ? 'bg-green-50 text-[#DEFC79]' : '' }}">
                    <div class="flex items-center min-w-0">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 flex-shrink-0 {{ request()->routeIs('internship.vacancies') ? 'text-[#DEFC79]' : 'text-gray-500' }} group-hover:text-blue-900 transition-colors duration-200"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span class="ml-3 transition-all duration-200 whitespace-nowrap sidebar-text">Magang</span>
                    </div>
                    <svg x-bind:class="open ? 'transform rotate-89' : ''"
                        class="h-4 w-4 {{ request()->routeIs('users.*') ? 'text-[#DEFC79]' : 'text-gray-500' }} group-hover:text-blue-900 transition-transform duration-200 flex-shrink-0 sidebar-arrow"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-100 border"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100" class="pl-10 space-y-1 sidebar-submenu">
                    <a href="/dosen/magang/rekomendasi-magang"
                        class="flex items-center text-sm text-gray-600 hover:bg-[#DEFC79]/50 hover:text-blue-900 rounded-md px-3 py-2 font-medium {{ request()->routeIs('users.students') ? 'bg-green-50 text-[#DEFC79] font-medium' : '' }}">
                        <span class="transition-all duration-200 whitespace-nowrap sidebar-text">Rekomendasi
                            Magang</span>
                    </a>
                    <a href="/dosen/magang/bimbingan-magang"
                        class="flex items-center text-sm text-gray-600 hover:bg-[#DEFC79]/50 hover:text-blue-900 rounded-md px-3 py-2 font-medium {{ request()->routeIs('users.supervisors') ? 'bg-green-50 text-[#DEFC79] font-medium' : '' }}">
                        <span class="transition-all duration-200 whitespace-nowrap sidebar-text">Bimbingan Magang</span>
                    </a>
                </div>
            </div>

            <!-- Laporan -->
            <a href="/dosen/laporan-log"
                class="flex items-center text-gray-700 hover:bg-[#DEFC79]/50 hover:text-blue-900 rounded-md px-3 py-2.5 font-medium text-sm group relative {{ request()->routeIs('statistics.reports') ? 'bg-green-50 text-[#DEFC79]' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5 flex-shrink-0 {{ request()->routeIs('statistics.reports') ? 'text-[#DEFC79]' : 'text-gray-500' }} group-hover:text-blue-900 transition-colors duration-200"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
                <span class="ml-3 transition-all duration-200 whitespace-nowrap sidebar-text">Laporan</span>
            </a>
        </nav>

        <!-- Logout Section -->
        <div class="p-4 border-t border-gray-200">
            <form method="POST" action="#">
                @csrf
                <button type="submit"
                    class="flex items-center text-gray-700 hover:text-red-600 w-full py-2.5 px-3 text-sm rounded-md hover:bg-red-50 transition-colors group relative">
                    <svg xmlns="http://www.w3.org/3000/svg"
                        class="h-5 w-5 flex-shrink-0 text-gray-500 group-hover:text-red-500 transition-colors duration-200"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span
                        class="ml-3 font-medium transition-all duration-200 whitespace-nowrap sidebar-text">Keluar</span>
                    <span
                        class="absolute left-12 top-1/2 -translate-y-1/2 bg-gray-800 text-white text-xs rounded px-2 py-1 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-20 whitespace-nowrap sidebar-tooltip">Log
                        Out</span>
                </button>
            </form>
        </div>
    </div>

    <!-- Toggle Button (Placed outside sidebar) -->
    <button id="toggle-sidebar"
        class="absolute top-20 left-64 bg-white border border-gray-200 rounded-r-lg p-1.5 shadow-md z-50 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-900 md:block hidden transition-all duration-300"
        aria-label="Toggle sidebar" aria-expanded="true">
        <svg xmlns="http://www.w3.org/2000/svg" id="chevron-icon"
            class="h-4 w-4 text-gray-500 transition-transform duration-300" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
    </button>
</div>