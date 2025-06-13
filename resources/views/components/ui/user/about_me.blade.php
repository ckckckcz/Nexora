<div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center space-x-3">
            <div class="h-10 w-1.5 bg-blue-900 rounded-full"></div>
            <h3 class="text-xl font-bold text-gray-800">Tentang Saya</h3>
        </div>
        @if (auth()->user()->username == $mahasiswa->nim)
        <button id="editAboutBtn" onclick="toggleEditAbout()" 
                class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition-colors duration-200">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
            </svg>
            Edit
        </button>
        @endif
    </div>

    <!-- Display Mode -->
    <div id="aboutDisplay" class="space-y-4">
        <div>
            <p id="aboutDescription" class="text-gray-600 leading-relaxed text-justify">
                {{ $mahasiswa->deskripsi ?? 'Belum ada deskripsi tentang diri Anda. Klik tombol Edit untuk menambahkan informasi tentang diri Anda, pengalaman, keahlian, dan tujuan karir.' }}
            </p>
        </div>
    </div>

    <!-- Edit Mode -->
    @if (auth()->user()->username == $mahasiswa->nim)
    <div id="aboutEdit" class="hidden space-y-4">
        <div>
            <label for="editDescription" class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi Tentang Diri Anda</label>
            <textarea id="editDescription" rows="6" 
                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 resize-none"
                      placeholder="Ceritakan tentang diri Anda, pengalaman, keahlian, minat, dan tujuan karir Anda...">{{ $mahasiswa->deskripsi }}</textarea>
            <p class="text-xs text-gray-500 mt-1">Minimal 50 karakter. Deskripsikan diri Anda secara profesional.</p>
        </div>

        <div class="flex items-center space-x-3 pt-4">
            <button onclick="saveAboutChanges()" 
                    class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition-colors duration-200">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                Simpan
            </button>
            <button onclick="cancelEditAbout()" 
                    class="inline-flex items-center px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-lg transition-colors duration-200">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
                Batal
            </button>
        </div>
    </div>
    @endif
</div>

<script>
// About Me Edit Functionality
function toggleEditAbout() {
    const displayMode = document.getElementById('aboutDisplay');
    const editMode = document.getElementById('aboutEdit');
    const editBtn = document.getElementById('editAboutBtn');
    
    if (editMode.classList.contains('hidden')) {
        // Switch to edit mode
        displayMode.classList.add('hidden');
        editMode.classList.remove('hidden');
        editBtn.innerHTML = `
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
            Batal
        `;
        editBtn.onclick = cancelEditAbout;
    }
}

function cancelEditAbout() {
    const displayMode = document.getElementById('aboutDisplay');
    const editMode = document.getElementById('aboutEdit');
    const editBtn = document.getElementById('editAboutBtn');
    
    // Reset form value to original
    const originalText = document.getElementById('aboutDescription').textContent.trim();
    document.getElementById('editDescription').value = originalText;
    
    // Switch back to display mode
    editMode.classList.add('hidden');
    displayMode.classList.remove('hidden');
    editBtn.innerHTML = `
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
        </svg>
        Edit
    `;
    editBtn.onclick = toggleEditAbout;
}

function saveAboutChanges() {
    const description = document.getElementById('editDescription').value.trim();
    
    // Validation
    if (!description) {
        showNotification('Deskripsi tidak boleh kosong!', 'error');
        return;
    }
    
    if (description.length < 50) {
        showNotification('Deskripsi minimal 50 karakter!', 'error');
        return;
    }
    
    // Prepare data
    const aboutData = {
        description: description,
        lastUpdated: new Date().toISOString()
    };
    
    // Save to localStorage
    const userKey = `about_me_{{ auth()->user()->username }}`;
    localStorage.setItem(userKey, JSON.stringify(aboutData));
    
    // Update display
    document.getElementById('aboutDescription').textContent = description;
    
    // Switch back to display mode
    cancelEditAbout();
    
    // Show success message
    showNotification('Deskripsi berhasil disimpan!', 'success');
}

function showNotification(message, type = 'info') {
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 px-6 py-4 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-300 ${
        type === 'success' ? 'bg-green-500 text-white' :
        type === 'error' ? 'bg-red-500 text-white' :
        'bg-blue-500 text-white'
    }`;
    notification.innerHTML = `
        <div class="flex items-center space-x-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                ${type === 'success' ? 
                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>' :
                    type === 'error' ?
                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>' :
                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>'
                }
            </svg>
            <span>${message}</span>
        </div>
    `;
    
    document.body.appendChild(notification);
    
    // Animate in
    setTimeout(() => {
        notification.classList.remove('translate-x-full');
    }, 100);
    
    // Remove after 3 seconds
    setTimeout(() => {
        notification.classList.add('translate-x-full');
        setTimeout(() => {
            if (notification.parentNode) {
                notification.parentNode.removeChild(notification);
            }
        }, 300);
    }, 3000);
}

// Load saved data on page load
document.addEventListener('DOMContentLoaded', function() {
    const userKey = `about_me_{{ auth()->user()->username }}`;
    const savedData = localStorage.getItem(userKey);
    
    if (savedData) {
        try {
            const data = JSON.parse(savedData);
            
            // Update display elements
            if (data.description) {
                document.getElementById('aboutDescription').textContent = data.description;
            }
            
            // Update form elements
            if (document.getElementById('editDescription')) {
                document.getElementById('editDescription').value = data.description || '';
            }
        } catch (e) {
            console.error('Error loading saved about data:', e);
        }
    }
});
</script>