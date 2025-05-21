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

                <!-- Albert Chat -->
                <div class="flex p-3 hover:bg-gray-100 cursor-pointer">
                    <div class="flex-shrink-0 mr-3">
                        <div class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center text-purple-500">
                            <span>A</span>
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex justify-between">
                            <h3 class="text-sm font-medium text-gray-900">Albert</h3>
                            <span class="text-xs text-gray-500">10:00am</span>
                        </div>
                        <p class="text-sm text-gray-500 truncate">Hello david, what are today's tasks?</p>
                    </div>
                    <div class="ml-2 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </div>
                </div>

                <!-- Robert Chats -->
                <div class="flex p-3 hover:bg-gray-100 cursor-pointer">
                    <div class="flex-shrink-0 mr-3">
                        <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center text-green-500">
                            <span>R</span>
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex justify-between">
                            <h3 class="text-sm font-medium text-gray-900">Robert</h3>
                            <span class="text-xs text-gray-500">Jan 30</span>
                        </div>
                        <p class="text-sm text-gray-500 truncate">Have a great day then</p>
                    </div>
                    <div class="ml-2 flex items-center">
                        <span
                            class="bg-blue-900 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">2</span>
                    </div>
                </div>

                <div class="flex p-3 hover:bg-gray-100 cursor-pointer">
                    <div class="flex-shrink-0 mr-3">
                        <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-500">
                            <span>R</span>
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex justify-between">
                            <h3 class="text-sm font-medium text-gray-900">Robert</h3>
                            <span class="text-xs text-gray-500">Jan 30</span>
                        </div>
                        <p class="text-sm text-gray-500 truncate">Hey there, any update?</p>
                    </div>
                    <div class="ml-2 flex items-center">
                        <span
                            class="bg-blue-900 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">2</span>
                    </div>
                </div>

                <div class="flex p-3 hover:bg-gray-100 cursor-pointer">
                    <div class="flex-shrink-0 mr-3">
                        <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center text-red-500">
                            <span>R</span>
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex justify-between">
                            <h3 class="text-sm font-medium text-gray-900">Robert</h3>
                            <span class="text-xs text-gray-500">Jan 30</span>
                        </div>
                        <p class="text-sm text-gray-500 truncate">We'll have the usability test run tomorrow</p>
                    </div>
                    <div class="ml-2 flex items-center">
                        <span
                            class="bg-blue-900 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">2</span>
                    </div>
                </div>

                <div class="flex p-3 hover:bg-gray-100 cursor-pointer">
                    <div class="flex-shrink-0 mr-3">
                        <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-500">
                            <span>R</span>
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex justify-between">
                            <h3 class="text-sm font-medium text-gray-900">Robert</h3>
                            <span class="text-xs text-gray-500">Jan 30</span>
                        </div>
                        <p class="text-sm text-gray-500 truncate">All components are now available for use</p>
                    </div>
                    <div class="ml-2 flex items-center">
                        <span
                            class="bg-blue-900 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">2</span>
                    </div>
                </div>

                <!-- Albert Chats -->
                <div class="flex p-3 hover:bg-gray-100 cursor-pointer">
                    <div class="flex-shrink-0 mr-3">
                        <div class="w-10 h-10 rounded-full bg-yellow-100 flex items-center justify-center text-yellow-500">
                            <span>A</span>
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex justify-between">
                            <h3 class="text-sm font-medium text-gray-900">Albert</h3>
                            <span class="text-xs text-gray-500">Yesterday</span>
                        </div>
                        <p class="text-sm text-gray-500 truncate">Happy new month dan</p>
                    </div>
                </div>

                <div class="flex p-3 hover:bg-gray-100 cursor-pointer">
                    <div class="flex-shrink-0 mr-3">
                        <div class="w-10 h-10 rounded-full bg-pink-100 flex items-center justify-center text-pink-500">
                            <span>A</span>
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex justify-between">
                            <h3 class="text-sm font-medium text-gray-900">Albert</h3>
                            <span class="text-xs text-gray-500">Yesterday</span>
                        </div>
                        <p class="text-sm text-gray-500 truncate">I'm doing great, thanks!</p>
                    </div>
                </div>
                <div class="flex p-3 hover:bg-gray-100 cursor-pointer">
                    <div class="flex-shrink-0 mr-3">
                        <div class="w-10 h-10 rounded-full bg-yellow-100 flex items-center justify-center text-yellow-500">
                            <span>A</span>
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex justify-between">
                            <h3 class="text-sm font-medium text-gray-900">Albert</h3>
                            <span class="text-xs text-gray-500">Yesterday</span>
                        </div>
                        <p class="text-sm text-gray-500 truncate">Happy new month dan</p>
                    </div>
                </div>

                <div class="flex p-3 hover:bg-gray-100 cursor-pointer">
                    <div class="flex-shrink-0 mr-3">
                        <div class="w-10 h-10 rounded-full bg-pink-100 flex items-center justify-center text-pink-500">
                            <span>A</span>
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex justify-between">
                            <h3 class="text-sm font-medium text-gray-900">Albert</h3>
                            <span class="text-xs text-gray-500">Yesterday</span>
                        </div>
                        <p class="text-sm text-gray-500 truncate">I'm doing great, thanks!</p>
                    </div>
                </div>
                <div class="flex p-3 hover:bg-gray-100 cursor-pointer">
                    <div class="flex-shrink-0 mr-3">
                        <div class="w-10 h-10 rounded-full bg-yellow-100 flex items-center justify-center text-yellow-500">
                            <span>A</span>
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex justify-between">
                            <h3 class="text-sm font-medium text-gray-900">Albert</h3>
                            <span class="text-xs text-gray-500">Yesterday</span>
                        </div>
                        <p class="text-sm text-gray-500 truncate">Happy new month dan</p>
                    </div>
                </div>

                <div class="flex p-3 hover:bg-gray-100 cursor-pointer">
                    <div class="flex-shrink-0 mr-3">
                        <div class="w-10 h-10 rounded-full bg-pink-100 flex items-center justify-center text-pink-500">
                            <span>A</span>
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex justify-between">
                            <h3 class="text-sm font-medium text-gray-900">Albert</h3>
                            <span class="text-xs text-gray-500">Yesterday</span>
                        </div>
                        <p class="text-sm text-gray-500 truncate">I'm doing great, thanks!</p>
                    </div>
                </div>
                <div class="flex p-3 hover:bg-gray-100 cursor-pointer">
                    <div class="flex-shrink-0 mr-3">
                        <div class="w-10 h-10 rounded-full bg-yellow-100 flex items-center justify-center text-yellow-500">
                            <span>A</span>
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex justify-between">
                            <h3 class="text-sm font-medium text-gray-900">Albert</h3>
                            <span class="text-xs text-gray-500">Yesterday</span>
                        </div>
                        <p class="text-sm text-gray-500 truncate">Happy new month dan</p>
                    </div>
                </div>

                <div class="flex p-3 hover:bg-gray-100 cursor-pointer">
                    <div class="flex-shrink-0 mr-3">
                        <div class="w-10 h-10 rounded-full bg-pink-100 flex items-center justify-center text-pink-500">
                            <span>A</span>
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex justify-between">
                            <h3 class="text-sm font-medium text-gray-900">Albert</h3>
                            <span class="text-xs text-gray-500">Yesterday</span>
                        </div>
                        <p class="text-sm text-gray-500 truncate">I'm doing great, thanks!</p>
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
            <div class="flex-1 overflow-y-auto p-4 bg-white">
                <!-- Date Separator -->
                <div class="flex justify-center mb-4">
                    <div class="bg-blue-900/20 text-blue-900 font-bold text-xs px-4 py-1 rounded-full">Hari ini</div>
                </div>

                <!-- Received Message with Avatar -->
                <div class="flex mb-4">
                    <div class="flex-shrink-0 mr-2">
                        <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-500">
                            <span class="text-xs">R</span>
                        </div>
                    </div>
                    <div class="max-w-md">
                        <div class="bg-gray-50 rounded-lg p-3 shadow-sm">
                            <p class="text-sm text-gray-800">Good morning Perzival, the design has been completed and is
                                ready for review</p>
                        </div>
                    </div>
                </div>

                <!-- Received Message with Avatar (Repeated) -->
                <div class="flex mb-4">
                    <div class="flex-shrink-0 mr-2">
                        <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-500">
                            <span class="text-xs">R</span>
                        </div>
                    </div>
                    <div class="max-w-md">
                        <div class="bg-gray-50 rounded-lg p-3 shadow-sm">
                            <p class="text-sm text-gray-800">Good morning Perzival, the design has been completed and is
                                ready for review</p>
                        </div>
                    </div>
                </div>

                <!-- Received Message with Image -->
                <div class="flex mb-4">
                    <div class="flex-shrink-0 mr-2">
                        <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-500">
                            <span class="text-xs">R</span>
                        </div>
                    </div>
                    <div class="max-w-md">
                        <div class="bg-gray-50 rounded-lg p-3 shadow-sm">
                            <div class="mb-2">
                                <img src="https://www.learnworlds.com/app/uploads/2025/02/user-preferences.webp" alt="Design Screenshot"
                                    class="rounded-lg w-full h-auto">
                            </div>
                        </div>
                        <div class="text-xs text-gray-500 mt-1">9:12 am</div>
                    </div>
                </div>

                <!-- Sent Message -->
                <div class="flex justify-end mb-4">
                    <div class="max-w-md">
                        <div class="bg-blue-900 rounded-lg p-3 text-white">
                            <p class="text-sm">Great work Ronald, keep going 👍</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Message Input -->
            <div class="p-3 bg-white border-t">
                <div class="flex items-center">
                    <button class="text-gray-500 hover:text-gray-700 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="17 8 12 3 7 8"></polyline>
                            <line x1="12" y1="3" x2="12" y2="15"></line>
                        </svg>
                    </button>
                    <button class="text-gray-500 hover:text-gray-700 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M8 14s1.5 2 4 2 4-2 4-2"></path>
                            <line x1="9" y1="9" x2="9.01" y2="9"></line>
                            <line x1="15" y1="9" x2="15.01" y2="9"></line>
                        </svg>
                    </button>
                    <input type="text" placeholder="Tulis Pesan...."
                        class="flex-1 border-0 focus:ring-0 focus:outline-none text-sm px-4 py-2">
                    <button class="text-gray-500 hover:text-gray-700 mx-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 2a3 3 0 0 0-3 3v7a3 3 0 0 0 6 0V5a3 3 0 0 0-3-3z"></path>
                            <path d="M19 10v2a7 7 0 0 1-14 0v-2"></path>
                            <line x1="12" y1="19" x2="12" y2="23"></line>
                            <line x1="8" y1="23" x2="16" y2="23"></line>
                        </svg>
                    </button>
                    <button class="bg-blue-900 hover:bg-blue-600 text-white rounded-full p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="22" y1="2" x2="11" y2="13"></line>
                            <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection