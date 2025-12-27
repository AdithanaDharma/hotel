<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Berhasil - Calluella House</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/@fortawesome/fontawesome-free@6.2.0/css/all.min.css" />
</head>

<body class="bg-gray-100">
    @include('partials.navbar')
    <div class="flex items-center justify-center min-h-screen px-4 py-16">
        <div class="max-w-md w-full bg-white rounded-3xl shadow-lg p-8 md:p-12 text-center">
            <div class="text-green-500 mb-6">
                <svg class="mx-auto h-24 w-24" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <h1 class="text-4xl md:text-5xl font-black text-gray-900 mb-4">
                Reservasi Berhasil!
            </h1>
            <p class="text-gray-700 text-lg mb-6">
                Terima kasih telah melakukan reservasi di Calluella House.
                Detail pemesanan Anda telah kami terima dan akan segera diproses.
            </p>
            <a href="{{ route('home') }}"
                class="inline-block bg-green-800 hover:bg-green-900 text-white font-bold text-lg py-4 px-8 rounded-xl transition duration-200 shadow-lg hover:shadow-xl">
                Kembali ke Beranda
            </a>
        </div>
    </div>
    @include('partials.footer')
    <script src="{{ asset('template/assets/js/navbar.js') }}"></script>
</body>

</html>
