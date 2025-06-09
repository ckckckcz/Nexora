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
        {{-- <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" /> --}}
        
        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/user.css', 'resources/js/app.js'])
        @else
        @endif
    </head>
    <body class="antialiased">
        <div class="min-h-screen">
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
        @include('components.widget.user.navbar')
    
            <!-- Page Content -->
            <main>
                @yield('user')
            </main>
    
            @include('components.widget.user.footer')
        </div>
    </body>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            gsap.registerPlugin(ScrollTrigger);            
            initAnimations();
        });
    </script>
</html>
