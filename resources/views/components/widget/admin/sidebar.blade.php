<div id="dashboard-sidebar" class="h-screen">
    <!-- Mobile Menu Button -->
    <button id="mobile-menu-button" 
        class="md:hidden fixed top-4 left-4 z-50 bg-white p-2 rounded-md shadow-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-green-500"
        aria-label="Toggle mobile menu">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    <!-- Sidebar -->
    <div id="sidebar"
        class="hidden md:flex flex-col h-full bg-white border-r border-gray-200 transition-all duration-300 ease-in-out shadow-sm w-64 fixed top-0 left-0 z-40 overflow-hidden">
        
        <!-- Toggle Button -->
        <button id="toggle-sidebar"
            class="absolute -right-3 top-20 bg-white border border-gray-200 rounded-full p-1.5 shadow-md z-10 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-green-500"
            aria-label="Toggle sidebar">
            <svg xmlns="http://www.w3.org/2000/svg" id="chevron-icon" class="h-4 w-4 text-gray-500 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>

        <!-- Logo Section -->
        <div class="p-5 border-b border-gray-200 flex items-center justify-between">
            <a href="#" class="flex items-center">
                <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="h-9 w-9 mr-3">
                <span class="text-xl font-semibold text-green-600 transition-opacity duration-200" id="brand-text">Nexora</span>
            </a>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 overflow-y-auto py-2 px-3 space-y-1" id="nav-contain">
            <!-- Dashboard -->
            <a href="#" 
               class="flex items-center text-gray-700 hover:bg-green-50 hover:text-green-700 rounded-md px-3 py-2.5 font-medium text-sm {{ request()->routeIs('dashboard') ? 'bg-green-50 text-green-700' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 {{ request()->routeIs('dashboard') ? 'text-green-500' : 'text-gray-500' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span class="transition-opacity duration-200">Dashboard</span>
            </a>

            <!-- User Management Section -->
            <div x-data="{ open: false }" class="space-y-1">
                <button @click="open = !open" type="button" 
                    class="flex items-center justify-between w-full text-gray-700 hover:bg-green-50 hover:text-green-700 rounded-md px-3 py-2.5 font-medium text-sm {{ request()->routeIs('users.*') ? 'bg-green-50 text-green-700' : '' }}">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 {{ request()->routeIs('users.*') ? 'text-green-500' : 'text-gray-500' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <span class="transition-opacity duration-200">Manajemen Akun</span>
                    </div>
                    <svg x-bind:class="open ? 'transform rotate-90' : ''" class="h-4 w-4 text-gray-500 transition-transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" class="pl-10 space-y-1">
                    <a href="#" class="flex items-center text-sm text-gray-600 hover:bg-green-50 hover:text-green-700 rounded-md px-3 py-2 {{ request()->routeIs('users.students') ? 'bg-green-50 text-green-700 font-medium' : '' }}">
                        <span class="transition-opacity duration-200">Mahasiswa</span>
                    </a>
                    <a href="#" class="flex items-center text-sm text-gray-600 hover:bg-green-50 hover:text-green-700 rounded-md px-3 py-2 {{ request()->routeIs('users.supervisors') ? 'bg-green-50 text-green-700 font-medium' : '' }}">
                        <span class="transition-opacity duration-200">Dosen Pembimbing</span>
                    </a>
                </div>
            </div>

            <!-- Skema Magang -->
            <a href="#" 
               class="flex items-center text-gray-700 hover:bg-green-50 hover:text-green-700 rounded-md px-3 py-2.5 font-medium text-sm {{ request()->routeIs('internship.schemes') ? 'bg-green-50 text-green-700' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 {{ request()->routeIs('internship.schemes') ? 'text-green-500' : 'text-gray-500' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
                <span class="transition-opacity duration-200">Skema Magang</span>
            </a>

            <!-- Program Studi -->
            <a href="#" 
               class="flex items-center text-gray-700 hover:bg-green-50 hover:text-green-700 rounded-md px-3 py-2.5 font-medium text-sm {{ request()->routeIs('study.programs') ? 'bg-green-50 text-green-700' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 {{ request()->routeIs('study.programs') ? 'text-green-500' : 'text-gray-500' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M12 14l9-5-9-5-9 5 9 5z" />
                    <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                </svg>
                <span class="transition-opacity duration-200">Program Studi</span>
            </a>

            <!-- Lowongan Magang -->
            <a href="#" 
               class="flex items-center text-gray-700 hover:bg-green-50 hover:text-green-700 rounded-md px-3 py-2.5 font-medium text-sm {{ request()->routeIs('internship.vacancies') ? 'bg-green-50 text-green-700' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 {{ request()->routeIs('internship.vacancies') ? 'text-green-500' : 'text-gray-500' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <span class="transition-opacity duration-200">Lowongan Magang</span>
            </a>

            <!-- Bimbingan Magang -->
            <a href="#" 
               class="flex items-center text-gray-700 hover:bg-green-50 hover:text-green-700 rounded-md px-3 py-2.5 font-medium text-sm {{ request()->routeIs('internship.guidance') ? 'bg-green-50 text-green-700' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 {{ request()->routeIs('internship.guidance') ? 'text-green-500' : 'text-gray-500' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span class="transition-opacity duration-200">Bimbingan Magang</span>
            </a>

            <!-- Upload Surat Tugas -->
            <a href="#" 
               class="flex items-center text-gray-700 hover:bg-green-50 hover:text-green-700 rounded-md px-3 py-2.5 font-medium text-sm {{ request()->routeIs('assignment.letters') ? 'bg-green-50 text-green-700' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 {{ request()->routeIs('assignment.letters') ? 'text-green-500' : 'text-gray-500' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                </svg>
                <span class="transition-opacity duration-200">Upload Surat Tugas</span>
            </a>

            <!-- Sistem Rekomendasi -->
            <a href="#" 
               class="flex items-center text-gray-700 hover:bg-green-50 hover:text-green-700 rounded-md px-3 py-2.5 font-medium text-sm {{ request()->routeIs('recommendation.settings') ? 'bg-green-50 text-green-700' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 {{ request()->routeIs('recommendation.settings') ? 'text-green-500' : 'text-gray-500' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span class="transition-opacity duration-200">Sistem Rekomendasi</span>
            </a>

            <!-- Statistik dan Laporan -->
            <a href="#" 
               class="flex items-center text-gray-700 hover:bg-green-50 hover:text-green-700 rounded-md px-3 py-2.5 font-medium text-sm {{ request()->routeIs('statistics.reports') ? 'bg-green-50 text-green-700' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 {{ request()->routeIs('statistics.reports') ? 'text-green-500' : 'text-gray-500' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
                <span class="transition-opacity duration-200">Statistik & Laporan</span>
            </a>
        </nav>

        <!-- Logout Section -->
        <div class="p-4 border-t border-gray-200">
            <form method="POST" action="#">
                @csrf
                <button type="submit"
                    class="flex items-center text-gray-700 hover:text-red-600 w-full py-2 px-3 rounded-md hover:bg-red-50 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span class="ml-3 font-medium transition-opacity duration-200">Log Out</span>
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Add Alpine.js for dropdown functionality -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.getElementById('sidebar');
        const toggleButton = document.getElementById('toggle-sidebar');
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const chevronIcon = document.getElementById('chevron-icon');
        const brandText = document.getElementById('brand-text');
        const userInfo = document.getElementById('user-info');
        const navItems = document.querySelectorAll('#nav-contain a span, #nav-contain button span');
        
        // Initialize sidebar state from localStorage
        const sidebarCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
        
        if (sidebarCollapsed) {
            collapseSidebar();
        }
        
        // Toggle sidebar on button click
        toggleButton.addEventListener('click', function() {
            if (sidebar.classList.contains('w-64')) {
                collapseSidebar();
                localStorage.setItem('sidebarCollapsed', 'true');
            } else {
                expandSidebar();
                localStorage.setItem('sidebarCollapsed', 'false');
            }
        });
        
        // Mobile menu toggle
        mobileMenuButton.addEventListener('click', function() {
            sidebar.classList.toggle('hidden');
            sidebar.classList.toggle('fixed');
            sidebar.classList.toggle('inset-0');
            sidebar.classList.toggle('z-50');
        });
        
        function collapseSidebar() {
            sidebar.classList.remove('w-64');
            sidebar.classList.add('w-16');
            chevronIcon.classList.add('rotate-180');
            brandText.classList.add('opacity-0');
            userInfo.classList.add('opacity-0');
            navItems.forEach(item => {
                item.classList.add('opacity-0');
            });
        }
        
        function expandSidebar() {
            sidebar.classList.add('w-64');
            sidebar.classList.remove('w-16');
            chevronIcon.classList.remove('rotate-180');
            brandText.classList.remove('opacity-0');
            userInfo.classList.remove('opacity-0');
            navItems.forEach(item => {
                item.classList.remove('opacity-0');
            });
        }
        
        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const isMobile = window.innerWidth < 768;
            const isOutsideSidebar = !sidebar.contains(event.target) && event.target !== mobileMenuButton;
            
            if (isMobile && isOutsideSidebar && !sidebar.classList.contains('hidden')) {
                sidebar.classList.add('hidden');
            }
        });
        
        // Handle window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 768) {
                sidebar.classList.remove('hidden', 'fixed', 'inset-0', 'z-50');
            } else {
                sidebar.classList.add('hidden');
            }
        });
    });
</script>