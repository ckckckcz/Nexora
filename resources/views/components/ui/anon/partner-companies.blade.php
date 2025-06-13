@php
$partnerCompanies = [
    'top' => [
        ['name' => 'PT Telkom Indonesia', 'logo' => 'https://upload.wikimedia.org/wikipedia/id/thumb/c/c4/Telkom_Indonesia_2013.svg/1200px-Telkom_Indonesia_2013.svg.png', 'color' => '#e74c3c'],
        ['name' => 'Bank Mandiri', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ad/Bank_Mandiri_logo_2016.svg/2560px-Bank_Mandiri_logo_2016.svg.png', 'color' => '#3498db'],
        ['name' => 'Gojek', 'logo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRXM76CoIdg8oou0g2V7u1sjwCz9WDbcT7mLQ&s', 'color' => '#00aa13'],
        ['name' => 'Tokopedia', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Logo-Tokopedia.png/1200px-Logo-Tokopedia.png', 'color' => '#42b883'],
        ['name' => 'BCA', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/Bank_Central_Asia.svg/1280px-Bank_Central_Asia.svg.png', 'color' => '#0066cc'],
        ['name' => 'Shopee', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fe/Shopee.svg/2560px-Shopee.svg.png', 'color' => '#ee4d2d'],
    ],
    'bottom' => [
        ['name' => 'Grab', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f6/Grab_Logo.svg/1200px-Grab_Logo.svg.png', 'color' => '#00b14f'],
        ['name' => 'Bukalapak', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5b/Bukalapak_%282020%29.svg/2560px-Bukalapak_%282020%29.svg.png', 'color' => '#e31e52'],
        ['name' => 'Traveloka', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/4/42/Logo_Traveloka.png', 'color' => '#3366cc'],
        ['name' => 'OVO', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/eb/Logo_ovo_purple.svg/2560px-Logo_ovo_purple.svg.png', 'color' => '#4c3494'],
        ['name' => 'Dana', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/72/Logo_dana_blue.svg/2560px-Logo_dana_blue.svg.png', 'color' => '#118eea'],
        ['name' => 'LinkAja', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/85/LinkAja.svg/2048px-LinkAja.svg.png', 'color' => '#ff6600'],
    ]
];
@endphp

<style>
@keyframes scroll-rtl-elegant {
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(-16.66%);
    }
}

@keyframes scroll-ltr-elegant {
    0% {
        transform: translateX(-16.66%);
    }
    100% {
        transform: translateX(0);
    }
}

.animate-scroll-rtl-elegant {
    animation: scroll-rtl-elegant 80s linear infinite;
    width: 600%;
}

.animate-scroll-ltr-elegant {
    animation: scroll-ltr-elegant 80s linear infinite;
    width: 600%;
}

.animate-scroll-rtl-elegant:hover,
.animate-scroll-ltr-elegant:hover {
    animation-play-state: paused;
}

/* Add smooth scroll behavior */
@media (prefers-reduced-motion: reduce) {
    .animate-scroll-rtl-elegant,
    .animate-scroll-ltr-elegant {
        animation: none;
    }
}
</style>

<section class="py-20 bg-gradient-to-b from-gray-50 to-white overflow-hidden relative">
    <!-- Background Decoration -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute top-20 left-10 w-32 h-32 bg-blue-500 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-10 w-40 h-40  rounded-full blur-3xl"></div>
    </div>
    
    <div class="w-full px-4 relative z-10">
        <div class="text-center mb-16">
            <div class="inline-block">
                <span class="text-sm font-semibold text-blue-900 bg-blue-100 px-4 py-2 rounded-full mb-4 inline-block tracking-wide uppercase">Partnership</span>
            </div>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 leading-tight">
                Perusahaan Mitra Kami
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
                Dipercaya oleh lebih dari <span class="font-semibold text-gray-900">100+ perusahaan terkemuka</span> di Indonesia untuk menemukan talenta terbaik
            </p>
        </div>
        
        <!-- Top Row - Right to Left Animation -->
        <div class="relative mb-12 overflow-hidden w-full">
            <div class="flex animate-scroll-rtl-elegant">
                @for($i = 0; $i < 6; $i++)
                    @foreach($partnerCompanies['top'] as $company)
                    <div class="flex-shrink-0 mx-4">
                        <div class="group bg-white rounded-2xl p-8 w-64 h-40 flex items-center justify-center transition-all duration-300 border-2 border-gray-100 hover:border-gray-200 relative overflow-hidden backdrop-blur-sm" style="border-top: 6px solid {{ $company['color'] }};">
                            <!-- Subtle gradient background -->
                            <div class="absolute inset-0 bg-gradient-to-br from-white via-gray-50 to-gray-100 opacity-60"></div>
                            <!-- Brand color accent -->
                            <div class="absolute top-0 left-0 w-full h-1.5 opacity-30" style="background: {{ $company['color'] }}"></div>
                            <img src="{{ $company['logo'] }}" alt="{{ $company['name'] }}" class="max-w-full max-h-24 object-contain filter brightness-110 contrast-110 relative z-10">
                        </div>
                    </div>
                    @endforeach
                @endfor
            </div>
        </div>
        
        <!-- Bottom Row - Left to Right Animation -->
        <div class="relative overflow-hidden w-full">
            <div class="flex animate-scroll-ltr-elegant">
                @for($i = 0; $i < 6; $i++)
                    @foreach($partnerCompanies['bottom'] as $company)
                    <div class="flex-shrink-0 mx-4">
                        <div class="group bg-white rounded-2xl p-8 w-64 h-40 flex items-center justify-center transition-all duration-300 border-2 border-gray-100 hover:border-gray-200 relative overflow-hidden backdrop-blur-sm" style="border-top: 6px solid {{ $company['color'] }};">
                            <!-- Subtle gradient background -->
                            <div class="absolute inset-0 bg-gradient-to-br from-white via-gray-50 to-gray-100 opacity-60"></div>
                            <!-- Brand color accent -->
                            <div class="absolute top-0 left-0 w-full h-1.5 opacity-30" style="background: {{ $company['color'] }}"></div>
                            <img src="{{ $company['logo'] }}" alt="{{ $company['name'] }}" class="max-w-full max-h-24 object-contain filter brightness-110 contrast-110 relative z-10">
                            <!-- Company name at bottom -->
                        </div>
                    </div>
                    @endforeach
                @endfor
            </div>
        </div>
    </div>
</section>
