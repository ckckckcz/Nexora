
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
            <!-- Stepper Navigation -->
            <div class="mb-8">
                <ul class="flex justify-between text-sm font-medium text-gray-600">
                    <li class="step step-1 active font-bold text-blue-900">1. Pilih Kriteria</li>
                    <li class="step step-2">2. Proses</li>
                    <li class="step step-3">3. Hasil</li>
                </ul>
            </div>

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
                                    @if($category['maxSelection'] > 1)
                                        @foreach($category['tags'] as $tag)
                                            <div class="flex items-center">
                                                <input
                                                    type="checkbox"
                                                    id="{{ $category['name'] }}-{{ $tag['name'] }}"
                                                    name="{{ $category['name'] }}[]"
                                                    value="{{ $tag['name'] }}"
                                                    class="mr-2"
                                                >
                                                <label for="{{ $category['name'] }}-{{ $tag['name'] }}" class="text-gray-700">{{ $tag['icon'] }} {{ $tag['name'] }}</label>
                                            </div>
                                        @endforeach
                                    @else
                                        @foreach($category['tags'] as $tag)
                                            <div class="flex items-center">
                                                <input
                                                    type="radio"
                                                    id="{{ $category['name'] }}-{{ $tag['name'] }}"
                                                    name="{{ $category['name'] }}"
                                                    value="{{ $tag['name'] }}"
                                                    class="mr-2"
                                                >
                                                <label for="{{ $category['name'] }}-{{ $tag['name'] }}" class="text-gray-700">{{ $tag['icon'] }} {{ $tag['name'] }}</label>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        @endforeach

                        {{-- <!-- Bobot Kriteria -->
                        <div class="bg-white rounded-xl border border-gray-200 p-4 md:p-6 shadow-sm">
                            <h2 class="text-xl font-semibold text-gray-800 mb-4">Bobot Kriteria (Total harus 1)</h2>
                            <div class="flex flex-wrap gap-4">
                                @foreach($tagCategories as $category)
                                    <div>
                                        <label for="bobot_{{ str_replace(' ', '_', strtolower($category['name'])) }}" class="text-gray-700">{{ $category['name'] }}</label>
                                        <input
                                            type="number"
                                            step="0.1"
                                            min="0"
                                            max="1"
                                            name="bobot[{{ $category['name'] }}]"
                                            id="bobot_{{ str_replace(' ', '_', strtolower($category['name'])) }}"
                                            class="border rounded p-2"
                                            value="0.2"
                                        >
                                    </div>
                                @endforeach
                            </div>
                        </div> --}}
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

            <!-- Step 2: Proses -->
            <div id="step-2" class="step-content hidden">
                <div class="flex flex-col items-center justify-center min-h-[300px]">
                    <!-- Enhanced Loading Animation -->
                    <div class="relative w-16 h-16">
                        <div class="absolute inset-0 rounded-full border-4 border-blue-900 animate-spin"></div>
                        <div class="absolute inset-0 rounded-full border-4 border-transparent border-t-blue-900 animate-spin-slow"></div>
                        <div class="absolute inset-0 rounded-full border-4 border-transparent border-b-white animate-spin-reverse"></div>
                    </div>
                    <p class="mt-4 text-gray-600">Memproses preferensi Anda...</p>
                </div>
            </div>

            <!-- Step 3: Hasil -->
            <div id="step-3" class="step-content hidden">
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
            </div>
        </div>
    </form>

    <script>
        document.getElementById('rekomendasi-form').addEventListener('submit', function(event) {
            const categories = @json($tagCategories);
            let valid = true;
            let totalBobot = 0;

            // Validasi maxSelection
            categories.forEach(category => {
                const selected = document.querySelectorAll(`input[name="${category.name}[]"]:checked, input[name="${category.name}"]:checked`).length;
                if (selected > category.maxSelection) {
                    valid = false;
                    alert(`Maksimum ${category.maxSelection} pilihan untuk ${category.name}`);
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
            document.getElementById('step-1').classList.add('hidden');
            document.getElementById('step-2').classList.remove('hidden');

            setTimeout(() => {
                resultCriteria.innerHTML = '';
                Object.keys(selectedTags).forEach(category => {
                    selectedTags[category]?.forEach(tag => {
                        const li = document.createElement('li');
                        li.textContent = `${category}: ${tag}`;
                        resultCriteria.appendChild(li);
                    });
                });

                document.getElementById('step-2').classList.add('hidden');
                document.getElementById('step-3').classList.remove('hidden');
            }, 3000); // Simulate 3 seconds of processing
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
            document.getElementById('step-3').classList.add('hidden');
            document.getElementById('step-1').classList.remove('hidden');
        });
    </script>

    <style>
        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes spin-slow {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(180deg);
            }
        }

        @keyframes spin-reverse {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(-360deg);
            }
        }

        .animate-spin {
            animation: spin 1s linear infinite;
        }

        .animate-spin-slow {
            animation: spin-slow 2s linear infinite;
        }

        .animate-spin-reverse {
            animation: spin-reverse 1.5s linear infinite;
        }
    </style>
@endsection