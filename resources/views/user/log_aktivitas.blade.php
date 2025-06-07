@extends('layouts.spk')
@section('spk')
<div class="flex min-h-screen bg-gray-50">
    <!-- Sidebar -->
    <aside class="fixed lg:sticky top-0 left-0 z-40 w-72 lg:w-82 h-screen transition-transform -translate-x-full lg:translate-x-0">
        <!-- Dark overlay -->
        <div class="fixed inset-0 bg-black opacity-50 lg:hidden transition-opacity duration-300 -z-10" 
             id="sidebar-backdrop" 
             onclick="toggleSidebar()"
             style="opacity: 0; pointer-events: none;">
        </div>

        <div class="h-full px-4 py-8 bg-white border-r border-gray-200 relative">
            <!-- Close button - only visible on mobile -->
            <button onclick="toggleSidebar()" 
                    class="lg:hidden absolute top-4 right-4 p-2 rounded-lg hover:bg-gray-100 text-gray-500">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <div class="mb-6">
                <h2 class="text-lg font-bold text-gray-800">Menu Navigasi</h2>
                <p class="text-sm text-gray-500">Kelola log aktivitas anda</p>
            </div>
            <nav class="flex flex-col gap-2">
                <button onclick="switchTab('form')" id="form-tab" 
                    class="flex items-center cursor-pointer space-x-3 px-4 py-2.5 rounded-xl transition-colors duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    <span>Log Aktivitas</span>
                </button>
                <button onclick="switchTab('history')" id="history-tab"
                    class="flex items-center cursor-pointer space-x-3 px-4 py-2.5 rounded-xl transition-colors duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="text-left">Riwayat Log Aktivitas</span>
                </button>
                <hr class="my-2 border-gray-200">
                <a href="/"
                    class="flex items-center cursor-pointer hover:bg-gray-50 space-x-3 px-4 py-2.5 rounded-xl transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5" fill="none">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                    </svg>

                    <span class="text-left">Kembali</span>
                </a>
            </nav>
        </div>
    </aside>

    <!-- Mobile Header -->
    <div class="fixed top-0 left-0 right-0 z-30 lg:hidden bg-white border-b border-gray-200">
        <div class="flex items-center justify-between px-4 py-2">
            <button id="mobile-menu-button" class="p-2 rounded-lg hover:bg-gray-100">
                <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <h1 class="text-lg font-semibold text-gray-900">Log Aktivitas</h1>
            <div class="w-10"></div> <!-- Spacer for centering -->
        </div>
    </div>

    <!-- Main Content -->
    <main class="flex-1 pt-16 lg:pt-0">
        <div class="container mx-auto px-4 py-8">
            <!-- Form Content -->
            <div id="form-content" class="tab-content">
                @if($isAccessible)
                    <div class="bg-blue-50 border-l-4 w-full border-blue-400 p-4 mb-6 rounded-md">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-blue-800">
                                    Pemberitahuan
                                </h3>
                                <p class="text-sm text-blue-700 mt-1">
                                    Anda Tidak bisa mengisi log aktivitas diluar hari kerja.
                                </p>
                            </div>
                        </div>
                    </div>
                @elseif($hasFilledLog)
                    <div class="bg-blue-50 border-l-4 w-full border-blue-400 p-4 mb-6 rounded-md">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-blue-800">
                                    Pemberitahuan
                                </h3>
                                <p class="text-sm text-blue-700 mt-1">
                                    Anda sudah mengisi log aktivitas hari ini.
                                </p>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="bg-white border border-gray-200 rounded-2xl p-6">
                        <div class="flex items-center space-x-3 mb-6">
                            <div class="h-10 w-1.5 bg-blue-900 rounded-full"></div>
                            <h3 class="text-xl font-bold text-gray-800">Tambah Log Aktivitas</h3>
                        </div>

                        <form action="/log-aktivitas/store" method="POST" class="mt-6 space-y-5">
                            @csrf

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                <div class="space-y-1.5">
                                    <label for="jam_masuk" class="block text-sm font-medium text-gray-700">Jam
                                        Masuk</label>
                                    <input type="time" name="jam_masuk" id="jam_masuk" required
                                        class="w-full px-4 py-2.5 rounded-xl border border-gray-300 text-gray-700 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-900/20 focus:border-blue-900 transition-all duration-200">
                                </div>
                                <div class="space-y-1.5">
                                    <label for="jam_pulang" class="block text-sm font-medium text-gray-700">Jam
                                        Pulang</label>
                                    <input type="time" name="jam_pulang" id="jam_pulang" required
                                        class="w-full px-4 py-2.5 rounded-xl border border-gray-300 text-gray-700 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-900/20 focus:border-blue-900 transition-all duration-200">
                                </div>
                            </div>

                            <div class="space-y-1.5">
                                <label for="kegiatan" class="block text-sm font-medium text-gray-700">Kegiatan</label>
                                <textarea name="kegiatan" id="kegiatan" rows="4" required
                                    class="w-full px-4 py-2.5 rounded-xl border border-gray-300 text-gray-700 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-900/20 focus:border-blue-900 transition-all duration-200"></textarea>
                            </div>

                            <input type="hidden" name="status_log" value="diterima">

                            <div class="pt-2">
                                <button type="submit"
                                    class="inline-flex items-center justify-center bg-blue-900 hover:bg-blue-950 cursor-pointer active:bg-blue-950 text-white font-medium px-6 py-3 rounded-xl transition-colors duration-200 w-full sm:w-auto">
                                    Simpan Log Aktivitas
                                </button>
                            </div>
                        </form>
                    </div>
                @endif
            </div>

            <!-- History Content -->
            <div id="history-content" class="tab-content hidden">
                <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden">
                    <div class="p-6 border-b border-gray-100">
                        <h2 class="text-xl font-bold text-gray-800">Riwayat Log Aktivitas</h2>
                        <p class="text-sm text-gray-500 mt-1">Rekam jejak aktivitas magang Anda</p>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-gray-50 text-xs text-gray-500 uppercase tracking-wider">
                                <tr>
                                    <th class="px-6 py-3">Tanggal</th>
                                    <th class="px-6 py-3">Jam Masuk</th>
                                    <th class="px-6 py-3">Jam Pulang</th>
                                    <th class="px-6 py-3">Kegiatan</th>
                                    <th class="px-6 py-3">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 text-sm text-gray-700">
                                <!-- Dummy data -->
                                @foreach ($logAktivitas as $item)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap">{{ date('d-m-Y', strtotime($item->tanggal)) }}</td>
                                        <td class="px-6 py-4">{{ date('H:i', strtotime($item->jam_masuk)) }}</td>
                                        <td class="px-6 py-4">{{ date('H:i', strtotime($item->jam_pulang)) }}</td>
                                        <td class="px-6 py-4 max-w-md">{{ $item->kegiatan }}</td>
                                        <td class="px-6 py-4">
                                            <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">{{ $item->status_log }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
function toggleSidebar() {
    const sidebar = document.querySelector('aside');
    const backdrop = document.getElementById('sidebar-backdrop');
    
    if (sidebar.classList.contains('-translate-x-full')) {
        sidebar.classList.remove('-translate-x-full');
        backdrop.style.opacity = '0.5';
        backdrop.style.pointerEvents = 'auto';
        document.body.style.overflow = 'hidden';
    } else {
        sidebar.classList.add('-translate-x-full');
        backdrop.style.opacity = '0';
        backdrop.style.pointerEvents = 'none';
        document.body.style.overflow = '';
    }
}

// Add click event listener to mobile menu button
document.getElementById('mobile-menu-button').addEventListener('click', toggleSidebar);

// Update resize handler
window.addEventListener('resize', () => {
    const sidebar = document.querySelector('aside');
    const backdrop = document.getElementById('sidebar-backdrop');
    
    if (window.innerWidth >= 1024) {
        sidebar.classList.remove('-translate-x-full');
        backdrop.style.opacity = '0';
        backdrop.style.pointerEvents = 'none';
        document.body.style.overflow = '';
    } else {
        sidebar.classList.add('-translate-x-full');
    }
});

function switchTab(tabName) {
    // Update tab buttons styling
    const formTab = document.getElementById('form-tab');
    const historyTab = document.getElementById('history-tab');
    
    if (tabName === 'form') {
        formTab.classList.add('bg-blue-50', 'text-blue-900', 'font-semibold');
        formTab.classList.remove('text-gray-700', 'hover:bg-gray-50', 'font-medium');
        historyTab.classList.remove('bg-blue-50', 'text-blue-900', 'font-semibold');
        historyTab.classList.add('text-gray-700', 'hover:bg-gray-50', 'font-medium');
    } else {
        historyTab.classList.add('bg-blue-50', 'text-blue-900', 'font-semibold');
        historyTab.classList.remove('text-gray-700', 'hover:bg-gray-50', 'font-medium');
        formTab.classList.remove('bg-blue-50', 'text-blue-900', 'font-semibold');
        formTab.classList.add('text-gray-700', 'hover:bg-gray-50', 'font-medium');
    }

    // Show/hide content
    document.querySelectorAll('.tab-content').forEach(content => content.classList.add('hidden'));
    document.getElementById(`${tabName}-content`).classList.remove('hidden');

    // Load history data if history tab is selected
    if (tabName === 'history') {
        loadHistoryData();
    }
}

// Initialize active tab on page load
document.addEventListener('DOMContentLoaded', () => {
    switchTab('form'); // Set form tab as active by default
});

function loadHistoryData() {
    fetch('/log-aktivitas/history')
        .then(response => response.json())
        .then(data => {
            const historyContainer = document.getElementById('history-data');
            historyContainer.innerHTML = data.map(log => `
                <div class="p-6 hover:bg-gray-50 transition-colors">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-3">
                            <div class="flex items-center space-x-2 text-sm text-gray-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span>${new Date(log.tanggal).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' })}</span>
                            </div>
                            <span class="w-1.5 h-1.5 bg-gray-300 rounded-full"></span>
                            <div class="flex items-center space-x-2 text-sm text-gray-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>${log.jam_masuk} - ${log.jam_pulang}</span>
                            </div>
                        </div>
                        <span class="px-3 py-1 text-xs font-medium rounded-full ${
                            log.status_log === 'diterima' ? 'bg-green-100 text-green-800' :
                            log.status_log === 'ditolak' ? 'bg-red-100 text-red-800' :
                            'bg-yellow-100 text-yellow-800'
                        }">
                            ${log.status_log.charAt(0).toUpperCase() + log.status_log.slice(1)}
                        </span>
                    </div>
                    <p class="text-gray-600 text-sm">${log.kegiatan}</p>
                </div>
            `).join('');
        });
}

// Add active tab styles
document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('form-tab').classList.add('border-blue-900', 'text-blue-900');
});
</script>

<style>
.tab-btn {
    @apply transition-colors duration-200;
}
.tab-btn:not(.active-tab) {
    @apply border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300;
}
.active-tab {
    @apply border-blue-900 text-blue-900;
}
</style>
@endsection