@extends('layouts.admin')
@section('admin')
    <div class="min-h-screen bg-gray-50 p-4 sm:p-6 lg:p-8">
        <header class="mb-8">
            <h1 class="text-3xl font-bold text-blue-900">Edit Data Dosen 👨‍🏫</h1>
        </header>

        <section class="bg-white rounded-2xl border border-gray-200 transition-shadow duration-300 hover:shadow-lg">
            <div class="p-4 sm:p-6 flex flex-col gap-6">
                <form action="/admin/profile/dosen/edit/{{ $dosen->id_dosen }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-6">
                    @csrf
                    @method('PUT')
                    <!-- NIDN dan Nama Dosen -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div class="flex flex-col gap-2">
                            <label for="nidn"
                                class="text-sm font-medium text-gray-700 transition-colors duration-200">NIDN</label>
                            <input type="text" id="nidn" name="nidn"
                                class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm transition-colors duration-200"
                                placeholder="Masukkan NIDN (contoh: 1234567890)" value={{ old('nidn', $dosen->nidn) }} required maxlength="10">
                            @error('nidn')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="nama_dosen"
                                class="text-sm font-medium text-gray-700 transition-colors duration-200">Nama Dosen</label>
                            <input type="text" id="nama_dosen" name="nama_dosen"
                                class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm transition-colors duration-200"
                                placeholder="Masukkan Nama Dosen" value="{{ old('nama_dosen', $dosen->nama_dosen) }}" required maxlength="100">
                            @error('nama_dosen')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Program Studi -->
                    <div class="flex flex-col gap-2">
                        <label for="id_program_studi"
                            class="text-sm font-medium text-gray-700 transition-colors duration-200">Program Studi</label>
                        <div class="relative">
                            <select id="id_program_studi" name="id_program_studi"
                                class="appearance-none block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm transition-colors duration-200 bg-white cursor-pointer"
                                required>
                                <option value="" disabled selected>Pilih Program Studi</option>
                                @foreach($prodis as $prodi)
                                    <option value="{{ $prodi->id_program_studi }}" {{ old('id_program_studi', $prodi->id_program_studi) == $dosen->id_program_studi ? 'selected' : '' }}>{{ $prodi->nama_program_studi }}</option>
                                @endforeach
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4 transition-transform duration-200"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                        @error('id_program_studi')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Jurusan -->
                    <div class="flex flex-col gap-2">
                        <label for="jurusan"
                            class="text-sm font-medium text-gray-700 transition-colors duration-200">Jurusan</label>
                        <input type="text" id="jurusan" name="jurusan"
                            class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm transition-colors duration-200"
                            value="Teknologi Informasi" readonly required maxlength="100">
                        @error('jurusan')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Tanda Tangan -->
                    <div class="flex flex-col gap-3">
                        <label class="text-sm font-medium text-gray-700">Tanda Tangan</label>
                        @if($dosen->tanda_tangan)
                            <img src="{{ Storage::url($dosen->tanda_tangan) }}" alt="Tanda Tangan {{ $dosen->nama_dosen }}" class="max-h-48 rounded-lg shadow-sm">
                        @else
                            <p class="text-sm text-gray-500">Tanda tangan belum tersedia.</p>
                        @endif

                        <!-- Tab Navigation -->
                        <div class="flex border-b border-gray-200">
                            <button type="button" id="tab-upload"
                                class="px-4 py-2 text-sm font-medium text-blue-900 border-b-2 border-blue-900 focus:outline-none transition-colors duration-200">
                                Upload Gambar
                            </button>
                            <button type="button" id="tab-draw"
                                class="px-4 py-2 text-sm font-medium text-gray-500 hover:text-gray-700 focus:outline-none transition-colors duration-200">
                                Buat Tanda Tangan
                            </button>
                        </div>

                        <!-- Upload Image Tab -->
                        <div id="content-upload" class="py-3">
                            <div class="flex flex-col gap-3">
                                <div
                                    class="relative border-2 border-dashed border-gray-300 rounded-xl p-20 transition-colors duration-200 hover:border-gray-400 bg-gray-50">
                                    <input type="file" id="signature-upload" name="tanda_tangan" accept="image/*"
                                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                                        onchange="previewSignature(event)">
                                    <div class="text-center" id="upload-placeholder">
                                        <svg class="mx-auto h-10 w-10 text-gray-400" stroke="currentColor" fill="none"
                                            viewBox="0 0 48 48" aria-hidden="true">
                                            <path
                                                d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex flex-col items-center text-sm text-gray-600 mt-2">
                                            <p>Klik untuk upload atau seret gambar ke sini</p>
                                            <p class="text-xs text-gray-500 mt-1">PNG, JPG, GIF hingga 2MB</p>
                                        </div>
                                    </div>
                                    <div id="preview-container" class="hidden flex justify-center">
                                        <div class="relative">
                                            <img id="signature-preview" class="max-h-48 rounded-lg shadow-sm"
                                                src="/placeholder.svg" alt="Preview tanda tangan">
                                            <button type="button" onclick="removeSignature()"
                                                class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full p-1 shadow-sm hover:bg-red-600 transition-colors duration-200 focus:outline-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="signature-upload-data" name="signature_upload_data">
                            </div>
                        </div>

                        <!-- Draw Signature Tab -->
                        <div id="content-draw" class="py-3 hidden">
                            <div class="flex flex-col gap-3">
                                <div class="border border-gray-300 rounded-lg bg-white">
                                    <div class="relative">
                                        <canvas id="signature-pad"
                                            class="w-full h-62 rounded-lg cursor-crosshair touch-none"></canvas>
                                        <div id="signature-pad-placeholder"
                                            class="absolute inset-0 flex items-center justify-center text-gray-400 pointer-events-none">
                                            <span class="text-sm">Klik dan geser untuk membuat tanda tangan</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex gap-2">
                                    <button type="button" id="clear-signature"
                                        class="px-3 py-1.5 text-xs text-gray-700 bg-gray-100 rounded hover:bg-gray-200 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-gray-300">
                                        Hapus
                                    </button>
                                    <button type="button" id="save-signature"
                                        class="px-3 py-1.5 text-xs text-white bg-blue-900 rounded hover:bg-blue-950 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-300">
                                        Simpan Tanda Tangan
                                    </button>
                                </div>
                                <input type="hidden" id="signature-pad-data" name="signature_pad_data">
                            </div>
                        </div>

                        <!-- Signature Method Selection -->
                        <input type="hidden" id="signature-method" name="signature_method" value="upload">

                        @error('tanda_tangan')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <script>
                        // Tab switching functionality
                        const tabUpload = document.getElementById('tab-upload');
                        const tabDraw = document.getElementById('tab-draw');
                        const contentUpload = document.getElementById('content-upload');
                        const contentDraw = document.getElementById('content-draw');
                        const signatureMethod = document.getElementById('signature-method');

                        tabUpload.addEventListener('click', () => {
                            // Update active tab
                            tabUpload.classList.add('text-blue-900', 'border-b-2', 'border-blue-900');
                            tabUpload.classList.remove('text-gray-500');
                            tabDraw.classList.remove('text-blue-900', 'border-b-2', 'border-blue-900');
                            tabDraw.classList.add('text-gray-500');

                            // Show/hide content
                            contentUpload.classList.remove('hidden');
                            contentDraw.classList.add('hidden');

                            // Update method
                            signatureMethod.value = 'upload';
                        });

                        tabDraw.addEventListener('click', () => {
                            // Update active tab
                            tabDraw.classList.add('text-blue-900', 'border-b-2', 'border-blue-900');
                            tabDraw.classList.remove('text-gray-500');
                            tabUpload.classList.remove('text-blue-900', 'border-b-2', 'border-blue-900');
                            tabUpload.classList.add('text-gray-500');

                            // Show/hide content
                            contentDraw.classList.remove('hidden');
                            contentUpload.classList.add('hidden');

                            // Update method
                            signatureMethod.value = 'draw';

                            // Initialize canvas if not already
                            initializeCanvas();
                        });

                        // File Upload Preview
                        function previewSignature(event) {
                            const file = event.target.files[0];
                            if (file) {
                                const reader = new FileReader();
                                reader.onload = function (e) {
                                    const preview = document.getElementById('signature-preview');
                                    preview.src = e.target.result;

                                    // Store base64 data
                                    document.getElementById('signature-upload-data').value = e.target.result;

                                    // Show preview, hide placeholder
                                    document.getElementById('preview-container').classList.remove('hidden');
                                    document.getElementById('upload-placeholder').classList.add('hidden');
                                }
                                reader.readAsDataURL(file);
                            }
                        }

                        function removeSignature() {
                            // Clear file input
                            document.getElementById('signature-upload').value = '';

                            // Clear hidden input
                            document.getElementById('signature-upload-data').value = '';

                            // Hide preview, show placeholder
                            document.getElementById('preview-container').classList.add('hidden');
                            document.getElementById('upload-placeholder').classList.remove('hidden');
                        }

                        // Canvas Drawing
                        let canvas, ctx, isDrawing = false;
                        let hasSignature = false;

                        function initializeCanvas() {
                            canvas = document.getElementById('signature-pad');
                            const container = canvas.parentElement;

                            // Set canvas dimensions to match container
                            canvas.width = container.offsetWidth;
                            canvas.height = container.offsetHeight;

                            ctx = canvas.getContext('2d');
                            ctx.lineWidth = 2;
                            ctx.lineCap = 'round';
                            ctx.strokeStyle = '#000';

                            // Mouse events
                            canvas.addEventListener('mousedown', startDrawing);
                            canvas.addEventListener('mousemove', draw);
                            canvas.addEventListener('mouseup', stopDrawing);
                            canvas.addEventListener('mouseout', stopDrawing);

                            // Touch events
                            canvas.addEventListener('touchstart', startDrawingTouch);
                            canvas.addEventListener('touchmove', drawTouch);
                            canvas.addEventListener('touchend', stopDrawing);

                            // Clear button
                            document.getElementById('clear-signature').addEventListener('click', clearCanvas);

                            // Save button
                            document.getElementById('save-signature').addEventListener('click', saveSignature);
                        }

                        function startDrawing(e) {
                            isDrawing = true;
                            ctx.beginPath();
                            ctx.moveTo(e.offsetX, e.offsetY);

                            // Hide placeholder on first draw
                            if (!hasSignature) {
                                document.getElementById('signature-pad-placeholder').style.display = 'none';
                                hasSignature = true;
                            }
                        }

                        function draw(e) {
                            if (!isDrawing) return;
                            ctx.lineTo(e.offsetX, e.offsetY);
                            ctx.stroke();
                        }

                        function startDrawingTouch(e) {
                            e.preventDefault();
                            const touch = e.touches[0];
                            const rect = canvas.getBoundingClientRect();
                            const offsetX = touch.clientX - rect.left;
                            const offsetY = touch.clientY - rect.top;

                            isDrawing = true;
                            ctx.beginPath();
                            ctx.moveTo(offsetX, offsetY);

                            // Hide placeholder on first draw
                            if (!hasSignature) {
                                document.getElementById('signature-pad-placeholder').style.display = 'none';
                                hasSignature = true;
                            }
                        }

                        function drawTouch(e) {
                            e.preventDefault();
                            if (!isDrawing) return;

                            const touch = e.touches[0];
                            const rect = canvas.getBoundingClientRect();
                            const offsetX = touch.clientX - rect.left;
                            const offsetY = touch.clientY - rect.top;

                            ctx.lineTo(offsetX, offsetY);
                            ctx.stroke();
                        }

                        function stopDrawing() {
                            isDrawing = false;
                        }

                        function clearCanvas() {
                            ctx.clearRect(0, 0, canvas.width, canvas.height);
                            document.getElementById('signature-pad-data').value = '';
                            document.getElementById('signature-pad-placeholder').style.display = 'flex';
                            hasSignature = false;
                        }

                        function saveSignature() {
                            if (!hasSignature) {
                                alert('Silakan buat tanda tangan terlebih dahulu');
                                return;
                            }

                            const dataURL = canvas.toDataURL('image/png');
                            document.getElementById('signature-pad-data').value = dataURL;

                            // Visual feedback
                            const saveBtn = document.getElementById('save-signature');
                            const originalText = saveBtn.textContent;
                            saveBtn.textContent = 'Tersimpan ✓';
                            saveBtn.classList.remove('bg-blue-900', 'hover:bg-blue-950');
                            saveBtn.classList.add('bg-green-600', 'hover:bg-green-700');

                            setTimeout(() => {
                                saveBtn.textContent = originalText;
                                saveBtn.classList.remove('bg-green-600', 'hover:bg-green-700');
                                saveBtn.classList.add('bg-blue-900', 'hover:bg-blue-950');
                            }, 1500);
                        }

                        // Handle window resize for canvas
                        window.addEventListener('resize', function () {
                            if (canvas) {
                                const container = canvas.parentElement;
                                const oldData = canvas.toDataURL('image/png');

                                // Resize canvas
                                canvas.width = container.offsetWidth;
                                canvas.height = container.offsetHeight;

                                // Restore drawing
                                const img = new Image();
                                img.onload = function () {
                                    ctx.drawImage(img, 0, 0);
                                };
                                img.src = oldData;
                            }
                        });
                    </script>

                    <!-- Submit and Cancel Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3 pt-1">
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-blue-900 text-white rounded-lg hover:bg-blue-950 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200 text-sm">
                            Simpan
                        </button>
                        <a href="/admin/manajemen-akun/mahasiswa"
                            class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 transition-colors duration-200 text-center">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </section>
    </div>

    <script>
        // Script untuk animasi dropdown yang minimalis
        document.addEventListener('DOMContentLoaded', function () {
            const selects = document.querySelectorAll('select');

            selects.forEach(select => {
                // Tambahkan event listener untuk focus
                select.addEventListener('focus', function () {
                    const arrow = this.parentElement.querySelector('svg');
                    arrow.style.transform = 'rotate(180deg)';
                });

                // Tambahkan event listener untuk blur
                select.addEventListener('blur', function () {
                    const arrow = this.parentElement.querySelector('svg');
                    arrow.style.transform = 'rotate(0deg)';
                });
            });
        });
    </script>
@endsection