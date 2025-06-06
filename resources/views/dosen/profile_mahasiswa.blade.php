@extends('layouts.dosen')
@section('dosen')
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 p-4 sm:p-6 lg:p-8">
        <header class="mb-8 relative">
            <h1 class="text-4xl font-extrabold text-blue-900 tracking-tight drop-shadow-md">
                Manajemen Profil Mahasiswa 🧑🏽‍🎓
            </h1>
            <p class="mt-2 text-lg text-gray-600 font-medium">Kelola data profil mahasiswa bimbingan dengan mudah</p>
            <div class="absolute -top-10 -right-10 w-32 h-32 bg-blue-100 rounded-full opacity-30 animate-pulse"></div>
        </header>

        <!-- Student Management Table -->
        <section class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            <div class="p-4 sm:p-6 flex flex-col gap-6">
                <!-- Search Input -->
                <div class="relative flex-grow max-w-full sm:max-w-md">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400 transition-colors duration-200"></i>
                    </div>
                    <input type="text" id="search-input"
                        class="block w-full pl-10 pr-3 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-blue-400 text-sm bg-gray-50 transition-all duration-200 ease-in-out hover:bg-white"
                        placeholder="Cari berdasarkan NIM atau Nama" />
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gradient-to-r from-blue-50 to-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-4 sm:px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    No
                                </th>
                                <th scope="col"
                                    class="px-4 sm:px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    NIM
                                </th>
                                <th scope="col"
                                    class="px-4 sm:px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Nama Mahasiswa
                                </th>
                                <th scope="col"
                                    class="px-4 sm:px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider hidden sm:table-cell">
                                    Program Studi
                                </th>
                                <th scope="col"
                                    class="px-4 sm:px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody id="table-body" class="bg-white divide-y divide-gray-100">
                            @foreach($mahasiswas as $mahasiswa)
                            <tr class="hover:bg-blue-50 transition-colors duration-200">
                                <td class="px-4 py-4 text-sm text-gray-900 sm:px-6 whitespace-nowrap">{{ $loop->iteration }}</td>
                                <td class="px-4 py-4 text-sm text-gray-900 sm:px-6 whitespace-nowrap">{{ $mahasiswa->nim }}</td>
                                <td class="px-4 py-4 text-sm text-gray-900 sm:px-6 whitespace-nowrap">{{ $mahasiswa->nama_mahasiswa }}</td>
                                <td class="px-4 py-4 text-sm text-gray-900 sm:px-6 whitespace-nowrap hidden sm:table-cell">{{ $mahasiswa->program_studi->nama_program_studi ?? 'N/A' }}</td>
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button
                                        data-id="{{ $mahasiswa->id }}"
                                        data-nama="{{ $mahasiswa->nama_mahasiswa }}"
                                        data-jurusan="{{ $mahasiswa->jurusan }}"
                                        data-program="{{ $mahasiswa->program_studi->nama_program_studi ?? 'N/A' }}"
                                        data-gender="{{ $mahasiswa->jenis_kelamin }}"
                                        class="view-profile-btn inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold text-sm rounded-lg hover:bg-blue-700 transition-all duration-200 shadow-md transform hover:scale-105 drop-shadow-sm">
                                        Lihat Profil
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div
                    class="px-4 sm:px-6 py-4 bg-white border-t border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div class="flex-1 flex justify-between sm:hidden">
                        <button
                            class="relative inline-flex items-center px-4 py-2 border border-gray-200 text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 disabled:opacity-50 transition-all duration-200"
                            disabled>Sebelumnya</button>
                        <button
                            class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-200 text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 disabled:opacity-50 transition-all duration-200"
                            disabled>Selanjutnya</button>
                    </div>
                    <div class="sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-gray-600">
                                Menampilkan <span id="start-index" class="font-semibold">1</span> sampai <span id="end-index"
                                    class="font-semibold">3</span> dari <span id="total-students" class="font-semibold">3</span>
                                data
                            </p>
                        </div>
                        <div>
                            <nav class="relative z-0 inline-flex rounded-lg shadow-sm -space-x-px" aria-label="Pagination">
                                <button
                                    class="relative inline-flex items-center px-3 py-2 rounded-l-lg border border-gray-200 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 disabled:opacity-50 transition-all duration-200"
                                    disabled>
                                    <span class="sr-only">Previous</span>
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor" aria-hidden="true">
                                        <path fillRule="evenodd"
                                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                            clipRule="evenodd" />
                                    </svg>
                                </button>
                                <button aria-current="page"
                                    class="z-10 bg-blue-100 border-blue-500 text-blue-700 relative inline-flex items-center px-4 py-2 border text-sm font-semibold rounded-lg">1</button>
                                <button
                                    class="relative inline-flex items-center px-3 py-2 rounded-r-lg border border-gray-200 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 disabled:opacity-50 transition-all duration-200"
                                    disabled>
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

        <!-- Profile Modal -->
        <div id="profile-modal" class="fixed inset-0 bg-gray-900 bg-opacity-60 flex items-center justify-center hidden z-50 transition-opacity duration-300">
            <div class="bg-white rounded-2xl shadow-2xl p-6 w-full max-w-md transform transition-all duration-300 scale-95">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Profil Mahasiswa</h2>
                    <button id="close-modal" class="text-gray-500 hover:text-gray-700 transition-colors duration-200">
                        <i class="fas fa-times text-lg"></i>
                    </button>
                </div>
                <div class="space-y-6 bg-gray-50 p-4 rounded-lg">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700">Nama</label>
                        <p id="modal-nama" class="text-lg text-gray-900 font-medium mt-1"></p>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700">Jurusan</label>
                        <p id="modal-jurusan" class="text-lg text-gray-900 font-medium mt-1"></p>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700">Program Studi</label>
                        <p id="modal-program" class="text-lg text-gray-900 font-medium mt-1"></p>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700">Jenis Kelamin</label>
                        <p id="modal-gender" class="text-lg text-gray-900 font-medium mt-1"></p>
                    </div>
                     <div>
                        <label class="block text-sm font-semibold text-gray-700">NIM</label>
                        <p id="modal-nim" class="text-lg text-gray-900 font-medium mt-1"></p>
                    </div>
                </div>
                <div class="mt-6 flex justify-end">
                    <button id="close-modal-btn"
                        class="px-4 py-2 bg-gradient-to-r from-gray-200 to-gray-300 text-gray-700 rounded-lg hover:from-gray-300 hover:to-gray-400 transition-all duration-200 shadow-md">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const buttons = document.querySelectorAll('.view-profile-btn');
        const modalNama = document.getElementById('modal-nama');
        const modalJurusan = document.getElementById('modal-jurusan');
        const modalProgram = document.getElementById('modal-program');
        const modalGender = document.getElementById('modal-gender');
        const modalNim = document.getElementById('modal-nim');
        const profileModal = document.getElementById('profile-modal');
        const closeModal = document.getElementById('close-modal');
        const closeModalBtn = document.getElementById('close-modal-btn');

        buttons.forEach(button => {
            button.addEventListener('click', function () {
                modalNama.textContent = this.dataset.nama;
                modalJurusan.textContent = this.dataset.jurusan;
                modalProgram.textContent = this.dataset.program;
                modalGender.textContent = this.dataset.gender;
                modalNim.textContent = this.dataset.nim;
                profileModal.classList.remove('hidden');
            });
        });

        closeModal.addEventListener('click', function () {
            profileModal.classList.add('hidden');
        });

        closeModalBtn.addEventListener('click', function () {
            profileModal.classList.add('hidden');
        });
    });
</script>
