<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Calluella House</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet">
    <style>
        .hero {
            background: linear-gradient(rgba(255, 255, 255, 0.229),
                    rgba(255, 255, 255, 0.157)),
                url("/images/hero2.jpg");  background-size: cover;
    background-position: center;
    height: 70vh;
    display: flex;
    align-items: center;
    text-align: center;
    color: var(--light-text);
}
    </style>
</head>

<body>
    <!-- Header -->
    @include('partials.navbar')

    <!-- Hero Section -->
    <section class="hero min-h-[90vh]" id="home">
        <div class="container">
            <div class="hero-content">
                <h1 class="font-bold hero-title" style="font-size:6rem">Welcome to Calluella House</h1>
                <p class="font-semibold hero-subtitle" style="font-size:1.5rem">Nikmati Ketenangan dan kenyamanan modern
                    di tengah
                    keindahan alam</p>
                <div class="flex w-full justify-center">
                    <a href="{{ route('booking') }}" class="bg-green-950 text-white px-6 py-2 rounded text-lg">
                    Cek Tanggal & Booking Sekarang
                </a>


                    <a href="{{ route('galeri') }}"
                        class="bg-white bg-opacity-40 border border-white text-white px-6 py-2 rounded text-lg text-shadow-lg/30">Lihat
                        Galeri</a>
                </div>
            </div>
        </div>
    </section>

    <main class="main-content">
        <section id="why-us" class="min-h-[95vh] w-full mx-auto flex flex-col items-center py-10">
            <h1 class="font-bold text-center hero-title" style="font-size:4rem">Mengapa Calluella House?</h1>
            <h1 class="text-center hero-subtitle">Tempat sempurna untuk liburan keluarga yang berkesan</h1>
            <div class="grid grid-cols-1 lg:grid-cols-2 mt-10 gap-8 w-4/5">
                <!-- 1. Villa Pribadi -->
                <div class="bg-green-100 flex flex-col items-center p-10 rounded-lg text-center shadow-lg">
                    <i class="fa-solid fa-house-chimney text-green-800 mb-4" style="font-size: 2.5rem"></i>
                    <h2 class="font-bold" style="font-size: 1.3rem">Villa Pribadi</h2>
                    <p>Privasi penuh untuk liburan keluarga anda</p>
                </div>

                <!-- Kolam Renang Pribadi -->
                <div class="bg-green-100 flex flex-col items-center p-10 rounded-lg text-center shadow-lg">
                    <i class="fa-solid fa-water-ladder text-green-800 mb-4" style="font-size: 2.5rem"></i>
                    <h2 class="font-bold" style="font-size: 1.3rem">Kolam Renang Pribadi</h2>
                    <p>Kolam renang bersih dan nyaman</p>
                </div>

                <!-- 3. Pemandangan Alam -->
                <div class="bg-green-100 flex flex-col items-center p-10 rounded-lg text-center shadow-lg">
                    <i class="fa-solid fa-mountain-sun text-green-800 mb-4" style="font-size: 2.5rem"></i>
                    <h2 class="font-bold" style="font-size: 1.3rem">Pemandangan Alam</h2>
                    <p>Tempat yang asri dan sejuk</p>
                </div>

                <!-- 4. Pembayaran Efisien -->
                <div class="bg-green-100 flex flex-col items-center p-10 rounded-lg text-center shadow-lg">
                    <i class="fa-solid fa-wallet text-green-800 mb-4" style="font-size: 2.5rem"></i>
                    <h2 class="font-bold" style="font-size: 1.3rem">Pembayaran Efisien</h2>
                    <p>Metode pembayaran yang mudah dan cepat</p>
                </div>
            </div>
            <a href="{{ route('fasilitas') }}"
    class="bg-green-900 hover:bg-green-800 text-white px-10 py-2 rounded-lg font-bold mt-10 transition">
    Lihat semua fasilitas</a>
        </section>
    </main>

    <!-- Footer -->
    @include('partials.footer')
<script src="{{ asset('template/assets/js/navbar.js') }}"></script>
</body>

</html>
