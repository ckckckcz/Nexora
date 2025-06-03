@extends('layouts.dosen')
@section('dosen')
    <div class="min-h-screen bg-gray-50 p-4 sm:p-6 lg:p-8">
        <header class="mb-8">
            <h1 class="text-3xl font-bold text-blue-900">Log Aktivitas Mingguan 🕰️</h1>
            <p class="mt-2 text-gray-600 font-medium">Kelola log aktivitas mingguan mahasiswa bimbingan</p>
        </header>

        <section class="bg-white rounded-2xl border border-gray-200">
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

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID Log
                                </th>
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
                                    class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th scope="col"
                                    class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Catatan Evaluasi
                                </th>
                                <th scope="col"
                                    class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody id="log-table-body" class="bg-white divide-y divide-gray-200">
                            <?php
                                // Data dummy untuk log aktivitas mingguan
                                $logs = [
                                    (object) [
                                        'id_log' => 1,
                                        'nama_mahasiswa' => 'Budi Santoso',
                                        'minggu' => 'Minggu 1',
                                        'tanggal_pengumpulan' => '2025-06-02',
                                        'status' => 'Menunggu',
                                        'evaluasi' => '',
                                    ],
                                    (object) [
                                        'id_log' => 2,
                                        'nama_mahasiswa' => 'Ani Wijaya',
                                        'minggu' => 'Minggu 2',
                                        'tanggal_pengumpulan' => '2025-06-09',
                                        'status' => 'Menunggu',
                                        'evaluasi' => '',
                                    ],
                                    (object) [
                                        'id_log' => 3,
                                        'nama_mahasiswa' => 'Citra Lestari',
                                        'minggu' => 'Minggu 3',
                                        'tanggal_pengumpulan' => '2025-06-16',
                                        'status' => 'Menunggu',
                                        'evaluasi' => '',
                                    ],
                                    (object) [
                                        'id_log' => 4,
                                        'nama_mahasiswa' => 'Dedi Pratama',
                                        'minggu' => 'Minggu 4',
                                        'tanggal_pengumpulan' => '2025-06-23',
                                        'status' => 'Menunggu',
                                        'evaluasi' => '',
                                    ],
                                ];
                            ?>
                            @foreach ($logs as $log)
                                <tr data-log-id="{{ $log->id_log }}">
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $log->id_log }}</td>
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $log->nama_mahasiswa }}</td>
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900 hidden sm:table-cell">
                                        {{ $log->minggu }}</td>
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900 hidden md:table-cell">
                                        {{ date('d-m-Y', strtotime($log->tanggal_pengumpulan)) }}</td>
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900 status">
                                        {{ $log->status }}</td>
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900 evaluasi">
                                        {{ $log->evaluasi ?: '-' }}</td>
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="relative w-full sm:w-auto">
                                            <select onchange="handleAction(this, {{ $log->id_log }})"
                                                class="block w-full px-3 py-1.5 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 text-sm">
                                                <option value="">Pilih Aksi</option>
                                                <option value="terima">Terima</option>
                                                <option value="tolak">Tolak</option>
                                                <option value="evaluasi">Evaluasi</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Modal for Evaluation -->
                <div id="evaluation-modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
                    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Evaluasi Log Aktivitas</h3>
                        <form id="evaluation-form">
                            @csrf
                            <input type="hidden" name="log_id" id="log_id">
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
    </div>

    <script>
        function handleAction(select, logId) {
            const action = select.value;
            if (!action) return;

            if (action === 'evaluasi') {
                openEvaluationModal(logId);
            } else if (action === 'terima' || action === 'tolak') {
                if (!confirm(`Apakah Anda yakin ingin ${action} log ini?`)) {
                    select.value = ''; // Reset dropdown
                    return;
                }

                const formData = new FormData();
                formData.append('action', action);
                formData.append('_token', document.querySelector('input[name="_token"]').value);

                fetch(`/dosen/mahasiswa/log-aktivitas/${logId}/action`, {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    if (data && data.success) {
                        alert(`Log berhasil ${action === 'terima' ? 'diterima' : 'ditolak'}! Silakan refresh halaman untuk melihat perubahan.`);
                    } else {
                        alert(`Gagal memproses aksi: ${data?.message || 'Tidak ada detail error dari server'}`);
                    }
                    select.value = ''; // Reset dropdown
                })
                .catch(error => {
                    console.error('Error in handleAction:', error);
                    alert('Terjadi kesalahan saat memproses aksi: ' + error.message);
                    select.value = ''; // Reset dropdown
                });
            }
        }

        function openEvaluationModal(logId) {
            document.getElementById('log_id').value = logId;
            document.getElementById('evaluation-modal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('evaluation-modal').classList.add('hidden');
            document.getElementById('evaluation').value = '';
            document.getElementById('log_id').value = '';
        }

        document.getElementById('evaluation-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const logId = document.getElementById('log_id').value;
            const evaluation = document.getElementById('evaluation').value;

            if (!evaluation.trim()) {
                alert('Catatan evaluasi tidak boleh kosong!');
                return;
            }

            const formData = new FormData(this);
            formData.append('action', 'evaluasi');

            fetch('/dosen/mahasiswa/log-aktivitas/evaluasi', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                if (data && data.success) {
                    alert('Evaluasi berhasil disimpan! Silakan refresh halaman untuk melihat perubahan.');
                    closeModal();
                } else {
                    alert(`Gagal menyimpan evaluasi: ${data?.message || 'Tidak ada detail error dari server'}`);
                }
                document.querySelector(`select[onchange="handleAction(this, ${logId})"]`).value = ''; // Reset dropdown
            })
            .catch(error => {
                console.error('Error in evaluation submission:', error);
                alert('Terjadi kesalahan saat menyimpan evaluasi: ' + error.message);
            });
        });
    </script>
@endsection