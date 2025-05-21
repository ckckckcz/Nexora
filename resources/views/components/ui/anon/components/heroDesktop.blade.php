<style>
    /* Efek backdrop-blur untuk browser yang mendukung */
    .custom-backdrop-blur {
        backdrop-filter: blur(4px);
        -webkit-backdrop-filter: blur(4px);
    }
</style>

<div class="grid grid-cols-5 gap-4 w-full items-end team-grid mt-20">
    <div
        class="bg-gray-50 team-card text-black border border-gray-200 shadow-sm rounded-3xl pr-4 pt-4 pl-4 flex flex-col justify-between items-center h-[350px] group relative">
        <div class="text-center">
            <h3 class="font-medium mt-2">Tri Sukma Sarah</h3>
            <p class="text-sm text-gray-500">PT. Onitsuka | Teknik Informatika</p>
        </div>
        <div class="w-full mt-5 relative overflow-hidden rounded-lg flex-1 flex items-end">
            <img src="{{ asset('images/sarah.png') }}" alt="Tri Sukma Sarah"
                class="object-contain transition duration-300 h-[320px] w-full" />
        </div>
        <!-- Overlay with blur and button covering entire card -->
        <div
            class="absolute inset-0 bg-black/50 rounded-2xl custom-backdrop-blur opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center z-10">
            <a href="/profile/tri-sukma-sarah"
                class="bg-[#DEFC79] text-black px-4 py-2 rounded-lg text-sm font-medium hover:bg-[#c9eb5b] transition-colors">
                Lihat Profile
            </a>
        </div>
        <div
            class="absolute -bottom-2 -right-2 gradient-third-place-number text-white rounded-full w-6 h-6 sm:w-8 sm:h-8 flex items-center justify-center font-bold shadow-md">
            5
        </div>
    </div>
    <div
        class="bg-gray-50 team-card text-black border border-gray-200 shadow-sm rounded-3xl pr-4 pt-4 pl-4 flex flex-col justify-between items-center h-[400px] group relative">
        <div class="text-center">
            <h3 class="font-medium mt-2">Galung Erlyan Tama</h3>
            <p class="text-sm text-gray-500">PT. Onitsuka | Teknik Informatika</p>
        </div>
        <div class="w-full mt-5 relative overflow-hidden rounded-lg flex-1 flex items-end">
            <img src="{{ asset('images/riovaldo.png') }}" alt="Galung Erlyan Tama"
                class="object-contain transition duration-300 h-[310px] w-full" />
        </div>
        <!-- Overlay with blur and button covering entire card -->
        <div
            class="absolute inset-0 bg-black/50 rounded-2xl custom-backdrop-blur opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center z-10">
            <a href="/profile/galung-erlyan-tama"
                class="bg-[#DEFC79] text-black px-4 py-2 rounded-lg text-sm font-medium hover:bg-[#c9eb5b] transition-colors">
                Lihat Profile
            </a>
        </div>
        <div
            class="absolute -bottom-2 -right-2 gradient-second-place-number text-white rounded-full w-6 h-6 sm:w-8 sm:h-8 flex items-center justify-center font-bold shadow-md">
            2
        </div>
    </div>
    <div
        class="bg-gray-50 team-card text-black border border-gray-200 shadow-sm rounded-3xl pr-4 pt-4 pl-4 flex flex-col justify-between items-center h-full group relative">
        <div class="text-center">
            <h3 class="font-medium mt-2">Riovaldo Alfiyan Fahmi Rahman</h3>
            <p class="text-sm text-gray-500">PT. Onitsuka | Teknik Informatika</p>
        </div>
        <div class="w-full mt-5 relative overflow-hidden rounded-lg flex-1 flex items-end">
            <img src="{{ asset('images/riovaldo.png') }}" alt="Riovaldo Alfiyan Fahmi Rahman"
                class="object-contain transition duration-300 w-full" />
        </div>
        <!-- Overlay with blur and button covering entire card -->
        <div
            class="absolute inset-0 bg-black/50 rounded-2xl custom-backdrop-blur opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center z-10">
            <a href="/profile/riovaldo-alfiyan"
                class="bg-[#DEFC79] text-black px-4 py-2 rounded-lg text-sm font-medium hover:bg-[#c9eb5b] transition-colors">
                Lihat Profile
            </a>
        </div>
        <div
            class="absolute -bottom-2 sm:-bottom-3 -right-2 sm:-right-3 gradient-first-place-number text-white rounded-full w-8 sm:w-12 h-8 sm:h-12 flex items-center justify-center font-bold shadow-lg">
            1
        </div>
        <div class="absolute top-[-1px] sm:top-[-33px] text-yellow-500 text-4xl w-16 h-16 flex items-center justify-center"
            style="left: 50%; transform: translateX(-50%); display: inline-block;">
            <i class="fas fa-crown"></i>
        </div>
    </div>
    <div
        class="bg-gray-50 team-card text-black border border-gray-200 shadow-sm rounded-3xl pr-4 pt-4 pl-4 flex flex-col justify-between items-center h-[400px] group relative">
        <div class="text-center">
            <h3 class="font-medium mt-2">Candra</h3>
            <p class="text-sm text-gray-500">PT. Onitsuka | Teknik Informatika</p>
        </div>
        <div class="w-full mt-5 relative overflow-hidden rounded-lg flex-1 flex items-end">
            <img src="{{ asset('images/riovaldo.png') }}" alt="Candra"
                class="object-contain transition duration-300 h-[310px] w-full" />
        </div>
        <!-- Overlay with blur and button covering entire card -->
        <div
            class="absolute inset-0 bg-black/50 rounded-2xl custom-backdrop-blur opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center z-10">
            <a href="/profile/candra"
                class="bg-[#DEFC79] text-black px-4 py-2 rounded-lg text-sm font-medium hover:bg-[#c9eb5b] transition-colors">
                Lihat Profile
            </a>
        </div>
        <div
            class="absolute -bottom-2 -right-2 gradient-second-place-number text-white rounded-full w-6 h-6 sm:w-8 sm:h-8 flex items-center justify-center font-bold shadow-md">
            3
        </div>
    </div>
    <div
        class="bg-gray-50 team-card text-black border border-gray-200 shadow-sm rounded-3xl pr-4 pt-4 pl-4 flex flex-col justify-between items-center h-[350px] group relative">
        <div class="text-center">
            <h3 class="font-medium mt-2">Tri Sukma Sarah</h3>
            <p class="text-sm text-gray-500">PT. Onitsuka | Teknik Informatika</p>
        </div>
        <div class="w-full mt-5 relative overflow-hidden rounded-lg flex-1 flex items-end">
            <img src="{{ asset('images/sarah.png') }}" alt="Tri Sukma Sarah"
                class="object-contain transition duration-300 h-[320px] w-full" />
        </div>
        <!-- Overlay with blur and button covering entire card -->
        <div
            class="absolute inset-0 bg-black/50 rounded-2xl custom-backdrop-blur opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center z-10">
            <a href="/profile/tri-sukma-sarah"
                class="bg-[#DEFC79] text-black px-4 py-2 rounded-lg text-sm font-medium hover:bg-[#c9eb5b] transition-colors">
                Lihat Profile
            </a>
        </div>
        <div
            class="absolute -bottom-2 -right-2 gradient-third-place-number text-white rounded-full w-6 h-6 sm:w-8 sm:h-8 flex items-center justify-center font-bold shadow-md">
            4
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        gsap.registerPlugin(ScrollTrigger);

        gsap.from(".team-card", {
            scrollTrigger: {
                trigger: ".team-grid",
                start: "top 80%",
            },
            y: 80,
            opacity: 0,
            duration: 1,
            stagger: 0.2,
            ease: "power3.out"
        });
    });
</script>