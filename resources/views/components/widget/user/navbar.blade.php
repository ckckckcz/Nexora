<!-- GSAP CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

<header class="sticky top-0 z-50 bg-white border-b border-gray-200">
    <div class="container mx-auto flex items-center justify-between px-4 py-4">
        <!-- Logo -->
        <div class="flex items-center">
            <a href="/" class="flex items-center text-[#1A3C34] font-bold">
                <svg class="w-6 h-6 text-[#DEFC79] mr-1" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2L4 7v10l8 5 8-5V7l-8-5z" />
                </svg>
                <span>Hirings</span>
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex ml-10 space-x-6">
                <a href="/"
                    class="text-[#1A3C34] font-medium {{ request()->routeIs('home') ? 'underline' : '' }}">Home</a>
                <a href="/"
                    class="text-gray-500 hover:text-[#1A3C34] transition-colors {{ request()->routeIs('advice') ? 'text-[#1A3C34]' : '' }}">Advice</a>
                <a href="/"
                    class="text-gray-500 hover:text-[#1A3C34] transition-colors {{ request()->routeIs('jobseeker') ? 'text-[#1A3C34]' : '' }}">Jobseeker</a>
                <a href="/"
                    class="text-gray-500 hover:text-[#1A3C34] transition-colors {{ request()->routeIs('pricing') ? 'text-[#1A3C34]' : '' }}">Pricing</a>
            </nav>
        </div>

        <!-- User Dropdown -->
        <div class="relative lg:inline-block text-left hidden">
            <button id="user-menu-button" type="button" class="flex items-center focus:outline-none cursor-pointer">
                {{-- <img class="w-10 h-10 rounded-full object-cover border-2 border-blue-900" src="{{ asset('images/riovaldo.png') }}"
                    alt="user photo"> --}}
            </button>
            <div class="flex space-x-2">
                <a href="/login" class="text-[#1A3C34] hover:bg-gray-100 font-medium px-3 py-2 border border-gray-200 rounded-lg w-1/2 text-center">
                    <button>
                        Login
                    </button>
                </a>
                <a href="/daftar" class="bg-[#DEFC79] hover:bg-[#c9eb5b] text-[#1A3C34] font-medium px-4 py-2 rounded-lg w-1/2 text-center">
                    <button>
                        Daftar
                    </button>
                </a>
            </div>

            <div id="user-dropdown"
                class="absolute right-0 z-50 mt-2 w-64 origin-top-right bg-white rounded-lg shadow-lg hidden opacity-0 scale-95 transition-all duration-200">
                <!-- Profile Header -->
                <div class="p-4 border-b border-gray-200">
                    <div class="flex items-center space-x-3">
                        <img class="w-10 h-10 rounded-full object-cover" src="{{ asset('images/riovaldo.png') }}"
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
                            stroke="currentColor" class="mr-3 h-5 w-5 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        Your profile
                    </a>
                    <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="mr-3 h-5 w-5 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                        </svg>
                        Connects
                    </a>
                    <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="mr-3 h-5 w-5 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        Account settings
                    </a>
                    <div class="border-t border-gray-200 my-2"></div>
                    <a href="#" class="flex items-center px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="mr-3 h-5 w-5 text-red-600">
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
            <svg class="menu-icon w-6 h-6 transition-all duration-300" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg class="close-icon w-6 h-6 hidden transition-all duration-300" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div class="mobile-menu md:hidden bg-white py-4 px-4 border-t border-gray-100 hidden">
        <div class="flex flex-col space-y-2 mb-2">
            <!-- Profile Header -->
            <div class="flex items-center space-x-4">
                <img class="w-12 h-12 rounded-full object-cover" src="{{ asset('images/riovaldo.png') }}"
                    alt="User Photo">
                <div>
                    <p class="text-sm font-semibold text-gray-900">Riovaldo Alfiyan Fahmi Rahman</p>
                    <p class="text-xs text-gray-500">Freelancer</p>
                </div>
            </div>
            <!-- Profile Dropdown Toggle -->
            <button id="profile-toggle"
                class="flex items-center justify-between w-full mt-4 px-2 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg focus:outline-none transition">
                <span>Profile Menu</span>
                <svg id="profile-toggle-icon" class="w-4 h-4 transform transition-transform" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <!-- Profile Dropdown Items -->
            <div id="profile-menu" class="hidden flex flex-col space-y-2 pl-4 mt-2">
                <a href="#" class="text-sm text-gray-600 hover:text-gray-900">Your Profile</a>
                <a href="#" class="text-sm text-gray-600 hover:text-gray-900">Stats and Trends</a>
                <a href="#" class="text-sm text-gray-600 hover:text-gray-900">Membership Plan</a>
                <a href="#" class="text-sm text-gray-600 hover:text-gray-900">Connects</a>
                <a href="#" class="text-sm text-gray-600 hover:text-gray-900">Apps and Offers</a>
                <a href="#" class="text-sm text-gray-600 hover:text-gray-900">Account Settings</a>
            </div>
        </div>
        <hr class="mb-6 border-gray-200">
        <!-- Navigasi Umum -->
        <nav class="flex flex-col space-y-4">
            <a href="/" class="text-[#1A3C34] font-medium">Home</a>
            <a href="/" class="text-gray-500 hover:text-[#1A3C34]">Advice</a>
            <a href="/" class="text-gray-500 hover:text-[#1A3C34]">Jobseeker</a>
            <a href="/" class="text-gray-500 hover:text-[#1A3C34]">Pricing</a>
            <div class="flex space-x-2 pt-2">
                <a href="/"
                    class="text-[#1A3C34] font-medium px-3 py-2 border border-gray-200 rounded-lg w-1/2 text-center">Login</a>
                <a href="/"
                    class="bg-[#DEFC79] hover:bg-[#c9eb5b] text-[#1A3C34] font-medium px-4 py-2 rounded-lg w-1/2 text-center">Sign
                    up</a>
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