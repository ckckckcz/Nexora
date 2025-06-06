@extends('layouts.dosen')
@section('dosen')
    <div class="min-h-screen bg-gray-50 p-4 sm:p-6 lg:p-8">
        <header class="mb-8">
            <h1 class="text-3xl font-bold text-blue-900">Manajemen Bimbingan Magang 📋</h1>
            <p class="mt-2 text-gray-600 font-medium">Kelola data bimbingan magang mahasiswa</p>
        </header>

        <section class="bg-white rounded-2xl border border-gray-200">
            <div class="p-4 sm:p-6 flex flex-col gap-4">
                <div class="flex flex-col lg:flex-row sm:items-left sm:justify-between gap-4">
                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:flex-wrap flex-grow">
                            <div id="status-dropdown"
                                class="absolute z-10 mt-1 w-full sm:w-56 bg-white rounded-lg shadow-lg border border-gray-200 hidden">
                                <ul class="py-1 max-h-60 overflow-auto">
                                    <li><button
                                            class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 text-gray-700"
                                            data-status="Semua">Semua Status</button></li>
                                    <li><button
                                            class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 text-gray-700"
                                            data-status="aktif">Aktif</button></li>
                                    <li><button
                                            class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 text-gray-700"
                                            data-status="selesai">Selesai</button></li>
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
                                <th class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    Mahasiswa</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Dosen
                                    Pembimbing</th>
                                <th
                                    class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase hidden sm:table-cell">
                                     Nama Perusahaan</th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status
                                </th>
                                <th class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($guidances as $guidance)
                                <tr>
                                    <td class="px-4 py-4 text-sm text-gray-900 sm:px-6 whitespace-nowrap">
                                        {{ $guidance->mahasiswa->nama_mahasiswa }}
                                    </td>
                                    <td class="px-4 py-4 text-sm text-gray-900 sm:px-6 whitespace-nowrap">
                                        {{ $guidance->dosen->nama_dosen }}
                                    </td>
                                    <td class="hidden sm:table-cell px-4 py-4 text-sm text-gray-900 whitespace-nowrap">
                                        {{ $guidance->lowongan->nama_perusahaan }}
                                    </td>
                                    <td class="px-4 py-4 text-sm sm:px-6 whitespace-nowrap">
                                        <span
                                            class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium {{ $guidance->status_bimbingan == 'aktif' ? 'bg-emerald-100 text-emerald-800' : 'bg-blue-100 text-blue-800' }}">
                                            {{ $guidance->status_bimbingan }}
                                        </span>
                                    </td>
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                            </button>
                                        </form>
                                        <a href="https://wa.me/{{ $guidance->mahasiswa->no_telp }}"
                                            class="inline-flex items-center px-3 py-1.5 bg-green-100 text-green-700 rounded-md hover:bg-blue-200 transition-colors duration-200">
                                            Hubungi Mahasiswa
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div
                    class="px-4 sm:px-6 py-4 bg-white border-t border-gray-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div class="flex-1 flex justify-between sm:hidden">
                        <button
                            class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Sebelumnya</button>
                        <button
                            class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Selanjutnya</button>
                    </div>
                    <div class="sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-gray-700">
                                Menampilkan <span class="font-medium">1</span> sampai <span class="font-medium">10</span>
                                dari <span class="font-medium">50</span> data
                            </p>
                        </div>
                        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                            <button
                                class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                <span class="sr-only">Previous</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                            </button>
                            <button aria-current="page"
                                class="z-10 bg-blue-50 border-blue-500 text-blue-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">1</button>
                            <button
                                class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                <span class="sr-only">Next</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                            </button>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
