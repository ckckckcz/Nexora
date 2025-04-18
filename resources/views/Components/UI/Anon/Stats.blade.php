<section class="bg-blue-900 text-white py-12 overflow-hidden" id="stats-section">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
            <div class="space-y-2 stat-item">
                <h3 class="text-4xl font-bold stat-number" data-target="3000000">0</h3>
                <p class="text-blue-200">Competent Jobseekers</p>
            </div>
            <div class="space-y-2 stat-item">
                <h3 class="text-4xl font-bold stat-number" data-target="1300">0</h3>
                <p class="text-blue-200">Effective Opportunity</p>
            </div>
            <div class="space-y-2 stat-item">
                <h3 class="text-4xl font-bold stat-number" data-target="20">0</h3>
                <p class="text-blue-200">Availability</p>
            </div>
        </div>
    </div>
    
    <!-- Background decorations -->
    <div class="absolute left-0 top-0 w-40 h-40 bg-blue-800 rounded-full opacity-30 blur-2xl transform -translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute right-0 bottom-0 w-60 h-60 bg-blue-800 rounded-full opacity-30 blur-2xl transform translate-x-1/2 translate-y-1/2"></div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Stats counter animation
        function animateStats() {
            const statNumbers = document.querySelectorAll('.stat-number');
            
            statNumbers.forEach(stat => {
                const target = parseInt(stat.getAttribute('data-target'));
                let suffix = '';
                
                if (target >= 1000000) {
                    suffix = 'M+';
                } else if (target >= 1000) {
                    suffix = '+';
                } else {
                    suffix = 'X';
                }
                
                let displayTarget = target;
                if (target >= 1000000) {
                    displayTarget = target / 1000000;
                }
                
                gsap.to(stat, {
                    scrollTrigger: {
                        trigger: '#stats-section',
                        start: 'top 80%',
                        once: true
                    },
                    innerText: displayTarget,
                    duration: 2,
                    snap: { innerText: 1 },
                    ease: "power2.inOut",
                    onComplete: function() {
                        stat.innerText = displayTarget + suffix;
                    }
                });
            });
        }
        
        // Stats section animations
        gsap.from('.stat-item', {
            scrollTrigger: {
                trigger: '#stats-section',
                start: 'top 80%'
            },
            y: 50,
            opacity: 0,
            duration: 0.8,
            stagger: 0.2,
            ease: "power2.out",
            onComplete: animateStats
        });
    });
</script>
