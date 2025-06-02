@extends('layouts.user')
@section('user')
<div class="flex justify-center px-4 gap-8">
    <div class="lg:col-span-2 space-y-8">
        <div class="bg-white border border-gray-200 rounded-2xl p-6">
            <div class="flex items-center space-x-3 mb-6">
                <div class="h-10 w-1.5 bg-blue-900 rounded-full"></div>
                <h3 class="text-xl font-bold text-gray-800">Tambah Log Aktivitas</h3>
            </div>

            <form action="/log-aktivitas/store" method="POST" class="mt-6 space-y-5">
                @csrf

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div class="space-y-1.5">
                        <label for="jam_masuk" class="block text-sm font-medium text-gray-700">Jam
                            Masuk</label>
                        <input type="time" name="jam_masuk" id="jam_masuk" required
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-300 text-gray-700 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-900/20 focus:border-blue-900 transition-all duration-200">
                    </div>
                    <div class="space-y-1.5">
                        <label for="jam_pulang" class="block text-sm font-medium text-gray-700">Jam
                            Pulang</label>
                        <input type="time" name="jam_pulang" id="jam_pulang" required
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-300 text-gray-700 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-900/20 focus:border-blue-900 transition-all duration-200">
                    </div>
                </div>

                <div class="space-y-1.5">
                    <label for="kegiatan" class="block text-sm font-medium text-gray-700">Kegiatan</label>
                    <textarea name="kegiatan" id="kegiatan" rows="4" required
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-300 text-gray-700 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-900/20 focus:border-blue-900 transition-all duration-200"></textarea>
                </div>

                <input type="hidden" name="status_log" value="diterima">

                <div class="pt-2">
                    <button type="submit"
                        class="inline-flex items-center justify-center bg-blue-900 hover:bg-blue-950 cursor-pointer active:bg-blue-950 text-white font-medium px-6 py-3 rounded-xl transition-colors duration-200 w-full sm:w-auto">
                        Simpan Log Aktivitas
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection