<header
    class="w-full bg-white border-b border-gray-200 h-16 flex items-center justify-between px-4 sm:px-6 lg:px-8 shadow-sm">
    <!-- Left side: Search -->
    <div class="w-full max-w-xs lg:max-w-md">
        {{-- <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <input type="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full pl-10 p-2.5 transition-colors"
                placeholder="Search..." />
        </div> --}}
    </div>

    <!-- Right side: Actions -->
    <div class="flex items-center space-x-1">
        <!-- Notifications Dropdown -->
        <div x-data="{ open: false, notificationCount: 3 }" class="relative">
            <button @click="open = !open"
                class="relative p-2 rounded-full hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-500 transition-colors"
                aria-label="Notifications">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 17h5l-1.405-1.405A2 2 0 0118 14v-5a6 6 0 00-6-6v0a6 6 0 00-6 6v5a2 2 0 01-.595 1.42L4 17h5m6 0v1a3 3 0 01-6 0v-1m6 0H9" />
                </svg>
                <span x-show="notificationCount > 0" x-text="notificationCount"
                    class="absolute -top-0.5 -right-0.5 flex h-4 w-4 items-center justify-center rounded-full bg-green-500 text-[10px] font-bold text-white">
                </span>
            </button>

            <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95"
                class="absolute right-0 mt-2 w-80 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 z-50 overflow-hidden">

                <div class="p-3 border-b border-gray-100 flex justify-between items-center bg-gray-50">
                    <h3 class="text-sm font-semibold text-gray-700">Notifications</h3>
                    <button @click="notificationCount = 0"
                        class="text-xs text-green-600 hover:text-green-800 font-medium">
                        Mark all as read
                    </button>
                </div>

                <div class="max-h-80 overflow-y-auto divide-y divide-gray-100">
                    <!-- Notification Item 1 -->
                    <div class="p-4 hover:bg-gray-50 transition-colors">
                        <div class="flex">
                            <div class="flex-shrink-0 mr-3">
                                <div class="h-9 w-9 rounded-full bg-green-100 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-800">Pendaftaran Magang Baru</p>
                                <p class="text-xs text-gray-500 mt-1">Mahasiswa Budi Santoso telah mendaftar program
                                    magang</p>
                                <p class="text-xs text-gray-400 mt-1">2 menit yang lalu</p>
                            </div>
                        </div>
                    </div>

                    <!-- Notification Item 2 -->
                    <div class="p-4 hover:bg-gray-50 transition-colors">
                        <div class="flex">
                            <div class="flex-shrink-0 mr-3">
                                <div class="h-9 w-9 rounded-full bg-blue-100 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-800">Bimbingan Disetujui</p>
                                <p class="text-xs text-gray-500 mt-1">Dosen Pembimbing telah menyetujui jadwal bimbingan
                                </p>
                                <p class="text-xs text-gray-400 mt-1">1 jam yang lalu</p>
                            </div>
                        </div>
                    </div>

                    <!-- Notification Item 3 -->
                    <div class="p-4 hover:bg-gray-50 transition-colors">
                        <div class="flex">
                            <div class="flex-shrink-0 mr-3">
                                <div class="h-9 w-9 rounded-full bg-yellow-100 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-800">Pengajuan Menunggu Persetujuan</p>
                                <p class="text-xs text-gray-500 mt-1">5 pengajuan magang menunggu persetujuan anda</p>
                                <p class="text-xs text-gray-400 mt-1">3 jam yang lalu</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-2 border-t border-gray-100 bg-gray-50">
                    <a href="# class=" block w-full text-center text-xs font-medium text-green-600 hover:text-green-800
                        py-1.5">
                        Lihat semua notifikasi
                    </a>
                </div>
            </div>
        </div>

        <!-- User Profile Dropdown -->
        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open"
                class="flex items-center space-x-2 rounded-full hover:bg-gray-100 p-1.5 focus:outline-none focus:ring-2 focus:ring-green-500 transition-colors"
                aria-label="User menu">
                <div class="h-8 w-8 rounded-full overflow-hidden border-2 border-gray-200">
                    <img src="{{ asset('images/user.jpg') }}" alt="User Avatar" class="h-full w-full object-cover" />
                </div>
                <div class="hidden md:block text-left">
                    <div class="text-sm font-medium text-gray-700">{{ auth()->user()->name ?? 'Albert Flores' }}</div>
                    <div class="text-xs text-gray-500 truncate max-w-[120px]">{{ auth()->user()->email ??
                        'admin@nexora.com' }}</div>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500 hidden md:block" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95"
                class="absolute right-0 mt-2 w-64 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 z-50 overflow-hidden">

                <div class="px-4 py-3 border-b border-gray-100 bg-gray-50">
                    <p class="text-sm font-medium text-gray-800">{{ auth()->user()->name ?? 'Albert Flores' }}</p>
                    <p class="text-xs text-gray-500">{{ auth()->user()->role ?? 'Administrator' }}</p>
                </div>

                <div class="py-1">
                    <a href="#"
                        class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-3 text-gray-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Lihat Profil
                    </a>

                    <a href="#"
                        class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-3 text-gray-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Pengaturan Akun
                    </a>
                </div>

                <div class="py-1 border-t border-gray-100">
                    <form method="POST" action="#">
                        @csrf
                        <button type="submit"
                            class="flex w-full items-center px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-3 text-red-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Keluar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>