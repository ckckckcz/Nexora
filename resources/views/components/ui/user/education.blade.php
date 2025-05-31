<div class="bg-white border border-gray-200 rounded-2xl p-5 shadow-sm">
    <div class="flex justify-between items-center">
        <h3 class="text-sm font-medium text-gray-500">Education</h3>
        <button onclick="toggleAddModal()"
            class="text-blue-900 hover:text-blue-950 cursor-pointer text-xs font-medium">
            Tambah Pendidikan
        </button>
    </div>
    <div class="mt-3 space-y-4">
        <!-- Education Item 1 -->
        <div class="flex items-start relative">
            <div class="h-10 w-10 rounded flex items-center justify-center flex-shrink-0">
                <img src="https://upload.wikimedia.org/wikipedia/id/4/4a/Logo_Politeknik_Negeri_Malang.png" alt="State Polytechnic of Malang">
            </div>
            <div class="ml-3">
                <h4 class="text-sm font-semibold text-gray-900">State Polytechnic of Malang</h4>
                <p class="text-xs text-gray-600">Bachelor's Degree, Informatics Engineering</p>
                <p class="text-xs text-gray-500">2021 - 2025 (Expected)</p>
            </div>
            <!-- Dropdown -->
            <div class="ml-auto relative">
                <button onclick="toggleDropdown(1)"
                    class="text-gray-500 hover:text-gray-700 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v.01M12 12v.01M12 18v.01" />
                    </svg>
                </button>
                <div id="dropdown-1" class="hidden absolute right-0 mt-2 w-32 bg-white border border-gray-200 rounded-lg shadow-lg z-10">
                    <button onclick="openEditModal(1, 'State Polytechnic of Malang', 'Bachelor\'s Degree', 'Informatics Engineering', '2021-01', '2025-05')"
                        class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        Edit
                    </button>
                    <button onclick="confirmDelete(1)"
                        class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                        Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Pendidikan -->
    <div id="add-education-modal"
        class="fixed inset-0 bg-black/50 flex items-center justify-center hidden opacity-0 transition-all duration-300 ease-in-out z-50">
        <div
            class="bg-white rounded-2xl p-6 max-w-2xl w-full mx-4 transform scale-95 transition-all duration-300 ease-in-out">
            <form action="/education/store" method="POST">
                @csrf
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-gray-900">Tambah Pendidikan</h3>
                    <button type="button" onclick="toggleAddModal()"
                        class="text-gray-500 hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Universitas -->
                <div class="mb-4">
                    <label for="university-add" class="block text-sm font-medium text-gray-700">Universitas*</label>
                    <input type="text" id="university-add" name="university"
                        class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Gelar -->
                <div class="mb-4">
                    <label for="degree-add" class="block text-sm font-medium text-gray-700">Gelar</label>
                    <input type="text" id="degree-add" name="degree"
                        class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Bidang Studi -->
                <div class="mb-4">
                    <label for="field-add" class="block text-sm font-medium text-gray-700">Bidang Studi</label>
                    <input type="text" id="field-add" name="field_of_study"
                        class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Tanggal -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Tanggal</label>
                    <div class="mt-2 grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="start-date-add" class="block text-sm text-gray-700">Tanggal Mulai</label>
                            <input type="month" id="start-date-add" name="start_date"
                                class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label for="end-date-add" class="block text-sm text-gray-700">Tanggal Selesai</label>
                            <div class="flex items-center">
                                <input type="month" id="end-date-add" name="end_date"
                                    class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-blue-500 focus:border-blue-500">
                                <label class="ml-2 flex items-center">
                                    <input type="checkbox" id="present-add" name="present" onchange="toggleEndDate('add')"
                                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                    <span class="ml-1 text-sm text-gray-700">Sekarang</span>
                                </label>
                            </div>
                        </div>
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

    <!-- Modal Edit Pendidikan -->
    <div id="edit-education-modal"
        class="fixed inset-0 bg-black/50 flex items-center justify-center hidden opacity-0 transition-all duration-300 ease-in-out z-50">
        <div
            class="bg-white rounded-2xl p-6 max-w-2xl w-full mx-4 transform scale-95 transition-all duration-300 ease-in-out">
            <form action="/education/update" method="POST">
                @csrf
                @method('PATCH')
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-gray-900">Edit Pendidikan</h3>
                    <button type="button" onclick="toggleEditModal()"
                        class="text-gray-500 hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <input type="hidden" id="education-id" name="education_id">
                <!-- Universitas -->
                <div class="mb-4">
                    <label for="university-edit" class="block text-sm font-medium text-gray-700">Universitas*</label>
                    <input type="text" id="university-edit" name="university"
                        class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Gelar -->
                <div class="mb-4">
                    <label for="degree-edit" class="block text-sm font-medium text-gray-700">Gelar</label>
                    <input type="text" id="degree-edit" name="degree"
                        class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Bidang Studi -->
                <div class="mb-4">
                    <label for="field-edit" class="block text-sm font-medium text-gray-700">Bidang Studi</label>
                    <input type="text" id="field-edit" name="field_of_study"
                        class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Tanggal -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Tanggal</label>
                    <div class="mt-2 grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="start-date-edit" class="block text-sm text-gray-700">Tanggal Mulai</label>
                            <input type="month" id="start-date-edit" name="start_date"
                                class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label for="end-date-edit" class="block text-sm text-gray-700">Tanggal Selesai</label>
                            <div class="flex items-center">
                                <input type="month" id="end-date-edit" name="end_date"
                                    class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-blue-500 focus:border-blue-500">
                                <label class="ml-2 flex items-center">
                                    <input type="checkbox" id="present-edit" name="present" onchange="toggleEndDate('edit')"
                                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                    <span class="ml-1 text-sm text-gray-700">Sekarang</span>
                                </label>
                            </div>
                        </div>
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
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function toggleAddModal() {
        const modal = document.getElementById('add-education-modal');
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
        const modal = document.getElementById('edit-education-modal');
        modal.classList.toggle('hidden');
        if (!modal.classList.contains('hidden')) {
            modal.classList.remove('opacity-0');
            modal.querySelector('.transform').classList.remove('scale-95');
        } else {
            modal.classList.add('opacity-0');
            modal.querySelector('.transform').classList.add('scale-95');
        }
    }

    function openEditModal(id, university, degree, field, startDate, endDate) {
        document.getElementById('education-id').value = id;
        document.getElementById('university-edit').value = university;
        document.getElementById('degree-edit').value = degree;
        document.getElementById('field-edit').value = field;
        document.getElementById('start-date-edit').value = startDate;
        const endDateInput = document.getElementById('end-date-edit');
        const presentCheckbox = document.getElementById('present-edit');
        if (endDate === 'present') {
            presentCheckbox.checked = true;
            endDateInput.disabled = true;
            endDateInput.value = '';
        } else {
            presentCheckbox.checked = false;
            endDateInput.disabled = false;
            endDateInput.value = endDate;
        }
        toggleEditModal();
    }

    function toggleDropdown(id) {
        const dropdown = document.getElementById(`dropdown-${id}`);
        dropdown.classList.toggle('hidden');
    }

    function toggleEndDate(type) {
        const endDateInput = document.getElementById(`end-date-${type}`);
        const presentCheckbox = document.getElementById(`present-${type}`);
        endDateInput.disabled = presentCheckbox.checked;
        if (presentCheckbox.checked) {
            endDateInput.value = '';
        }
    }

    function confirmDelete(id) {
        if (confirm('Apakah Anda yakin ingin menghapus pendidikan ini?')) {
            window.location.href = `/education/delete/${id}`;
        }
    }

    // Tutup dropdown jika klik di luar
    document.addEventListener('click', function (event) {
        const dropdowns = document.querySelectorAll('[id^="dropdown-"]');
        dropdowns.forEach(dropdown => {
            const button = dropdown.previousElementSibling;
            if (!button.contains(event.target) && !dropdown.contains(event.target)) {
                dropdown.classList.add('hidden');
            }
        });
    });
</script>