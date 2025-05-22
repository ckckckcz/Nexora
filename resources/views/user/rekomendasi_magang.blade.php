@extends('layouts.spk')
@section('spk')
    @props([
        'tagCategories' => [
            [
                'name' => 'Kriteria Magang',
                'tags' => [
                    ['name' => 'Perusahaan Teknologi', 'icon' => '💻'],
                    ['name' => 'Lokasi di Kota Besar', 'icon' => '🏙️'],
                    ['name' => 'Budaya Kerja Fleksibel', 'icon' => '🕒'],
                    ['name' => 'Gaji Kompetitif', 'icon' => '💸'],
                    ['name' => 'Kesempatan Belajar', 'icon' => '📚'],
                    ['name' => 'Perusahaan Startup', 'icon' => '🚀'],
                    ['name' => 'Tim Kolaboratif', 'icon' => '🤝'],
                    ['name' => 'Proyek Inovatif', 'icon' => '💡'],
                    ['name' => 'Perusahaan Multinasional', 'icon' => '🌍'],
                    ['name' => 'Lingkungan Kerja Kreatif', 'icon' => '🎨'],
                ],
            ],
        ],
        'selectedTags' => []
    ])

    <div class="min-h-screen bg-white p-4 md:p-8 justify-center items-center flex">
        <div class="max-w-4xl mx-auto">
            <!-- Stepper Navigation -->
            <div class="mb-8">
                <ul class="flex justify-between text-sm font-medium text-gray-600">
                    <li class="step step-1 active font-bold text-blue-900">1. Pilih Kriteria</li>
                    <li class="step step-2">2. Input Bobot</li>
                    <li class="step step-3">3. Proses</li>
                    <li class="step step-4">4. Hasil</li>
                </ul>
            </div>

            <!-- Step 1: Pilih Kriteria -->
            <div id="step-1" class="step-content">
                <header class="mb-8 text-left">
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">Pilih Kriteria Magang Anda</h1>
                    <p class="text-gray-600">
                        Pilih tepat 5 kriteria yang sesuai dengan preferensi magang Anda. Semua kriteria wajib dipilih untuk melanjutkan.
                    </p>
                </header>

                <div class="space-y-8">
                    @foreach($tagCategories as $category)
                        <div class="bg-white rounded-xl border border-gray-200 p-4 md:p-6 shadow-sm">
                            <h2 class="text-xl font-semibold text-gray-800 mb-4">{{ $category['name'] }}</h2>
                            <div class="flex flex-wrap gap-2 md:gap-3">
                                @foreach($category['tags'] as $tag)
                                    <button
                                        data-tag-name="{{ $tag['name'] }}"
                                        data-tag-icon="{{ $tag['icon'] }}"
                                        class="tag-button px-4 py-2 rounded-full cursor-pointer text-sm md:text-base transition-all duration-200 flex items-center bg-gray-100 text-gray-800 hover:bg-blue-100 hover:text-blue-900 hover:shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-900 focus:ring-opacity-50"
                                        aria-pressed="false"
                                    >
                                        <span class="mr-2">{{ $tag['icon'] }}</span>
                                        {{ $tag['name'] }}
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-8">
                    <div class="flex items-center justify-between mb-2">
                        <h2 class="text-lg font-semibold text-gray-800">Kriteria Terpilih (<span id="selected-tags-count">0</span>/5)</h2>
                        <button id="clear-tags" class="text-sm text-blue-900 hover:text-blue-700 transition-colors duration-200 flex items-center hidden">
                            <span>Hapus Semua</span>
                        </button>
                    </div>

                    <div class="min-h-16 p-4 bg-gray-50 rounded-xl border border-gray-200">
                        <div id="selected-tags" class="flex flex-wrap gap-2">
                            <p class="text-gray-500 text-center w-full">Belum ada kriteria yang dipilih</p>
                        </div>
                    </div>
                    <p id="max-tags-message" class="text-red-600 text-sm mt-2 hidden">Anda hanya dapat memilih tepat 5 kriteria.</p>
                    <p id="min-tags-message" class="text-red-600 text-sm mt-2 hidden">Anda harus memilih tepat 5 kriteria untuk melanjutkan.</p>
                </div>

                <div class="mt-8 text-center">
                    <button
                        id="submit-tags"
                        class="px-6 py-3 rounded-lg font-medium text-white shadow-lg transition-all duration-200 transform bg-gray-400 cursor-not-allowed"
                        disabled
                    >
                        Lanjutkan
                    </button>
                </div>
            </div>

            <!-- Step 2: Input Bobot -->
            <div id="step-2" class="step-content hidden">
                <header class="mb-8 text-left">
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">Input Bobot Kriteria</h1>
                    <p class="text-gray-600">
                        Masukkan bobot (angka 1-10) untuk setiap kriteria yang dipilih. Bobot mencerminkan tingkat kepentingan.
                    </p>
                </header>

                <div id="weight-inputs" class="space-y-4"></div>
                <p id="weight-error" class="text-red-600 text-sm mt-2 hidden">Semua bobot harus berupa angka antara 1 dan 10.</p>

                <div class="mt-8 flex justify-center gap-4">
                    <button id="back-to-step-1" class="px-6 py-3 rounded-lg font-medium text-gray-800 border border-gray-300 shadow-lg transition-all duration-200 hover:bg-gray-100">
                        Kembali
                    </button>
                    <button id="submit-weights" class="px-6 py-3 rounded-lg font-medium text-white shadow-lg transition-all duration-200 transform bg-blue-900 hover:bg-blue-800 hover:scale-105">
                        Lanjutkan
                    </button>
                </div>
            </div>

            <!-- Step 3: Loading -->
            <div id="step-3" class="step-content hidden">
                <div class="flex flex-col items-center justify-center min-h-[300px]">
                    <div class="animate-spin rounded-full h-16 w-16 border-t-4 border-blue-900"></div>
                    <p class="mt-4 text-gray-600">Memproses preferensi Anda...</p>
                </div>
            </div>

            <!-- Step 4: Hasil -->
            <div id="step-4" class="step-content hidden">
                <header class="mb-8 text-left">
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">Hasil Rekomendasi Magang</h1>
                    <p class="text-gray-600">
                        Berikut adalah beberapa rekomendasi magang berdasarkan kriteria dan bobot yang Anda pilih.
                    </p>
                </header>

                <div id="recommendation-cards" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Cards will be populated dynamically -->
                </div>

                <div class="mt-8 text-center">
                    <button id="back-to-step-1-from-result" class="px-6 py-3 rounded-lg font-medium text-gray-800 border border-gray-300 shadow-lg transition-all duration-200 hover:bg-gray-100">
                        Ulangi
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const selectedTags = [];
        const requiredTags = 5;
        let weights = {};

        const steps = document.querySelectorAll('.step');
        const stepContents = document.querySelectorAll('.step-content');
        const selectedTagsContainer = document.getElementById('selected-tags');
        const selectedTagsCount = document.getElementById('selected-tags-count');
        const clearTagsButton = document.getElementById('clear-tags');
        const maxTagsMessage = document.getElementById('max-tags-message');
        const minTagsMessage = document.getElementById('min-tags-message');
        const submitTagsButton = document.getElementById('submit-tags');
        const weightInputsContainer = document.getElementById('weight-inputs');
        const weightError = document.getElementById('weight-error');
        const backToStep1Button = document.getElementById('back-to-step-1');
        const submitWeightsButton = document.getElementById('submit-weights');
        const backToStep1FromResultButton = document.getElementById('back-to-step-1-from-result');
        const recommendationCards = document.getElementById('recommendation-cards');

        function setActiveStep(stepNumber) {
            steps.forEach(step => step.classList.remove('active', 'font-bold', 'text-blue-900'));
            stepContents.forEach(content => content.classList.add('hidden'));
            document.querySelector(`.step-${stepNumber}`).classList.add('active', 'font-bold', 'text-blue-900');
            document.getElementById(`step-${stepNumber}`).classList.remove('hidden');
        }

        function updateSelectedTagsDisplay() {
            selectedTagsContainer.innerHTML = '';
            if (selectedTags.length === 0) {
                selectedTagsContainer.innerHTML = '<p class="text-gray-500 text-center w-full">Belum ada kriteria yang dipilih</p>';
                clearTagsButton.classList.add('hidden');
                submitTagsButton.classList.add('bg-gray-400', 'cursor-not-allowed');
                submitTagsButton.classList.remove('bg-blue-900', 'hover:bg-blue-800', 'hover:scale-105');
                submitTagsButton.disabled = true;
            } else {
                selectedTags.forEach(tag => {
                    const tagElement = document.createElement('div');
                    tagElement.className = 'flex items-center bg-blue-900 text-white px-4 py-2 rounded-full text-sm';
                    tagElement.innerHTML = `
                        <span class="mr-1">${tag.icon}</span>
                        <span>${tag.name}</span>
                        <button class="ml-2 focus:outline-none remove-tag cursor-pointer" data-tag-name="${tag.name}" aria-label="Hapus kriteria ${tag.name}">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    `;
                    selectedTagsContainer.appendChild(tagElement);
                });
                clearTagsButton.classList.remove('hidden');
                submitTagsButton.classList.remove('bg-gray-400', 'cursor-not-allowed');
                submitTagsButton.classList.add('bg-blue-900', 'hover:bg-blue-800', 'hover:scale-105');
                submitTagsButton.disabled = selectedTags.length !== requiredTags;
            }
            selectedTagsCount.textContent = selectedTags.length;
            submitTagsButton.querySelector('span').textContent = selectedTags.length;
        }

        document.querySelectorAll('.tag-button').forEach(button => {
            button.addEventListener('click', () => {
                const tagName = button.dataset.tagName;
                const tagIcon = button.dataset.tagIcon;
                const tag = { name: tagName, icon: tagIcon };

                if (selectedTags.some(t => t.name === tagName)) {
                    const index = selectedTags.findIndex(t => t.name === tagName);
                    selectedTags.splice(index, 1);
                    button.classList.remove('bg-blue-900', 'text-white', 'shadow-md', 'scale-105');
                    button.classList.add('bg-gray-100', 'text-gray-800', 'hover:bg-blue-100', 'hover:text-blue-900', 'hover:shadow-sm');
                    button.setAttribute('aria-pressed', 'false');
                    maxTagsMessage.classList.add('hidden');
                    minTagsMessage.classList.add('hidden');
                } else if (selectedTags.length < requiredTags) {
                    selectedTags.push(tag);
                    button.classList.add('bg-blue-900', 'text-white', 'shadow-md', 'scale-105');
                    button.classList.remove('bg-gray-100', 'text-gray-800', 'hover:bg-blue-100', 'hover:text-blue-900', 'hover:shadow-sm');
                    button.setAttribute('aria-pressed', 'true');
                    maxTagsMessage.classList.add('hidden');
                    minTagsMessage.classList.add('hidden');
                } else {
                    maxTagsMessage.classList.remove('hidden');
                    return;
                }

                updateSelectedTagsDisplay();
            });
        });

        clearTagsButton.addEventListener('click', () => {
            selectedTags.length = 0;
            document.querySelectorAll('.tag-button').forEach(button => {
                button.classList.remove('bg-blue-900', 'text-white', 'shadow-md', 'scale-105');
                button.classList.add('bg-gray-100', 'text-gray-800', 'hover:bg-blue-100', 'hover:text-blue-900', 'hover:shadow-sm');
                button.setAttribute('aria-pressed', 'false');
            });
            maxTagsMessage.classList.add('hidden');
            minTagsMessage.classList.add('hidden');
            updateSelectedTagsDisplay();
        });

        selectedTagsContainer.addEventListener('click', (e) => {
            if (e.target.closest('.remove-tag')) {
                const tagName = e.target.closest('.remove-tag').dataset.tagName;
                const index = selectedTags.findIndex(t => t.name === tagName);
                if (index !== -1) {
                    selectedTags.splice(index, 1);
                    const button = document.querySelector(`.tag-button[data-tag-name="${tagName}"]`);
                    button.classList.remove('bg-blue-900', 'text-white', 'shadow-md', 'scale-105');
                    button.classList.add('bg-gray-100', 'text-gray-800', 'hover:bg-blue-100', 'hover:text-blue-900', 'hover:shadow-sm');
                    button.setAttribute('aria-pressed', 'false');
                    maxTagsMessage.classList.add('hidden');
                    minTagsMessage.classList.add('hidden');
                    updateSelectedTagsDisplay();
                }
            }
        });

        submitTagsButton.addEventListener('click', () => {
            if (selectedTags.length === requiredTags) {
                weightInputsContainer.innerHTML = '';
                selectedTags.forEach(tag => {
                    const inputDiv = document.createElement('div');
                    inputDiv.className = 'flex items-center gap-4';
                    inputDiv.innerHTML = `
                        <label class="text-gray-800 font-medium" for="weight-${tag.name}">${tag.icon} ${tag.name}</label>
                        <input
                            type="number"
                            id="weight-${tag.name}"
                            data-tag-name="${tag.name}"
                            class="w-20 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900"
                            min="1"
                            max="10"
                            placeholder="1-10"
                        >
                    `;
                    weightInputsContainer.appendChild(inputDiv);
                });
                setActiveStep(2);
            } else {
                minTagsMessage.classList.remove('hidden');
            }
        });

        backToStep1Button.addEventListener('click', () => {
            weights = {};
            setActiveStep(1);
        });

        submitWeightsButton.addEventListener('click', () => {
            weights = {};
            let valid = true;
            document.querySelectorAll('#weight-inputs input').forEach(input => {
                const value = input.value;
                const tagName = input.dataset.tagName;
                if (!value || isNaN(value) || value < 1 || value > 10) {
                    valid = false;
                } else {
                    weights[tagName] = parseInt(value);
                }
            });
            if (valid) {
                weightError.classList.add('hidden');
                setActiveStep(3);
                setTimeout(() => {
                    // Dummy recommendation data
                    const recommendations = [
                        {
                            name: 'PT Teknologi Maju',
                            description: 'Perusahaan teknologi inovatif yang berfokus pada pengembangan aplikasi berbasis AI. Berlokasi di Jakarta.',
                            matchedCriteria: selectedTags.slice(0, 4) // Match 4 criteria
                        },
                        {
                            name: 'Startup Keren',
                            description: 'Startup dinamis yang mendorong inovasi dalam solusi teknologi mobile. Menawarkan budaya kerja fleksibel.',
                            matchedCriteria: selectedTags.slice(1, 5) // Match different 4 criteria
                        },
                        {
                            name: 'Global Corp',
                            description: 'Perusahaan multinasional dengan proyek skala besar dan tim kolaboratif di berbagai negara.',
                            matchedCriteria: selectedTags.slice(0, 3) // Match 3 criteria
                        }
                    ];

                    recommendationCards.innerHTML = '';
                    recommendations.forEach(rec => {
                        const card = document.createElement('div');
                        card.className = 'bg-white rounded-xl border border-gray-200 p-6 shadow-sm';
                        card.innerHTML = `
                            <h2 class="text-xl font-semibold text-gray-800 mb-4">${rec.name}</h2>
                            <p class="text-gray-600 mb-4">${rec.description}</p>
                            <div class="mb-4">
                                <h3 class="text-lg font-semibold text-gray-800">Kriteria Sesuai:</h3>
                                <ul class="list-disc list-inside text-gray-600">
                                    ${rec.matchedCriteria.map(tag => `<li>${tag.icon} ${tag.name} (Bobot: ${weights[tag.name]})</li>`).join('')}
                                </ul>
                            </div>
                        `;
                        recommendationCards.appendChild(card);
                    });
                    setActiveStep(4);
                }, 2000); // Simulate processing delay
            } else {
                weightError.classList.remove('hidden');
            }
        });

        backToStep1FromResultButton.addEventListener('click', () => {
            selectedTags.length = 0;
            weights = {};
            document.querySelectorAll('.tag-button').forEach(button => {
                button.classList.remove('bg-blue-900', 'text-white', 'shadow-md', 'scale-105');
                button.classList.add('bg-gray-100', 'text-gray-800', 'hover:bg-blue-100', 'hover:text-blue-900', 'hover:shadow-sm');
                button.setAttribute('aria-pressed', 'false');
            });
            maxTagsMessage.classList.add('hidden');
            minTagsMessage.classList.add('hidden');
            updateSelectedTagsDisplay();
            setActiveStep(1);
        });
    </script>