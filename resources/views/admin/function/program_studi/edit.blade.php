@extends('layouts.admin')
@section('admin')
    <div class="min-h-screen bg-gray-50 p-4 sm:p-6 lg:p-8">
        <header class="mb-8">
            <h1 class="text-3xl font-bold text-blue-900">Edit Data Program Studi 📚</h1>
        </header>

        <section class="bg-white rounded-2xl border border-gray-200 transition-shadow duration-300 hover:shadow-lg">
            <div class="p-4 sm:p-6 flex flex-col gap-6">
                <form action="/admin/program-studi/edit/{{ $programStudi->id_program_studi }}" method="POST" class="flex flex-col gap-6">
                    @csrf
                    @method('PUT')
                    <!-- Kode Program Studi -->
                    <div class="flex flex-col gap-2">
                        <label for="kode_program_studi"
                            class="text-sm font-medium text-gray-700 transition-colors duration-200">Kode Program Studi</label>
                        <input type="text" id="kode_program_studi" name="kode_program_studi"
                            class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm transition-colors duration-200"
                            placeholder="Masukkan Kode Program Studi (contoh: TI001)" value="{{ old('kode_program_studi', $programStudi->kode_program_studi) }}" required maxlength="10">
                        @error('kode_program_studi')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Nama Program Studi -->
                    <div class="flex flex-col gap-2">
                        <label for="nama_program_studi"
                            class="text-sm font-medium text-gray-700 transition-colors duration-200">Nama Program Studi</label>
                        <input type="text" id="nama_program_studi" name="nama_program_studi"
                            class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm transition-colors duration-200"
                            placeholder="Masukkan Nama Program Studi" required value="{{ old('kode_program_studi', $programStudi->nama_program_studi) }}" maxlength="100">
                        @error('nama_program_studi')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Submit and Cancel Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3 pt-1">
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-blue-900 text-white rounded-lg hover:bg-blue-950 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200 text-sm">
                            Simpan
                        </button>
                        <a href="/admin/program-studi"
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