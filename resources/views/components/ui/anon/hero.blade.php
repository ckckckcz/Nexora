<section class="pb-12 pt-8 md:py-16 hero-section">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-blue-900 lg:mb-4 mb-2 max-w-3xl mx-auto lg:text-center text-left hero-title">
            Find the best people for candidates in your startup
        </h1>
        <p class="text-gray-600 lg:mb-4 mb-6 max-w-2xl mx-auto lg:text-center text-left hero-description">
            Get more sales and maximize the conversion rates. Discover the most productive channels.
        </p>
        <div class="text-left lg:text-center">
            <a href="/" class="inline-block bg-[#DEFC79] hover:bg-[#c9eb5b] text-blue-900 font-medium px-6 py-3 rounded-xl lg:mb-0 mb-5 hover:bg-opacity-90 transition-colors hero-button">
                Cari Magang Yuk ! 👷🏽‍♂️
            </a>
        </div>                
    
        <!-- Desktop Version -->
        <div class="hidden lg:block">
            <x-ui.anon.components.heroDesktop />
        </div>
        <!-- Mobile Version -->
        <div class="lg:hidden">
            <x-ui.anon.components.heroMobile />
        </div>
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        gsap.registerPlugin(ScrollTrigger);

        // Hero Section Animation
        const tl = gsap.timeline({
            scrollTrigger: {
                trigger: ".hero-section",
                start: "top 80%",
            }
        });

        tl.from(".hero-title", {
            y: 50,
            opacity: 0,
            duration: 1,
            ease: "power3.out"
        }).from(".hero-description", {
            y: 50,
            opacity: 0,
            duration: 1,
            ease: "power3.out"
        }, "-=0.8").from(".hero-button", {
            y: 50,
            opacity: 0,
            duration: 1,
            ease: "power3.out"
        }, "-=0.8");
    });
</script>
