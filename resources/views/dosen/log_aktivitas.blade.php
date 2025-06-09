@extends('layouts.dosen')
@section('dosen')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="min-h-screen bg-gray-50 p-4 sm:p-6 lg:p-8">
        <header class="mb-8">
            <h1 class="text-3xl font-bold text-blue-900">Log Aktivitas Mingguan 🕰</h1>
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
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                            <tbody id="log-table-body" class="bg-white divide-y divide-gray-200">
                            @if (empty($logAktivitas))
                                <tr>
                                    <td colspan="6" class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                        Tidak ada data log aktivitas mingguan.
                                    </td>
                                </tr>
                            @else
                                @foreach ($logAktivitas as $log)
                                    <tr data-log-id="{{ $log->id_log_aktivitas }}">
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $log->bimbinganMagang->mahasiswa->nama_mahasiswa }}</td>
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900 hidden sm:table-cell">
                                            Minggu ke-{{ $log->minggu }}</td>
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900 hidden md:table-cell">
                                            {{ date('d-m-Y', strtotime($log->tanggal)) }}</td>
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900 hidden xl:table-cell">
                                            {{ $log->kegiatan }}</td>
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex gap-2">
                                                <button onclick="openEvaluationModal({{ $log->id_log_aktivitas }}, '{{ $log->bimbinganMagang->mahasiswa->nama_mahasiswa }}', '{{ $log->tanggal }}')"
                                                    class="px-3 py-1.5 bg-blue-600 text-white rounded-md hover:bg-blue-700 text-sm">
                                                    Evaluasi
                                                </button>
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
                                    class="font-medium">{{ count($logAktivitas) }}</span> dari <span id="total-log"
                                    class="font-medium">{{ count($logAktivitas) }}</span> data
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
                            @if(isset($evaluasi) && $evaluasi->count() > 0)
                                @foreach($evaluasi as $eval)
                                    <tr>
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $eval->bimbinganMagang->mahasiswa->nama_mahasiswa ?? 'Nama tidak tersedia' }}
                                        </td>
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900 hidden sm:table-cell">
                                            {{ isset($eval->logAktivitas) ? date('d-m-Y', strtotime($eval->logAktivitas->tanggal)) : 'Tidak tersedia' }}
                                        </td>
                                        <td class="px-4 sm:px-6 py-4 text-sm text-gray-900">
                                            <div class="max-w-xs md:max-w-md lg:max-w-lg overflow-hidden">
                                                {{ $eval->komentar }}
                                            </div>
                                        </td>
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900 hidden md:table-cell">
                                            {{ date('d-m-Y H:i', strtotime($eval->created_at)) }}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                        Belum ada catatan evaluasi.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <!-- Pagination for Evaluation Table -->
                <div class="px-4 sm:px-6 py-4 bg-white border-t border-gray-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div class="sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-gray-700">
                                Menampilkan <span id="eval-start-index" class="font-medium">
                                    {{ isset($evaluasi) && $evaluasi->count() > 0 ? 1 : 0 }}
                                </span> sampai <span id="eval-end-index" class="font-medium">
                                    {{ isset($evaluasi) ? $evaluasi->count() : 0 }}
                                </span> dari <span id="total-eval" class="font-medium">
                                    {{ isset($evaluasi) ? $evaluasi->count() : 0 }}
                                </span> data
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
        <div id="evaluation-modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
            <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-medium text-gray-900">Evaluasi Log Aktivitas</h3>
                    <button type="button" onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                
                <div id="evaluation-status-message"></div>
                
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
        // Debug function to help troubleshoot
        function showDebug(message) {
            console.log(message);
            // You can uncomment this to show debug messages on the page
            // document.getElementById('evaluation-status-message').innerHTML = `<div class="p-4 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg">${message}</div>`;
        }
        
        // Function to open the evaluation modal
        function openEvaluationModal(logId, studentName, submissionDate) {
            showDebug(`Opening modal for log ID: ${logId}, Student: ${studentName}`);
            
            try {
                // Set form values
                document.getElementById('log_id').value = logId;
                document.getElementById('student_name').value = studentName;
                document.getElementById('submission_date').value = submissionDate;
                
                // Show the modal
                const modal = document.getElementById('evaluation-modal');
                if (modal) {
                    modal.classList.remove('hidden');
                    showDebug('Modal displayed successfully');
                } else {
                    showDebug('Modal element not found!');
                    alert('Error: Modal element not found!');
                }
                
                // Check if this log already has an evaluation
                const evaluations = @json(isset($evaluasi) ? $evaluasi : []);
                if (evaluations.length > 0) {
                    for (let i = 0; i < evaluations.length; i++) {
                        if (evaluations[i].id_log_aktivitas == logId) {
                            document.getElementById('evaluation').value = evaluations[i].komentar;
                            showDebug('Found existing evaluation, populated the form');
                            break;
                        }
                    }
                }
            } catch (error) {
                console.error('Error in openEvaluationModal:', error);
                alert('Error opening modal: ' + error.message);
            }
        }

        // Function to close the modal
        function closeModal() {
            showDebug('Closing modal');
            document.getElementById('evaluation-modal').classList.add('hidden');
            document.getElementById('evaluation-form').reset();
        }

        // Submit evaluation form via AJAX
        document.getElementById('evaluation-form').addEventListener('submit', function(e) {
            e.preventDefault();
            showDebug('Form submitted');
            
            const logId = document.getElementById('log_id').value;
            const evaluation = document.getElementById('evaluation').value;
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            
            // Show loading state
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Menyimpan...';
            submitBtn.disabled = true;
            
            fetch('/dosen/log-aktivitas/evaluate', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({
                    log_id: logId,
                    evaluation: evaluation
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show success message
                    document.getElementById('evaluation-status-message').innerHTML = 
                        '<div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">Evaluasi berhasil disimpan!</div>';
                    
                    // Close modal after delay and reload page
                    setTimeout(() => {
                        closeModal();
                        window.location.reload();
                    }, 1500);
                } else {
                    document.getElementById('evaluation-status-message').innerHTML = 
                        `<div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">Error: ${data.message}</div>`;
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('evaluation-status-message').innerHTML = 
                    '<div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">Terjadi kesalahan saat menyimpan evaluasi</div>';
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            });
        });

        // Make sure to initialize all elements once DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Page loaded, initializing components...');
            // Any additional initialization can go here
            
            // Add event listeners to all evaluation buttons for redundancy
            const evaluationButtons = document.querySelectorAll('button[onclick^="openEvaluationModal"]');
            evaluationButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const clickFunction = this.getAttribute('onclick');
                    console.log('Button clicked with function:', clickFunction);
                    // This is just for logging - the actual function is called via the onclick attribute
                });
            });
            
            // Make sure the evaluation form exists
            const form = document.getElementById('evaluation-form');
            if (!form) {
                console.error('Evaluation form not found!');
            }
            
            // Make sure the modal exists
            const modal = document.getElementById('evaluation-modal');
            if (!modal) {
                console.error('Evaluation modal not found!');
            }
        });
    </script>
@endsection
