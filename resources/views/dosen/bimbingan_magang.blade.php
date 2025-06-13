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
                        <!-- Search Input -->
                        <div class="relative flex-grow max-w-full sm:max-w-md">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400" id="search-icon"></i>
                            </div>
                            <input type="text" id="search-input"
                                class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm"
                                placeholder="Cari berdasarkan Nama Perusahaan atau Lokasi" />
                        </div>

                        <!-- Filter Dropdown for Status Lowongan -->
                        <div class="relative w-full sm:w-auto">
                            <button id="status-filter-btn"
                                class="flex items-center gap-2 px-4 py-2 border border-gray-300 rounded-lg bg-white hover:bg-gray-50 focus:outline-none w-full sm:w-auto text-sm">
                                <i class="fas fa-filter text-gray-500" id="filter-icon"></i>
                                <span id="status-filter-text">Semua Status</span>
                                <i class="fas fa-chevron-down text-gray-300" id="status-chevron"></i>
                            </button>
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
                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:flex-wrap flex-grow">
                        <div id="status-dropdown"
                            class="absolute z-10 mt-1 w-full sm:w-56 bg-white rounded-lg shadow-lg border border-gray-200 hidden">
                            <ul class="py-1 max-h-60 overflow-auto">
                                <li><button class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 text-gray-700"
                                        data-status="Semua">Semua Status</button></li>
                                <li><button class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 text-gray-700"
                                        data-status="aktif">Aktif</button></li>
                                <li><button class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 text-gray-700"
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
                            <th scope="col"
                                class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                No
                            </th>
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
                    <tbody id="table-body" class="bg-white divide-y divide-gray-200">
                        @foreach ($guidances as $guidance)
                            <tr>
                                <td class="px-4 py-4 text-sm text-gray-900 sm:px-6 whitespace-nowrap">
                                    {{ $loop->iteration }}
                                </td>
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
                                    <button
                                        onclick="openChat({{ $guidance->id_bimbingan }}, '{{ $guidance->mahasiswa->nama_mahasiswa }}', {{ $guidance->mahasiswa->id_mahasiswa }})"
                                        class="inline-flex items-center px-3 py-1.5 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200 transition-colors duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8.625 9.75a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 0 1 .778-.332 48.294 48.294 0 0 0 5.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                        </svg>

                                        Chat Mahasiswa
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

    <!-- Ultra-Enhanced Chat Modal with Fixed Colors -->
    <div id="chatModal"
        class="fixed inset-0 bg-black bg-opacity-70 backdrop-blur-sm hidden z-50 transition-all duration-300">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-3xl shadow-2xl max-w-4xl w-full max-h-5xl flex flex-col transform transition-all duration-300 scale-95 overflow-hidden"
                id="chatModalContent">

                <!-- Premium Chat Header -->
                <div class="relative bg-blue-800 p-6">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-900/20 via-transparent to-blue-900/20"></div>
                    <div class="relative flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="relative">
                                <div
                                    class="w-12 h-12 bg-white/25 backdrop-blur-md rounded-2xl flex items-center justify-center border border-white/30 shadow-lg">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <div
                                    class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-400 border-2 border-white rounded-full animate-pulse shadow-sm">
                                </div>
                            </div>
                            <div>
                                <h3 id="chatTitle" class="text-lg font-bold text-white drop-shadow-sm">Chat dengan Mahasiswa
                                </h3>
                                <div class="flex items-center space-x-1">
                                    <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                                    <p class="text-blue-100 text-sm font-medium">Online sekarang</p>
                                </div>
                            </div>
                        </div>
                        <button onclick="closeChat()"
                            class="w-9 h-9 rounded-xl bg-white/15 hover:bg-white/25 backdrop-blur-sm flex items-center justify-center transition-all duration-200 group border border-white/20">
                            <svg class="w-5 h-5 text-white group-hover:rotate-90 transition-transform duration-200"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Chat Messages Area with Better Background -->
                <div id="chatMessages"
                    class="flex-1 overflow-y-auto p-6 bg-gradient-to-b from-blue-50/50 via-white to-blue-50/30 min-h-[350px] max-h-[400px]">
                    <!-- Welcome message -->
                    <div class="text-center py-12">
                        <div
                            class="w-20 h-20 bg-gradient-to-br from-blue-100 to-blue-200 rounded-3xl flex items-center justify-center mx-auto mb-6 shadow-lg border border-blue-200">
                            <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-3.582 8-8 8a9.863 9.863 0 01-4.255-.949L5 20l1.395-3.72C7.512 15.042 9.201 13 12 13c4.418 0 8-3.582 8-1z" />
                        </div>
                        <h4 class="text-blue-900 font-bold mb-2">Mulai Percakapan</h4>
                        <p class="text-blue-700/70 text-sm leading-relaxed px-4">Ketik pesan pertama untuk memulai diskusi
                            dengan mahasiswa bimbingan Anda</p>
                    </div>
                </div>

                <!-- Premium Chat Input -->
                <div class="p-6 bg-white border-t border-blue-100">
                    <div class="flex items-end space-x-3">
                        <div class="flex-1 relative">
                            <textarea id="messageInput" placeholder="Ketik pesan Anda disini..." rows="1"
                                class="w-full resize-none border border-blue-200 bg-blue-50/30 rounded-2xl px-5 py-4 pr-14 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white focus:border-blue-400 transition-all duration-200 placeholder-blue-400 text-blue-900 text-sm leading-relaxed max-h-24 overflow-y-auto shadow-sm"
                                onkeydown="handleKeyDown(event)" oninput="autoResize(this)"></textarea>

                            <button onclick="sendMessage()" id="sendButton"
                                class="absolute right-3 bottom-3 w-8 h-8 bg-gradient-to-r from-blue-600 to-blue-700 text-black rounded-xl hover:from-blue-700 hover:to-blue-800 transition-all duration-200 disabled:from-gray-400 disabled:to-gray-500 flex items-center justify-center border border-gray-200">
                                <svg class="w-4 h-4 group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform duration-200"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    {{-- <div class="flex items-center justify-between mt-3">
                        <p class="text-xs text-blue-500/70 flex items-center">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                            Enter untuk kirim • Shift+Enter untuk baris baru
                        </p>
                        <div class="flex items-center space-x-1">
                            <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                            <span class="text-xs text-blue-600 font-medium">Online</span>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <script>
        // Search functionality
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search-input');
            
            searchInput.addEventListener('input', function(e) {
                const searchTerm = e.target.value.toLowerCase();
                const tableRows = document.querySelectorAll('#table-body tr');
                
                tableRows.forEach(row => {
                    const mahasiswaName = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                    const dosenName = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
                    const perusahaanName = row.querySelector('td:nth-child(4)').textContent.toLowerCase();
                    
                    if (mahasiswaName.includes(searchTerm) || 
                        dosenName.includes(searchTerm) || 
                        perusahaanName.includes(searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });

        let currentChatRoom = null;
        let currentMahasiswaId = null;
        let currentMahasiswaName = null;
        let chatPollingInterval = null;

        function openChat(idBimbingan, namaMahasiswa, idMahasiswa) {
            currentChatRoom = `chat_${idBimbingan}`;
            currentMahasiswaId = idMahasiswa;
            currentMahasiswaName = namaMahasiswa;

            document.getElementById('chatTitle').textContent = `${namaMahasiswa}`;

            // Show modal with enhanced animation
            const modal = document.getElementById('chatModal');
            const modalContent = document.getElementById('chatModalContent');
            modal.classList.remove('hidden');

            setTimeout(() => {
                modal.classList.remove('bg-opacity-60');
                modal.classList.add('bg-opacity-60');
                modalContent.classList.remove('scale-95');
                modalContent.classList.add('scale-100');
            }, 10);

            loadMessages();
            setTimeout(() => {
                document.getElementById('messageInput').focus();
            }, 300);

            startChatPolling();
        }

        function closeChat() {
            const modal = document.getElementById('chatModal');
            const modalContent = document.getElementById('chatModalContent');

            modal.classList.remove('bg-opacity-60');
            modal.classList.add('bg-opacity-0');
            modalContent.classList.remove('scale-100');
            modalContent.classList.add('scale-95');

            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);

            currentChatRoom = null;
            currentMahasiswaId = null;
            currentMahasiswaName = null;

            if (chatPollingInterval) {
                clearInterval(chatPollingInterval);
                chatPollingInterval = null;
            }
        }

        function loadMessages() {
            if (!currentChatRoom) return;

            fetch(`/dosen/chat/messages/${currentChatRoom}`)
                .then(response => response.json())
                .then data => {
                    if (data.messages) {
                        localStorage.setItem(currentChatRoom, JSON.stringify(data.messages));
                        displayMessages(data.messages);
                    }
                })
                .catch(error => {
                    console.error('Error loading messages:', error);
                    // Load from localStorage if server fails
                    const localMessages = JSON.parse(localStorage.getItem(currentChatRoom) || '[]');
                    displayMessages(localMessages);
                });
        }

        function displayMessages(messages) {
            const chatMessages = document.getElementById('chatMessages');

            if (messages.length === 0) {
                chatMessages.innerHTML = `
                                <div class="text-center py-12">
                                    <div class="w-20 h-20 bg-gradient-to-br from-blue-100 to-blue-200 rounded-3xl flex items-center justify-center mx-auto mb-6 shadow-lg border border-blue-200">
                                        <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-3.582 8-8 8a9.863 9.863 0 01-4.255-.949L5 20l1.395-3.72C7.512 15.042 9.201 13 12 13c4.418 0 8-3.582 8-1z"/>
                                    </div>
                                    <h4 class="text-blue-900 font-bold mb-2">Mulai Percakapan dengan ${currentMahasiswaName}</h4>
                                    <p class="text-blue-700/70 text-sm leading-relaxed px-4">Ketik pesan pertama untuk memulai diskusi bimbingan</p>
                                </div>
                            `;
                return;
            }

            chatMessages.innerHTML = '';
            messages.forEach((message, index) => {
                displayMessage(message, index === messages.length - 1);
            });

            setTimeout(() => {
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }, 100);
        }

        function displayMessage(message, isLatest = false) {
            const chatMessages = document.getElementById('chatMessages');
            const messageDiv = document.createElement('div');

            const isFromDosen = message.sender_type === 'dosen';
            messageDiv.className = `flex ${isFromDosen ? 'justify-end' : 'justify-start'} mb-6 ${isLatest ? 'animate-in' : ''}`;

            const timeString = new Date(message.timestamp).toLocaleTimeString('id-ID', {
                hour: '2-digit',
                minute: '2-digit'
            });

            messageDiv.innerHTML = `
                            <div class="max-w-[280px] group">
                                <div class="relative px-5 py-3 rounded-2xl shadow-md ${isFromDosen
                    ? 'bg-white text-blue-900 border border-blue-200 rounded-br-md shadow-blue-100'
                    : 'bg-white text-blue-900 border border-blue-200 rounded-bl-md shadow-blue-100'
                } transform hover:scale-[1.02] transition-all duration-200">
                                    <p class="text-sm leading-relaxed whitespace-pre-wrap break-words font-medium">${message.message}</p>
                                    {{-- ${isFromDosen ? `
                                        <div class="absolute -bottom-1 -left-1 w-3 h-3 bg-red-500 border-l border-b border-blue-200 rotate-45 transform"></div>
                                    ` : `
                                        <div class="absolute -bottom-1 -left-1 w-3 h-3 bg-red-500 border-l border-b border-blue-200 rotate-45 transform"></div>
                                    `} --}}
                                </div>
                                {{-- <div class="flex items-center mt-2 ${isFromDosen ? 'justify-end' : 'justify-start'}">
                                    <p class="text-xs text-blue-500/60 font-medium">
                                        ${timeString}
                                        ${isFromDosen ? ' • Terkirim' : ' • Diterima'}
                                    </p>
                                </div> --}}
                            </div>
                        `;

            chatMessages.appendChild(messageDiv);
        }

        function sendMessage() {
            const messageInput = document.getElementById('messageInput');
            const sendButton = document.getElementById('sendButton');
            const messageText = messageInput.value.trim();

            if (!messageText || !currentChatRoom) return;

            // Visual feedback
            messageInput.disabled = true;
            sendButton.disabled = true;
            sendButton.innerHTML = `
                            <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="m4 12a8 8 0 0 1 8-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 0 1 4 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        `;

            const message = {
                id: Date.now(),
                message: messageText,
                sender_type: 'dosen',
                sender_id: {{ auth()->user()->dosen->id_dosen }},
                receiver_id: currentMahasiswaId,
                timestamp: new Date().toISOString(),
                room: currentChatRoom
            };

            fetch('/dosen/chat/send', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(message)
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        const messages = JSON.parse(localStorage.getItem(currentChatRoom) || '[]');
                        messages.push(message);
                        localStorage.setItem(currentChatRoom, JSON.stringify(messages));

                        displayMessage(message, true);
                        messageInput.value = '';
                        messageInput.style.height = 'auto';

                        setTimeout(() => {
                            const chatMessages = document.getElementById('chatMessages');
                            chatMessages.scrollTop = chatMessages.scrollHeight;
                        }, 100);
                    }
                })
                .catch(error => {
                    console.error('Error sending message:', error);
                    // Show error state
                    sendButton.classList.add('bg-red-500');
                    setTimeout(() => {
                        sendButton.classList.remove('bg-red-500');
                    }, 2000);
                })
                .finally(() => {
                    messageInput.disabled = false;
                    sendButton.disabled = false;
                    sendButton.innerHTML = `
                                <svg class="w-4 h-4 group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                                </svg>
                            `;
                    messageInput.focus();
                });
        }

        // Enhanced textarea functionality
        function handleKeyDown(event) {
            if (event.key === 'Enter' && !event.shiftKey) {
                event.preventDefault();
                sendMessage();
            }
        }

        function autoResize(textarea) {
            textarea.style.height = 'auto';
            textarea.style.height = Math.min(textarea.scrollHeight, 96) + 'px';
        }

        // Enhanced modal interactions
        document.getElementById('chatModal').addEventListener('click', function (e) {
            if (e.target === this) {
                closeChat();
            }
        });

        // Add CSS animations
        const style = document.createElement('style');
        style.textContent = `
                        @keyframes animate-in {
                            from {
                                opacity: 0;
                                transform: translateY(10px) scale(0.95);
                            }
                            to {
                                opacity: 1;
                                transform: translateY(0) scale(1);
                            }
                        }
                        .animate-in {
                            animation: animate-in 0.3s ease-out;
                        }
                    `;
        document.head.appendChild(style);

        function startChatPolling() {
            if (chatPollingInterval) {
                clearInterval(chatPollingInterval);
            }

            chatPollingInterval = setInterval(() => {
                if (currentChatRoom && !document.getElementById('chatModal').classList.contains('hidden')) {
                    loadMessages();
                }
            }, 3000);
        }
    </script>
@endsection