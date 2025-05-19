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
                <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="h-8 w-8 flex-shrink-0">
                <span
                    class="text-lg font-semibold text-blue-900 ml-3 transition-opacity duration-200 whitespace-nowrap sidebar-text">Nexora</span>
            </a>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 overflow-y-auto py-2 px-3 space-y-1" id="nav-container">
            <!-- Dashboard -->
            <a href="#"
                class="flex items-center text-gray-700 hover:bg-[#DEFC79]/50 hover:text-blue-900 rounded-md px-3 py-2.5 font-medium text-sm group relative {{ request()->routeIs('dashboard') ? 'bg-[#DEFC79] text-[#DEFC79]' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5 flex-shrink-0 {{ request()->routeIs('dashboard') ? : 'text-gray-500' }} group-hover:text-blue-900 transition-colors duration-200"
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
                        <span class="ml-3 transition-all duration-200 whitespace-nowrap sidebar-text">Manajemen
                            Akun</span>
                    </div>
                    <svg x-bind:class="open ? 'transform rotate-90' : ''"
                        class="h-4 w-4 {{ request()->routeIs('users.*') ? 'text-[#DEFC79]' : 'text-gray-500' }} group-hover:text-blue-900 transition-transform duration-200 flex-shrink-0 sidebar-arrow"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100" class="pl-10 space-y-1 sidebar-submenu">
                    <a href="#"
                        class="flex items-center text-sm text-gray-600 hover:bg-[#DEFC79]/50 hover:text-blue-900 rounded-md px-3 py-2 font-medium {{ request()->routeIs('users.students') ? 'bg-green-50 text-[#DEFC79] font-medium' : '' }}">
                        <span class="transition-all duration-200 whitespace-nowrap sidebar-text">Mahasiswa</span>
                    </a>
                    <a href="#"
                        class="flex items-center text-sm text-gray-600 hover:bg-[#DEFC79]/50 hover:text-blue-900 rounded-md px-3 py-2 font-medium {{ request()->routeIs('users.supervisors') ? 'bg-green-50 text-[#DEFC79] font-medium' : '' }}">
                        <span class="transition-all duration-200 whitespace-nowrap sidebar-text">Dosen Pembimbing</span>
                    </a>
                </div>
            </div>

            <!-- Skema Magang -->
            <a href="#"
                class="flex items-center text-gray-700 hover:bg-[#DEFC79]/50 hover:text-blue-900 rounded-md px-3 py-2.5 font-medium text-sm group relative {{ request()->routeIs('internship.schemes') ? 'bg-green-50 text-[#DEFC79]' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5 flex-shrink-0 {{ request()->routeIs('internship.schemes') ? 'text-[#DEFC79]' : 'text-gray-500' }} group-hover:text-blue-900 transition-colors duration-200"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
                <span class="ml-3 transition-all duration-200 whitespace-nowrap sidebar-text">Skema Magang</span>
            </a>

            <!-- Program Studi -->
            <a href="#"
                class="flex items-center text-gray-700 hover:bg-[#DEFC79]/50 hover:text-blue-900 rounded-md px-3 py-2.5 font-medium text-sm group relative {{ request()->routeIs('study.programs') ? 'bg-green-50 text-[#DEFC79]' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5 flex-shrink-0 {{ request()->routeIs('study.programs') ? 'text-[#DEFC79]' : 'text-gray-500' }} group-hover:text-blue-900 transition-colors duration-200"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M12 14l9-5-9-5-9 5 9 5z" />
                    <path
                        d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                </svg>
                <span class="ml-3 transition-all duration-200 whitespace-nowrap sidebar-text">Program Studi</span>
            </a>

            <!-- Lowongan Magang -->
            <a href="#"
                class="flex items-center text-gray-700 hover:bg-[#DEFC79]/50 hover:text-blue-900 rounded-md px-3 py-2.5 font-medium text-sm group relative {{ request()->routeIs('internship.vacancies') ? 'bg-green-50 text-[#DEFC79]' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5 flex-shrink-0 {{ request()->routeIs('internship.vacancies') ? 'text-[#DEFC79]' : 'text-gray-500' }} group-hover:text-blue-900 transition-colors duration-200"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <span class="ml-3 transition-all duration-200 whitespace-nowrap sidebar-text">Lowongan Magang</span>
            </a>

            <!-- Bimbingan Magang -->
            <a href="#"
                class="flex items-center text-gray-700 hover:bg-[#DEFC79]/50 hover:text-blue-900 rounded-md px-3 py-2.5 font-medium text-sm group relative {{ request()->routeIs('internship.guidance') ? 'bg-green-50 text-[#DEFC79]' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5 flex-shrink-0 {{ request()->routeIs('internship.guidance') ? 'text-[#DEFC79]' : 'text-gray-500' }} group-hover:text-blue-900 transition-colors duration-200"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span class="ml-3 transition-all duration-200 whitespace-nowrap sidebar-text">Bimbingan Magang</span>
            </a>

            <!-- Upload Surat Tugas -->
            <a href="#"
                class="flex items-center text-gray-700 hover:bg-[#DEFC79]/50 hover:text-blue-900 rounded-md px-3 py-2.5 font-medium text-sm group relative {{ request()->routeIs('assignment.letters') ? 'bg-green-50 text-[#DEFC79]' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5 flex-shrink-0 {{ request()->routeIs('assignment.letters') ? 'text-[#DEFC79]' : 'text-gray-500' }} group-hover:text-blue-900 transition-colors duration-200"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                </svg>
                <span class="ml-3 transition-all duration-200 whitespace-nowrap sidebar-text">Upload Surat Tugas</span>
            </a>

            <!-- Sistem Rekomendasi -->
            <a href="#"
                class="flex items-center text-gray-700 hover:bg-[#DEFC79]/50 hover:text-blue-900 rounded-md px-3 py-2.5 font-medium text-sm group relative {{ request()->routeIs('recommendation.settings') ? 'bg-green-50 text-[#DEFC79]' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5 flex-shrink-0 {{ request()->routeIs('recommendation.settings') ? 'text-[#DEFC79]' : 'text-gray-500' }} group-hover:text-blue-900 transition-colors duration-200"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span class="ml-3 transition-all duration-200 whitespace-nowrap sidebar-text">Sistem Rekomendasi</span>
            </a>

            <!-- Statistik dan Laporan -->
            <a href="#"
                class="flex items-center text-gray-700 hover:bg-[#DEFC79]/50 hover:text-blue-900 rounded-md px-3 py-2.5 font-medium text-sm group relative {{ request()->routeIs('statistics.reports') ? 'bg-green-50 text-[#DEFC79]' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5 flex-shrink-0 {{ request()->routeIs('statistics.reports') ? 'text-[#DEFC79]' : 'text-gray-500' }} group-hover:text-blue-900 transition-colors duration-200"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
                <span class="ml-3 transition-all duration-200 whitespace-nowrap sidebar-text">Statistik & Laporan</span>
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
                    <span class="ml-3 font-medium transition-all duration-200 whitespace-nowrap sidebar-text">Keluar</span>
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

<!-- Add Alpine.js for dropdown functionality -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const sidebar = document.getElementById("sidebar");
        const toggleButton = document.getElementById("toggle-sidebar");
        const mobileMenuButton = document.getElementById("mobile-menu-button");
        const mobileBackdrop = document.getElementById("mobile-backdrop");
        const chevronIcon = document.getElementById("chevron-icon");
        const sidebarTexts = document.querySelectorAll(".sidebar-text");
        const sidebarTooltips = document.querySelectorAll(".sidebar-tooltip");
        const sidebarSubmenus = document.querySelectorAll(".sidebar-submenu");
        const sidebarArrows = document.querySelectorAll(".sidebar-arrow");

        // Initialize sidebar state from localStorage (for desktop)
        const sidebarCollapsed = localStorage.getItem("sidebarCollapsed") === "true";

        // Set initial state based on screen size and saved preference
        if (window.innerWidth >= 768) {
            if (sidebarCollapsed) {
                collapseSidebar(false); // Don't animate on initial load
            } else {
                expandSidebar(false); // Don't animate on initial load
            }
        } else {
            // On mobile, always start with sidebar closed
            sidebar.classList.add("-translate-x-full");
            sidebar.classList.add("w-full");
            sidebar.classList.remove("w-16", "w-64");
        }

        // Toggle sidebar on button click (desktop)
        toggleButton.addEventListener("click", function () {
            if (sidebar.getAttribute("data-expanded") === "true") {
                collapseSidebar(true);
                localStorage.setItem("sidebarCollapsed", "true");
                toggleButton.setAttribute("aria-expanded", "false");
            } else {
                expandSidebar(true);
                localStorage.setItem("sidebarCollapsed", "false");
                toggleButton.setAttribute("aria-expanded", "true");
            }
        });

        // Mobile menu toggle
        mobileMenuButton.addEventListener("click", function () {
            const isOpen = !sidebar.classList.contains("-translate-x-full");
            if (isOpen) {
                closeMobileSidebar();
                mobileMenuButton.setAttribute("aria-expanded", "false");
            } else {
                openMobileSidebar();
                mobileMenuButton.setAttribute("aria-expanded", "true");
            }
        });

        // Close sidebar when clicking backdrop
        mobileBackdrop.addEventListener("click", function () {
            closeMobileSidebar();
            mobileMenuButton.setAttribute("aria-expanded", "false");
        });

        // Handle window resize with debouncing
        let resizeTimeout;
        window.addEventListener("resize", function () {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(function () {
                if (window.innerWidth >= 768) {
                    // Desktop view
                    sidebar.classList.remove("-translate-x-full", "w-full");
                    mobileBackdrop.classList.add("hidden");
                    toggleButton.classList.remove("hidden");

                    // Restore collapsed state from localStorage
                    const sidebarCollapsed = localStorage.getItem("sidebarCollapsed") === "true";
                    if (sidebarCollapsed) {
                        collapseSidebar(false);
                    } else {
                        expandSidebar(false);
                    }
                } else {
                    // Mobile view
                    sidebar.classList.add("-translate-x-full", "w-full");
                    sidebar.classList.remove("w-16", "w-64");
                    toggleButton.classList.add("hidden");
                    mobileBackdrop.classList.add("hidden");

                    // Always show text on mobile
                    sidebarTexts.forEach(text => {
                        text.classList.remove("opacity-0", "invisible", "w-0");
                    });

                    // Hide tooltips on mobile
                    sidebarTooltips.forEach(tooltip => {
                        tooltip.classList.add("hidden");
                    });
                }
            }, 100);
        });

        /**
         * Collapse the sidebar to icon-only mode
         * @param {boolean} animate - Whether to animate the transition
         */
        function collapseSidebar(animate = true) {
            sidebar.setAttribute("data-expanded", "false");
            sidebar.classList.remove("w-64");
            if (!animate) {
                sidebar.classList.add("transition-none");
                setTimeout(() => sidebar.classList.remove("transition-none"), 10);
            }
            sidebar.classList.add("w-16");
            toggleButton.style.left = "64px"; // Match collapsed width (w-16 = 64px)
            chevronIcon.classList.add("rotate-180");
            sidebarTexts.forEach(text => {
                text.classList.add("opacity-0", "invisible", "w-0");
            });
            sidebarTooltips.forEach(tooltip => {
                tooltip.classList.remove("hidden");
            });
            sidebarSubmenus.forEach(submenu => {
                submenu.classList.add("hidden");
            });
            sidebarArrows.forEach(arrow => {
                arrow.classList.add("opacity-0", "invisible", "w-0");
            });
        }

        /**
         * Expand the sidebar to full width
         * @param {boolean} animate - Whether to animate the transition
         */
        function expandSidebar(animate = true) {
            sidebar.setAttribute("data-expanded", "true");
            sidebar.classList.remove("w-16");
            if (!animate) {
                sidebar.classList.add("transition-none");
                setTimeout(() => sidebar.classList.remove("transition-none"), 10);
            }
            sidebar.classList.add("w-64");
            toggleButton.style.left = "256px"; // Match expanded width (w-64 = 256px)
            chevronIcon.classList.remove("rotate-180");
            sidebarTexts.forEach(text => {
                text.classList.remove("opacity-0", "invisible", "w-0");
            });
            sidebarTooltips.forEach(tooltip => {
                tooltip.classList.add("hidden");
            });
            sidebarArrows.forEach(arrow => {
                arrow.classList.remove("opacity-0", "invisible", "w-0");
            });
        }

        /**
         * Open the sidebar on mobile
         */
        function openMobileSidebar() {
            sidebar.classList.remove("-translate-x-full");
            mobileBackdrop.classList.remove("hidden");
            setTimeout(() => {
                mobileBackdrop.classList.add("opacity-100");
            }, 10);
            document.body.classList.add("overflow-hidden");
            sidebarTexts.forEach(text => {
                text.classList.remove("opacity-0", "invisible", "w-0");
            });
            sidebarTooltips.forEach(tooltip => {
                tooltip.classList.add("hidden");
            });
        }

        /**
         * Close the sidebar on mobile
         */
        function closeMobileSidebar() {
            sidebar.classList.add("-translate-x-full");
            mobileBackdrop.classList.remove("opacity-100");
            setTimeout(() => {
                mobileBackdrop.classList.add("hidden");
            }, 300);
            document.body.classList.remove("overflow-hidden");
        }
    });
</script>