<section class="py-12 sm:py-16 lg:py-24 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
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
                    <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-black bg-[#DEFC79] rounded-e-full cursor-pointer border border-[#DEFC79] hover:bg-[#c9eb5b] focus:ring-4 focus:outline-none focus:ring-blue-300">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </div>
            </div>
        </form>
        <div class="flex mt-5 space-x-2">
            <button type="button" class="category-button">
                UI/UX
            </button>
            <button type="button" class="category-button">
                Front-End
            </button>
            <button type="button" class="category-button">
                Back-End
            </button>
            <button type="button" class="category-button">
                Project Manager
            </button>
            <button type="button" class="category-button">
                AI Engineer
            </button>
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
        button.style.border = 'none';
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
