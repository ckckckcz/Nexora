<section class="py-12 sm:py-16 lg:py-24 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-8 lg:gap-12">
            {{-- Left Section --}}
            <div x-data x-intersect="$el.classList.add('animate-fade-in-up')" class="lg:w-1/2">
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-blue-900 mb-4 leading-tight">
                    We're Always Here.<br />
                    Employees Come and Go
                </h2>
                <p class="text-gray-600 mb-6 text-sm sm:text-base">
                    Discover the optimal match for your startup and get the best results faster.
                </p>
                <a href="/learn-more"
                   class="inline-block bg-[#DEFC79] text- font-semibold px-6 py-3 rounded-lg mb-8 hover:bg-[#e8c34b] transition-all duration-300 hover:shadow-lg transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-[#F7D154] focus:ring-opacity-50"
                   aria-label="Learn more about our services">
                    Learn More
                </a>
                <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 sm:gap-6 mt-4">
                    <div class="flex items-center gap-2 animate-fade-in-up">
                        <div class="w-4 h-4 rounded-full bg-blue-900"></div>
                        <span class="text-sm font-medium">Top 0.1% Candidates</span>
                    </div>
                    <div class="flex items-center gap-2 animate-fade-in-up">
                        <div class="w-4 h-4 rounded-full bg-blue-900"></div>
                        <span class="text-sm font-medium">Already Tested</span>
                    </div>
                </div>
            </div>

            {{-- Right Section --}}
            <div x-data="{
                candidates: [
                    {
                        name: 'Beniamin Rezalan',
                        role: 'Front Developer',
                        hourly: '$20/hr',
                        time: '2 mins ago',
                        description: 'Berpengalaman dalam pengembangan UI/UX design system termasuk komponen, design tokens, dan dokumentasi.',
                        avatar: 'https://ui-avatars.com/api/?name=Beniamin+Rezalan&background=1e3a8a&color=fff'
                    },
                    {
                        name: 'Sarah Johnson',
                        role: 'Project Manager',
                        hourly: '$35/hr',
                        time: '1 hour ago',
                        description: 'Ahli dalam manajemen proyek digital, fokus pada peningkatan usability dan performa sistem.',
                        avatar: 'https://ui-avatars.com/api/?name=Sarah+Johnson&background=1e3a8a&color=fff'
                    },
                    {
                        name: 'Michael Chen',
                        role: 'HR Specialist',
                        hourly: '$25/hr',
                        time: '3 hours ago',
                        description: 'Bertanggung jawab dalam perekrutan dan penyusunan tes teknis untuk posisi senior developer.',
                        avatar: 'https://ui-avatars.com/api/?name=Michael+Chen&background=1e3a8a&color=fff'
                    }
                ],
                activeIndex: 0
            }" class="lg:w-1/2" x-intersect="$el.classList.add('animate-fade-in-up')">
                <div class="bg-white rounded-xl shadow-md p-4">
                    <div class="bg-blue-900 text-white rounded-lg p-4 mb-6">
                        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 sm:gap-0">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-users text-[#F7D154]"></i>
                                <span class="font-medium">Kandidat Terbaru</span>
                            </div>
                        </div>
                    </div>
            
                    <div class="border border-gray-200 rounded-lg p-4 sm:p-6">
                        <!-- Navigasi kandidat -->
                        <div class="flex justify-between items-center mb-4">
                            <h4 class="font-semibold text-lg">Profil Kandidat</h4>
                            <div class="flex gap-2">
                                <button @click="activeIndex = activeIndex > 0 ? activeIndex - 1 : candidates.length - 1"
                                        class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-gray-200">
                                        <svg class="w-5 h-5 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
                                        </svg>                                          
                                </button>
                                <button @click="activeIndex = activeIndex < candidates.length - 1 ? activeIndex + 1 : 0"
                                        class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center bg-[#DEFC79]er text-gray-600 hover:bg-gray-200">
                                        <svg class="w-5 h-5 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/>
                                        </svg>
                                </button>
                            </div>
                        </div>
            
                        <!-- Isi profil -->
                        <template x-if="candidates.length">
                            <div class="text-gray-700 space-y-4">
                                <div class="flex items-center gap-4">
                                    <img :src="candidates[activeIndex].avatar" alt="avatar" class="w-16 h-16 rounded-full object-cover">
                                    <div>
                                        <h4 class="font-semibold text-xl" x-text="candidates[activeIndex].name"></h4>
                                        <p class="text-sm text-gray-500" x-text="candidates[activeIndex].role"></p>
                                        <div class="flex items-center text-xs text-gray-400 mt-1">
                                            <i class="fas fa-clock mr-1"></i>
                                            <span x-text="candidates[activeIndex].time"></span>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-sm" x-text="candidates[activeIndex].description"></p>
                            </div>
                        </template>
            
                        <!-- Pagination Indicator -->
                        <div class="flex justify-center mt-6 gap-1">
                            <template x-for="(c, idx) in candidates" :key="idx">
                                <button @click="activeIndex = idx"
                                        :class="[activeIndex === idx ? 'bg-blue-900 w-4' : 'bg-gray-200 w-2', 'h-2 rounded-full transition-all']">
                                </button>
                            </template>
                        </div>
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