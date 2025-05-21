@extends('layouts.dosen')
@section('dosen')
    <div class="min-h-screen bg-white flex">
        <!-- Left Sidebar - Conversation List -->
        <div class="w-80 border-r border-gray-200 flex flex-col">
            <!-- Header -->
            <div class="p-4 border-b border-gray-200 flex items-center justify-between">
                <h2 class="text-black font-medium text-lg">Inbox <span class="text-xs bg-white text-gray-300 rounded-full px-2 py-0.5 ml-1">(3)</span></h2>
                <div class="h-8 w-8 bg-cyan-500 rounded-full flex items-center justify-center text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
                    </svg>
                </div>
            </div>
            
            <!-- Search -->
            <div class="p-3">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text" placeholder="Find a conversation" class="bg-white text-sm text-gray-300 rounded-md pl-10 pr-4 py-2 w-full focus:outline-none focus:ring-1 focus:ring-gray-700">
                </div>
            </div>
            
            <!-- Conversation List -->
            <div class="flex-1 overflow-y-auto">
                <!-- Amazon -->
                <div class="flex items-start p-3 hover:bg-white cursor-pointer border-l-2 border-cyan-500">
                    <div class="h-10 w-10 rounded-full bg-white flex items-center justify-center mr-3 flex-shrink-0">
                        <span class="text-black font-bold">A</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex justify-between items-baseline">
                            <h3 class="text-black font-medium truncate">Amazon</h3>
                            <span class="text-xs text-gray-400">11:32 AM</span>
                        </div>
                        <p class="text-gray-400 text-sm truncate">Oh, let me check this out for a moment, thank you for your patience</p>
                    </div>
                </div>
                
                <!-- Microsoft -->
                <div class="flex items-start p-3 hover:bg-white cursor-pointer">
                    <div class="h-10 w-10 rounded-full bg-white flex items-center justify-center mr-3 flex-shrink-0">
                        <span class="text-black font-bold">M</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex justify-between items-baseline">
                            <h3 class="text-black font-medium truncate">Microsoft</h3>
                            <span class="text-xs text-gray-400">10:12 AM</span>
                        </div>
                        <p class="text-gray-400 text-sm truncate">I was to connect my account to a new device and could use a hand getting everything sync...</p>
                    </div>
                    <div class="ml-2 h-5 w-5 bg-cyan-500 rounded-full flex items-center justify-center text-xs text-black">2</div>
                </div>
                
                <!-- Apple -->
                <div class="flex items-start p-3 hover:bg-white cursor-pointer">
                    <div class="h-10 w-10 rounded-full bg-white flex items-center justify-center mr-3 flex-shrink-0">
                        <span class="text-black font-bold">A</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex justify-between items-baseline">
                            <h3 class="text-black font-medium truncate">Apple</h3>
                            <span class="text-xs text-gray-400">10:04 AM</span>
                        </div>
                        <p class="text-gray-400 text-sm truncate">Got stuck during setup and figured you might be able to walk me through the last step...</p>
                    </div>
                    <div class="ml-2 h-5 w-5 bg-cyan-500 rounded-full flex items-center justify-center text-xs text-black">1</div>
                </div>
                
                <!-- HP -->
                <div class="flex items-start p-3 hover:bg-white cursor-pointer">
                    <div class="h-10 w-10 rounded-full bg-white flex items-center justify-center mr-3 flex-shrink-0">
                        <span class="text-black font-bold">HP</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex justify-between items-baseline">
                            <h3 class="text-black font-medium truncate">HP</h3>
                            <span class="text-xs text-gray-400">10:01 AM</span>
                        </div>
                        <p class="text-gray-400 text-sm truncate">Everything was working great until today—now the screen won't load properly and I'd love s...</p>
                    </div>
                    <div class="ml-2 h-5 w-5 bg-cyan-500 rounded-full flex items-center justify-center text-xs text-black">1</div>
                </div>
                
                <!-- More conversations (Intel, LG, Google, etc.) -->
                @for ($i = 0; $i < 5; $i++)
                    <div class="flex items-start p-3 hover:bg-white cursor-pointer">
                        <div class="h-10 w-10 rounded-full bg-white flex items-center justify-center mr-3 flex-shrink-0">
                            <span class="text-black font-bold">{{ ['I', 'L', 'G', 'A', 'H'][$i] }}</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex justify-between items-baseline">
                                <h3 class="text-black font-medium truncate">{{ ['Intel', 'LG', 'Google', 'Asus', 'Huawei'][$i] }}</h3>
                                <span class="text-xs text-gray-400">{{ ['08:52', '06:37', '06:09', '07:32', '06:32'][$i] }} AM</span>
                            </div>
                            <p class="text-gray-400 text-sm truncate"></p>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
        
        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col">
            <!-- Header -->
            <div class="bg-white border-b border-gray-800 p-4 flex items-center">
                <div class="flex items-center">
                    <div class="h-10 w-10 rounded-full bg-white flex items-center justify-center mr-3">
                        <span class="text-black font-bold">A</span>
                    </div>
                    <div>
                        <h3 class="text-black font-medium">Amazon</h3>
                        <p class="text-xs text-green-500">Online</p>
                    </div>
                </div>
            </div>
            
            <!-- Call History -->
            <div class="flex-1 overflow-y-auto bg-white p-4">
                <!-- Call Entry -->
                <div class="mb-4">
                    <div class="flex items-center justify-between mb-2">
                        <div class="flex items-center">
                            <div class="h-8 w-8 rounded-full bg-white flex items-center justify-center mr-2">
                                <span class="text-black font-bold">A</span>
                            </div>
                            <div>
                                <h4 class="text-black">Amazon</h4>
                                <p class="text-xs text-gray-400">Incoming Call</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="h-8 w-8 rounded-full bg-red-500 flex items-center justify-center text-black">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Active Call -->
                <div class="bg-white rounded-lg p-4 mb-4">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <div class="h-10 w-10 rounded-full bg-white flex items-center justify-center mr-3">
                                <span class="text-black font-bold">A</span>
                            </div>
                            <div>
                                <h3 class="text-black">Amazon</h3>
                                <p class="text-xs text-gray-400">02:43</p>
                            </div>
                        </div>
                        <div class="flex space-x-2">
                            <button class="h-8 w-8 rounded-full bg-gray-700 flex items-center justify-center text-black">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M7 4a3 3 0 016 0v4a3 3 0 11-6 0V4zm4 10.93A7.001 7.001 0 0017 8a1 1 0 10-2 0A5 5 0 015 8a1 1 0 00-2 0 7.001 7.001 0 006 6.93V17H6a1 1 0 100 2h8a1 1 0 100-2h-3v-2.07z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <button class="h-8 w-8 rounded-full bg-red-500 flex items-center justify-center text-black">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Audio Waveform -->
                    <div class="h-8 flex items-center justify-center space-x-1 mb-4">
                        @for ($i = 0; $i < 30; $i++)
                            <div class="w-1 bg-gray-600 rounded-full" style="height: {{ rand(4, 20) }}px"></div>
                        @endfor
                    </div>
                </div>
                
                <!-- Ended Call -->
                <div class="mb-4">
                    <div class="flex items-center justify-between mb-2">
                        <div class="flex items-center">
                            <div class="h-8 w-8 rounded-full bg-green-500 flex items-center justify-center text-black mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-black">Call Ended | Last call: 5m 23s</h4>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- More Call History -->
                @for ($i = 0; $i < 3; $i++)
                    <div class="mb-4">
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center">
                                <div class="h-8 w-8 rounded-full bg-red-500 flex items-center justify-center text-black mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-black">Incoming Call</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
                
                <!-- Call Rating Dialog -->
                <div class="bg-white rounded-lg p-4 mb-4 relative">
                    <button class="absolute top-2 right-2 text-gray-400 hover:text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <h3 class="text-black text-center mb-4">How Was The Audio Quality During The Last Call?</h3>
                    <div class="flex justify-center space-x-2">
                        @for ($i = 0; $i < 5; $i++)
                            <button class="text-2xl {{ $i < 3 ? 'text-yellow-400' : 'text-gray-600' }}">★</button>
                        @endfor
                    </div>
                </div>
            </div>
            
            <!-- Message Input -->
            <div class="bg-white p-4 border-t border-gray-100">
                <div class="flex items-center">
                    <button class="text-gray-400 mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                        </svg>
                    </button>
                    <input type="text" placeholder="Type a message..." class="bg-gray-200 text-gray-200 rounded-full py-2 px-4 flex-1 focus:outline-none focus:ring-1 focus:ring-gray-600">
                    <button class="text-gray-400 ml-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // You can add JavaScript for handling interactions
        document.addEventListener('DOMContentLoaded', function() {
            // Example: Handle conversation selection
            const conversations = document.querySelectorAll('.hover\\:bg-white');
            conversations.forEach(conversation => {
                conversation.addEventListener('click', function() {
                    // Remove active class from all conversations
                    conversations.forEach(c => c.classList.remove('border-l-2', 'border-cyan-500'));
                    // Add active class to clicked conversation
                    this.classList.add('border-l-2', 'border-cyan-500');
                    
                    // Here you would typically load the conversation data
                    // For a real implementation, you'd make an AJAX call to your backend
                });
            });
            
            // Example: Handle close button on rating dialog
            const closeButton = document.querySelector('.bg-white.rounded-lg.p-4.mb-4.relative button');
            if (closeButton) {
                closeButton.addEventListener('click', function() {
                    this.closest('.bg-white.rounded-lg.p-4.mb-4.relative').style.display = 'none';
                });
            }
            
            // Example: Handle star rating
            const stars = document.querySelectorAll('.flex.justify-center.space-x-2 button');
            stars.forEach((star, index) => {
                star.addEventListener('click', function() {
                    // Reset all stars
                    stars.forEach((s, i) => {
                        s.classList.remove('text-yellow-400');
                        s.classList.add('text-gray-600');
                    });
                    
                    // Highlight stars up to the clicked one
                    for (let i = 0; i <= index; i++) {
                        stars[i].classList.remove('text-gray-600');
                        stars[i].classList.add('text-yellow-400');
                    }
                    
                    // Here you would typically send the rating to your backend
                    // For a real implementation, you'd make an AJAX call
                });
            });
        });
    </script>
@endsection