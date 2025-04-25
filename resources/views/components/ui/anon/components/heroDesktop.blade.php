<div class="grid grid-cols-5 gap-4 w-full items-end team-grid">
    <div class="bg-blue-900 team-card text-white rounded-3xl pr-4 pt-4 pl-4 flex flex-col justify-between items-center transform hover:scale-105 transition-transform h-full">
        <div class="text-center">
            <h3 class="font-medium mt-2">Riovaldo Alfiyan Fahmi Rahman</h3>
            <p class="text-sm text-gray-300">Front-End</p>
        </div>
        <div class="w-full mt-5 relative overflow-hidden rounded-lg flex-1 flex items-end">
            <img src="{{ asset('images/riovaldo.png') }}" alt="Sabrina Uliyana" class="object-contain filter grayscale hover:grayscale-0 transition duration-300 w-full" />
        </div>
    </div>          
    <div class="bg-blue-900 team-card text-white rounded-3xl pr-4 pt-4 pl-4 flex flex-col justify-between items-center transform hover:scale-105 transition-transform h-[400px]">
        <div class="text-center">
            <h3 class="font-medium mt-2">Ayu Lestari</h3>
            <p class="text-sm text-gray-300">Data Analyst</p>
        </div>
        <div class="w-full mt-5 relative overflow-hidden rounded-lg flex-1 flex items-end">
            <img src="{{ asset('images/riovaldo.png') }}" alt="Ayu Lestari" class="object-contain filter grayscale hover:grayscale-0 transition duration-300 h-[310px] w-full" />
        </div>
    </div>
    <div class="bg-blue-900 team-card text-white rounded-3xl pr-4 pt-4 pl-4 flex flex-col justify-between items-center transform hover:scale-105 transition-transform h-[350px]">
        <div class="text-center">
            <h3 class="font-medium mt-2">Tri Sukma Sarah</h3>
            <p class="text-sm text-gray-300">Web Developer</p>
        </div>
        <div class="w-full mt-5 relative overflow-hidden rounded-lg flex-1 flex items-end">
            <img src="{{ asset('images/sarah.png') }}" alt="Budi Pratama" class="object-contain filter grayscale hover:grayscale-0 transition duration-300 h-[320px] w-full" />
        </div>
    </div>
    <div class="bg-blue-900 team-card text-white rounded-3xl pr-4 pt-4 pl-4 flex flex-col justify-between items-center transform hover:scale-105 transition-transform h-[400px]">
        <div class="text-center">
            <h3 class="font-medium mt-2">Ayu Lestari</h3>
            <p class="text-sm text-gray-300">Data Analyst</p>
        </div>
        <div class="w-full mt-5 relative overflow-hidden rounded-lg flex-1 flex items-end">
            <img src="{{ asset('images/riovaldo.png') }}" alt="Ayu Lestari" class="object-contain filter grayscale hover:grayscale-0 transition duration-300 h-[310px] w-full" />
        </div>
    </div>
    <div class="bg-blue-900 team-card text-white rounded-3xl pr-4 pt-4 pl-4 flex flex-col justify-between items-center transform hover:scale-105 transition-transform h-full">
        <div class="text-center">
            <h3 class="font-medium mt-2">Cakra Wangsa</h3>
            <p class="text-sm text-gray-300">UI/UX Designer</p>
        </div>
        <div class="w-full mt-5 relative overflow-hidden rounded-lg flex-1 flex items-end">
            <img src="{{ asset('images/cakra.png') }}" alt="Sabrina Uliyana" class="object-contain filter grayscale hover:grayscale-0 transition duration-300 w-full" />
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