@extends('layouts.dosen')
@section('dosen')
    <div class="bg-gray-50 flex">
        <!-- Left Sidebar -->
        <div class="w-80 border-r h-[920px] bg-gray-50 flex flex-col">
            <!-- Chat Header -->
            <div class="p-4 flex justify-between items-center border-b">
                <h1 class="text-xl font-semibold">Chat</h1>
                <button class="text-blue-900 bg-blue-900/10 rounded-lg p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 5v14M5 12h14"></path>
                    </svg>
                </button>
            </div>

            <!-- Search Bar -->
            <div class="p-3 border-b">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.35-4.35"></path>
                        </svg>
                    </div>
                    <input type="text" placeholder="Search"
                        class="pl-10 pr-4 py-2 w-full bg-gray-100 rounded-md text-sm focus:outline-none">
                </div>
            </div>

            <!-- Archived Section -->
            <div class="p-3 flex justify-between items-center hover:bg-gray-100 cursor-pointer">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-3" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                    </svg>
                    <span class="text-gray-700">Archived</span>
                </div>
                <span class="text-gray-500 text-sm">2</span>
            </div>

            <!-- Chat List -->
            <div class="flex-1 overflow-y-auto">
                <!-- Ronald Chat -->
                <div class="flex p-3 hover:bg-gray-100 cursor-pointer border-l-4 border-blue-900">
                    <div class="flex-shrink-0 mr-3">
                        <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-500">
                            <span>R</span>
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex justify-between">
                            <h3 class="text-sm font-medium text-gray-900">Ronald</h3>
                            <span class="text-xs text-gray-500">10:00am</span>
                        </div>
                        <p class="text-sm text-gray-500 truncate">Meeting by 12pm</p>
                    </div>
                    <div class="ml-2 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Chat Area -->
        <div class="flex-1 flex flex-col h-[920px]">
            <!-- Chat Header -->
            <div class="p-4 border-b bg-white flex justify-between items-center">
                <div class="flex items-center">
                    <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-500 mr-3">
                        <span>R</span>
                    </div>
                    <div>
                        <h2 class="text-sm font-medium">Ronald</h2>
                        <p class="text-xs text-gray-500">Last seen at 12:02am</p>
                    </div>
                </div>
                <div class="flex items-center space-x-3">
                    <button class="text-gray-500 hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                            </path>
                        </svg>
                    </button>
                    <button class="text-gray-500 hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="23 7 16 12 23 17 23 7"></polygon>
                            <rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect>
                        </svg>
                    </button>
                    <button class="text-gray-500 hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="1"></circle>
                            <circle cx="19" cy="12" r="1"></circle>
                            <circle cx="5" cy="12" r="1"></circle>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Chat Messages -->
            <div class="flex-1 overflow-y-auto p-4 bg-white" id="chat-messages">
                <!-- Messages will be dynamically inserted here -->
            </div>

            <!-- Message Input -->
            <div class="p-4 bg-white border-t shadow-sm">
                <form id="message-form" class="flex items-center bg-gray-50 rounded-2xl py-3 px-3 border border-gray-200 hover:border-blue-300 transition-all duration-300">
                    <!-- Attachment Button with Tooltip -->
                    <div class="relative group">
                        <button
                            class="text-gray-500 hover:text-blue-500 p-2 rounded-full hover:bg-blue-50 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                <polyline points="17 8 12 3 7 8"></polyline>
                                <line x1="12" y1="3" x2="12" y2="15"></line>
                            </svg>
                        </button>
                        <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden group-hover:block">
                            <div class="bg-gray-800 text-white text-xs rounded py-1 px-2 whitespace-nowrap">
                                Lampirkan file
                            </div>
                        </div>
                    </div>

                    <!-- Image Upload Button with Tooltip -->
                    <div class="relative group">
                        <button
                            class="text-gray-500 hover:text-blue-500 p-2 rounded-full hover:bg-blue-50 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                <polyline points="21 15 16 10 5 21"></polyline>
                            </svg>
                        </button>
                        <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden group-hover:block">
                            <div class="bg-gray-800 text-white text-xs rounded py-1 px-2 whitespace-nowrap">
                                Kirim gambar
                            </div>
                        </div>
                    </div>

                    <!-- Input Field -->
                    <div class="flex-1 mx-2">
                        <input type="text" name="message" placeholder="Tulis Pesan..." id="messageInput"
                            class="w-full bg-transparent border-0 focus:ring-0 focus:outline-none text-sm py-2 placeholder-gray-500"
                            autocomplete="off" required>
                    </div>
                    <button type="submit" id="sendButton"
                        class="bg-blue-600 hover:bg-blue-700 text-white rounded-xl p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-offset-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="22" y1="2" x2="11" y2="13"></line>
                            <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        Echo.channel('chat')
            .listen('NewChatMessage', (e) => {
                appendMessage(e.message);
            });

        const chatMessages = document.getElementById('chat-messages');
        const messageForm = document.getElementById('message-form');
        const messageInput = document.getElementById('messageInput');

        // Load existing messages
        loadMessages();

        messageForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            const message = messageInput.value;
            if (!message.trim()) return;

            try {
                const response = await fetch('/dosen/chat/send', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ message })
                });

                if (!response.ok) throw new Error('Message send failed');
                const data = await response.json();
                appendMessage(data);
                messageInput.value = '';
            } catch (error) {
                console.error('Error:', error);
            }
        });

        async function loadMessages() {
            try {
                const response = await fetch('/dosen/chat/messages');
                const messages = await response.json();
                chatMessages.innerHTML = '';
                messages.forEach(appendMessage);
            } catch (error) {
                console.error('Error loading messages:', error);
            }
        }

        function appendMessage(message) {
            const isCurrentUser = message.sender_id === {{ auth()->id() }};
            const messageHTML = `
                <div class="flex ${isCurrentUser ? 'justify-end' : ''} mb-4">
                    ${!isCurrentUser ? `
                    <div class="flex-shrink-0 mr-2">
                        <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-500">
                            <span class="text-xs">${message.sender_name.charAt(0)}</span>
                        </div>
                    </div>
                    ` : ''}
                    <div class="max-w-md">
                        <div class="${isCurrentUser ? 'bg-blue-900 text-white' : 'bg-gray-50'} rounded-lg p-3 shadow-sm">
                            <p class="text-sm">${message.message}</p>
                        </div>
                        <div class="text-xs text-gray-500 mt-1 flex items-center gap-1">
                            ${new Date(message.timestamp).toLocaleTimeString()}
                            ${isCurrentUser ? `
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>` : ''}
                        </div>
                    </div>
                </div>
            `;
            chatMessages.insertAdjacentHTML('beforeend', messageHTML);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }
    </script>
@endsection