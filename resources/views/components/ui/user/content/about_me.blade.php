<div class="bg-gray-50 p-6 rounded-2xl border border-gray-200">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-bold text-gray-900">Tentang Saya</h2>
        <button onclick="toggleModal()"
            class="text-white bg-blue-900 px-5 cursor-pointer rounded-lg py-2 hover:bg-blue-950 text-sm font-medium">
            Edit
        </button>
    </div>
    <p class="text-gray-700">
        With a strong foundation in software development and a keen eye for user experience, I am passionate about
        creating intuitive and engaging digital experiences. Currently pursuing a degree in Informatics Engineering at
        State Polytechnic of Malang, I specialize in frontend web development and UI/UX design.
    </p>
    <p class="text-gray-700 mt-4">
        As a member of Workshop Riset Informatika, I collaborate with peers on innovative projects that solve real-world
        problems. I'm particularly enthusiastic about Framer for prototyping and design, and I'm constantly expanding my
        skills in modern web technologies.
    </p>

    <!-- Modal -->
    <div id="about-me-modal"
        class="fixed inset-0 bg-black/50 flex items-center justify-center hidden opacity-0 transition-all duration-300 ease-in-out z-50">
        <div
            class="bg-white rounded-2xl p-6 max-w-lg w-full mx-4 transform scale-95 transition-all duration-300 ease-in-out">
            <form action="/profile/about-me/update" method="POST">
                @csrf
                @method('PATCH')
                <h3 class="text-lg font-bold text-gray-900 mb-4">Edit Tentang Saya</h3>
                <textarea id="about-me-text" name="about_me"
                    class="w-full min-h-[100px] max-h-[50vh] border border-gray-300 rounded-lg px-3 py-2 text-sm text-gray-700 focus:ring-blue-500 focus:border-blue-500 resize-none"
                    placeholder="Masukkan deskripsi tentang Anda">With a strong foundation in software development and a keen eye for user experience, I am passionate about creating intuitive and engaging digital experiences. Currently pursuing a degree in Informatics Engineering at State Polytechnic of Malang, I specialize in frontend web development and UI/UX design.

As a member of Workshop Riset Informatika, I collaborate with peers on innovative projects that solve real-world problems. I'm particularly enthusiastic about Framer for prototyping and design, and I'm constantly expanding my skills in modern web technologies.</textarea>
                <div class="flex justify-end gap-3 mt-6">
                    <button type="button" onclick="toggleModal()"
                        class="bg-gray-100 hover:bg-gray-200 text-blue-900 font-medium px-5 py-2 rounded-lg text-sm transition-colors">
                        Batal
                    </button>
                    <button type="submit"
                        class="bg-blue-900 hover:bg-blue-950 text-white font-medium px-5 py-2 rounded-lg text-sm transition-colors">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function toggleModal() {
        const modal = document.getElementById('about-me-modal');
        modal.classList.toggle('hidden');
        if (!modal.classList.contains('hidden')) {
            modal.classList.remove('opacity-0');
            modal.querySelector('.transform').classList.remove('scale-95');
            resizeTextarea(); // Resize textarea saat modal dibuka
        } else {
            modal.classList.add('opacity-0');
            modal.querySelector('.transform').classList.add('scale-95');
        }
    }

    function resizeTextarea() {
        const textarea = document.getElementById('about-me-text');
        textarea.style.height = 'auto'; // Reset tinggi
        textarea.style.height = `${Math.min(textarea.scrollHeight, window.innerHeight * 0.5)}px`; // Sesuaikan dengan scrollHeight atau max-h-[50vh]
    }

    // Panggil resize saat halaman dimuat dan saat input berubah
    document.addEventListener('DOMContentLoaded', () => {
        const textarea = document.getElementById('about-me-text');
        resizeTextarea();
        textarea.addEventListener('input', resizeTextarea);
    });
</script>