<section class="py-16 md:py-24 overflow-hidden" id="features-section">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16 space-y-4 section-header">
            <div class="inline-block px-3 py-1 bg-gray-100 rounded-full text-sm font-medium">
                What it is work
            </div>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold">
                Brilliant Work and<br>Guaranteed by Us
            </h2>
            <p class="max-w-2xl mx-auto text-gray-600">
                Count on us for brilliant work, backed by our satisfaction Guarantee. We ensure every detail meet
                the highest standards, exceeding your expectation
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Feature 1 -->
            <div class="border-t-2 border-gray-200 pt-6 feature-card">
                <div class="text-blue-600 font-bold mb-2">01</div>
                <h3 class="text-xl font-bold mb-3">Login or Register</h3>
                <p class="text-gray-600">
                    Login with email and sign up with email and linkedin.
                </p>
            </div>

            <!-- Feature 2 -->
            <div class="border-t-2 border-blue-600 pt-6 feature-card">
                <div class="text-blue-600 font-bold mb-2">02</div>
                <h3 class="text-xl font-bold mb-3">Personal Job Recomendation</h3>
                <p class="text-gray-600">
                    Using our state of the art job matching proses, we can recommend you jobs best on your pervious searches, application and CV.
                </p>
            </div>

            <!-- Feature 3 -->
            <div class="border-t-2 border-gray-200 pt-6 feature-card">
                <div class="text-blue-600 font-bold mb-2">03</div>
                <h3 class="text-xl font-bold mb-3">Quiq Apply</h3>
                <p class="text-gray-600">
                    Easily apply multiple jobs with one click! Quiq Apply show you recommended jobs based off your most recent search.
                </p>
            </div>

            <!-- Feature 4 -->
            <div class="border-t-2 border-gray-200 pt-6 feature-card">
                <div class="text-blue-600 font-bold mb-2">04</div>
                <h3 class="text-xl font-bold mb-3">Job Alert Email</h3>
                <p class="text-gray-600">
                    Keep track of position that you're interested in by signing up of job alert emails.
                </p>
            </div>
        </div>

        <!-- Feature Detail -->
        <div class="mt-20 bg-white rounded-lg shadow-lg overflow-hidden feature-detail">
            <div class="grid md:grid-cols-2 gap-8">
                <div class="p-8 space-y-4 feature-text">
                    <div class="text-blue-600 font-bold">02</div>
                    <h3 class="text-2xl font-bold">Personal Job Recomendation</h3>
                    <p class="text-gray-600">
                        Using our state of the art job matching proses, we can recommend you jobs best on your pervious searches, application and CV.
                    </p>
                    <div class="pt-4">
                        <div class="flex items-center text-green-600 space-x-2">
                            <svg class="h-5 w-5 check-icon" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <p>Easily apply multiple jobs with one click! Quiq Apply show you recommended jobs based off your most recent search.</p>
                        </div>
                    </div>
                </div>
                <div class="bg-blue-600 p-8 flex items-center justify-center feature-image">
                    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-sm">
                        <div class="flex justify-between items-center mb-6">
                            <div class="h-16 w-16 bg-gray-200 rounded-full flex items-center justify-center">
                                <svg class="h-8 w-8 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <button class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm">Upload Photo</button>
                        </div>
                        <div class="space-y-4">
                            <h4 class="font-medium">Personal Data</h4>
                            <div class="space-y-2">
                                <div class="w-full h-2 bg-blue-600 rounded-full progress-bar"></div>
                                <div class="bg-gray-200 rounded p-2">A</div>
                                <div class="w-full h-2 bg-blue-600 rounded-full progress-bar"></div>
                                <div class="bg-gray-200 rounded p-2"></div>
                                <div class="w-full h-2 bg-blue-600 rounded-full progress-bar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Features section animations
        gsap.from('.section-header > *', {
            scrollTrigger: {
                trigger: '#features-section',
                start: 'top 80%'
            },
            y: 30,
            opacity: 0,
            duration: 0.8,
            stagger: 0.2,
            ease: "power2.out"
        });
        
        gsap.from('.feature-card', {
            scrollTrigger: {
                trigger: '.feature-card',
                start: 'top 80%'
            },
            y: 50,
            opacity: 0,
            duration: 0.8,
            stagger: 0.2,
            ease: "power2.out"
        });
        
        // Feature detail animations
        const featureDetailTl = gsap.timeline({
            scrollTrigger: {
                trigger: '.feature-detail',
                start: 'top 70%'
            }
        });
        
        featureDetailTl.from('.feature-detail', {
            y: 50,
            opacity: 0,
            duration: 0.8,
            ease: "power2.out"
        })
        .from('.feature-text > *', {
            y: 30,
            opacity: 0,
            duration: 0.6,
            stagger: 0.1,
            ease: "power2.out"
        }, "-=0.4")
        .from('.feature-image', {
            x: 50,
            opacity: 0,
            duration: 0.8,
            ease: "power2.out"
        }, "-=0.6")
        .from('.check-icon', {
            scale: 0,
            opacity: 0,
            duration: 0.5,
            ease: "back.out(1.7)"
        }, "-=0.4")
        .from('.progress-bar', {
            scaleX: 0,
            transformOrigin: 'left',
            duration: 0.8,
            stagger: 0.2,
            ease: "power2.inOut"
        }, "-=0.2");
        
        // Feature card hover animations
        const featureCards = document.querySelectorAll('.feature-card');
        
        featureCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                gsap.to(this, {
                    y: -10,
                    boxShadow: '0 10px 25px rgba(0, 0, 0, 0.1)',
                    duration: 0.3,
                    ease: "power2.out"
                });
            });
            
            card.addEventListener('mouseleave', function() {
                gsap.to(this, {
                    y: 0,
                    boxShadow: '0 0 0 rgba(0, 0, 0, 0)',
                    duration: 0.3,
                    ease: "power2.out"
                });
            });
        });
    });
</script>
