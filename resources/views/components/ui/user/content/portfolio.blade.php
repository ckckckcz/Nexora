<div class="bg-white p-6 rounded-2xl border border-gray-200">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-lg font-bold text-gray-900">Portfolio</h2>
        <button onclick="toggleAddModal()"
            class="text-white bg-blue-900 px-5 cursor-pointer rounded-lg py-2 hover:bg-blue-950 text-sm font-medium">
            Tambah Portfolio
        </button>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <!-- Portfolio Item 1 -->
        <div class="group relative rounded-xl overflow-hidden border border-gray-200 hover:shadow-md transition-all">
            <div class="aspect-w-16 aspect-h-9">
                <img src="https://miro.medium.com/v2/resize:fit:1400/1*IXF5-V1BS5PeY7Ts7N0oIg.png" alt="E-commerce UI Design"
                    class="w-full h-full object-cover">
            </div>
            <div class="p-4">
                <h3 class="font-semibold text-gray-900">E-commerce UI Redesign</h3>
                <p class="text-sm text-gray-600 mt-1">A complete redesign of an e-commerce platform focusing on improved
                    user experience and conversion rates.</p>
                <div class="mt-3 flex items-center justify-between">
                    <a href="#" class="font-medium text-sm text-blue-600 hover:text-blue-800 flex items-center">
                        Lihat Project
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2 -rotate-45" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                    <button
                        onclick="openEditModal(1, 'E-commerce UI Redesign', 'A complete redesign of an e-commerce platform focusing on improved user experience and conversion rates.', 'https://miro.medium.com/v2/resize:fit:1400/1*IXF5-V1BS5PeY7Ts7N0oIg.png')"
                        class="text-blue-900 bg-gray-100 px-4 py-1 rounded-lg text-sm font-medium hover:bg-gray-200">
                        Edit
                    </button>
                </div>
            </div>
        </div>

        <!-- Portfolio Item 2 -->
        <div class="group relative rounded-xl overflow-hidden border border-gray-200 hover:shadow-md transition-all">
            <div class="aspect-w-16 aspect-h-9">
                <img src="https://cdn.dribbble.com/userupload/11242145/file/original-ec45aca87eaf257697ca0b441f6fa6fd.png?resize=400x0 alt="Mobile App Design"
                    class="w-full h-full object-cover">
            </div>
            <div class="p-4">
                <h3 class="font-semibold text-gray-900">Educational Mobile App</h3>
                <p class="text-sm text-gray-600 mt-1">A React Native mobile application designed to help students track
                    their learning progress and goals.</p>
                <div class="mt-3 flex items-center justify-between">
                    <a href="#" class="font-medium text-sm text-blue-600 hover:text-blue-800 flex items-center">
                        Lihat Project
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2 -rotate-45" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                    <button
                        onclick="openEditModal(2, 'Educational Mobile App', 'A React Native mobile application designed to help students track their learning progress and goals.', 'https://cdn.dribbble.com/userupload/11242145/file/original-ec45aca87eaf257697ca0b441f6fa6fd.png?resize=400x0')"
                        class="text-blue-900 bg-gray-100 px-4 py-1 rounded-lg text-sm font-medium hover:bg-gray-200">
                        Edit
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Portfolio -->
    <div id="add-portfolio-modal"
        class="fixed inset-0 bg-black/50 flex items-center justify-center hidden opacity-0 transition-all duration-300 ease-in-out z-50">
        <div
            class="bg-white rounded-2xl p-6 max-w-2xl w-full mx-4 transform scale-95 transition-all duration-300 ease-in-out">
            <form action="/portfolio/store" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-gray-900">Tambah Portfolio</h3>
                    <button type="button" onclick="toggleAddModal()" class="text-gray-500 hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Nama Proyek -->
                <div class="mb-4">
                    <label for="project-name-add" class="block text-sm font-medium text-gray-700">Nama Proyek*</label>
                    <input type="text" id="project-name-add" name="project_name"
                        class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Deskripsi -->
                <div class="mb-4">
                    <label for="description-add" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea id="description-add" name="description"
                        class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-blue-500 focus:border-blue-500"
                        rows="3"></textarea>
                </div>

                <!-- Media -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Media</label>
                    <div class="mt-1 flex flex-wrap items-center">
                        <input type="file" id="media-add" name="media" accept="image/*,application/pdf" class="hidden"
                            onchange="previewImage(event, 'media-preview-add')">
                        <label for="media-add"
                            class="cursor-pointer bg-blue-900 text-white px-4 py-2 rounded-lg hover:bg-blue-950 text-sm font-medium">
                            + Tambah Media
                        </label>
                        <div id="media-preview-add" class="ml-4">
                            <img src="" alt="Preview" class="w-24 h-24 object-cover rounded-lg hidden">
                        </div>
                    </div>
                </div>

                <!-- Informasi Tambahan -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Informasi Tambahan</label>
                    <div class="mt-2 grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="start-date-add" class="block text-sm text-gray-700">Tanggal Mulai</label>
                            <input type="month" id="start-date-add" name="start_date"
                                class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label for "end-date-add" class="block text-sm text-gray-700">Tanggal Berakhir</label>
                            <input type="month" id="end-date-add" name="end_date"
                                class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>
                    <div class="mt-4">
                        <label for="link-add" class="block text-sm text-gray-700">Link</label>
                        <input type="url" id="link-add" name="link" value="https://example.com"
                            class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="flex justify-end gap-3 mt-6">
                    <button type="button" onclick="toggleAddModal()"
                        class="bg-gray-100 hover:bg-gray-200 text-blue-900 font-medium px-5 py-2 rounded-lg text-sm transition-colors">
                        Batal
                    </button>
                    <button type="submit"
                        class="bg-blue-900 hover:bg-blue-950 text-white font-medium px-5 py-2 rounded-lg text-sm transition-colors">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit Portfolio -->
    <div id="edit-portfolio-modal"
        class="fixed inset-0 bg-black/50 flex items-center justify-center hidden opacity-0 transition-all duration-300 ease-in-out z-50">
        <div
            class="bg-white rounded-2xl p-6 max-w-2xl w-full mx-4 transform scale-95 transition-all duration-300 ease-in-out">
            <form action="/portfolio/update" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-gray-900">Edit Portfolio</h3>
                    <button type="button" onclick="toggleEditModal()" class="text-gray-500 hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <input type="hidden" id="portfolio-id" name="portfolio_id">
                <!-- Nama Proyek -->
                <div class="mb-4">
                    <label for="project-name-edit" class="block text-sm font-medium text-gray-700">Nama Proyek*</label>
                    <input type="text" id="project-name-edit" name="project_name"
                        class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Deskripsi -->
                <div class="mb-4">
                    <label for="description-edit" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea id="description-edit" name="description"
                        class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-blue-500 focus:border-blue-500"
                        rows="3"></textarea>
                </div>

                <!-- Media -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Media</label>
                    <div id="media-preview-edit" class="">
                        <img id="media-preview-img-edit" src="" alt="Preview"
                            class="w-32 h-32 object-cover rounded-lg hidden">
                    </div>
                    <div class="mt-1 flex items-center">
                        <input type="file" id="media-edit" name="media" accept="image/*,application/pdf" class="hidden"
                            onchange="previewImage(event, 'media-preview-edit')">
                        <label for="media-edit"
                            class="cursor-pointer bg-blue-900 text-white px-4 py-2 rounded-lg hover:bg-blue-950 text-sm font-medium">
                            + Tambah Media
                        </label>
                    </div>
                </div>

                <!-- Informasi Tambahan -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Informasi Tambahan</label>
                    <div class="mt-2 grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="start-date-edit" class="block text-sm text-gray-700">Tanggal Mulai</label>
                            <input type="month" id="start-date-edit" name="start_date"
                                class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label for="end-date-edit" class="block text-sm text-gray-700">Tanggal Berakhir</label>
                            <input type="month" id="end-date-edit" name="end_date"
                                class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>
                    <div class="mt-4">
                        <label for="link-edit" class="block text-sm text-gray-700">Link</label>
                        <input type="url" id="link-edit" name="link" value="https://example.com"
                            class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="flex justify-end gap-3 mt-6">
                    <button type="button" onclick="toggleEditModal()"
                        class="bg-gray-100 hover:bg-gray-200 text-blue-900 font-medium px-5 py-2 rounded-lg text-sm transition-colors">
                        Batal
                    </button>
                    <button type="submit"
                        class="bg-blue-900 hover:bg-blue-950 text-white font-medium px-5 py-2 rounded-lg text-sm transition-colors">
                        Simpan
                    </button>
                    <button type="button"
                        class="bg-red-600 hover:bg-red-700 text-white font-medium px-5 py-2 rounded-lg text-sm transition-colors"
                        onclick="confirmDelete()">
                        Hapus
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function toggleAddModal() {
        const modal = document.getElementById('add-portfolio-modal');
        modal.classList.toggle('hidden');
        if (!modal.classList.contains('hidden')) {
            modal.classList.remove('opacity-0');
            modal.querySelector('.transform').classList.remove('scale-95');
        } else {
            modal.classList.add('opacity-0');
            modal.querySelector('.transform').classList.add('scale-95');
        }
    }

    function toggleEditModal() {
        const modal = document.getElementById('edit-portfolio-modal');
        modal.classList.toggle('hidden');
        if (!modal.classList.contains('hidden')) {
            modal.classList.remove('opacity-0');
            modal.querySelector('.transform').classList.remove('scale-95');
        } else {
            modal.classList.add('opacity-0');
            modal.querySelector('.transform').classList.add('scale-95');
        }
    }

    function openEditModal(id, projectName, description, mediaUrl) {
        document.getElementById('portfolio-id').value = id;
        document.getElementById('project-name-edit').value = projectName;
        document.getElementById('description-edit').value = description;
        const img = document.getElementById('media-preview-img-edit');
        img.src = mediaUrl;
        img.classList.remove('hidden');
        document.getElementById('start-date-edit').value = '2024-12';
        document.getElementById('end-date-edit').value = '2025-01';
        document.getElementById('link-edit').value = 'https://example.com';
        toggleEditModal();
    }

    function previewImage(event, previewId) {
        const file = event.target.files[0];
        const preview = document.getElementById(previewId);
        const img = preview.querySelector('img');
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                img.src = e.target.result;
                img.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        } else {
            img.classList.add('hidden');
        }
    }

    function confirmDelete() {
        if (confirm('Apakah Anda yakin ingin menghapus proyek ini?')) {
            const portfolioId = document.getElementById('portfolio-id').value;
            window.location.href = `/portfolio/delete/${portfolioId}`;
        }
    }
</script>