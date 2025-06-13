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
                                        <button onclick="openChat({{ $guidance->id_bimbingan }}, '{{ $guidance->mahasiswa->nama_mahasiswa }}', {{ $guidance->mahasiswa->id_mahasiswa }})"
                                            class="inline-flex items-center px-3 py-1.5 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200 transition-colors duration-200">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-3.582 8-8 8a9.863 9.863 0 01-4.255-.949L5 20l1.395-3.72C7.512 15.042 9.201 13 12 13c4.418 0 8-3.582 8-1z"/>
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

    <!-- Chat Modal -->
    <div id="chatModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-lg shadow-xl max-w-md w-full max-h-96 flex flex-col">
                <div class="flex items-center justify-between p-4 border-b">
                    <h3 id="chatTitle" class="text-lg font-medium text-gray-900">Chat dengan Mahasiswa</h3>
                    <button onclick="closeChat()" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                <div id="chatMessages" class="flex-1 overflow-y-auto p-4 space-y-2" style="max-height: 300px;">
                    <!-- Messages will be loaded here -->
                </div>
                <div class="p-4 border-t">
                    <div class="flex space-x-2">
                        <input type="text" id="messageInput" placeholder="Ketik pesan..." 
                            class="flex-1 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            onkeypress="if(event.key === 'Enter') sendMessage()">
                        <button onclick="sendMessage()" 
                            class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition-colors">
                            Kirim
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let currentChatRoom = null;
        let currentMahasiswaId = null;
        let currentMahasiswaName = null;

        function openChat(idBimbingan, namaMahasiswa, idMahasiswa) {
            currentChatRoom = `chat_${idBimbingan}`;
            currentMahasiswaId = idMahasiswa;
            currentMahasiswaName = namaMahasiswa;
            
            document.getElementById('chatTitle').textContent = `Chat dengan ${namaMahasiswa}`;
            document.getElementById('chatModal').classList.remove('hidden');
            
            loadMessages();
            document.getElementById('messageInput').focus();
        }

        function closeChat() {
            document.getElementById('chatModal').classList.add('hidden');
            currentChatRoom = null;
            currentMahasiswaId = null;
            currentMahasiswaName = null;
        }

        function loadMessages() {
            const messages = JSON.parse(localStorage.getItem(currentChatRoom) || '[]');
            const chatMessages = document.getElementById('chatMessages');
            chatMessages.innerHTML = '';

            messages.forEach(message => {
                displayMessage(message);
            });

            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        function displayMessage(message) {
            const chatMessages = document.getElementById('chatMessages');
            const messageDiv = document.createElement('div');
            
            const isFromDosen = message.sender_type === 'dosen';
            messageDiv.className = `flex ${isFromDosen ? 'justify-end' : 'justify-start'}`;
            
            messageDiv.innerHTML = `
                <div class="max-w-xs lg:max-w-md px-4 py-2 rounded-lg ${
                    isFromDosen 
                        ? 'bg-blue-600 text-white' 
                        : 'bg-gray-200 text-gray-900'
                }">
                    <p class="text-sm">${message.message}</p>
                    <p class="text-xs ${isFromDosen ? 'text-blue-200' : 'text-gray-500'} mt-1">
                        ${new Date(message.timestamp).toLocaleTimeString('id-ID', {
                            hour: '2-digit',
                            minute: '2-digit'
                        })}
                    </p>
                </div>
            `;
            
            chatMessages.appendChild(messageDiv);
        }

        function sendMessage() {
            const messageInput = document.getElementById('messageInput');
            const messageText = messageInput.value.trim();
            
            if (!messageText || !currentChatRoom) return;

            const message = {
                id: Date.now(),
                message: messageText,
                sender_type: 'dosen',
                sender_id: {{ auth()->user()->dosen->id_dosen }},
                receiver_id: currentMahasiswaId,
                timestamp: new Date().toISOString(),
                room: currentChatRoom
            };

            // Save to localStorage
            const messages = JSON.parse(localStorage.getItem(currentChatRoom) || '[]');
            messages.push(message);
            localStorage.setItem(currentChatRoom, JSON.stringify(messages));

            // Save to database via AJAX
            fetch('/dosen/chat/send', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(message)
            });

            displayMessage(message);
            messageInput.value = '';
            
            const chatMessages = document.getElementById('chatMessages');
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        // Poll for new messages every 5 seconds
        setInterval(() => {
            if (currentChatRoom) {
                fetch(`/dosen/chat/messages/${currentChatRoom}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.messages) {
                            localStorage.setItem(currentChatRoom, JSON.stringify(data.messages));
                            loadMessages();
                        }
                    });
            }
        }, 5000);
    </script>
@endsection
