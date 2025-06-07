@extends('layouts.user')
@section('user')
<section class="py-36 sm:py-16 lg:py-24 bg-white">
    <div class="container  px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-blue-900 mb-4 leading-tight">
            Featured Jobs
        </h2>  
        <form class="max-w-lg">
            <div class="flex">
                <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only">Your Email</label>
                <button id="dropdown-button" data-dropdown-toggle="dropdown" class="shrink-0 cursor-pointer z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-full hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100" type="button">
                    UI/UX 
                    <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44">
                    <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdown-button">
                    <li>
                        <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100">Front-End</button>
                    </li>
                    <li>
                        <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100">Back-End</button>
                    </li>
                    <li>
                        <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100">Project Manager</button>
                    </li>
                    <li>
                        <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100">AI Engineer</button>
                    </li>
                    </ul>
                </div>
                <div class="relative w-full">
                    <input type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-full border-s-gray-50 border-s-2 border border-gray-300 focus:ring-[#DEFC79] focus:border-[#DEFC79]" placeholder="Cari Perusahaan..." required />
                    <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-black bg-[#DEFC79] hover:bg-[#c9eb5b] rounded-e-full cursor-pointer border border-[#DEFC79] focus:ring-4 focus:outline-none focus:ring-blue-300">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </div>
            </div>
        </form>
        <div class="flex lg:flex-row flex-col mt-10 gap-5 h-full w-full">
            <div class="grid lg:grid-cols-4 grid-flow-row max-w-full gap-5">
                @foreach ($lowongans as $lowongan)
                    <div class="lg:max-w-sm w-full p-6 bg-white border border-gray-200 rounded-xl shadow-sm">
                        <h5 class="mb-1 text-2xl font-bold tracking-tight text-gray-900">{{ $lowongan->posisiMagang->nama_posisi }}</h5>
                        <div class="flex items-center space-x-1 mb-2">
                            <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z" clip-rule="evenodd"/>
                            </svg>
                            <p class="text-sm text-gray-400">{{ $lowongan->lokasi }}</p>
                        </div>
                        
                        {{-- <div class="flex items-center gap-3 mb-5 mt-5">
                            <div class="w-6 h-6 object-cover">
                                <img src="{{ $lowongan->lokasi }}" alt="{{ $lowongan->nama_perusahaan }}" class="w-full h-full object-cover">
                            </div>
                            <span class="text-md font-semibold text-gray-900">{{ $lowongan->nama_perusahaan }}</span>
                        </div> --}}
                        <p class="text-sm py-5 text-gray-400">{{ $lowongan->deskripsi }}</p>
    
                        <a href="/detail-lowongan/{{ $lowongan->id_lowongan }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-BLACK bg-[#DEFC79] hover:bg-[#c9eb5b] rounded-xl focus:ring-4 focus:outline-none focus:ring-[#DEFC79]/50">
                            Lihat Detail 📄
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<script>
    const buttons = document.querySelectorAll('.category-button');
    let activeButton = null;

    function styleDefault(button) {
        button.style.backgroundColor = 'white';
        button.style.color = 'black';
        button.style.borderRadius = '9999px';
        button.style.padding = '10px 24px';
        button.style.fontSize = '0.875rem';
        button.style.fontWeight = '500';
        button.style.cursor = 'pointer';
        button.style.border = 'none';j
        button.style.transition = 'background-color 0.3s ease, color 0.3s ease';
    }

    function setActive(button) {
        buttons.forEach(btn => {
            styleDefault(btn);
        });

        button.style.backgroundColor = '#1e3a8a';
        button.style.color = 'white';

        activeButton = button;
    }

    buttons.forEach(button => {
        button.addEventListener('mouseenter', () => {
            if (button !== activeButton) {
                button.style.backgroundColor = '#f3f4f6';
            }
        });

        button.addEventListener('mouseleave', () => {
            if (button !== activeButton) {
                button.style.backgroundColor = 'white';
            }
        });

        button.addEventListener('click', () => {
            setActive(button);
        });

        styleDefault(button);
    });

    window.addEventListener('DOMContentLoaded', () => {
        const defaultButton = Array.from(buttons).find(btn => btn.textContent.trim() === 'UI/UX');
        if (defaultButton) {
            setActive(defaultButton);
        }
    });
</script>

@endsection