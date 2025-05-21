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
            <!-- Profile Header -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end gap-6">
                <div class="flex flex-col sm:flex-row items-start sm:items-center gap-6">
                    <img class="w-32 h-32 rounded-full border-4 border-white shadow-md object-cover"
                        src="https://randomuser.me/api/portraits/women/44.jpg" alt="Riovaldo Alfiyan's Profile Photo">
                    <div>
                        <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 mt-2 sm:mt-0">Riovaldo Alfiyan Fahmi Rahman
                        </h1>
                        <p class="text-gray-600 mt-1 max-w-2xl">
                            Informatics Engineering Student at State Polytechnic of Malang | Frontend Web Developer | UI/UX
                            Designer | Framer Designer Enthusiast | Member of Workshop Riset Informatika
                        </p>
                        <div class="flex items-center gap-3 mt-2">
                            <span class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                Indonesia, Malang
                            </span>
                            <span class="flex items-center text-blue-900 font-semibold">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                2,000 pengikut
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap gap-3 lg:mt-8">
                <a href="/profile/edit"
                    class="inline-flex items-center bg-[#DEFC79] hover:bg-[#c9eb5b] text-blue-900 font-medium px-5 py-2.5 rounded-xl transition-colors text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                    Edit
                </a>
                <a href="#"
                    class="inline-flex items-center bg-gray-100 hover:bg-gray-200 text-blue-900 font-medium px-5 py-2.5 rounded-xl transition-colors text-sm">
                    <svg class="h-4 w-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18 17.94 6M18 18 6.06 6" />
                    </svg>

                    Batal Edit
                </a>
            </div>
        </div>
    </section>

@endsection