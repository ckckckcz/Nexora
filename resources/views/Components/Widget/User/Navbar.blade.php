<header class="fixed top-0 left-0 right-0 bg-white py-4 px-6 lg:px-12 shadow-sm z-50 transition-all duration-300" id="main-header">
    <div class="container mx-auto">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <a href="/" class="flex items-center group">
                <svg class="h-8 w-8 text-blue-600 transition-transform duration-500 group-hover:rotate-12" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2L2 7L12 12L22 7L12 2Z" fill="currentColor"/>
                    <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span class="ml-2 text-xl font-bold text-blue-600">HireQuest</span>
            </a>

            <!-- Navigation Links -->
            <nav class="hidden md:flex items-center space-x-8">
                <a href="#" class="text-gray-700 hover:text-blue-600 font-medium transition-colors duration-300 nav-link">Find Job</a>
                <a href="#" class="text-gray-700 hover:text-blue-600 font-medium transition-colors duration-300 nav-link">For Recruiters</a>
                <a href="#" class="text-gray-700 hover:text-blue-600 font-medium transition-colors duration-300 nav-link">Blog</a>
                <a href="#" class="text-gray-700 hover:text-blue-600 font-medium transition-colors duration-300 nav-link">Career Tips</a>
            </nav>

            <!-- Login / Sign Up -->
            <div class="flex items-center space-x-4">
                <a href="#" class="px-5 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg">Login</a>
                <a href="#" class="px-5 py-2 bg-gray-100 text-gray-800 rounded-md hover:bg-gray-200 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg">Sign Up</a>
            </div>

            <!-- Mobile menu button -->
            <button class="md:hidden rounded-md p-2 text-gray-700 hover:bg-gray-100 focus:outline-none transition-colors duration-300" id="mobile-menu-button">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
        
        <!-- Mobile menu (hidden by default) -->
        <div class="md:hidden hidden mt-4 pb-4 space-y-4" id="mobile-menu">
            <a href="#" class="block text-gray-700 hover:text-blue-600 font-medium transition-colors duration-300">Find Job</a>
            <a href="#" class="block text-gray-700 hover:text-blue-600 font-medium transition-colors duration-300">For Recruiters</a>
            <a href="#" class="block text-gray-700 hover:text-blue-600 font-medium transition-colors duration-300">Blog</a>
            <a href="#" class="block text-gray-700 hover:text-blue-600 font-medium transition-colors duration-300">Career Tips</a>
        </div>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });
        
        // Header scroll effect
        const header = document.getElementById('main-header');
        let lastScrollTop = 0;
        
        window.addEventListener('scroll', function() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            if (scrollTop > 100) {
                header.classList.add('py-2', 'shadow-md');
                header.classList.remove('py-4', 'shadow-sm');
            } else {
                header.classList.add('py-4', 'shadow-sm');
                header.classList.remove('py-2', 'shadow-md');
            }
            
            if (scrollTop > lastScrollTop && scrollTop > 300) {
                // Scrolling down
                gsap.to(header, {y: -100, duration: 0.3, ease: "power2.inOut"});
            } else {
                // Scrolling up
                gsap.to(header, {y: 0, duration: 0.3, ease: "power2.inOut"});
            }
            
            lastScrollTop = scrollTop;
        });
        
        // Nav link hover animation
        const navLinks = document.querySelectorAll('.nav-link');
        
        navLinks.forEach(link => {
            link.addEventListener('mouseenter', function() {
                gsap.to(this, {scale: 1.05, duration: 0.3, ease: "back.out(1.5)"});
            });
            
            link.addEventListener('mouseleave', function() {
                gsap.to(this, {scale: 1, duration: 0.3, ease: "back.out(1.5)"});
            });
        });
    });
</script>
