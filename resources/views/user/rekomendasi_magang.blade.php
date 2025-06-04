@extends('layouts.spk')
@section('spk')
    @props([
        'tagCategories' => [
            [
                'name' => 'Bidang Keahlian',
                'tags' => $bidangKeahlian->flatMap(function ($keahlian) {
                    return collect(explode(',', $keahlian->bidang_keahlian))->map(function ($tag) {
                        return ['name' => trim($tag), 'icon' => '📚'];
                    });
                })->toArray(),
            ],
            [
                'name' => 'Tipe Perusahaan',
                'tags' => $tipePerusahaan->map(function ($tipe) {
                    return ['name' => $tipe->tipe_perusahaan, 'icon' => '🏢'];
                })->toArray(),
            ],
            [
                'name' => 'Fasilitas Perusahaan',
                'tags' => $fasilitasPerusahaan->flatMap(function ($fasilitas) {
                    return collect(explode(',', $fasilitas->fasilitas_perusahaan))->map(function ($tag) {
                        return ['name' => trim($tag), 'icon' => '🚀'];
                    });
                })->toArray(),
            ],
            [
                'name' => 'Status Gaji',
                'tags' => $statusGaji->map(function ($status) {
                    return ['name' => $status->status_gaji, 'icon' => '💸'];
                })->toArray(),
            ],
            [
                'name' => 'Fleksibilitas Kerja',
                'tags' => $fleksibilitasKerja->map(function ($fleksibilitas) {
                    return ['name' => $fleksibilitas->fleksibilitas_kerja, 'icon' => '🌐'];
                })->toArray(),
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
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">Pilih Subkriteria Magang Anda</h1>
                    <p class="text-gray-600">
                        Pilih tepat 5 subkriteria yang sesuai dengan preferensi magang Anda. Semua subkriteria wajib dipilih untuk melanjutkan.
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
                    <p class="text-gray-600 mb-2">
                        Masukkan bobot (angka 1-10) untuk setiap kriteria yang dipilih. Bobot mencerminkan tingkat kepentingan.
                    </p>
                    <div class="mt-4 bg-yellow-50 border-l-4 border-yellow-400 p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-yellow-700">
                                    <strong class="font-medium">Peringatan:</strong> Total keseluruhan bobot tidak boleh lebih dari 100
                                </p>
                            </div>
                        </div>
                    </div>
                </header>

                <div id="weight-inputs" class="space-y-4"></div>
                <p id="weight-error" class="text-red-600 text-sm mt-2 hidden">Semua bobot harus berupa angka antara 1 dan 10.</p>
                <p id="total-weight-error" class="text-red-600 text-sm mt-2 hidden">Total bobot tidak boleh lebih dari 100.</p>

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
                        Berikut adalah rekomendasi magang berdasarkan kriteria dan bobot yang Anda pilih.
                    </p>
                </header>

                <div id="result-card" class="lg:max-w-sm w-full p-6 bg-white border border-gray-200 rounded-xl shadow-sm">
                    <h5 class="mb-1 text-2xl font-bold tracking-tight text-gray-900">Frontend-End Developer</h5>
                    <div class="flex items-center space-x-1 mb-2">
                        <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z" clip-rule="evenodd"/>
                        </svg>
                        <p class="text-sm text-gray-400">Jawa Timur, Malang</p>
                    </div>

                    <div class="flex items-center gap-3 mb-5 mt-5">
                        <div class="w-6 h-6 object-cover">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Google_%22G%22_logo.svg/800px-Google_%22G%22_logo.svg.png" alt="Google Malang" class="w-full h-full object-cover">
                        </div>
                        <span class="text-md font-semibold text-gray-900">Google Malang</span>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Kriteria Sesuai:</h3>
                        <ul id="result-criteria" class="grid grid-cols-2 gap-2"></ul>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Bobot Kriteria:</h3>
                        <ul id="result-weights" class="grid grid-cols-2 gap-2"></ul>
                    </div>

                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-BLACK bg-[#DEFC79] hover:bg-[#c9eb5b] rounded-xl focus:ring-4 focus:outline-none focus:ring-[#DEFC79]/50">
                        Lamar Magang 📄
                    </a>
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
        const resultCriteria = document.getElementById('result-criteria');
        const resultWeights = document.getElementById('result-weights');

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
                        <label class="text-gray-800 font-medium w-56 text-left" for="weight-${tag.name}">${tag.icon} ${tag.name}</label>
                        <input
                            type="number"
                            id="weight-${tag.name}"
                            data-tag-name="${tag.name}"
                            class="w-42 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900"
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
            let totalWeight = 0;
            
            document.querySelectorAll('#weight-inputs input').forEach(input => {
                const value = parseInt(input.value);
                const tagName = input.dataset.tagName;
                
                if (!input.value || isNaN(value) || value < 1 || value > 10) {
                    valid = false;
                } else {
                    weights[tagName] = value;
                    totalWeight += value;
                }
            });

            // Check total weight
            if (totalWeight > 100) {
                valid = false;
                document.getElementById('total-weight-error').classList.remove('hidden');
                return;
            } else {
                document.getElementById('total-weight-error').classList.add('hidden');
            }

            if (valid) {
                weightError.classList.add('hidden');
                setActiveStep(3);
                setTimeout(() => {
                    resultCriteria.innerHTML = selectedTags.map(tag => `<li>${tag.icon} ${tag.name}</li>`).join('');
                    resultWeights.innerHTML = selectedTags.map(tag => `<li>${tag.icon} ${tag.name}: ${weights[tag.name]}</li>`).join('');
                    setActiveStep(4);
                }, 2000); // Simulate processing delay
            } else {
                weightError.classList.remove('hidden');
            }
        });

        // Add real-time validation
        weightInputsContainer.addEventListener('input', (e) => {
            if (e.target.tagName === 'INPUT') {
                let totalWeight = 0;
                document.querySelectorAll('#weight-inputs input').forEach(input => {
                    const value = parseInt(input.value) || 0;
                    totalWeight += value;
                });

                if (totalWeight > 100) {
                    document.getElementById('total-weight-error').classList.remove('hidden');
                    submitWeightsButton.disabled = true;
                    submitWeightsButton.classList.add('opacity-50', 'cursor-not-allowed');
                } else {
                    document.getElementById('total-weight-error').classList.add('hidden');
                    submitWeightsButton.disabled = false;
                    submitWeightsButton.classList.remove('opacity-50', 'cursor-not-allowed');
                }
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
@endsection