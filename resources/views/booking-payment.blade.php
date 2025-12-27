<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pembayaran - Calluella House</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Midtrans Snap -->
    <script 
        src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}">
    </script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="max-w-lg w-full bg-white rounded-3xl shadow-xl p-8">
        <!-- Header -->
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-gray-900">
                Pembayaran Booking
            </h1>
            <p class="text-gray-500 mt-2">
                Selesaikan pembayaran untuk mengonfirmasi reservasi villa
            </p>
        </div>

        <!-- Info Card -->
        <div class="bg-gray-50 rounded-2xl p-6 mb-6">
            <div class="flex justify-between mb-2">
                <span class="text-gray-600">Nama Villa</span>
                <span class="font-semibold text-gray-900">Calluella House</span>
            </div>

            <div class="flex justify-between mb-2">
                <span class="text-gray-600">Metode Pembayaran</span>
                <span class="font-semibold text-gray-900">
                    Midtrans (VA / E-Wallet / Kartu)
                </span>
            </div>

            <div class="flex justify-between border-t pt-3 mt-3">
                <span class="text-gray-700 font-semibold">Total Pembayaran</span>
                <span class="text-green-800 font-bold text-lg">
                    Rp {{ number_format($booking->total_harga ?? 700000, 0, ',', '.') }}
                </span>
            </div>
        </div>

        <!-- Button -->
        <button 
            id="pay-button"
            class="w-full bg-green-800 hover:bg-green-900 text-white font-bold py-4 rounded-xl transition shadow-lg hover:shadow-xl">
            Bayar Sekarang
        </button>

        <!-- Info -->
        <p class="text-xs text-gray-500 text-center mt-4">
            Pembayaran diproses secara aman melalui Midtrans
        </p>
    </div>

    <!-- Script -->
    <script>
        document.getElementById('pay-button').addEventListener('click', function () {
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result){
                    window.location.href = "{{ route('booking.success') }}";
                },
                onPending: function(result){
                    alert('Menunggu pembayaran Anda');
                },
                onError: function(result){
                    alert('Pembayaran gagal, silakan coba lagi');
                }
            });
        });
    </script>

</body>
</html>
