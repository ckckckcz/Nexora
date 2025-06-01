<!-- GSAP CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

<header class="sticky top-0 z-50 bg-white border-b border-gray-200">
    <div class="container flex items-center justify-between px-4 py-4 mx-auto">
        <!-- Logo -->
        <div class="flex items-center">
            <a href="/" class="flex items-center text-[#1A3C34] font-bold">
                <svg class="w-6 h-6 text-[#DEFC79] mr-1" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2L4 7v10l8 5 8-5V7l-8-5z" />
                </svg>
                <span>Nexora</span>
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden ml-10 space-x-6 md:flex">
                <a href="/"
                    class="text-[#1A3C34] font-medium">Home</a>
                <a href="/rekomendsi-magang"
                    class="text-gray-500 hover:text-[#1A3C34] transition-colors">Rekomendasi Magang</a>
            </nav>
        </div>

        <!-- User Dropdown -->
        <div class="relative hidden text-left lg:inline-block">
            <button id="user-menu-button" type="button" class="flex items-center cursor-pointer focus:outline-none">
                {{-- <img class="object-cover w-10 h-10 border-2 border-blue-900 rounded-full"
                    src="{{ asset('images/riovaldo.png') }}" alt="user photo"> --}}
            </button>
            <div class="flex space-x-2">
                @auth
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open"
                            class="flex items-center space-x-2 rounded-full border hover:bg-gray-100 p-1.5 focus:outline-none focus:ring-2 focus:ring-blue-900 transition-colors"
                            aria-label="User menu">
                            <div class="overflow-hidden border-2 border-gray-200 rounded-full h-9 w-9">
                                <img src="{{ Storage::url(auth()->user()->mahasiswa->profile_mahasiswa) }}"
                                    alt="User Avatar" class="object-cover w-full h-full" />
                            </div>
                            <div class="hidden text-left md:block">
                                <div class="text-sm font-medium text-gray-700">{{ Auth::user()->username }}</div>
                                <div class="text-xs text-gray-500 truncate max-w-[120px]">{{ Auth::user()->email }}</div>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="hidden w-4 h-4 text-gray-500 md:block"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 z-50 w-64 mt-2 overflow-hidden bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5">

                            <div class="px-4 py-3 border-b border-gray-100 bg-gray-50">
                                <p class="text-sm font-medium text-gray-800">{{ Auth::user()->username }}</p>
                                <p class="text-xs text-gray-500">{{ Auth::user()->role }}</p>
                            </div>  

                            <div class="py-1">
                                <a href="/profile/{{ Auth::user()->mahasiswa->nim }}"
                                    class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-3 text-gray-500" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    Lihat Profil
                                </a>

                                <a href="#"
                                    class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-3 text-gray-500" fill="none"
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
                                <a href="{{url('/logout')}}">
                                    <button type="submit"
                                        class="flex w-full items-center px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-3 text-red-500"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                        </svg>
                                        Keluar
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                @endauth
                @if(!Auth::user())
                        <div class="flex items-center space-x-2">
                            <a href="{{url('login')}}"
                                class="text-[#1A3C34] hover:bg-gray-100 font-medium px-3 py-2 border border-gray-200 rounded-lg w-1/2 text-center">
                                <button>
                                    Login
                                </button>
                            </a>
                            <a href="{{url('daftar')}}"
                                class="bg-[#DEFC79] hover:bg-[#c9eb5b] text-[#1A3C34] font-medium px-4 py-2 rounded-lg w-1/2 text-center">
                                <button>
                                    Daftar
                                </button>
                            </a>
                        </div>
                    @endif
            </div>

            <div id="user-dropdown"
                class="absolute right-0 z-50 hidden w-64 mt-2 transition-all duration-200 origin-top-right scale-95 bg-white rounded-lg shadow-lg opacity-0">
                <!-- Profile Header -->
                <div class="p-4 border-b border-gray-200">
                    <div class="flex items-center space-x-3">
                        <img class="object-cover w-10 h-10 rounded-full" src="{{ asset('images/riovaldo.png') }}"
                            alt="user photo">
                        <div>
                            <p class="text-sm font-semibold text-gray-900">Riovaldo Alfiyan Fahmi Rahman</p>
                            <p class="text-xs text-gray-500 truncate">Freelancer</p>
                        </div>
                    </div>
                </div>

                <!-- Menu Items -->
                <div class="py-2">
                    <a href="/profile" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 mr-3 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        Your profile
                    </a>
                    <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 mr-3 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                        </svg>
                        Connects
                    </a>
                    <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 mr-3 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        Account settings
                    </a>
                    <div class="my-2 border-t border-gray-200"></div>
                    <a href="#" class="flex items-center px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 mr-3 text-red-600">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                        </svg>
                        Keluar
                    </a>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Button -->
        <button class="md:hidden text-[#1A3C34] toggle-menu" aria-label="Toggle menu">
            <svg class="w-6 h-6 transition-all duration-300 menu-icon" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg class="hidden w-6 h-6 transition-all duration-300 close-icon" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div class="hidden px-4 py-4 bg-white border-t border-gray-100 mobile-menu md:hidden">
        <div class="flex flex-col mb-2 space-y-2">
            <!-- Profile Header -->
            <div class="flex items-center space-x-4">
                <img class="object-cover w-12 h-12 border border-gray-200 rounded-full"
                    src="{{ asset('images/riovaldo.png') }}" alt="User Photo">
                <div>
                    <p class="text-sm font-semibold text-gray-900">Riovaldo Alfiyan Fahmi Rahman</p>
                    <p class="text-xs text-gray-500">Freelancer</p>
                </div>
            </div>
            <!-- Profile Dropdown Toggle -->
            <a href="/profile" id="profile-toggle"
                class="flex items-center justify-between w-full px-2 py-2 text-sm font-medium text-gray-700 transition rounded-lg hover:bg-gray-100 focus:outline-none">
                <span>Profile</span>
            </a>
        </div>
        <hr class="mb-2 border-gray-200">
        <!-- Navigasi Umum -->
        <nav class="flex flex-col space-y-4">
            <a href="/" id="profile-toggle"
                class="flex items-center justify-between w-full px-2 py-2 text-sm font-medium text-gray-700 transition rounded-lg hover:bg-gray-100 focus:outline-none">
                <span>Home</span>
            </a>
            <div class="flex pt-2 space-x-2">
                <a href="/login"
                    class="text-[#1A3C34] font-medium px-3 py-2 border border-gray-200 rounded-lg w-1/2 text-center">
                    Login
                </a>
                <a href="/login"
                    class="text-[#1A3C34] font-medium px-3 py-2 border border-gray-200 rounded-lg w-1/2 text-center">
                    Logout
                </a>
            </div>
        </nav>

    </div>

</header>

<!-- Scripts -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const header = document.querySelector('header');
        const toggleButton = document.querySelector('.toggle-menu');
        const mobileMenu = document.querySelector('.mobile-menu');
        const menuIcon = document.querySelector('.menu-icon');
        const closeIcon = document.querySelector('.close-icon');
        const userMenuButton = document.getElementById('user-menu-button');
        const userDropdown = document.getElementById('user-dropdown');

        // Animate header on load
        gsap.from(header, { y: -100, opacity: 0, duration: 1, ease: "power3.out" });

        // Toggle mobile menu
        toggleButton.addEventListener('click', () => {
            const isHidden = mobileMenu.classList.contains('hidden');
            if (isHidden) {
                mobileMenu.classList.remove('hidden');
                gsap.fromTo(mobileMenu, { y: -80, opacity: 0 }, { y: 0, opacity: 1, duration: 0.3, ease: "power2.out" });
            } else {
                gsap.to(mobileMenu, {
                    y: -10,
                    opacity: 0,
                    duration: 0.2,
                    ease: "power2.in",
                    onComplete: () => {
                        mobileMenu.classList.add('hidden');
                    }
                });
            }
            menuIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');
        });

        // Toggle user dropdown
        userMenuButton.addEventListener('click', (e) => {
            e.stopPropagation();
            if (userDropdown.classList.contains('hidden')) {
                userDropdown.classList.remove('hidden');
                setTimeout(() => {
                    userDropdown.classList.remove('opacity-0', 'scale-95');
                    userDropdown.classList.add('opacity-100', 'scale-100');
                }, 10);
            } else {
                userDropdown.classList.add('opacity-0', 'scale-95');
                userDropdown.classList.remove('opacity-100', 'scale-100');
                setTimeout(() => {
                    userDropdown.classList.add('hidden');
                }, 200);
            }
        });

        // Close dropdown when clicking outside
        window.addEventListener('click', (e) => {
            if (!userMenuButton.contains(e.target) && !userDropdown.contains(e.target)) {
                if (!userDropdown.classList.contains('hidden')) {
                    userDropdown.classList.add('opacity-0', 'scale-95');
                    userDropdown.classList.remove('opacity-100', 'scale-100');
                    setTimeout(() => {
                        userDropdown.classList.add('hidden');
                    }, 200);
                }
            }
        });
    });
    document.addEventListener('DOMContentLoaded', () => {
        const profileToggle = document.getElementById('profile-toggle');
        const profileMenu = document.getElementById('profile-menu');
        const profileToggleIcon = document.getElementById('profile-toggle-icon');

        profileToggle.addEventListener('click', () => {
            profileMenu.classList.toggle('hidden');
            profileToggleIcon.classList.toggle('rotate-180'); // Animasi icon panah kebalik
        });
    });
</script>