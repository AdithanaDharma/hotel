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

    <div class="bg-gray-50 py-12 px-4">
        <div class="max-w-6xl mx-auto">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-2">
                    Riwayat Booking
                </h1>
                <p class="text-gray-500 text-lg">
                    Lihat semua pemesanan Anda
                </p>
            </div>

            <!-- Booking List -->
            <div class="space-y-4">
                @forelse ($bookings as $booking)
                    <div
                        class="bg-white rounded-2xl shadow-sm p-6 md:p-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-gray-900 mb-3">Booking #{{ $booking->id }}</h3>
                            <p class="text-gray-500 mb-1">
                                Check-in: <span class="text-gray-700">{{ $booking->check_in }}</span> | Check-out: <span
                                    class="text-gray-700">{{ $booking->check_out }}</span>
                            </p>
                            <p class="text-gray-500">
                                Jumlah Tamu: <span class="text-gray-700">{{ $booking->jumlah_tamu }} orang</span>
                            </p>
                        </div>
                        <div class="flex flex-col items-end gap-2">
                            <p class="text-2xl md:text-3xl font-bold text-green-700">
                                Rp {{ number_format($booking->total_price, 2, ',', '.') }}
                            </p>
                            <span
                                @class([
                                    'px-4 py-1.5 rounded-full text-sm font-medium',
                                    'bg-green-100 text-green-700' => $booking->status === 'Dikonfirmasi',
                                    'bg-yellow-100 text-yellow-700' => $booking->status === 'pending',
                                    'bg-gray-200 text-gray-700' => $booking->status === 'Selesai',
                                ])>
                                {{ $booking->status }}
                            </span>
                        </div>
                    </div>
                @empty
                    <div class="bg-white rounded-2xl shadow-sm p-6 md:p-8 text-center">
                        <p class="text-gray-500">Anda belum memiliki riwayat booking.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    @include('partials.footer')
    <script src="{{ asset('template/assets/js/navbar.js') }}"></script>
</body>

</html>
