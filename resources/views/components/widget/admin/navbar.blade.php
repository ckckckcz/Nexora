<header class="w-full bg-white border-b border-gray-200 h-16 flex items-center justify-between px-4 sm:px-6 flex-wrap">
    <div class="w-full sm:w-auto flex-1 sm:flex-none mb-2 sm:mb-0">
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <input type="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full pl-10 p-2.5"
                placeholder="Search something here..." />
        </div>
    </div>

    <div class="flex items-center space-x-4 sm:space-x-6">
        <!-- Notifikasi -->
        <div class="relative">
            <button id="notifToggle" class="relative p-1.5 rounded-full hover:bg-gray-100 transition-colors"
                aria-label="Notifications">
                <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path
                        d="M15 17h5l-1.405-1.405M19 13V9a7 7 0 00-14 0v4l-1.405 1.405A1 1 0 005 18h14a1 1 0 001-1v0z" />
                </svg>
                <span id="notifCount"
                    class="absolute -top-0.5 -right-0.5 flex h-4 w-4 items-center justify-center rounded-full bg-green-500 text-[10px] font-bold text-white hidden">0</span>
            </button>

            <div id="notifDropdown"
                class="hidden absolute right-0 mt-2 w-80 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 z-50">
                <div class="p-3 border-b border-gray-100 flex justify-between items-center">
                    <h3 class="text-sm font-semibold">Notifications</h3>
                    <button id="markAllRead" class="text-xs text-green-600 hover:text-green-800">Mark all as
                        read</button>
                </div>
                <div id="notifList" class="max-h-80 overflow-y-auto">
                    <!-- Notification items via JS -->
                </div>
                <div class="p-2 border-t border-gray-100">
                    <button class="w-full text-center text-xs text-gray-600 hover:text-gray-900 py-1">
                        View all notifications
                    </button>
                </div>
            </div>
        </div>

        <!-- Dropdown User -->
        <div class="relative" id="userDropdownWrapper">
            <div id="userDropdownToggle" class="flex items-center cursor-pointer">
                <div class="h-10 w-10 rounded-full overflow-hidden mr-3 border-2 border-gray-200">
                    <img src="{{ asset('images/user.jpg') }}" alt="User Avatar" width="40" height="40"
                        class="object-cover" />
                </div>
                <div class="mr-2 hidden sm:block">
                    <div class="text-sm font-medium">Albert Flores</div>
                    <div class="text-xs text-gray-500">albert45@gmail.com</div>
                </div>
                <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path d="M19 9l-7 7-7-7" />
                </svg>
            </div>

            <div id="userDropdown"
                class="hidden absolute right-0 mt-2 w-60 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 z-50">
                <div class="px-4 py-2 border-b border-gray-100">
                    <p class="text-sm font-medium">Albert Flores</p>
                    <p class="text-xs text-gray-500">Farm Administrator</p>
                </div>
                <button class="w-full text-left px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-100 flex items-center">
                    <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M5.121 17.804A4.992 4.992 0 015 15V9a4.992 4.992 0 01.121-.804M12 12l2-2-2-2m0 4H3" />
                    </svg>
                    View Profile
                </button>
                <button class="w-full text-left px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-100 flex items-center">
                    <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M12 6v6l4 2" />
                    </svg>
                    Account Settings
                </button>
                <div class="my-1 h-px bg-gray-200"></div>
                <form method="POST" action="">
                    @csrf
                    <button type="submit"
                        class="w-full text-left px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 flex items-center">
                        <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path d="M17 16l4-4m0 0l-4-4m4 4H7" />
                        </svg>
                        Log Out
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>
