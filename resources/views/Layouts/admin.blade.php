<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pemuda Kerja</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/admin/navbar.js', 'resources/js/admin/layout.js'])
    @else
    @endif
</head>

<body class="antialiased">
    <div class="flex h-screen bg-gray-50">
        @include('components.widget.admin.sidebar')

        <div class="flex-1 flex flex-col overflow-hidden">
            @include('components.widget.admin.navbar')

            <main id="main-content" class="flex-1 overflow-y-auto pt-10 pr-10 transition-all duration-300">
                <div class="mb-6">
                    <h1 class="text-2xl font-semibold text-gray-800">Dashboard</h1>
                    <p class="text-sm text-gray-500">Welcome to the Admin Dashboard</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Card 1: Statistik Pengguna -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-lg font-medium text-gray-700">Total Users</h3>
                        <p class="text-3xl font-bold text-gray-900 mt-2">1,245</p>
                        <p class="text-sm text-green-500 mt-1">+5% from last month</p>
                    </div>

                    <!-- Card 2: Statistik Penjualan -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-lg font-medium text-gray-700">Total Sales</h3>
                        <p class="text-3xl font-bold text-gray-900 mt-2">$12,340</p>
                        <p class="text-sm text-red-500 mt-1">-2% from last month</p>
                    </div>

                    <!-- Card 3: Statistik Aktivitas -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-lg font-medium text-gray-700">Activity</h3>
                        <p class="text-3xl font-bold text-gray-900 mt-2">342</p>
                        <p class="text-sm text-green-500 mt-1">+10% from last month</p>
                    </div>
                </div>

                <!-- Tabel atau Konten Tambahan -->
                <div class="mt-6 bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-medium text-gray-700 mb-4">Recent Activity</h3>
                    <table class="w-full text-left">
                        <thead>
                            <tr class="border-b">
                                <th class="py-2 text-gray-600">User</th>
                                <th class="py-2 text-gray-600">Action</th>
                                <th class="py-2 text-gray-600">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b">
                                <td class="py-2 text-gray-800">John Doe</td>
                                <td class="py-2 text-gray-800">Updated profile</td>
                                <td class="py-2 text-gray-600">May 20, 2025</td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-2 text-gray-800">Jane Smith</td>
                                <td class="py-2 text-gray-800">Logged in</td>
                                <td class="py-2 text-gray-600">May 19, 2025</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>

</html>