<div class="bg-white border border-gray-200 rounded-2xl p-5 shadow-sm">
    <div class="flex justify-between items-center">
        <h3 class="text-sm font-medium text-gray-500">Skills</h3>
        <button onclick="toggleModal()" class="text-blue-900 hover:text-blue-950 cursor-pointer text-xs font-medium">
            Tambah Skill
        </button>
    </div>
    <div id="skills-list" class="mt-3 flex flex-wrap gap-2">
        <span class="px-3 py-1.5 text-sm bg-gray-100 rounded-lg text-gray-800 font-medium">React.js</span>
        <span class="px-3 py-1.5 text-sm bg-gray-100 rounded-lg text-gray-800 font-medium">Tailwind CSS</span>
        <span class="px-3 py-1.5 text-sm bg-gray-100 rounded-lg text-gray-800 font-medium">JavaScript</span>
        <span class="px-3 py-1.5 text-sm bg-gray-100 rounded-lg text-gray-800 font-medium">UI/UX Design</span>
        <span class="px-3 py-1.5 text-sm bg-gray-100 rounded-lg text-gray-800 font-medium">Figma</span>
        <span class="px-3 py-1.5 text-sm bg-gray-100 rounded-lg text-gray-800 font-medium">Framer</span>
        <span class="px-3 py-1.5 text-sm bg-gray-100 rounded-lg text-gray-800 font-medium">HTML/CSS</span>
        <span class="px-3 py-1.5 text-sm bg-blue-100 rounded-lg text-blue-800 font-medium">+5 more</span>
    </div>

    <!-- Modal Tambah Skill -->
    <div id="skill-modal"
        class="fixed inset-0 bg-black/50 flex items-center justify-center hidden opacity-0 transition-all duration-300 ease-in-out z-50">
        <div
            class="bg-white rounded-2xl p-6 max-w-md w-full mx-4 transform scale-95 transition-all duration-300 ease-in-out">
            <form action="/skills/store" method="POST" onsubmit="addSkill(event)">
                @csrf
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-gray-900">Tambah Skill</h3>
                    <button type="button" onclick="toggleModal()" class="text-gray-500 hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Input Skill -->
                <div class="mb-4">
                    <label for="skill-input" class="block text-sm font-medium text-gray-700">Skill Baru</label>
                    <input type="text" id="skill-input" name="skill"
                        class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Masukkan skill baru (maks 50 karakter)" maxlength="50">
                </div>

                <!-- Tombol Aksi -->
                <div class="flex justify-end gap-3 mt-6">
                    <button type="button" onclick="toggleModal()"
                        class="bg-gray-100 hover:bg-gray-200 text-blue-900 font-medium px-5 py-2 rounded-lg text-sm transition-colors">
                        Batal
                    </button>
                    <button type="submit"
                        class="bg-blue-900 hover:bg-blue-950 text-white font-medium px-5 py-2 rounded-lg text-sm transition-colors">
                        Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function toggleModal() {
        const modal = document.getElementById('skill-modal');
        modal.classList.toggle('hidden');
        if (!modal.classList.contains('hidden')) {
            modal.classList.remove('opacity-0');
            modal.querySelector('.transform').classList.remove('scale-95');
        } else {
            modal.classList.add('opacity-0');
            modal.querySelector('.transform').classList.add('scale-95');
        }
    }

    function addSkill(event) {
        event.preventDefault();
        const skillInput = document.getElementById('skill-input');
        const skill = skillInput.value.trim();
        if (skill) {
            const skillsList = document.getElementById('skills-list');
            const newSkill = document.createElement('span');
            newSkill.className = 'px-3 py-1.5 text-sm bg-gray-100 rounded-lg text-gray-800 font-medium';
            newSkill.textContent = skill;
            skillsList.insertBefore(newSkill, skillsList.lastElementChild); // Tambah sebelum "+5 more"
            skillInput.value = ''; // Reset input
            toggleModal(); // Tutup modal
            // Kirim data ke server (opsional, tergantung backend)
            fetch('/skills/store', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ skill: skill })
            }).then(response => {
                if (!response.ok) throw new Error('Gagal menyimpan skill');
            }).catch(error => console.error('Error:', error));
        }
    }
</script>

@if(isset($skills))
    <script>
        // Tambahkan skill dari backend jika ada
        const skillsList = document.getElementById('skills-list');
        @foreach($skills as $skill)
            const newSkill = document.createElement('span');
            newSkill.className = 'px-3 py-1.5 text-sm bg-gray-100 rounded-lg text-gray-800 font-medium';
            newSkill.textContent = '{{ $skill->name }}';
            skillsList.insertBefore(newSkill, skillsList.lastElementChild);
        @endforeach
    </script>
@endif