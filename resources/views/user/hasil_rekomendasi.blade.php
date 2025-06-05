@extends('layouts.spk')
@section('spk')
    <form action="/rekomendasi-magang/tambah" method="POST">
        @csrf
        <div class="min-h-screen bg-white p-4 md:p-8 justify-center items-center flex">
            <div class="max-w-4xl mx-auto">
                <!-- Step 3: Hasil -->
                <div id="step-3" class="step-content">
                    <header class="mb-8 text-left">
                        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">Hasil Rekomendasi Magang</h1>
                        <p class="text-gray-600">
                            Berikut adalah rekomendasi magang berdasarkan kriteria yang Anda pilih.
                        </p>
                    </header>

                    <div id="result-card" class="max-w-7xl w-full p-6 bg-white border border-gray-200 rounded-xl shadow-sm">
                        <h5 class="mb-1 text-2xl font-bold tracking-tight text-gray-900">Rekomendasi Magang</h5>
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">Skor Kecocokan:</h3>
                            <table class="table-auto border-collapse border border-gray-300 w-full">
                                <thead>
                                    <tr>
                                        <th class="border border-gray-300 px-4 py-2">ID Mahasiswa</th>
                                        <th class="border border-gray-300 px-4 py-2">ID Lowongan</th>
                                        <th class="border border-gray-300 px-4 py-2">Skor Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($skorKecocokan as $skor)
                                        <tr>
                                            <td class="border border-gray-300 px-4 py-2">{{ $skor->id_mahasiswa }}</td>
                                            <td class="border border-gray-300 px-4 py-2">{{ $skor->id_lowongan }}</td>
                                            <td class="border border-gray-300 px-4 py-2">{{ $skor->skor_total }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- <div class="mt-8 text-center">
                        <a href="/rekomendasi-magang/">
                            <button
                                class="px-6 py-3 rounded-lg cursor-pointer font-medium text-gray-800 border border-gray-300 shadow-lg transition-all duration-200 hover:bg-gray-100">
                                Ulangi
                            </button>
                        </a>
                    </div> --}}
                </div>
            </div>
        </div>
    </form>
@endsection