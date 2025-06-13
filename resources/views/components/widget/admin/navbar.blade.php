<header
    class="w-full bg-white border-b border-gray-200 h-16 flex items-center justify-between px-4 sm:px-6 lg:px-8 shadow-sm">
    <!-- Left side: Search -->
    <div class="w-full max-w-xs lg:max-w-md">
        <!-- Search can be added here later -->
    </div>

    <!-- Right side: Actions -->
    <div class="flex items-center space-x-1">
        <!-- Notifications Dropdown -->
        <div x-data="notificationDropdown()" x-init="init()" class="relative">
            <button @click="toggleDropdown()"
                class="relative p-2 rounded-full hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors"
                aria-label="Notifications">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 17h5l-1.405-1.405A2 2 0 0118 14v-5a6 6 0 00-6-6v0a6 6 0 00-6 6v5a2 2 0 01-.595 1.42L4 17h5m6 0v1a3 3 0 01-6 0v-1m6 0H9" />
                </svg>
                <span x-show="unreadCount > 0" x-text="unreadCount > 99 ? '99+' : unreadCount"
                    class="absolute -top-0.5 -right-0.5 flex h-4 w-4 items-center justify-center rounded-full bg-red-500 text-[10px] font-bold text-white min-w-[16px] px-1">
                </span>
            </button>

            <div x-show="open" @click.away="closeDropdown()" x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95"
                class="absolute right-0 mt-2 w-96 rounded-lg bg-white shadow-xl ring-1 ring-black ring-opacity-5 z-50 overflow-hidden border">

                {{-- <div class="p-4 border-b border-gray-100 flex justify-between items-center bg-gradient-to-r from-blue-50 to-blue-100">
                    <h3 class="text-base font-bold text-gray-800">Notifikasi</h3>
                    <button @click="markAllAsRead()"
                        x-show="unreadCount > 0"
                        class="text-xs text-blue-600 hover:text-blue-800 font-semibold px-3 py-1 rounded-full bg-white hover:bg-blue-50 transition-colors">
                        Tandai sudah dibaca
                    </button>
                </div> --}}

                <div class="max-h-96 overflow-y-auto" x-show="!loading">
                    <template x-if="notifications.length === 0">
                        <div class="p-8 text-center">
                            <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2 2 0 0118 14v-5a6 6 0 00-6-6v0a6 6 0 00-6 6v5a2 2 0 01-.595 1.42L4 17h5m6 0v1a3 3 0 01-6 0v-1m6 0H9"/>
                                </svg>
                            </div>
                            <p class="text-gray-500 text-sm">Tidak ada notifikasi baru</p>
                        </div>
                    </template>

                    <template x-for="notification in notifications" :key="notification.id">
                        <div class="p-4 hover:bg-gray-50 transition-colors border-b border-gray-50 cursor-pointer"
                             @click="handleNotificationClick(notification)">
                            <div class="flex">
                                <div class="flex-shrink-0 mr-3">
                                    <div class="h-10 w-10 rounded-full flex items-center justify-center"
                                         :class="{
                                             'bg-blue-100': notification.color === 'blue',
                                             'bg-green-100': notification.color === 'green',
                                             'bg-yellow-100': notification.color === 'yellow',
                                             'bg-red-100': notification.color === 'red'
                                         }">
                                        <!-- User Plus Icon -->
                                        <template x-if="notification.icon === 'user-plus'">
                                            <svg class="h-5 w-5" :class="{
                                                'text-blue-600': notification.color === 'blue',
                                                'text-green-600': notification.color === 'green',
                                                'text-yellow-600': notification.color === 'yellow',
                                                'text-red-600': notification.color === 'red'
                                            }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                                            </svg>
                                        </template>
                                        
                                        <!-- Clock Icon -->
                                        <template x-if="notification.icon === 'clock'">
                                            <svg class="h-5 w-5" :class="{
                                                'text-blue-600': notification.color === 'blue',
                                                'text-green-600': notification.color === 'green',
                                                'text-yellow-600': notification.color === 'yellow',
                                                'text-red-600': notification.color === 'red'
                                            }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </template>
                                        
                                        <!-- Check Circle Icon -->
                                        <template x-if="notification.icon === 'check-circle'">
                                            <svg class="h-5 w-5" :class="{
                                                'text-blue-600': notification.color === 'blue',
                                                'text-green-600': notification.color === 'green',
                                                'text-yellow-600': notification.color === 'yellow',
                                                'text-red-600': notification.color === 'red'
                                            }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </template>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-semibold text-gray-800" x-text="notification.title"></p>
                                    <p class="text-xs text-gray-600 mt-1 leading-relaxed" x-text="notification.message"></p>
                                    <div class="flex items-center justify-between mt-2">
                                        <p class="text-xs text-gray-400" x-text="notification.time"></p>
                                        <template x-if="notification.status">
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium"
                                                  :class="{
                                                      'bg-yellow-100 text-yellow-800': notification.status === 'menunggu',
                                                      'bg-green-100 text-green-800': notification.status === 'diterima',
                                                      'bg-red-100 text-red-800': notification.status === 'ditolak'
                                                  }"
                                                  x-text="notification.status === 'menunggu' ? 'Menunggu' : 
                                                          notification.status === 'diterima' ? 'Diterima' : 'Ditolak'">
                                            </span>
                                        </template>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>

                <div x-show="loading" class="p-8 text-center">
                    <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600 mx-auto"></div>
                    <p class="text-gray-500 text-sm mt-2">Memuat notifikasi...</p>
                </div>

                <div class="p-3 border-t border-gray-100 bg-gray-50">
                    <a href="/admin/pengajuan-magang" 
                       class="block w-full text-center text-sm font-semibold text-blue-600 hover:text-blue-800 py-2 rounded-md hover:bg-blue-50 transition-colors">
                        Lihat semua pengajuan
                    </a>
                </div>
            </div>
        </div>

        <!-- User Profile Dropdown -->
        <div x-data="{ open: false }" class="relative">
           @auth
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open"
                    class="flex items-center space-x-2 rounded-full border hover:bg-gray-100 p-1.5 focus:outline-none focus:ring-2 focus:ring-blue-900 transition-colors"
                    aria-label="User menu">
                    <div class="overflow-hidden border-2 border-gray-200 rounded-full h-9 w-9">
                        <img src="https://i.pinimg.com/474x/f9/45/b6/f945b69a2a9a33ef4edbdb32de616ddd.jpg"
                            alt="User Avatar" class="object-cover w-full h-full" />
                    </div>
                    <div class="hidden text-left md:block">
                        <div class="text-sm font-medium text-gray-700">{{ Auth::user()->username }}</div>
                        <div class="text-xs text-gray-500 truncate max-w-[120px]">{{ Auth::user()->email }}</div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="hidden w-4 h-4 text-gray-500 md:block"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-95"
                    class="absolute right-0 z-50 w-64 mt-2 overflow-hidden bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5">

                    <div class="px-4 py-3 border-b border-gray-100 bg-gray-50">
                        <p class="text-sm font-medium text-gray-800">{{ Auth::user()->username }}</p>
                        <p class="text-xs text-gray-500">{{ Auth::user()->role }}</p>
                    </div>  

                    <div class="py-1">
                        <a href="/profile"
                            class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-3 text-gray-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Lihat Profil
                        </a>

                        <a href="#"
                            class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-3 text-gray-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Pengaturan Akun
                        </a>
                    </div>

                    <div class="py-1 border-t border-gray-100">
                        <a href="{{url('/logout')}}">
                            <button type="submit"
                                class="flex w-full items-center px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-3 text-red-500"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                Keluar
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            @endauth
            @if(!Auth::user())
            <div class="flex items-center space-x-2">
                <a href="{{url('login')}}"
                    class="text-[#1A3C34] hover:bg-gray-100 font-medium px-3 py-2 border border-gray-200 rounded-lg w-1/2 text-center">
                    <button>
                        Login
                    </button>
                </a>
                <a href="{{url('daftar')}}"
                    class="bg-[#DEFC79] hover:bg-[#c9eb5b] text-[#1A3C34] font-medium px-4 py-2 rounded-lg w-1/2 text-center">
                    <button>
                        Daftar
                    </button>
                </a>
            </div>
            @endif
        </div>
    </div>
</header>

<script>
function notificationDropdown() {
    return {
        open: false,
        loading: false,
        notifications: [],
        unreadCount: 0,
        
        async init() {
            await this.loadNotifications();
            // Auto refresh every 15 seconds to catch new applications quickly
            setInterval(() => {
                if (!this.open) { // Only refresh when dropdown is closed to avoid UI disruption
                    this.loadNotifications();
                }
            }, 15000);
        },
        
        toggleDropdown() {
            this.open = !this.open;
            if (this.open) {
                this.loadNotifications();
            }
        },
        
        closeDropdown() {
            this.open = false;
        },
        
        async loadNotifications() {
            try {
                if (!this.open) {
                    this.loading = true;
                }
                
                const response = await fetch('/admin/notifications', {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                });
                
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                
                const data = await response.json();
                
                this.notifications = data.notifications || [];
                this.unreadCount = data.unread_count || 0;
                
                // Show browser notification for new applications (if permission granted)
                if (data.notifications) {
                    data.notifications.forEach(notification => {
                        if (notification.isNew && notification.type === 'new_application') {
                            this.showBrowserNotification(notification);
                        }
                    });
                }
                
            } catch (error) {
                console.error('Error loading notifications:', error);
                this.notifications = [];
                this.unreadCount = 0;
            } finally {
                this.loading = false;
            }
        },
        
        async markAllAsRead() {
            try {
                const response = await fetch('/admin/notifications/mark-read', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });
                
                if (response.ok) {
                    // Reset unread count immediately
                    this.unreadCount = 0;
                    
                    // Mark all notifications as read in the current array
                    this.notifications = this.notifications.map(notification => ({
                        ...notification,
                        read_at: new Date().toISOString(),
                        is_read: true
                    }));
                    
                    // Reload notifications from server to ensure sync
                    await this.loadNotifications();
                    
                    this.showToast('Semua notifikasi telah ditandai sebagai sudah dibaca', 'success');
                }
            } catch (error) {
                console.error('Error marking notifications as read:', error);
                this.showToast('Gagal menandai notifikasi', 'error');
            }
        },
        
        handleNotificationClick(notification) {
            if (notification.url) {
                window.location.href = notification.url;
            }
            this.closeDropdown();
        },
        
        showBrowserNotification(notification) {
            if ('Notification' in window && Notification.permission === 'granted') {
                new Notification('Pengajuan Magang Baru', {
                    body: notification.message,
                    icon: '/favicon.ico',
                    tag: 'internship-application'
                });
            }
        },
        
        requestNotificationPermission() {
            if ('Notification' in window && Notification.permission === 'default') {
                Notification.requestPermission();
            }
        },
        
        showToast(message, type = 'info') {
            const toast = document.createElement('div');
            toast.className = `fixed top-4 right-4 px-6 py-3 rounded-lg shadow-lg z-50 text-white transform transition-transform duration-300 translate-x-full ${
                type === 'success' ? 'bg-green-500' : 
                type === 'error' ? 'bg-red-500' : 'bg-blue-500'
            }`;
            toast.innerHTML = `
                <div class="flex items-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        ${type === 'success' ? 
                            '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>' :
                            type === 'error' ?
                            '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>' :
                            '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>'
                        }
                    </svg>
                    <span>${message}</span>
                </div>
            `;
            
            document.body.appendChild(toast);
            
            // Animate in
            setTimeout(() => {
                toast.classList.remove('translate-x-full');
            }, 100);
            
            // Remove after 4 seconds
            setTimeout(() => {
                toast.classList.add('translate-x-full');
                setTimeout(() => {
                    if (toast.parentNode) {
                        toast.parentNode.removeChild(toast);
                    }
                }, 300);
            }, 4000);
        }
    }
}

// Request notification permission when page loads
document.addEventListener('DOMContentLoaded', function() {
    if ('Notification' in window && Notification.permission === 'default') {
        // Auto request permission for admin users
        Notification.requestPermission();
    }
});
</script>