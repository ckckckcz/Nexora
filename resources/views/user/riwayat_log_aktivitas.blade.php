@extends('layouts.spk')
@section('spk')
<div class="flex min-h-screen bg-gray-50 relative">
    <!-- Mobile Menu Toggle -->
    <button id="mobile-menu-button" class="fixed top-4 left-4 z-50 lg:hidden bg-white p-2 rounded-lg shadow-lg">
        <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    <!-- Floating Sidebar - Modified for responsive -->
    <div id="sidebar" class="fixed inset-y-0 left-0 transform -translate-x-full lg:translate-x-0 z-40 w-80 lg:w-64 transition-transform duration-300 ease-in-out">
        <div class="bg-white h-full shadow-lg lg:shadow-none lg:rounded-2xl lg:border lg:border-gray-200 p-4 lg:m-8">
            <div class="mb-6 px-2">
                <h2 class="text-lg font-bold text-gray-800">Menu Navigasi</h2>
                <p class="text-sm text-gray-500">Kelola log aktivitas anda</p>
            </div>
            <nav class="flex flex-col gap-2">
                <a href="/log-aktivitas/create" class="flex items-center space-x-3 px-4 py-2.5 rounded-xl text-gray-700 hover:bg-gray-50 font-medium transition-colors duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    <span>Log Aktivitas</span>
                </a>
                <a href="/log-aktivitas/history" class="flex items-center space-x-3 px-4 py-2.5 rounded-xl bg-blue-50 text-blue-900 font-semibold">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span>Riwayat Log Aktivitas</span>
                </a>
            </nav>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 lg:ml-72 w-full p-4 lg:p-8">
        <div class="flex flex-col gap-6 max-w-5xl mx-auto pt-16 lg:pt-0">
            <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden">
                <div class="p-6 border-b border-gray-100">
                    <h2 class="text-xl font-bold text-gray-800">Riwayat Log Aktivitas</h2>
                    <p class="text-sm text-gray-500 mt-1">Rekam jejak aktivitas magang Anda</p>
                </div>

                <div class="divide-y divide-gray-100">
                    @forelse ($logs as $log)
                    <div class="p-6 hover:bg-gray-50 transition-colors">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center space-x-3">
                                <div class="flex items-center space-x-2 text-sm text-gray-500">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span>{{ \Carbon\Carbon::parse($log->tanggal)->format('d F Y') }}</span>
                                </div>
                                <span class="w-1.5 h-1.5 bg-gray-300 rounded-full"></span>
                                <div class="flex items-center space-x-2 text-sm text-gray-500">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>{{ $log->jam_masuk }} - {{ $log->jam_pulang }}</span>
                                </div>
                            </div>
                            <span class="px-3 py-1 text-xs font-medium rounded-full
                                @if($log->status_log === 'diterima') bg-green-100 text-green-800
                                @elseif($log->status_log === 'ditolak') bg-red-100 text-red-800
                                @else bg-yellow-100 text-yellow-800 @endif">
                                {{ ucfirst($log->status_log) }}
                            </span>
                        </div>
                        <p class="text-gray-600 text-sm">{{ $log->kegiatan }}</p>
                    </div>
                    @empty
                    <div class="p-8 text-center">
                        <p class="text-gray-500">Belum ada log aktivitas yang tercatat</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- Overlay for mobile -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 lg:hidden hidden" onclick="toggleSidebar()"></div>
</div>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        
        if (sidebar.classList.contains('-translate-x-full')) {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        } else {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
            document.body.style.overflow = '';
        }
    }

    document.getElementById('mobile-menu-button').addEventListener('click', toggleSidebar);

    window.addEventListener('resize', () => {
        if (window.innerWidth >= 1024) {
            document.getElementById('sidebar').classList.remove('-translate-x-full');
            document.getElementById('sidebar-overlay').classList.add('hidden');
            document.body.style.overflow = '';
        } else {
            document.getElementById('sidebar').classList.add('-translate-x-full');
        }
    });
</script>
@endsection
