@extends('layouts.dosen')
@section('dosen')
    <div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 p-4 sm:p-6 lg:p-8">
        <header class="mb-8 text-center">
            <h1 class="text-4xl font-extrabold text-indigo-900 tracking-tight">
                <i class="fas fa-briefcase mr-2"></i> Rekomendasi Magang
            </h1>
            <p class="mt-3 text-lg text-gray-600 font-medium">Kelola rekomendasi perusahaan untuk mahasiswa Anda</p>
        </header>

        <section class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="p-6 flex flex-col gap-6">
                <div class="flex flex-col lg:flex-row items-center justify-between gap-4">
                    <div class="flex flex-col sm:flex-row items-center gap-4 flex-grow">
                        <!-- Search Input -->
                        <div class="relative flex-grow max-w-full sm:max-w-lg">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-search text-indigo-400"></i>
                            </div>
                            <input type="text" id="search-input"
                                class="block w-full pl-12 pr-4 py-3 border border-gray-200 rounded-lg bg-gray-50 focus:ring-indigo-500 focus:border-indigo-500 text-sm shadow-sm transition-all duration-300"
                                placeholder="Cari nama mahasiswa" />
                        </div>

                        <!-- Perusahaan Filter -->
                        <div class="relative w-full sm:w-auto">
                            <button id="perusahaan-filter-btn"
                                class="flex items-center gap-2 px-4 py-3 border border-gray-200 rounded-lg bg-white hover:bg-indigo-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm shadow-sm transition-all duration-300">
                                <i class="fas fa-building text-indigo-500"></i>
                                <span id="perusahaan-filter-text">Semua Perusahaan</span>
                                <i class="fas fa-chevron-down text-gray-400"></i>
                            </button>
                            <div id="perusahaan-dropdown"
                                class="absolute z-20 mt-2 w-full sm:w-64 bg-white rounded-lg shadow-lg border border-gray-200 hidden transform transition-all duration-200 scale-95 origin-top">
                                <ul id="perusahaan-list" class="py-2 max-h-60 overflow-auto">
                                    <li><button
                                            class="block w-full text-left px-4 py-2 text-sm hover:bg-indigo-50 text-gray-700"
                                            data-perusahaan="Semua">Semua Perusahaan</button></li>
                                    <li><button
                                            class="block w-full text-left px-4 py-2 text-sm hover:bg-indigo-50 text-gray-700"
                                            data-perusahaan="PT. Teknologi Masa Depan">PT. Teknologi Masa Depan</button></li>
                                    <li><button
                                            class="block w-full text-left px-4 py-2 text-sm hover:bg-indigo-50 text-gray-700"
                                            data-perusahaan="Startup AI Solutions">Startup AI Solutions</button></li>
                                    <li><button
                                            class="block w-full text-left px-4 py-2 text-sm hover:bg-indigo-50 text-gray-700"
                                            data-perusahaan="Creative Agency">Creative Agency</button></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Add Recommendation Button -->
                    <button id="add-recommendation-btn"
                        class="inline-flex items-center px-5 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-300 text-sm font-medium shadow-md w-full sm:w-auto"
                        onclick="showAddForm()">
                        <i class="fas fa-plus mr-2"></i>
                        Tambah Rekomendasi
                    </button>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-indigo-50">
                            <tr>
                                <th scope="col"
                                    class="px-4 sm:px-6 py-4 text-left text-xs font-semibold text-indigo-900 uppercase tracking-wider">
                                    Nama Mahasiswa
                                </th>
                                <th scope="col"
                                    class="px-4 sm:px-6 py-4 text-left text-xs font-semibold text-indigo-900 uppercase tracking-wider hidden sm:table-cell">
                                    Perusahaan (PT)
                                </th>
                                <th scope="col"
                                    class="px-4 sm:px-6 py-4 text-left text-xs font-semibold text-indigo-900 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody id="recommendation-table-body" class="bg-white divide-y divide-gray-100">
                            <tr class="hover:bg-indigo-50 transition-all duration-200">
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Trisukmah Sarah</td>
                                <td class="px-4 sm:px-6 py-4 hidden sm:table-cell">
                                    <div class="flex flex-col gap-2 pt-options">
                                        <label class="flex items-center gap-2">
                                            <input type="checkbox" name="pt_0" value="PT. Teknologi Masa Depan" checked disabled class="h-4 w-4 text-indigo-600 focus:ring-indigo-500">
                                            PT. Teknologi Masa Depan
                                        </label>
                                        <label class="flex items-center gap-2">
                                            <input type="checkbox" name="pt_0" value="Startup AI Solutions" disabled class="h-4 w-4 text-indigo-600 focus:ring-indigo-500">
                                            Startup AI Solutions
                                        </label>
                                        <label class="flex items-center gap-2">
                                            <input type="checkbox" name="pt_0" value="Creative Agency" disabled class="h-4 w-4 text-indigo-600 focus:ring-indigo-500">
                                            Creative Agency
                                        </label>
                                    </div>
                                </td>
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap">
                                    <button class="edit-btn text-indigo-600 hover:text-indigo-800 font-medium flex items-center gap-2 text-sm transition-all duration-200" onclick="editRow(this)">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <button class="save-btn hidden px-4 py-1 bg-green-600 text-white rounded-md text-sm font-medium flex items-center gap-2 shadow-sm hover:bg-green-700 transition-all duration-200" onclick="saveRow(this)">
                                        <i class="fas fa-save"></i> Simpan
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-indigo-50 transition-all duration-200">
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Jane Smith</td>
                                <td class="px-4 sm:px-6 py-4 hidden sm:table-cell">
                                    <div class="flex flex-col gap-2 pt-options">
                                        <label class="flex items-center gap-2">
                                            <input type="checkbox" name="pt_1" value="Startup AI Solutions" checked disabled class="h-4 w-4 text-indigo-600 focus:ring-indigo-500">
                                            Startup AI Solutions
                                        </label>
                                        <label class="flex items-center gap-2">
                                            <input type="checkbox" name="pt_1" value="Creative Agency" checked disabled class="h-4 w-4 text-indigo-600 focus:ring-indigo-500">
                                            Creative Agency
                                        </label>
                                        <label class="flex items-center gap-2">
                                            <input type="checkbox" name="pt_1" value="PT. Teknologi Masa Depan" disabled class="h-4 w-4 text-indigo-600 focus:ring-indigo-500">
                                            PT. Teknologi Masa Depan
                                        </label>
                                    </div>
                                </td>
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap">
                                    <button class="edit-btn text-indigo-600 hover:text-indigo-800 font-medium flex items-center gap-2 text-sm transition-all duration-200" onclick="editRow(this)">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <button class="save-btn hidden px-4 py-1 bg-green-600 text-white rounded-md text-sm font-medium flex items-center gap-2 shadow-sm hover:bg-green-700 transition-all duration-200" onclick="saveRow(this)">
                                        <i class="fas fa-save"></i> Simpan
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-indigo-50 transition-all duration-200">
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Michael Johnson</td>
                                <td class="px-4 sm:px-6 py-4 hidden sm:table-cell">
                                    <div class="flex flex-col gap-2 pt-options">
                                        <label class="flex items-center gap-2">
                                            <input type="checkbox" name="pt_2" value="Creative Agency" checked disabled class="h-4 w-4 text-indigo-600 focus:ring-indigo-500">
                                            Creative Agency
                                        </label>
                                        <label class="flex items-center gap-2">
                                            <input type="checkbox" name="pt_2" value="PT. Teknologi Masa Depan" checked disabled class="h-4 w-4 text-indigo-600 focus:ring-indigo-500">
                                            PT. Teknologi Masa Depan
                                        </label>
                                        <label class="flex items-center gap-2">
                                            <input type="checkbox" name="pt_2" value="Startup AI Solutions" disabled class="h-4 w-4 text-indigo-600 focus:ring-indigo-500">
                                            Startup AI Solutions
                                        </label>
                                    </div>
                                </td>
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap">
                                    <button class="edit-btn text-indigo-600 hover:text-indigo-800 font-medium flex items-center gap-2 text-sm transition-all duration-200" onclick="editRow(this)">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <button class="save-btn hidden px-4 py-1 bg-green-600 text-white rounded-md text-sm font-medium flex items-center gap-2 shadow-sm hover:bg-green-700 transition-all duration-200" onclick="saveRow(this)">
                                        <i class="fas fa-save"></i> Simpan
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-indigo-50 transition-all duration-200">
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Anna Brown</td>
                                <td class="px-4 sm:px-6 py-4 hidden sm:table-cell">
                                    <div class="flex flex-col gap-2 pt-options">
                                        <label class="flex items-center gap-2">
                                            <input type="checkbox" name="pt_3" value="PT. Teknologi Masa Depan" checked disabled class="h-4 w-4 text-indigo-600 focus:ring-indigo-500">
                                            PT. Teknologi Masa Depan
                                        </label>
                                        <label class="flex items-center gap-2">
                                            <input type="checkbox" name="pt_3" value="Creative Agency" disabled class="h-4 w-4 text-indigo-600 focus:ring-indigo-500">
                                            Creative Agency
                                        </label>
                                    </div>
                                </td>
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap">
                                    <button class="edit-btn text-indigo-600 hover:text-indigo-800 font-medium flex items-center gap-2 text-sm transition-all duration-200" onclick="editRow(this)">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <button class="save-btn hidden px-4 py-1 bg-green-600 text-white rounded-md text-sm font-medium flex items-center gap-2 shadow-sm hover:bg-green-700 transition-all duration-200" onclick="saveRow(this)">
                                        <i class="fas fa-save"></i> Simpan
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div
                    class="px-4 sm:px-6 py-4 bg-white border-t border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div class="flex-1 flex justify-between sm:hidden">
                        <button
                            class="relative inline-flex items-center px-4 py-2 border border-gray-200 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-indigo-50 transition-all duration-200">Sebelumnya</button>
                        <button
                            class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-200 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-indigo-50 transition-all duration-200">Selanjutnya</button>
                    </div>
                    <div class="sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-gray-600">
                                Menampilkan <span id="start-index" class="font-medium">1</span> sampai <span id="end-index"
                                    class="font-medium">4</span> dari <span id="total-recommendations" class="font-medium">4</span>
                                data
                            </p>
                        </div>
                        <div>
                            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                <button
                                    class="relative inline-flex items-center px-3 py-2 rounded-l-md border border-gray-200 bg-white text-sm font-medium text-gray-500 hover:bg-indigo-50 transition-all duration-200">
                                    <span class="sr-only">Previous</span>
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor" aria-hidden="true">
                                        <path fillRule="evenodd"
                                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                            clipRule="evenodd" />
                                    </svg>
                                </button>
                                <button aria-current="page"
                                    class="z-10 bg-indigo-100 border-indigo-500 text-indigo-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">1</button>
                                <button
                                    class="relative inline-flex items-center px-3 py-2 rounded-r-md border border-gray-200 bg-white text-sm font-medium text-gray-500 hover:bg-indigo-50 transition-all duration-200">
                                    <span class="sr-only">Next</span>
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor" aria-hidden="true">
                                        <path fillRule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clipRule="evenodd" />
                                    </svg>
                                </button>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Add Form Modal (Hidden by Default) -->
        <div id="add-form-modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex items-center justify-center z-50">
            <div class="bg-white rounded-xl p-6 w-full max-w-md shadow-2xl">
                <h2 class="text-xl font-bold text-indigo-900 mb-4">Tambah Rekomendasi</h2>
                <form id="add-form">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Nama Mahasiswa</label>
                        <input type="text" id="new-student-name" class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Perusahaan (PT)</label>
                        <div id="new-pt-options" class="flex flex-col gap-2">
                            <label class="flex items-center gap-2">
                                <input type="checkbox" name="new-pt" value="PT. Teknologi Masa Depan" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500">
                                PT. Teknologi Masa Depan
                            </label>
                            <label class="flex items-center gap-2">
                                <input type="checkbox" name="new-pt" value="Startup AI Solutions" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500">
                                Startup AI Solutions
                            </label>
                            <label class="flex items-center gap-2">
                                <input type="checkbox" name="new-pt" value="Creative Agency" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500">
                                Creative Agency
                            </label>
                        </div>
                        <div class="mt-2">
                            <input type="text" id="new-company" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-sm" placeholder="Tambah perusahaan baru">
                            <button type="button" id="add-company-btn" class="mt-1 w-full px-3 py-1 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 text-sm">Tambah Perusahaan</button>
                        </div>
                    </div>
                    <div class="flex justify-end gap-2">
                        <button type="button" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400" onclick="hideAddForm()">Batal</button>
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        /* Animasi untuk dropdown */
        #perusahaan-dropdown:not(.hidden) {
            transform: scale(1);
            opacity: 1;
        }
        #perusahaan-dropdown.hidden {
            transform: scale(0.95);
            opacity: 0;
        }
        /* Efek hover pada tabel */
        tr:hover {
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }
        /* Efek pada tombol */
        .edit-btn:hover, .save-btn:hover, #add-recommendation-btn:hover, #add-company-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        /* Styling checkbox */
        .pt-options label {
            transition: all 0.2s ease;
        }
        .pt-options input:checked + span {
            color: #4f46e5;
            font-weight: 500;
        }
    </style>

    <script>
        function editRow(button) {
            const row = button.closest('tr');
            const ptOptions = row.querySelectorAll('.pt-options input[type="checkbox"]');
            const saveBtn = row.querySelector('.save-btn');
            const editBtn = row.querySelector('.edit-btn');

            ptOptions.forEach(input => input.disabled = false);
            saveBtn.classList.remove('hidden');
            editBtn.classList.add('hidden');

            // Tambahkan opsi perusahaan yang baru ditambahkan  saat edit
            const existingCompanies = Array.from(ptOptions).map(input => input.value);
            const allCompanies = Array.from(document.querySelectorAll('#new-pt-options input[name="new-pt"]')).map(input => input.value);
            const missingCompanies = allCompanies.filter(company => !existingCompanies.includes(company));

            missingCompanies.forEach(company => {
                const newOption = `
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="${ptOptions[0].name}" value="${company}" disabled class="h-4 w-4 text-indigo-600 focus:ring-indigo-500">
                        ${company}
                    </label>
                `;
                row.querySelector('.pt-options').insertAdjacentHTML('beforeend', newOption);
            });
        }

        function saveRow(button) {
            const row = button.closest('tr');
            const ptOptions = row.querySelectorAll('.pt-options input[type="checkbox"]');
            const editBtn = row.querySelector('.edit-btn');
            const saveBtn = row.querySelector('.save-btn');

            // Validasi: Pastikan setidaknya satu PT dipilih
            const checkedPTs = Array.from(ptOptions).filter(input => input.checked);
            if (checkedPTs.length === 0) {
                alert('Harap pilih setidaknya satu perusahaan (PT)!');
                return;
            }

            ptOptions.forEach(input => input.disabled = true);
            saveBtn.classList.add('hidden');
            editBtn.classList.remove('hidden');

            // Simulasi lempar ke profil mahasiswa
            const mahasiswa = row.cells[0].textContent;
            console.log(`Rekomendasi untuk ${mahasiswa} (Perusahaan: ${checkedPTs.map(input => input.value).join(', ')}) dilempar ke profil mahasiswa pada ${new Date().toLocaleString('id-ID', { timeZone: 'Asia/Jakarta' })}.`);
        }

        // Dropdown Toggle for Perusahaan Filter
        document.getElementById('perusahaan-filter-btn').addEventListener('click', function () {
            document.getElementById('perusahaan-dropdown').classList.toggle('hidden');
        });

        document.querySelectorAll('#perusahaan-list button').forEach(button => {
            button.addEventListener('click', function () {
                document.getElementById('perusahaan-filter-text').textContent = this.dataset.perusahaan;
                document.getElementById('perusahaan-dropdown').classList.add('hidden');
                console.log('Filter by perusahaan:', this.dataset.perusahaan);
            });
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function (event) {
            if (!event.target.closest('#perusahaan-filter-btn') && !event.target.closest('#perusahaan-dropdown')) {
                document.getElementById('perusahaan-dropdown').classList.add('hidden');
            }
        });

        // Search Input Logic
        document.getElementById('search-input').addEventListener('input', function () {
            const searchValue = this.value.toLowerCase();
            const rows = document.querySelectorAll('#recommendation-table-body tr');
            rows.forEach(row => {
                const name = row.cells[0].textContent.toLowerCase();
                if (name.includes(searchValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Show Add Form Modal
        function showAddForm() {
            document.getElementById('add-form-modal').classList.remove('hidden');
        }

        // Hide Add Form Modal
        function hideAddForm() {
            document.getElementById('add-form-modal').classList.add('hidden');
            document.getElementById('add-form').reset();
            document.getElementById('new-company').value = '';
        }

        // Add New Company
        document.getElementById('add-company-btn').addEventListener('click', function () {
            const newCompanyInput = document.getElementById('new-company');
            const newCompany = newCompanyInput.value.trim();

            if (newCompany === '') {
                alert('Masukkan nama perusahaan terlebih dahulu!');
                return;
            }

            const existingCompanies = Array.from(document.querySelectorAll('#new-pt-options input[name="new-pt"]')).map(input => input.value);
            if (existingCompanies.includes(newCompany)) {
                alert('Perusahaan ini sudah ada!');
                return;
            }

            // Tambahkan ke opsi di formulir
            const newOption = `
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="new-pt" value="${newCompany}" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500">
                    ${newCompany}
                </label>
            `;
            document.getElementById('new-pt-options').insertAdjacentHTML('beforeend', newOption);

            // Tambahkan ke filter perusahaan
            const newFilterOption = `
                <li><button class="block w-full text-left px-4 py-2 text-sm hover:bg-indigo-50 text-gray-700" data-perusahaan="${newCompany}">${newCompany}</button></li>
            `;
            document.getElementById('perusahaan-list').insertAdjacentHTML('beforeend', newFilterOption);

            // Perbarui event listener untuk filter baru
            document.querySelectorAll('#perusahaan-list button').forEach(button => {
                button.addEventListener('click', function () {
                    document.getElementById('perusahaan-filter-text').textContent = this.dataset.perusahaan;
                    document.getElementById('perusahaan-dropdown').classList.add('hidden');
                    console.log('Filter by perusahaan:', this.dataset.perusahaan);
                });
            });

            newCompanyInput.value = '';
            console.log('Perusahaan ditambahkan:', newCompany);
        });

        // Handle Add Form Submission
        document.getElementById('add-form').addEventListener('submit', function (e) {
            e.preventDefault();

            const name = document.getElementById('new-student-name').value;
            const ptCheckboxes = document.querySelectorAll('input[name="new-pt"]:checked');
            const ptValues = Array.from(ptCheckboxes).map(cb => cb.value);

            if (ptValues.length === 0) {
                alert('Harap pilih setidaknya satu perusahaan (PT)!');
                return;
            }

            const newRow = `
                <tr class="hover:bg-indigo-50 transition-all duration-200">
                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${name}</td>
                    <td class="px-4 sm:px-6 py-4 hidden sm:table-cell">
                        <div class="flex flex-col gap-2 pt-options">
                            ${ptValues.map(pt => `
                                <label class="flex items-center gap-2">
                                    <input type="checkbox" name="pt_${Date.now()}" value="${pt}" checked disabled class="h-4 w-4 text-indigo-600 focus:ring-indigo-500">
                                    ${pt}
                                </label>
                            `).join('')}
                        </div>
                    </td>
                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap">
                        <button class="edit-btn text-indigo-600 hover:text-indigo-800 font-medium flex items-center gap-2 text-sm transition-all duration-200" onclick="editRow(this)">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="save-btn hidden px-4 py-1 bg-green-600 text-white rounded-md text-sm font-medium flex items-center gap-2 shadow-sm hover:bg-green-700 transition-all duration-200" onclick="saveRow(this)">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                    </td>
                </tr>
            `;

            document.getElementById('recommendation-table-body').insertAdjacentHTML('beforeend', newRow);
            document.getElementById('total-recommendations').textContent = parseInt(document.getElementById('total-recommendations').textContent) + 1;
            document.getElementById('end-index').textContent = parseInt(document.getElementById('end-index').textContent) + 1;

            // Simulasi lempar ke profil mahasiswa
            console.log(`Rekomendasi untuk ${name} (Perusahaan: ${ptValues.join(', ')}) dilempar ke profil mahasiswa pada ${new Date().toLocaleString('id-ID', { timeZone: 'Asia/Jakarta' })}.`);

            hideAddForm();
        });
    </script>
@endsection
