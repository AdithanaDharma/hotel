<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking - Calluella House</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/@fortawesome/fontawesome-free@6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>

<body class="">
    @include('partials.navbar')
    <div class="bg-gray-100 py-16 px-4">

        <div class="max-w-4xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-5xl md:text-6xl font-black text-gray-900 mb-4">
                    Cek Tanggal dan Reservasi
                </h1>
                <p class="text-gray-500 text-lg">
                    Isi form dibawah untuk reservasi Villa secara mudah!
                </p>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-3xl shadow-lg p-8 md:p-12">
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('booking.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <!-- Nama Lengkap -->
                    <div>
                        <label class="block text-gray-900 font-semibold mb-3">
                            Nama Lengkap
                        </label>
                        <input type="text" name="nama_lengkap" placeholder="Masukkan nama lengkap anda"
                            class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-green-800 transition text-gray-900 placeholder-gray-400"
                            value="{{ old('nama_lengkap') }}">
                    </div>

                    <!-- No. Whatsapp -->
                    <div>
                        <label class="block text-gray-900 font-semibold mb-3">
                            No. Whatsapp
                        </label>
                        <input type="tel" name="no_whatsapp" placeholder="Contoh: 081223928394"
                            class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-green-800 transition text-gray-900 placeholder-gray-400"
                            value="{{ old('no_whatsapp') }}">
                    </div>

                    <!-- Tanggal Check-in & Check-out -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Check-in -->
                        <div>
                            <label class="block text-gray-900 font-semibold mb-3">
                                Pilih Tanggal Check-in
                            </label>
                            <div class="relative">
                                <input type="date" id="check_in_date" name="check_in" placeholder="mm/date/year"
                                    class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-green-800 transition text-gray-900 placeholder-gray-400"
                                    value="{{ old('check_in') }}">
                            </div>
                        </div>

                        <!-- Check-out -->
                        <div>
                            <label class="block text-gray-900 font-semibold mb-3">
                                Pilih Tanggal Check-out
                            </label>
                            <div class="relative">
                                <input type="date" id="check_out_date" name="check_out" placeholder="mm/date/year"
                                    class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-green-800 transition text-gray-900 placeholder-gray-400"
                                    value="{{ old('check_out') }}">
                            </div>
                        </div>
                    </div>

                    <!-- Jumlah Tamu -->
                    <div>
                        <label class="block text-gray-900 font-semibold mb-3">
                            Jumlah Tamu
                        </label>
                        <input type="number" name="jumlah_tamu" placeholder="Contoh: 2" min="1"
                            class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-green-800 transition text-gray-900 placeholder-gray-400"
                            value="{{ old('jumlah_tamu') }}">
                    </div>

                    <!-- Metode Pembayaran -->
                    <div>
                        <label class="block text-gray-900 font-semibold mb-3">
                            Metode Pembayaran
                        </label>
                        <select name="metode_pembayaran"
                            class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-green-800 transition text-gray-400 bg-white appearance-none cursor-pointer">
                            <option value="Transfer Bank" @if (old('metode_pembayaran') == 'Transfer Bank') selected @endif>Transfer Bank</option>
                            <option value="E-Wallet" @if (old('metode_pembayaran') == 'E-Wallet') selected @endif>E-Wallet</option>
                            <option value="Kartu Kredit" @if (old('metode_pembayaran') == 'Kartu Kredit') selected @endif>Kartu Kredit</option>
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-6">
                        <button type="submit"
                            class="w-full bg-green-800 hover:bg-green-900 text-white font-bold text-lg py-5 rounded-xl transition duration-200 shadow-lg hover:shadow-xl">
                            Konfirmasi Reservasi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('partials.footer')
    <script src="{{ asset('template/assets/js/navbar.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const disabledDates = @json($disabledDates);

            const checkInPicker = flatpickr("#check_in_date", {
                dateFormat: "Y-m-d",
                disable: disabledDates,
                minDate: "today",
                onChange: function(selectedDates, dateStr, instance) {
                    if (selectedDates.length > 0) {
                        checkOutPicker.set('minDate', dateStr);
                    }
                }
            });

            const checkOutPicker = flatpickr("#check_out_date", {
                dateFormat: "Y-m-d",
                disable: disabledDates,
                minDate: "today",
            });
        });
    </script>
</body>

</html>
