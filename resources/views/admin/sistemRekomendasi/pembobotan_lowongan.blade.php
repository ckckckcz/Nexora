@extends('layouts.admin')
@section('admin')
    <div class="min-h-screen bg-gray-50 p-4 sm:p-6 lg:p-8">
        <header class="mb-8">
            <h1 class="text-3xl font-bold text-blue-900">Manajemen Penilaian Lowongan 💪🏽</h1>
            <p class="mt-2 text-gray-600 font-medium">Kelola data Penilaian lowongan</p>
        </header>

        <section class="bg-white rounded-2xl border border-gray-200">
            <div class="p-4 sm:p-6 flex flex-col gap-4">
                <div class="flex flex-col lg:flex-row sm:items-left sm:justify-between gap-4">
                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:flex-wrap flex-grow">

                        <!-- Filter Dropdown for Status Lowongan -->
                        <div class="relative w-full sm:w-auto">
                            {{-- <button id="status-filter-btn"
                                class="flex items-center gap-2 px-4 py-2 border border-gray-300 rounded-lg bg-white hover:bg-gray-50 focus:outline-none w-full sm:w-auto text-sm">
                                <i class="fas fa-filter text-gray-500" id="filter-icon"></i>
                                <span id="status-filter-text">Semua Status</span>
                                <i class="fas fa-chevron-down text-gray-300" id="status-chevron"></i>
                            </button> --}}
                            <div id="status-dropdown"
                                class="absolute z-10 mt-1 w-full sm:w-48 bg-white rounded-lg shadow-lg border border-gray-200 hidden">
                                <ul class="py-1">
                                    <li><button
                                            class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 text-gray-700"
                                            data-status="Semua">Semua Status</button></li>
                                    <li><button
                                            class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 text-gray-700"
                                            data-status="open">Open</button></li>
                                    <li><button
                                            class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 text-gray-700"
                                            data-status="close">Close</button></li>
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
                                    No
                                </th>
                                <th scope="col"
                                    class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Perusahaan
                                </th>
                                @foreach ($kriteria as $k)
                                    <th scope="col"
                                        class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ $k->nama_kriteria }}
                                    </th>
                                @endforeach
                                <th scope="col"
                                    class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($matriks as $index => $row)
                                <tr>
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $index + 1 }}
                                    </td>
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $row['nama_perusahaan'] }}
                                    </td>
                                    @foreach ($kriteria as $k)
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            <div class="editable-cell" data-row="{{ $index }}" data-kriteria="{{ $k->id_kriteria }}">
                                                <span class="display-value @if(isset($row[$k->id_kriteria])) bg-blue-100 text-blue-800 @else bg-gray-100 text-gray-800 @endif rounded-full px-2 py-1 text-xs font-medium">
                                                    {{ $row[$k->id_kriteria] ?? '-' }}
                                                </span>
                                                <input type="number" 
                                                    class="edit-input hidden w-full px-2 py-1 text-sm border rounded-lg focus:ring-2 focus:ring-blue-500" 
                                                    value="{{ $row[$k->id_kriteria] ?? '' }}"
                                                    min="1"
                                                    max="5">
                                            </div>
                                        </td>
                                    @endforeach
                                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                        <button onclick="toggleEdit(this, {{ $index }})"
                                            class="edit-btn inline-flex items-center px-3 py-1.5 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200 transition-colors duration-200">
                                            Edit
                                        </button>
                                        <button onclick="saveChanges(this, {{ $index }})"
                                            class="save-btn hidden inline-flex items-center px-3 py-1.5 bg-green-100 text-green-700 rounded-md hover:bg-green-200 transition-colors duration-200">
                                            Simpan
                                        </button>
                                        <button class="inline-flex items-center px-3 py-1.5 bg-red-100 text-red-700 rounded-md hover:bg-red-200 transition-colors duration-200">
                                            Hapus
                                        </button>
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
                                Menampilkan <span id="start-index" class="font-medium">10</span> dari <span
                                    id="total-posisi" class="font-medium">semua</span>
                                data
                            </p>
                        </div>
                        <div>
                            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px"
                                aria-label="Pagination">
                                <button
                                    class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
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
                                <button
                                    class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
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
@endsection

<script>
function toggleEdit(btn, rowIndex) {
    const row = btn.closest('tr');
    const editBtn = row.querySelector('.edit-btn');
    const saveBtn = row.querySelector('.save-btn');
    const cells = row.querySelectorAll('.editable-cell');
    
    editBtn.classList.add('hidden');
    saveBtn.classList.remove('hidden');
    
    cells.forEach(cell => {
        const displayValue = cell.querySelector('.display-value');
        const input = cell.querySelector('.edit-input');
        
        displayValue.classList.add('hidden');
        input.classList.remove('hidden');
    });
}

function saveChanges(btn, rowIndex) {
    const row = btn.closest('tr');
    const editBtn = row.querySelector('.edit-btn');
    const saveBtn = row.querySelector('.save-btn');
    const cells = row.querySelectorAll('.editable-cell');
    
    // Collect the updated values
    const updates = {};
    cells.forEach(cell => {
        const kriteriaId = cell.dataset.kriteria;
        const input = cell.querySelector('.edit-input');
        const displayValue = cell.querySelector('.display-value');
        const newValue = input.value;
        
        updates[kriteriaId] = newValue;
        
        // Update display value
        displayValue.textContent = newValue || '-';
        displayValue.classList.remove('hidden');
        input.classList.add('hidden');
    });
    
    // Here you would typically make an AJAX call to save the changes
    // For example:
    /*
    fetch('/admin/pembobotan-lowongan/update', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            rowIndex: rowIndex,
            updates: updates
        })
    });
    */
    
    editBtn.classList.remove('hidden');
    saveBtn.classList.add('hidden');
}
</script>