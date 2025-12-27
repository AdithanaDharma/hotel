<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Galeri - Calluella House</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/@fortawesome/fontawesome-free@6.2.0/css/all.min.css" />
    <style>
        header {
            font-family: 'Playfair Display', serif;
        }
    </style>
</head>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>

<body>
    @include('partials.navbar')


    <section id="galeri" class="w-full pb-10">
        <div class="h-64 w-full text-center" style="background-color: #3774493f;">
            <h2 class="hero-title font-semibold text-center text-black pt-10" style="font-size:4rem">Galeri Villa
            </h2>
            <p class="text-black">Jelajahi koleksi vila kami dan pemandangan yang menakjubkan</p>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 mt-10 gap-8 w-4/5 mx-auto">

    <a href="{{ asset('images/hero3.jpg') }}" data-lightbox="galeri">
        <img src="{{ asset('images/hero3.jpg') }}"
            class="w-full rounded-lg shadow-lg cursor-pointer hover:scale-105 transition">
    </a>

    <a href="{{ asset('images/hero11.jpg') }}" data-lightbox="galeri">
        <img src="{{ asset('images/hero11.jpg') }}"
            class="w-full rounded-lg shadow-lg cursor-pointer hover:scale-105 transition">
    </a>

    <a href="{{ asset('images/hero12.jpg') }}" data-lightbox="galeri">
        <img src="{{ asset('images/hero12.jpg') }}"
            class="w-full rounded-lg shadow-lg cursor-pointer hover:scale-105 transition">
    </a>

    <a href="{{ asset('images/hero9.jpg') }}" data-lightbox="galeri">
        <img src="{{ asset('images/hero9.jpg') }}"
            class="w-full rounded-lg shadow-lg cursor-pointer hover:scale-105 transition">
    </a>

    <a href="{{ asset('images/hero10.jpg') }}" data-lightbox="galeri">
        <img src="{{ asset('images/hero10.jpg') }}"
            class="w-full rounded-lg shadow-lg cursor-pointer hover:scale-105 transition">
    </a>

    <a href="{{ asset('images/hero2.jpg') }}" data-lightbox="galeri">
        <img src="{{ asset('images/hero2.jpg') }}"
            class="w-full rounded-lg shadow-lg cursor-pointer hover:scale-105 transition">
    </a>

        </div>
        </div>
    </section>

    <section id="cta" class="bg-gray-50 p-8">
        <div class="max-w-7xl mx-auto bg-white rounded-3xl shadow-sm p-12">
            <!-- Header -->
            <div class="flex justify-between items-start mb-12">
                <div>
                    <h1 class="text-5xl font-bold text-gray-900 mb-3">Calluella House</h1>
                    <div class="flex gap-2">
                        <span
                            class="px-4 py-1.5 bg-green-100 text-green-800 rounded-full text-sm font-medium">villa</span>
                        <span
                            class="px-4 py-1.5 bg-green-100 text-green-800 rounded-full text-sm font-medium">purwokerto</span>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-gray-600 mb-2">harga sewa villa permalam mulai</p>
                    <p class="text-2xl font-bold text-gray-900 mb-3">700.000/malam</p>
                    <a href="{{ route('booking') }}"
                        class="px-8 py-3 bg-green-800 text-white rounded-lg font-semibold hover:bg-green-900 transition">
                        Booking
                    </a>

                </div>
            </div>

            <!-- Content Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Rating Card -->
                <div class="bg-gray-50 rounded-2xl p-8">
                    <div class="flex items-end gap-2 mb-2">
                        <span class="text-6xl font-bold text-gray-900">4.9</span>
                        <span class="text-2xl text-gray-600 mb-2">/5</span>
                    </div>
                    <p class="text-gray-700 text-lg">dari</p>
                    <p class="text-gray-700 text-lg font-medium">32 reviews di google maps</p>
                </div>

                <!-- Area Terdekat Card -->
                <div class="bg-gray-50 rounded-2xl p-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Area Terdekat</h3>
                    <div class="space-y-4">
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-gray-700 mt-0.5 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <p class="text-gray-700 text-sm leading-relaxed flex-1">Dusun II, Banjarsari Kulon, Sumbang,
                                Banyumas Regency, Central Java</p>
                        </div>

                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-gray-700 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                        clip-rule="evenodd" />
                                </svg>
                                <p class="text-gray-700 text-sm">Wisata Buken, Dusun II, Banjarsari Kulon, Sumbang, Banyumas Regency, Central Java 53183</p>
                            </div>
                            <span class="text-gray-600 text-sm font-medium"></span>
                        </div>

                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-gray-700 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                        clip-rule="evenodd" />
                                </svg>
                                <p class="text-gray-700 text-sm">Green Garden, J6RV+8CP, Dusun II, Banjarsari Kulon, Kec. Sumbang, Kabupaten Banyumas, Jawa Tengah</p>
                            </div>
                            <span class="text-gray-600 text-sm font-medium"></span>
                        </div>

                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-gray-700 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                        clip-rule="evenodd" />
                                </svg>
                                <p class="text-gray-700 text-sm">Small World Baturaden</p>
                            </div>
                            <span class="text-gray-600 text-sm font-medium">398m</span>
                        </div>

                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-gray-700 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                        clip-rule="evenodd" />
                                </svg>
                                <p class="text-gray-700 text-sm">Small World Baturaden</p>
                            </div>
                            <span class="text-gray-600 text-sm font-medium">398m</span>
                        </div>

                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-gray-700 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                        clip-rule="evenodd" />
                                </svg>
                                <p class="text-gray-700 text-sm">Small World Baturaden</p>
                            </div>
                            <span class="text-gray-600 text-sm font-medium">398m</span>
                        </div>
                    </div>
                </div>

                <!-- Fasilitas Utama Card -->
                <div class="bg-gray-50 rounded-2xl p-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Fasilitas Utama</h3>
                    <div class="space-y-4">
                        <!-- Private Pool -->
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-water text-green-800 text-xl"></i>
                            <span class="text-gray-700">Private Pool</span>
                        </div>

                        <!-- Kamar Mandi -->
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-bath text-green-800 text-xl"></i>
                            <span class="text-gray-700">
                            1 Kamar Mandi, Water Heater (Handuk, Sabun, Shampoo)
                            </span>
                        </div>

                        <!-- Kamar Tidur AC -->
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-bed text-green-800 text-xl"></i>
                            <span class="text-gray-700">2 Kamar Tidur AC</span>
                        </div>

                        <!-- Dapur -->
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-kitchen-set text-green-800 text-xl"></i>
                            <span class="text-gray-700">Dapur & Perlengkapan</span>
                        </div>

                        <!-- TV -->
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-tv text-green-800 text-xl"></i>
                            <span class="text-gray-700">TV (Netflix, Youtube)</span>
                        </div>

                        <!-- Perlengkapan Sholat -->
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-mosque text-green-800 text-xl"></i>
                            <span class="text-gray-700">Perlengkapan Sholat</span>
                        </div>

                        <!-- WiFi -->
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-wifi text-green-800 text-xl"></i>
                            <span class="text-gray-700">WiFi</span>
                        </div>

                        <!-- Sarapan -->
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-utensils text-green-800 text-xl"></i>
                            <span class="text-gray-700">Sarapan Untuk 4 Orang</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="bg-gray-50 rounded-2xl p-8">
                <p class="text-gray-700 text-base leading-relaxed">
                    Berlibur di Caleulla House akan memberikan pengalaman yang tenang dan menyegarkan — udaranya sejuk,
                    pemandangannya indah, dan suasananya privat.
                </p>
            </div>
        </div>
    </section>

    @include('partials.footer')
<script src="{{ asset('template/assets/js/navbar.js') }}"></script>
</body>

</html>
