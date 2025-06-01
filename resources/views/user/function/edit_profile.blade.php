@extends('layouts.user')
@section('user')
    <!-- Profile Header with Background Image -->
    <section
        class="w-full bg-center bg-no-repeat bg-cover bg-[url('https://i.ibb.co.com/1JrpYCGV/profiel-header.png')] h-64 relative">
        <div class="absolute inset-0 bg-gradient-to-b from-black/60 to-black/30"></div>
    </section>

    <!-- Main Profile Content -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-24 relative z-10 pb-16">
        <div class="bg-white rounded-2xl shadow-lg p-6 sm:p-8">
            <form action="/profile/edit/{{ auth()->user()->username }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <!-- Profile Header -->
                <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">
                    Edit Profile
                </h1>
                <div class="flex mt-5 flex-col sm:flex-row justify-between items-start sm:items-end gap-6">
                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-6">
                        <!-- Image Input with Pencil Icon -->
                        <div class="relative group">
                            <img id="profile-preview"
                                class="w-32 h-32 rounded-full border-4 border-white shadow-md object-cover"
                                src="" alt="Profile Preview">
                            <label for="profile-image"
                                class="absolute bottom-1 right-2 bg-white text-blue-900 border rounded-full p-2 cursor-pointer transition-opacity duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                            </label>
                            <input type="file" id="profile_mahasiswa" name="profile_mahasiswa" accept="image/*"
                                onchange="previewImage(event)">
                        </div>
                    </div>
                </div>

                <!-- Other Inputs -->
                <div class="mt-6 grid grid-cols-1 gap-6">
                    <!-- Description -->
                    <div>
                        <label for="nama_mahasiswa" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" id="nama_mahasiswa" name="nama_mahasiswa" value="{{ old('nama_mahasiswa', $mahasiswa->nama_mahasiswa)}}" disabled
                            class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 bg-gray-100 cursor-not-allowed text-gray-900 text-sm focus:outline-none">
                    </div>
                    <div>
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" rows="4"
                            class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-blue-900 focus:border-blue-950"
                            placeholder="Masukkan deskripsi Anda">{{ old('deskripsi', $mahasiswa->deskripsi)}}</textarea>
                    </div>
                    <!-- Location -->
                    <div>
                        <label for="lokasi" class="block text-sm font-medium text-gray-700">Lokasi</label>
                        <input type="text" id="lokasi" name="lokasi" value="{{ old('lokasi', $mahasiswa->lokasi)}}"
                            class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Masukkan lokasi">
                    </div>
                    <!-- Email and Phone -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                            <input type="text" id="email" name="email" value="{{ old('email', $mahasiswa->user->email)}}" disabled
                            class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 bg-gray-100 cursor-not-allowed text-gray-900 text-sm focus:outline-none">
                        </div>
                        <div>
                            <label for="nomor_telepon" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                            <input type="tel" id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon', $mahasiswa->nomor_telepon)}}"
                                class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Masukkan nomor telepon">
                        </div>
                    </div>
                    <!-- Social Media -->
                    <div>
                        <label for="linkedin" class="block text-sm font-medium text-gray-700">LinkedIn</label>
                        <input type="url" id="linkedin" name="linkedin" value="{{ old('linkedin', $mahasiswa->linkedin) }}"
                            class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Masukkan link LinkedIn">
                    </div>
                    <div>
                        <label for="twitter" class="block text-sm font-medium text-gray-700">Twitter</label>
                        <input type="url" id="twitter" name="twitter" value="{{ old('twitter', $mahasiswa->twitter) }}"
                            class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Masukkan link Twitter">
                    </div>
                    <div>
                        <label for="github" class="block text-sm font-medium text-gray-700">GitHub</label>
                        <input type="url" id="github" name="github" value="{{ old('github', $mahasiswa->github) }}"
                            class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Masukkan link GitHub">
                    </div>
                    <div>
                        <label for="instagram" class="block text-sm font-medium text-gray-700">Instagram</label>
                        <input type="url" id="instagram" name="instagram" value="{{ old('instagram', $mahasiswa->instagram) }}" 
                            class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Masukkan link Instagram">
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-wrap gap-3 mt-8">
                    <button type="submit"
                        class="inline-flex items-center bg-[#DEFC79] hover:bg-[#c9eb5b] text-blue-900 font-medium px-5 py-2.5 rounded-xl transition-colors text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Simpan
                    </button>
                    <a href="/profile/{{auth()->user()->username}}"
                        class="inline-flex items-center bg-gray-100 hover:bg-gray-200 text-blue-900 font-medium px-5 py-2.5 rounded-xl transition-colors text-sm">
                        <svg class="h-4 w-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18 17.94 6M18 18 6.06 6" />
                        </svg>
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </section>

    <!-- JavaScript for Image Preview -->
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function () {
                const output = document.getElementById('profile-preview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection