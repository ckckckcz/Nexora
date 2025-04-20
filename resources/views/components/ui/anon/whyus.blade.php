<section class="py-12 sm:py-16 lg:py-24 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-8 lg:gap-12">
            {{-- Left Section --}}
            <div x-data x-intersect="$el.classList.add('animate-fade-in-up')" class="lg:w-1/2">
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-[#1A3C34] mb-4 leading-tight">
                    We're Always Here.<br />
                    Employees Come and Go
                </h2>
                <p class="text-gray-600 mb-6 text-sm sm:text-base">
                    Discover the optimal match for your startup and get the best results faster.
                </p>
                <a href="/learn-more"
                   class="inline-block bg-[#F7D154] text-[#1A3C34] font-semibold px-6 py-3 rounded-lg mb-8 hover:bg-[#e8c34b] transition-all duration-300 hover:shadow-lg transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-[#F7D154] focus:ring-opacity-50"
                   aria-label="Learn more about our services">
                    Learn More
                </a>
                <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 sm:gap-6 mt-4">
                    <div class="flex items-center gap-2 animate-fade-in-up">
                        <div class="w-4 h-4 rounded-full bg-[#1A3C34]"></div>
                        <span class="text-sm font-medium">Top 0.1% Candidates</span>
                    </div>
                    <div class="flex items-center gap-2 animate-fade-in-up">
                        <div class="w-4 h-4 rounded-full bg-[#1A3C34]"></div>
                        <span class="text-sm font-medium">Already Tested</span>
                    </div>
                </div>
            </div>

            {{-- Right Section --}}
            <div x-data="{
                reviews: [
                    {
                        title: 'Review Proposal',
                        user: 'Beniamin Rezalan',
                        role: 'Front Developer',
                        time: '2 mins ago',
                        content: 'Review the proposal for the new UI/UX design system. This includes component library, design tokens, and documentation.'
                    },
                    {
                        title: 'Project Feedback',
                        user: 'Sarah Johnson',
                        role: 'Project Manager',
                        time: '1 hour ago',
                        content: 'Provide feedback on the latest project deliverables. Focus on usability improvements and performance optimizations.'
                    },
                    {
                        title: 'Interview Candidates',
                        user: 'Michael Chen',
                        role: 'HR Specialist',
                        time: '3 hours ago',
                        content: 'Schedule interviews with shortlisted candidates for the senior developer position. Prepare technical assessment tasks.'
                    }
                ],
                activeReview: 0,
                isExpanded: false
            }" class="lg:w-1/2" x-intersect="$el.classList.add('animate-fade-in-up')">
                <div class="bg-white rounded-xl shadow-md p-6 sm:p-8">
                    <div class="bg-[#1A3C34] text-white rounded-lg p-4 mb-6">
                        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 sm:gap-0">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-briefcase text-[#F7D154]"></i>
                                <span class="font-medium">UI/UX Jobs</span>
                            </div>
                            <span class="text-sm font-semibold">$20/hr</span>
                        </div>
                    </div>

                    <div class="border border-gray-200 rounded-lg p-4 sm:p-6">
                        {{-- Navigation --}}
                        <div class="flex justify-between items-center mb-4">
                            <h4 class="font-semibold text-lg">Latest Reviews</h4>
                            <div class="flex gap-2">
                                <button @click="activeReview = activeReview > 0 ? activeReview - 1 : reviews.length - 1"
                                        class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-gray-200 transition-colors focus:outline-none focus:ring-2 focus:ring-[#1A3C34]"
                                        aria-label="Previous review">
                                    <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v13m0-13 4 4m-4-4-4 4"/>
                                    </svg>
                                </button>
                                <button @click="activeReview = activeReview < reviews.length - 1 ? activeReview + 1 : 0"
                                        class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-gray-200 transition-colors focus:outline-none focus:ring-2 focus:ring-[#1A3C34]"
                                        aria-label="Next review">
                                    <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19V5m0 14-4-4m4 4 4-4"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        {{-- Review Content --}}
                        <template x-if="reviews.length">
                            <div>
                                <div class="flex items-start gap-3 mb-4">
                                    <div class="w-8 h-8 rounded-full bg-[#1A3C34] flex items-center justify-center text-white">
                                        <i class="fas fa-info-circle"></i>
                                    </div>
                                    <div class="w-full">
                                        <div class="flex justify-between items-center">
                                            <h4 class="font-semibold" x-text="reviews[activeReview].title"></h4>
                                            <button @click="isExpanded = !isExpanded"
                                                    class="text-gray-400 hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-[#1A3C34]"
                                                    :aria-label="isExpanded ? 'Collapse review' : 'Expand review'">
                                                <i x-show="isExpanded" class="fas fa-chevron-up"></i>
                                                <i x-show="!isExpanded" class="fas fa-chevron-down"></i>
                                            </button>
                                        </div>
                                        <p x-show="isExpanded" x-text="reviews[activeReview].content"
                                           class="text-sm text-gray-600 mt-2"></p>
                                    </div>
                                </div>

                                <div class="flex items-start gap-3 mt-4">
                                    <div class="w-8 h-8 rounded-full bg-[#1A3C34] flex items-center justify-center text-white">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold" x-text="reviews[activeReview].user"></h4>
                                        <p class="text-sm text-gray-500" x-text="reviews[activeReview].role"></p>
                                        <div class="flex items-center text-xs text-gray-400 mt-1">
                                            <i class="fas fa-clock mr-1"></i>
                                            <span x-text="reviews[activeReview].time"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4 space-y-2">
                                    <div class="h-2 bg-gray-200 rounded-full w-full"></div>
                                    <div class="h-2 bg-gray-200 rounded-full w-3/4"></div>
                                </div>

                                {{-- Pagination Indicators --}}
                                <div class="flex justify-center mt-4 gap-1">
                                    <template x-for="(review, index) in reviews" :key="index">
                                        <button @click="activeReview = index"
                                                :class="activeReview === index ? 'bg-[#1A3C34] w-4' : 'bg-gray-300'"
                                                class="h-2 rounded-full transition-all focus:outline-none focus:ring-2 focus:ring-[#1A3C34]"
                                                :aria-label="'Go to review ' + (index + 1)"></button>
                                    </template>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in-up {
        animation: fadeInUp 0.6s ease-out forwards;
        will-change: transform, opacity;
    }
</style>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>