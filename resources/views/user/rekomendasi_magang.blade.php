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

    <form action="/rekomendasi-magang/tambah" method="POST">
        @csrf
        <div class="min-h-screen bg-white p-4 md:p-8 justify-center items-center flex">
            <div class="max-w-4xl mx-auto">
                <!-- Stepper Navigation -->
                {{-- <div class="mb-8">
                    <ul class="flex justify-between text-sm font-medium text-gray-600">
                        <li class="step step-1 active font-bold text-white border border-gray-200">1. Pilih Kriteria</li>
                        <li class="step step-2">2. Proses</li>
                        <li class="step step-3">3. Hasil</li>
                    </ul>
                </div> --}}

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
                                                    name="{{ str_replace(' ', '_', $category['name']) }}[]"
                                                    value="{{ $tag['name'] }}"
                                                    class="hidden peer"
                                                >
                                                <label
                                                    for="{{ $category['name'] }}-{{ $tag['name'] }}"
                                                    class="px-4 py-2 rounded-xl font-medium text-black bg-white border border-gray-200 cursor-pointer shadow-md peer-checked:bg-blue-900 peer-checked:text-white peer-checked:shadow-lg transition-all duration-200"
                                                >
                                                    {{ $tag['icon'] }} {{ $tag['name'] }}
                                                </label>
                                            </div>
                                        @endforeach
                                    @else
                                        @foreach($category['tags'] as $tag)
                                            <div class="flex items-center">
                                                <input
                                                    type="radio"
                                                    id="{{ $category['name'] }}-{{ $tag['name'] }}"
                                                    name="{{ str_replace(' ', '_', $category['name']) }}"
                                                    value="{{ $tag['name'] }}"
                                                    class="hidden peer"
                                                >
                                                <label
                                                    for="{{ $category['name'] }}-{{ $tag['name'] }}"
                                                    class="px-4 py-2 rounded-xl font-medium text-black bg-white border border-gray-200 cursor-pointer shadow-md peer-checked:bg-blue-900 peer-checked:text-white peer-checked:shadow-lg transition-all duration-200"
                                                >
                                                    {{ $tag['icon'] }} {{ $tag['name'] }}
                                                </label>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    <div class="space-y-8">
                        <div class="grid grid-cols-1 gap-4">
                            @foreach ($kriterias as $kriteria)
                            <div class="mb-4">
                                <label for="nilai_{{ $kriteria->id_kriteria }}" class="block text-sm font-medium text-gray-700">
                                    {{ $kriteria->nama_kriteria }}
                                </label>
                                <input type="hidden" name="id_kriteria[]" value="{{ $kriteria->id_kriteria }}">
                                <input 
                                    type="number" 
                                    name="nilai[]" 
                                    id="nilai_{{ $kriteria->id }}" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    required
                                    step="0.01"
                                    min="0"
                                    max="100"
                                    placeholder="Masukkan nilai (0-100)"
                                >
                                @error('nilai.' . $loop->index)
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mt-8 text-center">
                        <button
                            type="submit"
                            id="proses-button"
                            class="px-6 py-3 rounded-xl font-medium text-black shadow-lg transition-all duration-200 transform bg-white border border-gray-200 cursor-pointer"
                        >
                            <span id="button-text">Proses</span>
                            <span id="loading-spinner" class="hidden">
                                <svg class="animate-spin h-5 w-5 text-blue-900 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                                </svg>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const enforceMaxSelection = (categoryName, maxSelection) => {
                const checkboxes = document.querySelectorAll(`input[name="${categoryName}[]"]`);
                checkboxes.forEach(checkbox => {
                    checkbox.addEventListener('change', () => {
                        const checkedCount = Array.from(checkboxes).filter(cb => cb.checked).length;
                        if (checkedCount > maxSelection) {
                            checkbox.checked = false;
                            alert(`Anda hanya dapat memilih hingga ${maxSelection} opsi untuk ${categoryName.replace('_', ' ')}`);
                        }
                    });
                });
            };

            enforceMaxSelection('Bidang_Keahlian', 2);
            enforceMaxSelection('Fasilitas_Perusahaan', 2);

            const prosesButton = document.getElementById('proses-button');
            const buttonText = document.getElementById('button-text');
            const loadingSpinner = document.getElementById('loading-spinner');

            prosesButton.addEventListener('click', (event) => {
                event.preventDefault(); // Prevent form submission for demo purposes
                buttonText.classList.add('hidden');
                loadingSpinner.classList.remove('hidden');
                prosesButton.classList.add('cursor-not-allowed', 'opacity-50');

                setTimeout(() => {
                    // Simulate form submission after 2 seconds
                    prosesButton.closest('form').submit();
                }, 2000);
            });
        });
    </script>
@endsection