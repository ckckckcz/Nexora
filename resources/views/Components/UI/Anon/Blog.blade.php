<section class="py-16 md:py-24 overflow-hidden" id="blog-section">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16 space-y-4 section-header">
            <div class="inline-block px-3 py-1 bg-gray-100 rounded-full text-sm font-medium">
                Blog Post
            </div>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold">
                Trending Blog Post for<br>Quick Career Tips
            </h2>
            <p class="max-w-2xl mx-auto text-gray-600">
                We proudly collaborate with numerous companies, bringing together expertise and innovation to achieve outstanding results
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 blog-posts">
            <!-- Main Blog Post -->
            <div class="lg:col-span-2 bg-white rounded-lg shadow-md overflow-hidden main-post">
                <div class="relative h-80">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="Blog Post" class="w-full h-full object-cover">
                    <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black to-transparent text-white">
                        <div class="flex items-center space-x-2 mb-2">
                            <span class="text-sm">6 Sept 2024</span>
                            <span class="text-sm">•</span>
                            <span class="text-sm">Career Tips</span>
                        </div>
                        <h3 class="text-2xl font-bold">Working multiple Remote Jobs : What You Need To Now</h3>
                    </div>
                </div>
            </div>

            <!-- Side Blog Posts -->
            <div class="space-y-6 side-posts">
                <!-- Blog Post 1 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden side-post">
                    <div class="flex flex-col md:flex-row">
                        <div class="md:w-1/3">
                            <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="Blog Post" class="w-full h-full object-cover">
                        </div>
                        <div class="md:w-2/3 p-4">
                            <div class="flex items-center space-x-2 mb-2 text-sm text-gray-500">
                                <span>5 Sept 2024</span>
                                <span>•</span>
                                <span>Career Tips</span>
                            </div>
                            <h3 class="text-lg font-bold mb-2">25 Companies Hiring For Remote Jobs Right Now</h3>
                            <p class="text-gray-600 text-sm">Discover top companies offering remote positions and how to stand out in your application.</p>
                        </div>
                    </div>
                </div>

                <!-- Blog Post 2 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden side-post">
                    <div class="flex flex-col md:flex-row">
                        <div class="md:w-1/3">
                            <img src="https://images.unsplash.com/photo-1555421689-491a97ff2040?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="Blog Post" class="w-full h-full object-cover">
                        </div>
                        <div class="md:w-2/3 p-4">
                            <div class="flex items-center space-x-2 mb-2 text-sm text-gray-500">
                                <span>4 Sept 2024</span>
                                <span>•</span>
                                <span>Career Tips</span>
                            </div>
                            <h3 class="text-lg font-bold mb-2">The Hidden Savings (And Costs) Of Working From Home</h3>
                            <p class="text-gray-600 text-sm">Learn about the financial implications of remote work and how to maximize your savings.</p>
                        </div>
                    </div>
                </div>

                <!-- Blog Post 3 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden side-post">
                    <div class="flex flex-col md:flex-row">
                        <div class="md:w-1/3">
                            <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="Blog Post" class="w-full h-full object-cover">
                        </div>
                        <div class="md:w-2/3 p-4">
                            <div class="flex items-center space-x-2 mb-2 text-sm text-gray-500">
                                <span>3 Sept 2024</span>
                                <span>•</span>
                                <span>Career Tips</span>
                            </div>
                            <h3 class="text-lg font-bold mb-2">201 Essential Skills To Put On A Resume</h3>
                            <p class="text-gray-600 text-sm">Enhance your resume with these in-demand skills that employers are looking for in 2024.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Blog section animations
        gsap.from('.section-header > *', {
            scrollTrigger: {
                trigger: '#blog-section',
                start: 'top 80%'
            },
            y: 30,
            opacity: 0,
            duration: 0.8,
            stagger: 0.2,
            ease: "power2.out"
        });
        
        gsap.from('.main-post', {
            scrollTrigger: {
                trigger: '.blog-posts',
                start: 'top 80%'
            },
            x: -50,
            opacity: 0,
            duration: 0.8,
            ease: "power2.out"
        });
        
        gsap.from('.side-post', {
            scrollTrigger: {
                trigger: '.side-posts',
                start: 'top 80%'
            },
            x: 50,
            opacity: 0,
            duration: 0.8,
            stagger: 0.2,
            ease: "power2.out"
        });
        
        // Blog post hover animations
        const mainPost = document.querySelector('.main-post');
        const sidePosts = document.querySelectorAll('.side-post');
        
        mainPost.addEventListener('mouseenter', function() {
            gsap.to(this, {
                y: -10,
                boxShadow: '0 10px 25px rgba(0, 0, 0, 0.1)',
                duration: 0.3,
                ease: "power2.out"
            });
        });
        
        mainPost.addEventListener('mouseleave', function() {
            gsap.to(this, {
                y: 0,
                boxShadow: '0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)',
                duration: 0.3,
                ease: "power2.out"
            });
        });
        
        sidePosts.forEach(post => {
            post.addEventListener('mouseenter', function() {
                gsap.to(this, {
                    y: -5,
                    boxShadow: '0 10px 25px rgba(0, 0, 0, 0.1)',
                    duration: 0.3,
                    ease: "power2.out"
                });
            });
            
            post.addEventListener('mouseleave', function() {
                gsap.to(this, {
                    y: 0,
                    boxShadow: '0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)',
                    duration: 0.3,
                    ease: "power2.out"
                });
            });
        });
    });
</script>
