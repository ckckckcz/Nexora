<div id="dashboard-sidebar">
    <!-- Tombol Menu Mobile -->
    <button id="mobile-menu-button" class="md:hidden fixed top-4 left-4 z-50 bg-white p-2 rounded-md shadow-md"
        aria-label="Toggle mobile menu">
        <i data-feather="menu" class="w-5 h-5"></i>
    </button>

    <!-- Sidebar Desktop -->
    <div id="sidebar"
        class="hidden md:flex flex-col h-full bg-white border-r border-gray-200 transition-all duration-300 relative w-64">
        <button id="toggle-sidebar"
            class="absolute -right-3 top-20 bg-white border border-gray-200 rounded-full p-1 shadow-md z-10"
            aria-label="Toggle sidebar">
            <i data-feather="chevron-left" class="w-4 h-4 text-gray-500 transition-transform duration-300"
                id="chevron-icon"></i>
        </button>

        <!-- Logo -->
        <div class="p-5 border-b border-gray-200 flex items-center justify-between">
            <a href="/" class="flex items-center">
                <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="h-8 w-8 mr-3">
                <span class="text-xl font-semibold text-green-600" id="brand-text">FarmVista</span>
            </a>
        </div>

        <!-- Navigasi -->
        <div class="flex-1 overflow-y-auto py-2" id="nav-container">
            <!-- Navigation will be injected by JS -->
        </div>

        <!-- Logout -->
        <div class="p-4 border-t border-gray-200">
            <button
                class="flex items-center text-gray-700 hover:text-gray-900 w-full py-2 px-3 rounded-md hover:bg-gray-100 transition-colors">
                <i data-feather="log-out" class="w-5 h-5 text-gray-500"></i>
                <span class="ml-3 font-medium">Log Out</span>
            </button>
        </div>
    </div>
</div>