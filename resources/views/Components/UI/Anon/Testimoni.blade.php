<section class="py-16 md:py-24 bg-gray-50 overflow-hidden" id="testimonials-section">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16 space-y-4 section-header">
            <div class="inline-block px-3 py-1 bg-gray-100 rounded-full text-sm font-medium">
                Testimoni
            </div>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold">
                What Other Say<br>About Us
            </h2>
            <p class="max-w-2xl mx-auto text-gray-600">
                See what our best Costumer have to say about our crafted work. Always done with love
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 testimonial-cards">
            <!-- Testimonial 1 -->
            <div class="bg-white rounded-lg shadow-md p-6 testimonial-card">
                <div class="relative">
                    <svg class="absolute -top-6 -left-6 h-12 w-12 text-blue-100 quote-icon" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-4">Excellent Job Marketplace</h3>
                <p class="text-gray-600 mb-6">
                    "HireQuest helped me land my dream job in a few weeks. The proses was seamless and the support was excellent!"
                </p>
                <div class="flex items-center space-x-4">
                    <div class="h-12 w-12 rounded-full bg-gray-200 overflow-hidden">
                        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Sabrina Ellara" class="h-full w-full object-cover">
                    </div>
                    <div>
                        <h4 class="font-medium">Sabrina Ellara</h4>
                        <p class="text-sm text-gray-500">Full Stack Developer</p>
                    </div>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="bg-white rounded-lg shadow-md p-6 testimonial-card">
                <div class="relative">
                    <svg class="absolute -top-6 -left-6 h-12 w-12 text-blue-100 quote-icon" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-4">A Journey of Growth</h3>
                <p class="text-gray-600 mb-6">
                    "HireQuest is more than just a job portal—it's a platform for growth. With seamless job searches and efficient hiring, it empowers both job seekers and employers to reach new heights."
                </p>
                <div class="flex items-center space-x-4">
                    <div class="h-12 w-12 rounded-full bg-gray-200 overflow-hidden">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Keenan Marven" class="h-full w-full object-cover">
                    </div>
                    <div>
                        <h4 class="font-medium">Keenan Marven</h4>
                        <p class="text-sm text-gray-500">UI/UX Design</p>
                    </div>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="bg-white rounded-lg shadow-md p-6 testimonial-card">
                <div class="relative">
                    <svg class="absolute -top-6 -left-6 h-12 w-12 text-blue-100 quote-icon" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-4">Excellent Job Service</h3>
                <p class="text-gray-600 mb-6">
                    "HireQuest provides an outstanding job service, making job searching and hiring smooth and efficient. The platform is user-friendly, with great opportunities for job seekers and employers alike!"
                </p>
                <div class="flex items-center space-x-4">
                    <div class="h-12 w-12 rounded-full bg-gray-200 overflow-hidden">
                        <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Evelyne Leanor" class="h-full w-full object-cover">
                    </div>
                    <div>
                        <h4 class="font-medium">Evelyne Leanor</h4>
                        <p class="text-sm text-gray-500">Product Manager</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-12 text-center">
            <a href="#" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-8 rounded-md transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg look-more-btn">
                Look More Job
            </a>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Testimonials section animations
        gsap.from('.section-header > *', {
            scrollTrigger: {
                trigger: '#testimonials-section',
                start: 'top 80%'
            },
            y: 30,
            opacity: 0,
            duration: 0.8,
            stagger: 0.2,
            ease: "power2.out"
        });
        
        gsap.from('.testimonial-card', {
            scrollTrigger: {
                trigger: '.testimonial-cards',
                start: 'top 80%'
            },
            y: 50,
            opacity: 0,
            duration: 0.8,
            stagger: 0.2,
            ease: "power2.out"
        });
        
        gsap.from('.quote-icon', {
            scrollTrigger: {
                trigger: '.testimonial-cards',
                start: 'top 70%'
            },
            scale: 0,
            opacity: 0,
            duration: 0.6,
            stagger: 0.2,
            ease: "back.out(1.7)",
            delay: 0.4
        });
        
        gsap.from('.look-more-btn', {
            scrollTrigger: {
                trigger: '.look-more-btn',
                start: 'top 90%'
            },
            y: 30,
            opacity: 0,
            duration: 0.8,
            ease: "back.out(1.7)"
        });
        
        // Testimonial card hover animations
        const testimonialCards = document.querySelectorAll('.testimonial-card');
        
        testimonialCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                gsap.to(this, {
                    y: -10,
                    boxShadow: '0 10px 25px rgba(0, 0, 0, 0.1)',
                    duration: 0.3,
                    ease: "power2.out"
                });
                
                gsap.to(this.querySelector('.quote-icon'), {
                    rotation: 10,
                    scale: 1.2,
                    duration: 0.4,
                    ease: "power2.out"
                });
            });
            
            card.addEventListener('mouseleave', function() {
                gsap.to(this, {
                    y: 0,
                    boxShadow: '0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)',
                    duration: 0.3,
                    ease: "power2.out"
                });
                
                gsap.to(this.querySelector('.quote-icon'), {
                    rotation: 0,
                    scale: 1,
                    duration: 0.4,
                    ease: "power2.out"
                });
            });
        });
    });
</script>
