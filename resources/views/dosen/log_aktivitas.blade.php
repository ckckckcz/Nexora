@extends('layouts.dosen')
@section('dosen')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="min-h-screen bg-gray-50 p-4 sm:p-6 lg:p-8">
        <header class="mb-8">
            <h1 class="text-3xl font-bold text-blue-900">Log Aktivitas Mingguan 🕰️</h1>
            <p class="mt-2 text-gray-600 font-medium">Kelola log aktivitas mingguan mahasiswa bimbingan</p>
        </header>

        <section class="bg-white rounded-2xl border border-gray-200 mb-8">
            <div class="p-4 sm:p-6 flex flex-col gap-4">
                <div class="flex flex-col lg:flex-row sm:items-left sm:justify-between gap-4">
                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:flex-wrap flex-grow">
                        <!-- Search Input -->
                        <div class="relative flex-grow max-w-full sm:max-w-md">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400" id="search-icon"></i>
                            </div>
                            <input type="text" id="search-input"
                                class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm"
                                placeholder="Cari berdasarkan Nama Mahasiswa" />
                        </div>

                        <!-- Filter Dropdown for Weeks -->
                        <div class="relative w-full sm:w-auto">
                            <button id="week-filter-btn"
                                class="flex items-center gap-2 px-4 py-2 border border-gray-300 rounded-lg bg-white hover:bg-gray-50 focus:outline-none w-full sm:w-auto text-sm">
                                <i class="fas fa-filter text-gray-500" id="filter-icon"></i>
                                <span id="week-filter-text">Semua Minggu</span>
                                <i class="fas fa-chevron-down text-gray-300" id="week-chevron"></i>
                            </button>
                            <div id="week-dropdown"
                                class="absolute z-10 mt-1 w-full sm:w-56 bg-white rounded-lg shadow-lg border border-gray-200 hidden">
                                <ul class="py-1 max-h-60 overflow-auto">
                                    <li><button
                                            class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 text-gray-700"
                                            data-week="Semua Minggu">Semua Minggu</button></li>
                                    <li><button
                                            class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 text-gray-700"
                                            data-week="Minggu 1">Minggu 1</button></li>
                                    <li><button
                                            class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 text-gray-700"
                                            data-week="Minggu 2">Minggu 2</button></li>
                                    <li><button
                                            class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 text-gray-700"
                                            data-week="Minggu 3">Minggu 3</button></li>
                                    <li><button
                                            class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 text-gray-700"
                                            data-week="Minggu 4">Minggu 4</button></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Table Log Aktivitas -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nama Mahasiswa
                                </th>
                                <th scope="col"
                                    class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden sm:table-cell">
                                    Minggu
                                </th>
                                <th scope="col"
                                    class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">
                                    Tanggal Pengumpulan
                                </th>
                                <th scope="col"
                                    class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden xl:table-cell">
                                    Kegiatan
                                </th>
                                <th scope="col"
                                    class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status Log
                                </th>
                                <th scope="col"
                                    class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody id="log-table-body" class="bg-white divide-y divide-gray-200">
                            <?php
                                // Data dummy sesuai dengan struktur DB, tanpa jam_masuk dan jam_pulang
                                $logs = [
                                    (object) [
                                        'id_log_aktivitas' => 1,
                                        'id_bimbingan' => 1,
                                        'nama_mahasiswa' => 'Budi Santoso',
                                        'tanggal' => '2025-06-03',
                                        'kegiatan' => 'Orientasi perusahan dan pengenalan film development',
                                        'status_log' => 'Ditentukan',
                                        'created_at' => '2025-06-03 10:00:00',
                                        'updated_at' => '2025-06-03 10:00:00',
                                    ],
                                    (object) [
                                        'id_log_aktivitas' => 2,
                                        'id_bimbingan' => 2,
                                        'nama_mahasiswa' => 'Ani Wijaya',
                                        'tanggal' => '2025-06-04',
                                        'kegiatan' => 'Setup environment development dan instalasi tools',
                                        'status_log' => 'Ditentukan',
                                        'created_at' => '2025-06-04 10:00:00',
                                        'updated_at' => '2025-06-04 10:00:00',
                                    ],
                                    (object) [
                                        'id_log_aktivitas' => 3,
                                        'id_bimbingan' => 3,
                                        'nama_mahasiswa' => 'Citra Lestari',
                                        'tanggal' => '2025-06-05',
                                        'kegiatan' => 'Pelatihan dasar digital marketing dan pengenalan p...',
                                        'status_log' => 'Ditentukan',
                                        'created_at' => '2025-06-05 10:00:00',
                                        'updated_at' => '2025-06-05 10:00:00',
                                    ],
                                ];

                                // Menghitung minggu berdasarkan tanggal (simulasi sederhana)
                                foreach ($logs as $log) {
                                    $date = new DateTime($log->tanggal);
                                    $week = 'Minggu ' . ceil((int)$date->format('j') / 7);
                                    $log->minggu = $week;
                                }
                            ?>
                            @if (empty($logs))
                                <tr>
                                    <td colspan="6" class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                        Tidak ada data log aktivitas mingguan.
                                    </td>
                                </tr>
                            @else
                                @foreach ($logs as $log)
                                    <tr data-log-id="{{ $log->id_log_aktivitas }}">
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $log->nama_mahasiswa }}</td>
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900 hidden sm:table-cell">
                                            {{ $log->minggu }}</td>
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900 hidden md:table-cell">
                                            {{ date('d-m-Y', strtotime($log->tanggal)) }}</td>
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900 hidden xl:table-cell">
                                            {{ $log->kegiatan }}</td>
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900 status-log">
                                            {{ $log->status_log }}</td>
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="relative w-full sm:w-auto">
                                                <select onchange="handleAction(this, {{ $log->id_log_aktivitas }}, '{{ $log->nama_mahasiswa }}', '{{ $log->tanggal }}')"
                                                    class="block w-full px-3 py-1.5 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 text-sm">
                                                    <option value="">Pilih Aksi</option>
                                                    <option value="evaluasi">Evaluasi</option>
                                                    <option value="terima">Terima</option>
                                                    <option value="tolak">Tolak</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="px-4 sm:px-6 py-4 bg-white border-t border-gray-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div class="flex-1 flex justify-between sm:hidden">
                        <button class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Sebelumnya</button>
                        <button class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Selanjutnya</button>
                    </div>
                    <div class="sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-gray-700">
                                Menampilkan <span id="start-index" class="font-medium">1</span> sampai <span id="end-index"
                                    class="font-medium">{{ count($logs) }}</span> dari <span id="total-log"
                                    class="font-medium">{{ count($logs) }}</span> data
                            </p>
                        </div>
                        <div>
                            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                <button class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                    <span class="sr-only">Previous</span>
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor" aria-hidden="true">
                                        <path fillRule="evenodd"
                                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                            clipRule="evenodd" />
                                    </svg>
                                </button>
                                <button aria-current="page"
                                    class="z-10 bg-blue-50 border-blue-500 text-blue-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">1</button>
                                <button class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
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

        <!-- Section for Evaluation Results -->
        <section class="bg-white rounded-2xl border border-gray-200">
            <div class="p-4 sm:p-6 flex flex-col gap-4">
                <h2 class="text-xl font-bold text-blue-900">Hasil Evaluasi Dosen 📋</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nama Mahasiswa
                                </th>
                                <th scope="col"
                                    class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden sm:table-cell">
                                    Tanggal Pengumpulan
                                </th>
                                <th scope="col"
                                    class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Catatan Evaluasi
                                </th>
                                <th scope="col"
                                    class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">
                                    Tanggal Evaluasi
                                </th>
                            </tr>
                        </thead>
                        <tbody id="evaluation-table-body" class="bg-white divide-y divide-gray-200">
                            <!-- Awalnya kosong, akan diisi saat aksi evaluasi dilakukan -->
                            <tr>
                                <td colspan="4" class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                    Belum ada catatan evaluasi.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination for Evaluation Table -->
                <div class="px-4 sm:px-6 py-4 bg-white border-t border-gray-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div class="flex-1 flex justify-between sm:hidden">
                        <button class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Sebelumnya</button>
                        <button class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Selanjutnya</button>
                    </div>
                    <div class="sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-gray-700">
                                Menampilkan <span id="eval-start-index" class="font-medium">0</span> sampai <span id="eval-end-index"
                                    class="font-medium">0</span> dari <span id="total-eval"
                                    class="font-medium">0</span> data
                            </p>
                        </div>
                        <div>
                            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                <button class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                    <span class="sr-only">Previous</span>
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor" aria-hidden="true">
                                        <path fillRule="evenodd"
                                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                            clipRule="evenodd" />
                                    </svg>
                                </button>
                                <button aria-current="page"
                                    class="z-10 bg-blue-50 border-blue-500 text-blue-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">1</button>
                                <button class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
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

        <!-- Modal for Evaluation -->
        <div id="evaluation-modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
            <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Evaluasi Log Aktivitas</h3>
                <form id="evaluation-form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="log_id" id="log_id">
                    <input type="hidden" name="student_name" id="student_name">
                    <input type="hidden" name="submission_date" id="submission_date">
                    <div class="mb-4">
                        <label for="evaluation" class="block text-sm font-medium text-gray-700">Catatan Evaluasi</label>
                        <textarea name="evaluation" id="evaluation" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required></textarea>
                    </div>
                    <div class="flex justify-end gap-2">
                        <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Batal</button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Simulasi penyimpanan evaluasi di FE
        let evaluations = [];

        // Toggle dropdown visibility
        document.getElementById('week-filter-btn').addEventListener('click', function() {
            const dropdown = document.getElementById('week-dropdown');
            dropdown.classList.toggle('hidden');
        });

        // Handle week filter selection
        document.querySelectorAll('#week-dropdown button').forEach(button => {
            button.addEventListener('click', function() {
                const selectedWeek = this.getAttribute('data-week');
                document.getElementById('week-filter-text').textContent = selectedWeek;
                document.getElementById('week-dropdown').classList.add('hidden');
                console.log('Filter by week:', selectedWeek);
            });
        });

        // Handle search input (simulasi tanpa BE)
        document.getElementById('search-input').addEventListener('input', function() {
            const searchValue = this.value.toLowerCase();
            const rows = document.querySelectorAll('#log-table-body tr');
            rows.forEach(row => {
                const studentName = row.cells[0].textContent.toLowerCase();
                row.style.display = studentName.includes(searchValue) ? '' : 'none';
            });
        });

        function handleAction(select, logId, studentName, submissionDate) {
            const action = select.value;
            if (!action) return;

            const row = document.querySelector(`tr[data-log-id="${logId}"]`);
            const statusCell = row.querySelector('.status-log');

            if (action === 'evaluasi') {
                openEvaluationModal(logId, studentName, submissionDate);
            } else if (action === 'terima' || action === 'tolak') {
                if (!confirm(`Apakah Anda yakin ingin ${action} log ini?`)) {
                    select.value = ''; // Reset dropdown
                    return;
                }

                // Simulasi AJAX request ke BE
                setTimeout(() => {
                    alert(`Log berhasil ${action}!`);
                    statusCell.textContent = action.charAt(0).toUpperCase() + action.slice(1);
                    select.value = ''; // Reset dropdown
                }, 500);
            }
        }

        function openEvaluationModal(logId, studentName, submissionDate) {
            document.getElementById('log_id').value = logId;
            document.getElementById('student_name').value = studentName;
            document.getElementById('submission_date').value = submissionDate;
            document.getElementById('evaluation-modal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('evaluation-modal').classList.add('hidden');
            document.getElementById('evaluation').value = '';
            document.getElementById('log_id').value = '';
            document.getElementById('student_name').value = '';
            document.getElementById('submission_date').value = '';
        }

        document.getElementById('evaluation-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const logId = document.getElementById('log_id').value;
            const studentName = document.getElementById('student_name').value;
            const submissionDate = document.getElementById('submission_date').value;
            const evaluation = document.getElementById('evaluation').value;

            if (!evaluation.trim()) {
                alert('Catatan evaluasi tidak boleh kosong!');
                return;
            }

            // Simulasi AJAX request ke BE
            setTimeout(() => {
                alert('Evaluasi berhasil disimpan!');
                const evaluationData = {
                    log_id: logId,
                    student_name: studentName,
                    submission_date: submissionDate,
                    result: evaluation,
                    evaluation_date: '03-06-2025 22:57' // Waktu saat ini (WIB)
                };
                evaluations.push(evaluationData);
                updateEvaluationTable();
                closeModal();
                document.querySelector(`select[onchange="handleAction(this, ${logId}, '${studentName}', '${submissionDate}')"]`).value = ''; // Reset dropdown
            }, 500);
        });

        function updateEvaluationTable() {
            const tbody = document.getElementById('evaluation-table-body');
            tbody.innerHTML = '';

            if (evaluations.length === 0) {
                tbody.innerHTML = `
                    <tr>
                        <td colspan="4" class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                            Belum ada catatan evaluasi.
                        </td>
                    </tr>
                `;
            } else {
                evaluations.forEach(eval => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">${eval.student_name}</td>
                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900 hidden sm:table-cell">${eval.submission_date}</td>
                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">${eval.result}</td>
                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900 hidden md:table-cell">${eval.evaluation_date}</td>
                    `;
                    tbody.appendChild(row);
                });
            }

            // Update pagination info
            document.getElementById('eval-start-index').textContent = evaluations.length > 0 ? 1 : 0;
            document.getElementById('eval-end-index').textContent = evaluations.length;
            document.getElementById('total-eval').textContent = evaluations.length;
        }
    </script>
@endsection