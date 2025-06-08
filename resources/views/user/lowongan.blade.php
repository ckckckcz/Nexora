@extends('layouts.user')
@section('user')
    <div class="min-h-screen bg-gradient-to-b from-gray-50 to-white py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Header Section -->
            <div class="mb-10 ">
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-blue-900 mb-4 leading-tight">
                    Temukan <span class="text-blue-700">Lowongan Magang</span> Terbaik
                </h1>
                <p class="text-lg text-gray-600 max-w-2xl">
                    Jelajahi berbagai posisi magang dari perusahaan terkemuka untuk memulai karir profesional Anda.
                </p>
            </div>

            <!-- Search and Filter Section -->
            <div class="mb-12">
                <form class="w-full" id="searchForm">
                    <div class="flex flex-col sm:flex-row gap-4 justify-start">
                        <!-- Category Dropdown -->
                        <div class="relative w-full sm:w-auto hidden">
                            <button id="dropdown-button" data-dropdown-toggle="dropdown"
                                class="w-full sm:w-auto flex items-center justify-between gap-2 py-3 px-5 text-base font-medium text-gray-900 bg-gray-50 border border-gray-200 rounded-xl hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-[#DEFC79]/50 transition-all duration-200"
                                type="button">
                                <div class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                                    </svg>
                                    <span id="selected-category">Semua Kategori</span>
                                </div>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-xl shadow-lg w-full sm:w-56 border border-gray-100">
                                <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdown-button">
                                    <li>
                                        <button type="button" data-category="all"
                                            class="dropdown-item inline-flex w-full px-5 py-3 hover:bg-gray-50 transition-colors">
                                            <span>Semua Kategori</span>
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" data-category="ui/ux"
                                            class="dropdown-item inline-flex w-full px-5 py-3 hover:bg-gray-50 transition-colors">
                                            <span>UI/UX</span>
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" data-category="front-end"
                                            class="dropdown-item inline-flex w-full px-5 py-3 hover:bg-gray-50 transition-colors">
                                            <span>Front-End</span>
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" data-category="back-end"
                                            class="dropdown-item inline-flex w-full px-5 py-3 hover:bg-gray-50 transition-colors">
                                            <span>Back-End</span>
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" data-category="project manager"
                                            class="dropdown-item inline-flex w-full px-5 py-3 hover:bg-gray-50 transition-colors">
                                            <span>Project Manager</span>
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" data-category="ai engineer"
                                            class="dropdown-item inline-flex w-full px-5 py-3 hover:bg-gray-50 transition-colors">
                                            <span>AI Engineer</span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Search Input -->
                        <div class="relative flex-1 max-w-xl">
                            <div class="relative">
                                <input type="search" id="search-input"
                                    class="block p-3.5 pl-12 w-full text-base text-gray-900 bg-gray-50 rounded-xl border border-gray-200 focus:ring-[#DEFC79] focus:border-[#DEFC79] transition-all duration-200"
                                    placeholder="Cari perusahaan atau posisi..." />
                                <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 20 20

">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                                <button type="button" id="clear-search"
                                    class="absolute top-1/2 right-16 transform -translate-y-1/2 p-1 text-gray-400 hover:text-gray-600 hidden">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                                <button type="submit"
                                    class="absolute top-1/2 right-2 transform -translate-y-1/2 p-2.5 text-sm font-medium text-black bg-[#DEFC79] hover:bg-[#c9eb5b] rounded-lg cursor-pointer border border-[#DEFC79] focus:ring-4 focus:outline-none focus:ring-[#DEFC79]/50 transition-all duration-200">
                                    <span class="px-2">Cari</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Filter Pills -->
            <div class="flex flex-wrap gap-2 mb-8">
                <button class="category-button" data-category="all">
                    Semua
                </button>
                <button class="category-button" data-category="ui/ux">
                    UI/UX
                </button>
                <button class="category-button" data-category="front-end">
                    Front-End
                </button>
                <button class="category-button" data-category="back-end">
                    Back-End
                </button>
                <button class="category-button" data-category="project manager">
                    Project Manager
                </button>
                <button class="category-button" data-category="ai engineer">
                    AI Engineer
                </button>
            </div>

            <!-- Results Counter -->
            <div class="mb-6">
                <p id="results-counter" class="text-gray-600">
                    Menampilkan <span id="visible-count">{{ count($lowongans) }}</span> dari <span id="total-count">{{ count($lowongans) }}</span> lowongan
                </p>
            </div>

            <!-- Job Listings Grid -->
            <div id="job-listings" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($lowongans as $lowongan)
                    <div class="job-card bg-white border border-gray-100 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden group"
                         data-position="{{ strtolower($lowongan->posisiMagang->nama_posisi) }}"
                         data-company="{{ strtolower($lowongan->nama_perusahaan) }}"
                         data-location="{{ strtolower($lowongan->lokasi) }}"
                         data-description="{{ strtolower($lowongan->deskripsi) }}">
                        <!-- Company Badge -->
                        <div class="h-12 bg-gradient-to-r from-blue-900 to-blue-700 flex items-center px-6">
                            <span class="text-sm font-medium text-white">{{ $lowongan->nama_perusahaan }}</span>
                        </div>
                        <!-- Job Content -->
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-xl font-bold text-gray-900 group-hover:text-blue-800 transition-colors">
                                    {{ $lowongan->posisiMagang->nama_posisi }}
                                </h3>
                                <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-[#DEFC79]/20 text-blue-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </span>
                            </div>
                            <!-- Location -->
                            <div class="flex items-center space-x-2 mb-4">
                                <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <p class="text-sm text-gray-500">{{ $lowongan->lokasi }}</p>
                            </div>
                            <!-- Description -->
                            <p class="text-sm text-gray-600 mb-6 line-clamp-3">{{ $lowongan->deskripsi }}</p>
                            <!-- Tags -->
                            <div class="flex flex-wrap gap-2 mb-6">
                                <span class="inline-block bg-blue-50 text-blue-800 text-xs px-3 py-1 rounded-full">Magang</span>
                                <span class="inline-block bg-green-50 text-green-800 text-xs px-3 py-1 rounded-full">Remote</span>
                            </div>
                            <!-- Action Button -->
                            <a href="/detail-lowongan/{{ $lowongan->id_lowongan }}"
                                class="inline-flex items-center justify-center w-full px-4 py-3 text-sm font-medium text-black bg-[#DEFC79] hover:bg-[#c9eb5b] rounded-xl focus:ring-4 focus:outline-none focus:ring-[#DEFC79]/50 transition-all duration-200 group-hover:shadow-sm">
                                <span>Lihat Detail</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- No Results Message -->
            <div id="no-results" class="hidden text-center py-12">
                <div class="max-w-md mx-auto">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 12h6m-6-4h6m2 5.291A7.962 7.962 0 0112 15c-2.239 0-4.291-.93-5.759-2.43l-.001-.002C4.006 10.26 2 6.9 2 3h3.28l1.771 5.316m9.121-1.892L19.5 12M15 3.055V9a2 2 0 002 2h5.945M15 3.055A2.952 2.952 0 0117.945 1H15v2.055z" />
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">Tidak ada lowongan ditemukan</h3>
                    <p class="mt-1 text-sm text-gray-500">Coba ubah kata kunci pencarian atau filter kategori.</p>
                    <div class="mt-6">
                        <button id="reset-filters" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Reset Filter
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Global variables
            let currentCategory = 'all';
            let currentSearchTerm = '';
            
            // DOM elements
            const searchInput = document.getElementById('search-input');
            const clearSearchBtn = document.getElementById('clear-search');
            const searchForm = document.getElementById('searchForm');
            const dropdownButton = document.getElementById('dropdown-button');
            const dropdown = document.getElementById('dropdown');
            const selectedCategorySpan = document.getElementById('selected-category');
            const categoryButtons = document.querySelectorAll('.category-button');
            const dropdownItems = document.querySelectorAll('.dropdown-item');
            const jobCards = document.querySelectorAll('.job-card');
            const noResults = document.getElementById('no-results');
            const visibleCountSpan = document.getElementById('visible-count');
            const totalCountSpan = document.getElementById('total-count');
            const resetFiltersBtn = document.getElementById('reset-filters');

            // Initialize category buttons styling
            function initializeCategoryButtons() {
                categoryButtons.forEach(button => {
                    button.classList.add('px-6', 'py-2', 'rounded-full', 'text-sm', 'font-medium', 'transition-colors');
                    if (button.dataset.category === 'all') {
                        button.classList.add('bg-blue-900', 'text-white');
                    } else {
                        button.classList.add('bg-white', 'text-gray-700', 'border', 'border-gray-200', 'hover:bg-gray-50');
                    }
                });
            }

            // Update category button styles
            function updateCategoryButtons(activeCategory) {
                categoryButtons.forEach(button => {
                    button.classList.remove('bg-blue-900', 'text-white', 'bg-white', 'text-gray-700', 'border', 'border-gray-200');
                    
                    if (button.dataset.category === activeCategory) {
                        button.classList.add('bg-blue-900', 'text-white');
                    } else {
                        button.classList.add('bg-white', 'text-gray-700', 'border', 'border-gray-200', 'hover:bg-gray-50');
                    }
                });
            }

            // Filter jobs function
            function filterJobs() {
                let visibleCount = 0;
                const totalCount = jobCards.length;

                jobCards.forEach(card => {
                    const position = card.dataset.position;
                    const company = card.dataset.company;
                    const location = card.dataset.location;
                    const description = card.dataset.description;

                    // Check category filter
                    let categoryMatch = currentCategory === 'all' || 
                                      position.includes(currentCategory.toLowerCase()) ||
                                      (currentCategory === 'ui/ux' && (position.includes('ui') || position.includes('ux')));

                    // Check search filter
                    let searchMatch = currentSearchTerm === '' ||
                                    position.includes(currentSearchTerm.toLowerCase()) ||
                                    company.includes(currentSearchTerm.toLowerCase()) ||
                                    location.includes(currentSearchTerm.toLowerCase()) ||
                                    description.includes(currentSearchTerm.toLowerCase());

                    // Show/hide card based on filters
                    if (categoryMatch && searchMatch) {
                        card.style.display = 'block';
                        card.classList.remove('hidden');
                        visibleCount++;
                    } else {
                        card.style.display = 'none';
                        card.classList.add('hidden');
                    }
                });

                // Update results counter
                visibleCountSpan.textContent = visibleCount;
                totalCountSpan.textContent = totalCount;

                // Show/hide no results message
                if (visibleCount === 0) {
                    noResults.classList.remove('hidden');
                } else {
                    noResults.classList.add('hidden');
                }
            }

            // Search functionality
            searchInput.addEventListener('input', function(e) {
                currentSearchTerm = e.target.value.trim();
                
                // Show/hide clear button
                if (currentSearchTerm) {
                    clearSearchBtn.classList.remove('hidden');
                } else {
                    clearSearchBtn.classList.add('hidden');
                }
                
                // Filter jobs with debounce
                clearTimeout(window.searchTimeout);
                window.searchTimeout = setTimeout(() => {
                    filterJobs();
                }, 300);
            });

            // Clear search
            clearSearchBtn.addEventListener('click', function() {
                searchInput.value = '';
                currentSearchTerm = '';
                clearSearchBtn.classList.add('hidden');
                filterJobs();
                searchInput.focus();
            });

            // Prevent form submission
            searchForm.addEventListener('submit', function(e) {
                e.preventDefault();
                filterJobs();
            });

            // Category button functionality
            categoryButtons.forEach(button => {
                button.addEventListener('click', function() {
                    currentCategory = this.dataset.category;
                    updateCategoryButtons(currentCategory);
                    
                    // Update dropdown text
                    const categoryText = this.textContent.trim();
                    selectedCategorySpan.textContent = categoryText;
                    
                    filterJobs();
                });
            });

            // Dropdown functionality
            dropdownButton.addEventListener('click', function(e) {
                e.preventDefault();
                dropdown.classList.toggle('hidden');
            });

            // Dropdown item selection
            dropdownItems.forEach(item => {
                item.addEventListener('click', function() {
                    const category = this.dataset.category;
                    const categoryText = this.textContent.trim();
                    
                    currentCategory = category;
                    selectedCategorySpan.textContent = categoryText;
                    dropdown.classList.add('hidden');
                    
                    updateCategoryButtons(category);
                    filterJobs();
                });
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function(event) {
                if (!dropdownButton.contains(event.target) && !dropdown.contains(event.target)) {
                    dropdown.classList.add('hidden');
                }
            });

            // Reset filters
            resetFiltersBtn.addEventListener('click', function() {
                currentCategory = 'all';
                currentSearchTerm = '';
                searchInput.value = '';
                clearSearchBtn.classList.add('hidden');
                selectedCategorySpan.textContent = 'Semua Kategori';
                updateCategoryButtons('all');
                filterJobs();
            });

            // Initialize
            initializeCategoryButtons();
            filterJobs();

            // Add loading animation for search
            let searchTimeout;
            searchInput.addEventListener('input', function() {
                // Add loading state
                this.style.opacity = '0.7';
                
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(() => {
                    this.style.opacity = '1';
                }, 300);
            });
        });
    </script>

    <style>
        /* Custom styles for smooth transitions */
        .job-card {
            transition: all 0.3s ease;
        }
        
        .job-card.hidden {
            opacity: 0;
            transform: scale(0.95);
        }
        
        /* Loading animation */
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        
        .loading {
            animation: pulse 1.5s ease-in-out infinite;
        }
    </style>
@endsection