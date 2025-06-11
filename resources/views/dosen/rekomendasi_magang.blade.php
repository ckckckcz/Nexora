@extends('layouts.dosen')
@section('dosen')
    <!-- Include Toast Display Component -->
    @include('components.ui.toast.toast_display')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="min-h-screen bg-gray-50 p-4 sm:p-6 lg:p-8">
        <header class="mb-8">
            <h1 class="text-3xl font-bold text-blue-900">Rekomendasi Magang 🕰️</h1>
            <p class="mt-2 text-gray-600 font-medium">List Mahasiswa Bimbingan</p>
        </header>

        <section class="bg-white rounded-2xl border border-gray-200">
            <div class="p-4 sm:p-6 flex flex-col gap-4">
                <div class="flex flex-col lg:flex-row sm:items-left sm:justify-between gap-4">
                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:flex-wrap flex-grow">
                        <!-- Search Input -->
                        <div class="relative flex-grow max-w-full sm:max-w-md">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                            <input type="text" id="search-input"
                                class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm"
                                placeholder="Cari berdasarkan NIM atau Nama" />
                        </div>

                        <!-- Filter Dropdown for Skema Magang -->
                        <div class="relative w-full sm:w-auto">
                            <button
                                class="flex items-center gap-2 px-4 py-2 border border-gray-300 rounded-lg bg-white hover:bg-gray-50 focus:outline-none w-full sm:w-auto text-sm">
                                <i class="fas fa-filter text-gray-500"></i>
                                <span>Semua Skema</span>
                                <i class="fas fa-chevron-down text-gray-300"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    No
                                </th>
                                <th scope="col" class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nama Mahasiswa
                                </th>
                                <th scope="col" class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden sm:table-cell">
                                    NIM
                                </th>
                                <th scope="col" class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Perusahaan
                                </th>
                                <th scope="col" class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">
                                    Skor WMSC
                                </th>
                                <th scope="col" class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if(empty($mahasiswas) || count($mahasiswas) == 0)
                                <tr>
                                    <td colspan="6" class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                        Tidak ada data mahasiswa bimbingan.
                                    </td>
                                </tr>
                            @else
                                @foreach($mahasiswas as $index => $student)
                                    <tr data-student-id="{{ $student['id'] }}">
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $index + 1 }}
                                        </td>
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $student['name'] }}
                                        </td>
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900 hidden sm:table-cell">
                                            {{ $student['nim'] }}
                                        </td>
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $student['company'] }}
                                        </td>
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900 hidden md:table-cell">
                                            <span class="font-mono">{{ $student['vikor'] }}</span>
                                        </td>
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex space-x-2">
                                                <button onclick="viewProfile('{{ $student['nim'] }}')"
                                                    class="inline-flex items-center px-3 py-1.5 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200 transition-colors duration-200 text-sm">
                                                    Detail Profil
                                                </button>
                                                {{-- <button onclick="showUpdateModal({{ json_encode($student) }})"
                                                    class="inline-flex items-center px-3 py-1.5 bg-green-100 text-green-700 rounded-md hover:bg-green-200 transition-colors duration-200 text-sm">
                                                    Update Status
                                                </button> --}}
                                                <!-- Conditional Recommendation Button -->
                                                @if($student['rekomendasi_dosen'] == 0 || $student['rekomendasi_dosen'] === null)
                                                    <button onclick="recommendStudent({{ $student['id'] }})"
                                                        class="inline-flex items-center px-3 py-1.5 bg-orange-100 text-orange-700 rounded-md hover:bg-orange-200 transition-colors duration-200 text-sm recommendation-btn"
                                                        data-student-id="{{ $student['id'] }}">
                                                        Rekomendasikan
                                                    </button>
                                                @else
                                                    <button disabled
                                                        class="inline-flex items-center px-3 py-1.5 bg-gray-300 text-gray-500 rounded-md cursor-not-allowed text-sm">
                                                        Direkomendasikan
                                                    </button>
                                                @endif
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
                        <button class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            Sebelumnya
                        </button>
                        <button class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            Selanjutnya
                        </button>
                    </div>
                    <div class="sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-gray-700">
                                Menampilkan <span class="font-medium">1</span> sampai <span class="font-medium">{{ count($mahasiswas) }}</span> dari <span class="font-medium">{{ count($mahasiswas) }}</span> data
                            </p>
                        </div>
                        <div>
                            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                <button class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                    <span class="sr-only">Previous</span>
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fillRule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clipRule="evenodd" />
                                </button>
                                <button aria-current="page" class="z-10 bg-blue-50 border-blue-500 text-blue-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                    1
                                </button>
                                <button class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                    <span class="sr-only">Next</span>
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fillRule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clipRule="evenodd" />
                                </button>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Update Status Modal -->
    <div id="update-modal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="w-full">
                            <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Data Rekomendasi Mahasiswa</h3>
                                <div class="space-y-3">
                                    <div class="grid grid-cols-2 gap-3">
                                        <div>
                                            <p class="text-sm font-medium text-gray-700">Nama Mahasiswa:</p>
                                            <p id="modal-nama" class="text-sm text-gray-900 font-semibold"></p>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-700">NIM:</p>
                                            <p id="modal-nim" class="text-sm text-gray-900"></p>
                                        </div>
                                    </div>
                                    
                                    <div>
                                        <p class="text-sm font-medium text-gray-700">Perusahaan:</p>
                                        <p id="modal-perusahaan" class="text-sm text-gray-900"></p>
                                    </div>

                                    <div class="grid grid-cols-2 gap-3">
                                        <div>
                                            <p class="text-sm font-medium text-gray-700">Skor WMSC:</p>
                                            <p id="modal-vikor" class="text-sm text-gray-900 font-mono"></p>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-700">Ranking:</p>
                                            <p id="modal-ranking" class="text-sm text-gray-900 font-semibold"></p>
                                        </div>
                                    </div>

                                    <div>
                                        <label for="modal-status" class="block text-sm font-medium text-gray-700 mb-1">Status:</label>
                                        <select id="modal-status" name="rekomendasi_dosen" 
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                            <option value="1">Direkomendasikan</option>
                                            <option value="0">Tidak Direkomendasikan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" id="save-update" 
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Simpan
                    </button>
                    <button type="button" id="close-update-modal"
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let currentStudentId = null;

        // Function to view profile details
        function viewProfile(nim) {
            window.location.href = `/dosen/magang/rekomendasi-magang/profile/${nim}`;
        }

        // Function to recommend student (0 -> 1)
        async function recommendStudent(studentId) {
            const button = document.querySelector(`button[data-student-id="${studentId}"]`);
            if (button) {
                button.disabled = true;
                button.textContent = 'Loading...';
            }

            try {
                const csrfToken = document.querySelector('meta[name="csrf-token"]');
                const token = csrfToken ? csrfToken.getAttribute('content') : '';
                
                if (!token) {
                    throw new Error('CSRF token not found');
                }

                const response = await fetch(`/dosen/rekomendasi-magang/recommend/${studentId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token
                    }
                });

                const data = await response.json();
                
                if (data.success) {
                    alert('Mahasiswa berhasil direkomendasikan!');
                    location.reload(); // Reload to see updated button state
                } else {
                    alert(data.message || 'Terjadi kesalahan saat menyimpan rekomendasi');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat menyimpan rekomendasi: ' + error.message);
            } finally {
                if (button) {
                    button.disabled = false;
                    button.textContent = 'Rekomendasikan';
                }
            }
        }

        // Function to show update modal
        function showUpdateModal(student) {
            currentStudentId = student.id;
            
            document.getElementById('modal-nama').textContent = student.name;
            document.getElementById('modal-nim').textContent = student.nim;
            document.getElementById('modal-perusahaan').textContent = student.company;
            document.getElementById('modal-vikor').textContent = student.vikor;
            document.getElementById('modal-ranking').textContent = student.ranking;
            document.getElementById('modal-status').value = student.rekomendasi_dosen || '1';

            document.getElementById('update-modal').classList.remove('hidden');
        }

        // Close modal
        document.getElementById('close-update-modal').addEventListener('click', function() {
            document.getElementById('update-modal').classList.add('hidden');
        });

        // Save update
        document.getElementById('save-update').addEventListener('click', async function() {
            if (!currentStudentId) return;

            const statusValue = document.getElementById('modal-status').value;
            
            try {
                const csrfToken = document.querySelector('meta[name="csrf-token"]');
                const token = csrfToken ? csrfToken.getAttribute('content') : '';
                
                if (!token) {
                    alert('CSRF token tidak ditemukan');
                    return;
                }
                
                const response = await fetch(`/dosen/rekomendasi-magang/update/${currentStudentId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token
                    },
                    body: JSON.stringify({
                        rekomendasi_dosen: statusValue
                    })
                });

                const data = await response.json();
                
                if (data.success) {
                    document.getElementById('update-modal').classList.add('hidden');
                    alert('Rekomendasi berhasil diperbarui');
                    location.reload();
                } else {
                    alert(data.message || 'Terjadi kesalahan saat menyimpan data');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat menyimpan data');
            }
        });

        // Close modal when clicking outside
        document.getElementById('update-modal').addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.add('hidden');
            }
        });
    </script>
@endsection