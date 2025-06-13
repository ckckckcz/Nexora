<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Nexora</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/css/podium.css',  'resources/js/app.js', 'resources/js/search.js', 'resources/js/admin/navbar.js', 'resources/js/admin/layout.js', 'resources/js/admin/dashboardDummy.js', 'resources/js/filter.js',])
    @else
    @endif
</head>

<body class="antialiased">
    <div class="flex h-screen bg-gray-50">
        @if(session('success'))
            <div id="success-popup" class="fixed top-5 left-1/2 -translate-x-1/2 bg-green-500 text-white py-4 px-8 rounded-md shadow-lg text-lg z-[9999]">
                {{ session('success') }}
            </div>
            <script>
                setTimeout(function(){
                    document.getElementById('success-popup').remove();
                }, 3000);
            </script>
        @endif

        @if(session('error'))
            <div id="error-popup" class="fixed top-5 left-1/2 -translate-x-1/2 bg-red-500 text-white py-4 px-8 rounded-md shadow-lg text-lg z-[9999]">
                {{ session('error') }}
            </div>
            <script>
                setTimeout(function(){
                    document.getElementById('error-popup').remove();
                }, 3000);
            </script>
        @endif
        @include('components.widget.admin.sidebar')

        <div class="flex-1 flex flex-col overflow-hidden">
            @include('components.widget.admin.navbar')

            <main id="main-content" class="flex-1 overflow-y-auto transition-all duration-300">
                @yield('admin')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>

</html>