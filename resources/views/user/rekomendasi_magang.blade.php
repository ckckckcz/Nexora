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
            <!-- Header -->
            <header class="mb-8 text-left">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">Pilih Kriteria Magang Anda</h1>
                <p class="text-gray-600">
                    Pilih tepat 5 kriteria yang sesuai dengan preferensi magang Anda. Semua kriteria wajib dipilih untuk melanjutkan.
                </p>
            </header>

            <!-- Tag categories -->
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

            <!-- Selected tags display -->
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

            <!-- Submit button -->
            <div class="mt-8 text-center">
                <button
                    id="submit-tags"
                    class="px-6 py-3 rounded-lg font-medium text-white shadow-lg transition-all duration-200 transform bg-gray-400 cursor-not-allowed"
                    disabled
                >
                    Lanjutkan dengan <span id="submit-tags-count">0</span> kriteria
                </button>
            </div>
        </div>
    </div>

    <script>
        const selectedTags = [];
        const requiredTags = 5;

        const selectedTagsContainer = document.getElementById('selected-tags');
        const selectedTagsCount = document.getElementById('selected-tags-count');
        const clearTagsButton = document.getElementById('clear-tags');
        const maxTagsMessage = document.getElementById('max-tags-message');
        const minTagsMessage = document.getElementById('min-tags-message');
        const submitButton = document.getElementById('submit-tags');
        const submitTagsCount = document.getElementById('submit-tags-count');

        function updateSelectedTagsDisplay() {
            selectedTagsContainer.innerHTML = '';
            if (selectedTags.length === 0) {
                selectedTagsContainer.innerHTML = '<p class="text-gray-500 text-center w-full">Belum ada kriteria yang dipilih</p>';
                clearTagsButton.classList.add('hidden');
                submitButton.classList.add('bg-gray-400', 'cursor-not-allowed');
                submitButton.classList.remove('bg-blue-900', 'hover:bg-blue-800', 'hover:scale-105');
                submitButton.disabled = true;
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
                submitButton.classList.remove('bg-gray-400', 'cursor-not-allowed');
                submitButton.classList.add('bg-blue-900', 'hover:bg-blue-800', 'hover:scale-105');
                submitButton.disabled = selectedTags.length !== requiredTags;
            }
            selectedTagsCount.textContent = selectedTags.length;
            submitTagsCount.textContent = selectedTags.length;
            submitButton.querySelector('span').nextSibling.nodeValue = ` kriteria`;
        }

        document.querySelectorAll('.tag-button').forEach(button => {
            button.addEventListener('click', () => {
                const tagName = button.dataset.tagName;
                const tagIcon = button.dataset.tagIcon;
                const tag = { name: tagName, icon: tagIcon };

                if (selectedTags.some(t => t.name === tagName)) {
                    // Deselect tag
                    const index = selectedTags.findIndex(t => t.name === tagName);
                    selectedTags.splice(index, 1);
                    button.classList.remove('bg-blue-900', 'text-white', 'shadow-md', 'scale-105');
                    button.classList.add('bg-gray-100', 'text-gray-800', 'hover:bg-blue-100', 'hover:text-blue-900', 'hover:shadow-sm');
                    button.setAttribute('aria-pressed', 'false');
                    maxTagsMessage.classList.add('hidden');
                    minTagsMessage.classList.add('hidden');
                } else if (selectedTags.length < requiredTags) {
                    // Select tag
                    selectedTags.push(tag);
                    button.classList.add('bg-blue-900', 'text-white', 'shadow-md', 'scale-105');
                    button.classList.remove('bg-gray-100', 'text-gray-800', 'hover:bg-blue-100', 'hover:text-blue-900', 'hover:shadow-sm');
                    button.setAttribute('aria-pressed', 'true');
                    maxTagsMessage.classList.add('hidden');
                    minTagsMessage.classList.add('hidden');
                } else {
                    // Show max tags message
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

        submitButton.addEventListener('click', () => {
            if (selectedTags.length === requiredTags) {
                console.log('Kriteria terpilih:', selectedTags);
                // In a real app, submit to server (e.g., via form or AJAX)
            } else {
                minTagsMessage.classList.remove('hidden');
            }
        });
    </script>
@endsection