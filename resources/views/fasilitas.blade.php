<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Fasilitas - Calluella House</title>
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

<body>
    @include('partials.navbar')


    <section id="fasilitas" class="w-full pb-10">
        <div class="h-64 w-full text-center" style="background-color: #3774493f;">
            <h2 class="hero-title font-semibold text-center text-black pt-10" style="font-size:4rem">Fasilitas Villa
            </h2>
            <p class="text-black">Nikmati Berbagai Fasilitas Lengkap Untuk Kenyamanan Anda</p>

        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 mt-10 gap-8 w-4/5 mx-auto">
            <div class="bg-white flex flex-col items-center rounded-lg text-center shadow-lg">
                <img src={{ asset('images/hero8.jpg') }} class="w-full" alt="">
                <div class="p-10 w-full">
                    <i class="fa-solid fa-water text-green-800 mb-4" style="font-size: 2rem"></i>
                    <h2 class="font-bold" style="font-size: 1.3rem">Private Pool</h2>
                    <p>Kolam renang bersih dan nyaman</p>
                </div>
            </div>
            <div class="bg-white flex flex-col items-center rounded-lg text-center shadow-lg">
                <img src={{ asset('images/hero7.jpg') }} class="w-full" alt="">
                <div class="p-10 w-full">
                    <i class="fa-solid fa-car text-green-800 mb-4" style="font-size: 2rem"></i>
                    <h2 class="font-bold" style="font-size: 1.3rem">Area Parkir</h2>
                    <p>Area parkir luas, aman, dan nyaman untuk kendaraan</p>
                </div>
            </div>
            <div class="bg-white flex flex-col items-center rounded-lg text-center shadow-lg">
                <img src={{ asset('images/hero5.jpg') }} class="w-full" alt="">
                <div class="p-10 w-full">
                    <i class="fa-solid fa-kitchen-set text-green-800 mb-4" style="font-size: 2rem"></i>
                    <h2 class="font-bold" style="font-size: 1.3rem">Dapur</h2>
                    <p>Tempat yang asri dan sejuk</p>
                </div>
            </div>
            <div class="bg-white flex flex-col items-center rounded-lg text-center shadow-lg">
                <img src={{ asset('images/hero11.jpg') }} class="w-full" alt="">
                <div class="p-10 w-full">
                    <i class="fa-solid fa-bed text-green-800 mb-4" style="font-size: 2rem"></i>
                    <h2 class="font-bold" style="font-size: 1.3rem">2 Kamar Tidur</h2>
                    <p>Tempat tidur yang nyaman dan nyaman</p>
                </div>
            </div>
            <div class="bg-white flex flex-col items-center rounded-lg text-center shadow-lg">
                <img src={{ asset('images/hero4.jpg') }} class="w-full" alt="">
                <div class="p-10 w-full">
                    <i class="fa-solid fa-toilet text-green-800 mb-4" style="font-size: 2rem"></i>
                    <h2 class="font-bold" style="font-size: 1.3rem">1 Kamar Mandi</h2>
                    <p>Kamar mandi yang bersih dan nyaman</p>
                </div>
            </div>
            <div class="bg-white flex flex-col items-center rounded-lg text-center shadow-lg">
                <img src={{ asset('images/hero13.jpg') }} class="w-full" alt="">
                <div class="p-10 w-full">
                    <i class="fa-solid fa-tv text-green-800 mb-4" style="font-size: 2rem"></i>
                    <h2 class="font-bold" style="font-size: 1.3rem">Ruang TV</h2>
                    <p>Ruang TV nyaman untuk bersantai dan berkumpul bersama keluarga</p>
                </div>
            </div>
        </div>
    </section>
    @include('partials.footer')
<script src="{{ asset('template/assets/js/navbar.js') }}"></script>
</body>

</html>
