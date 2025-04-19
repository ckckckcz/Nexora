<header class="border-b border-gray-200 sticky top-0 bg-white z-50">
    <div class="container mx-auto px-4 py-4 flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center">
            <a href="/" class="flex items-center">
                <div class="text-[#1A3C34] font-bold flex items-center">
                    <svg class="w-6 h-6 text-[#DEFC79] mr-1" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2L4 7v10l8 5 8-5V7l-8-5z" />
                    </svg>
                    <span>Hirings</span>
                </div>
            </a>
            <!-- Desktop Navigation -->
            <nav class="hidden md:flex ml-10 space-x-6">
                <a href="/" class="text-[#1A3C34] font-medium {{ request()->routeIs('home') ? 'underline' : '' }}">
                    Home
                </a>
                <a href="/" class="text-gray-500 hover:text-[#1A3C34] transition-colors {{ request()->routeIs('advice') ? 'text-[#1A3C34]' : '' }}">
                    Advice
                </a>
                <a href="/" class="text-gray-500 hover:text-[#1A3C34] transition-colors {{ request()->routeIs('jobseeker') ? 'text-[#1A3C34]' : '' }}">
                    Jobseeker
                </a>
                <a href="/" class="text-gray-500 hover:text-[#1A3C34] transition-colors {{ request()->routeIs('pricing') ? 'text-[#1A3C34]' : '' }}">
                    Pricing
                </a>
            </nav>
        </div>

        <!-- Desktop Auth Links -->
        <div class="hidden md:flex items-center space-x-2">
            <a href="/" class="text-[#1A3C34] font-medium bg-gray-100 hover:bg-gray-200 rounded-xl px-5 py-2 hover:text-opacity-80 transition-colors">
                Login
            </a>
            <a href="/" class="bg-[#DEFC79] hover:bg-[#c9eb5b] text-[#1A3C34] font-medium px-4 py-2 rounded-xl hover:bg-opacity-90 transition-colors">
                Sign up
            </a>
        </div>

        <!-- Mobile Menu Button -->
        <button class="md:hidden text-[#1A3C34] toggle-menu" aria-label="Toggle menu">
            <svg class="menu-icon w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
            <svg class="close-icon w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div class="mobile-menu md:hidden bg-white py-4 px-4 border-t border-gray-100 hidden">
        <nav class="flex flex-col space-y-4">
            <a href="/" class="text-[#1A3C34] font-medium">
                Home
            </a>
            <a href="/" class="text-gray-500 hover:text-[#1A3C34]">
                Advice
            </a>
            <a href="/" class="text-gray-500 hover:text-[#1A3C34]">
                Jobseeker
            </a>
            <a href="/" class="text-gray-500 hover:text-[#1A3C34]">
                Pricing
            </a>
            <div class="flex space-x-2 pt-2">
                <a href="/" class="text-[#1A3C34] font-medium px-3 py-2 border border-gray-200 rounded-md text-center w-1/2">
                    Login
                </a>
                <a href="/" class="bg-[#DEFC79] text-[#1A3C34] font-medium px-4 py-2 rounded-md text-center w-1/2">
                    Sign up
                </a>
            </div>
        </nav>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const header = document.querySelector('header');

        // Animasikan header dari atas ke posisi normal
        gsap.from(header, {
            y: -100,
            opacity: 0,
            duration: 1,
            ease: "power3.out"
        });

        // Toggle Mobile Menu
        const toggleButton = document.querySelector('.toggle-menu');
        const mobileMenu = document.querySelector('.mobile-menu');
        const menuIcon = document.querySelector('.menu-icon');
        const closeIcon = document.querySelector('.close-icon');

        toggleButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            menuIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');
        });
    });
</script>