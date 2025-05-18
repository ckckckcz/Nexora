<section class="relative lg:mt-24 mt-0">
    <div class="absolute -inset-x-2 -inset-y-2 right-1 bg-[#ddfc7994] rotate-2 -z-30"></div>
    <div class="absolute inset-0 bg-wine -z-20"></div>
    <section class="relative py-4 text-center lg:py-8 bg-blue-900 overflow-hidden">
        <div id="scroll-container-1" class="flex lg:gap-12 gap-8 whitespace-nowrap"></div>
    </section>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const scrollContainer = document.getElementById("scroll-container-1");
        if (!scrollContainer) return;

        let scrollPosition = 0;

        const animateScroll = () => {
            scrollPosition -= 1;
            scrollContainer.style.transform = `translateX(${scrollPosition}px)`;

            const firstChild = scrollContainer.firstElementChild;
            if (firstChild && firstChild.getBoundingClientRect().right < 0) {
                scrollContainer.appendChild(firstChild);
                scrollPosition += firstChild.offsetWidth;
            }

            requestAnimationFrame(animateScroll);
        };

        const cloneContent = () => {
            const children = Array.from(scrollContainer.children);
            children.forEach((child) => {
                const clone = child.cloneNode(true);
                scrollContainer.appendChild(clone);
            });
        };

        const items = [
            `<span class="text-white lg:text-[30px] text-xl font-semibold">Temukan Magang Impianmu</span>`,
            `<span class="text-white lg:text-[30px] text-xl font-semibold">✦</span>`,
            `<span class="text-white lg:text-[30px] text-xl font-semibold">Bangun Karier dari Sekarang</span>`,
            `<span class="text-white lg:text-[30px] text-xl font-semibold">✦</span>`,
            `<span class="text-white lg:text-[30px] text-xl font-semibold">Magang Berkualitas untuk Masa Depan Cerah</span>`,
            `<span class="text-white lg:text-[30px] text-xl font-semibold">✦</span>`,
            `<span class="text-white lg:text-[30px] text-xl font-semibold">Koneksi Profesional, Pengalaman Nyata</span>`,
            `<span class="text-white lg:text-[30px] text-xl font-semibold">✦</span>`
        ];


        for (let i = 0; i < 10; i++) {
            items.forEach((item) => {
                scrollContainer.innerHTML += item;
            });
        }

        cloneContent();
        animateScroll();
    });
</script>
