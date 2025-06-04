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
                'maxSelection' => 2,
            ],
            [
                'name' => 'Tipe Perusahaan',
                'tags' => $tipePerusahaan->map(function ($tipe) {
                    return ['name' => $tipe->tipe_perusahaan, 'icon' => '🏢'];
                })->toArray(),
                'maxSelection' => 1,
            ],
            [
                'name' => 'Fasilitas Perusahaan',
                'tags' => $fasilitasPerusahaan->flatMap(function ($fasilitas) {
                    return collect(explode(',', $fasilitas->fasilitas_perusahaan))->map(function ($tag) {
                        return ['name' => trim($tag), 'icon' => '🚀'];
                    });
                })->toArray(),
                'maxSelection' => 2,
            ],
            [
                'name' => 'Status Gaji',
                'tags' => $statusGaji->map(function ($status) {
                    return ['name' => $status->status_gaji, 'icon' => '💸'];
                })->toArray(),
                'maxSelection' => 1,
            ],
            [
                'name' => 'Fleksibilitas Kerja',
                'tags' => $fleksibilitasKerja->map(function ($fleksibilitas) {
                    return ['name' => $fleksibilitas->fleksibilitas_kerja, 'icon' => '🌐'];
                })->toArray(),
                'maxSelection' => 1,
            ],
        ],
        'selectedTags' => []
    ])

    <div class="min-h-screen bg-white p-4 md:p-8 justify-center items-center flex">
        <div class="max-w-4xl mx-auto">
            <!-- Step 1: Pilih Kriteria -->
            <div id="step-1" class="step-content">
                <header class="mb-8 text-left">
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">Pilih Subkriteria Magang Anda</h1>
                    <p class="text-gray-600">
                        Pilih subkriteria sesuai dengan preferensi magang Anda. Pastikan jumlah pilihan sesuai dengan batas maksimal.
                    </p>
                </header>

                <div class="space-y-8">
                    @foreach($tagCategories as $category)
                        <div class="bg-white rounded-xl border border-gray-200 p-4 md:p-6 shadow-sm">
                            <h2 class="text-xl font-semibold text-gray-800 mb-4">{{ $category['name'] }} (Max: {{ $category['maxSelection'] }})</h2>
                            <div class="flex flex-wrap gap-2 md:gap-3">
                                @foreach($category['tags'] as $tag)
                                    <button
                                        data-tag-name="{{ $tag['name'] }}"
                                        data-tag-icon="{{ $tag['icon'] }}"
                                        data-category-name="{{ $category['name'] }}"
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

                <div class="mt-8 text-center">
                    <button
                        id="submit-tags"
                        class="px-6 py-3 rounded-lg font-medium text-white shadow-lg transition-all duration-200 transform bg-gray-400 cursor-not-allowed"
                        disabled
                    >
                        Proses
                    </button>
                </div>
            </div>

            <!-- Step 4: Hasil -->
            <div id="step-4" class="step-content hidden">
                <header class="mb-8 text-left">
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">Hasil Rekomendasi Magang</h1>
                    <p class="text-gray-600">
                        Berikut adalah rekomendasi magang berdasarkan kriteria yang Anda pilih.
                    </p>
                </header>

                <div id="result-card" class="lg:max-w-sm w-full p-6 bg-white border border-gray-200 rounded-xl shadow-sm">
                    <h5 class="mb-1 text-2xl font-bold tracking-tight text-gray-900">Rekomendasi Magang</h5>
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Kriteria Terpilih:</h3>
                        <ul id="result-criteria" class="grid grid-cols-2 gap-2"></ul>
                    </div>
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
        const selectedTags = {};
        const maxSelections = {
            'Bidang Keahlian': 2,
            'Tipe Perusahaan': 1,
            'Fasilitas Perusahaan': 2,
            'Status Gaji': 1,
            'Fleksibilitas Kerja': 1,
        };

        const submitTagsButton = document.getElementById('submit-tags');
        const resultCriteria = document.getElementById('result-criteria');
        const backToStep1FromResultButton = document.getElementById('back-to-step-1-from-result');

        function updateSelectedTagsDisplay() {
            let valid = true;
            Object.keys(maxSelections).forEach(category => {
                const selectedCount = selectedTags[category]?.length || 0;
                if (selectedCount > maxSelections[category]) {
                    valid = false;
                }
            });

            submitTagsButton.disabled = !valid;
            submitTagsButton.classList.toggle('bg-gray-400', !valid);
            submitTagsButton.classList.toggle('cursor-not-allowed', !valid);
            submitTagsButton.classList.toggle('bg-blue-900', valid);
        }

        document.querySelectorAll('.tag-button').forEach(button => {
            button.addEventListener('click', () => {
                const tagName = button.dataset.tagName;
                const categoryName = button.dataset.categoryName;

                if (!selectedTags[categoryName]) {
                    selectedTags[categoryName] = [];
                }

                const selectedCount = selectedTags[categoryName].length;

                if (selectedTags[categoryName].includes(tagName)) {
                    // Remove the tag if already selected
                    selectedTags[categoryName] = selectedTags[categoryName].filter(tag => tag !== tagName);
                    button.classList.remove('bg-blue-900', 'text-white', 'shadow-md', 'scale-105');
                    button.classList.add('bg-gray-100', 'text-gray-800', 'hover:bg-blue-100', 'hover:text-blue-900', 'hover:shadow-sm');
                    button.setAttribute('aria-pressed', 'false');
                } else if (selectedCount < maxSelections[categoryName]) {
                    // Add the tag if within the max limit
                    selectedTags[categoryName].push(tagName);
                    button.classList.add('bg-blue-900', 'text-white', 'shadow-md', 'scale-105');
                    button.classList.remove('bg-gray-100', 'text-gray-800', 'hover:bg-blue-100', 'hover:text-blue-900', 'hover:shadow-sm');
                    button.setAttribute('aria-pressed', 'true');
                } else {
                    // Prevent selection if max limit is reached
                    alert(`Anda hanya dapat memilih maksimal ${maxSelections[categoryName]} untuk kategori ${categoryName}.`);
                }

                updateSelectedTagsDisplay();
            });
        });

        submitTagsButton.addEventListener('click', () => {
            resultCriteria.innerHTML = '';
            Object.keys(selectedTags).forEach(category => {
                selectedTags[category]?.forEach(tag => {
                    const li = document.createElement('li');
                    li.textContent = `${category}: ${tag}`;
                    resultCriteria.appendChild(li);
                });
            });

            document.getElementById('step-1').classList.add('hidden');
            document.getElementById('step-4').classList.remove('hidden');
        });

        backToStep1FromResultButton.addEventListener('click', () => {
            Object.keys(selectedTags).forEach(category => {
                selectedTags[category] = [];
            });

            document.querySelectorAll('.tag-button').forEach(button => {
                button.classList.remove('bg-blue-900', 'text-white', 'shadow-md', 'scale-105');
                button.classList.add('bg-gray-100', 'text-gray-800', 'hover:bg-blue-100', 'hover:text-blue-900', 'hover:shadow-sm');
                button.setAttribute('aria-pressed', 'false');
            });

            updateSelectedTagsDisplay();
            document.getElementById('step-4').classList.add('hidden');
            document.getElementById('step-1').classList.remove('hidden');
        });
    </script>
@endsection