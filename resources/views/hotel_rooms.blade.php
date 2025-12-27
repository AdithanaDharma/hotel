<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kamar di {{ $hotel->nama_hotel }} - HotelGo</title>
    <style>
        :root {
            --primary-color: #8a63ff;
            --secondary-color: #5e35b1;
            --dark-bg: #121212;
            --darker-bg: #0a0a0a;
            --card-bg: #1e1e1e;
            --text-color: #e0e0e0;
            --light-text: #f5f5f5;
            --medium-gray: #9e9e9e;
            --dark-gray: #424242;
            --shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            background: var(--dark-bg);
            min-height: 100vh;
            margin-bottom: 50px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header */
        header {
            background: rgba(30, 30, 30, 0.95);
            backdrop-filter: blur(10px);
            padding: 1rem 0;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.3);
            position: sticky;
            top: 0;
            z-index: 1000;
            border-bottom: 1px solid var(--dark-gray);
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            height: 50px;
        }

        .logo img {
            height: 70px;
            width: 70px;
            object-fit: contain;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--light-text);
            font-weight: 500;
            transition: var(--transition);
        }

        .nav-links a:hover {
            color: var(--primary-color);
        }

        .btn {
            padding: 0.5rem 1rem;
            border-radius: 25px;
            transition: var(--transition);
            text-decoration: none;
            display: inline-block;
            text-align: center;
            border: none;
            cursor: pointer;
            font-size: 0.9rem;
        }

        .btn-primary {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            color: var(--light-text);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(138, 99, 255, 0.6);
        }

        .btn-secondary {
            background: linear-gradient(45deg, var(--secondary-color), var(--primary-color));
            color: var(--light-text);
        }

        .btn-danger {
            background: #d32f2f;
            color: var(--light-text);
        }

        .hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
            gap: 3px;
            padding: 8px;
        }

        .hamburger span {
            width: 25px;
            height: 3px;
            background: var(--light-text);
            transition: var(--transition);
        }

        /* Cards */
        .card {
            background: var(--card-bg);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            border: 1px solid var(--dark-gray);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        }

        .card-img {
            height: 200px;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .card-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(30, 30, 30, 0.9);
            padding: 0.5rem;
            border-radius: 10px;
            font-weight: bold;
            color: var(--primary-color);
            border: 1px solid var(--dark-gray);
        }

        .card-body {
            padding: 1.5rem;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
            color: var(--light-text);
        }

        .card-text {
            color: var(--medium-gray);
            margin-bottom: 1rem;
        }

        .amenity {
            background: rgba(138, 99, 255, 0.1);
            color: var(--primary-color);
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.8rem;
            display: inline-block;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
            border: 1px solid rgba(138, 99, 255, 0.3);
        }

        .price {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary-color);
        }

        .grid {
            display: grid;
            gap: 2rem;
        }

        .hotels-grid {
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        }

        .rooms-grid {
            padding: 1rem 0;
        }

        .room-card {
            display: grid;
            grid-template-columns: 300px 1fr;
            padding: 1.5rem;
            border: 2px solid var(--dark-gray);
            border-radius: 15px;
            transition: var(--transition);
            background: var(--card-bg);
        }

        .room-card:hover {
            border-color: var(--primary-color);
        }

        .hotel-header {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                url('{{ $hotel->gambar ? asset('storage/' . $hotel->gambar) : asset('images/default-hotel.jpg') }}');
            background-size: cover;
            background-position: center;
            height: 300px;
            display: flex;
            align-items: center;
            text-align: center;
            color: var(--light-text);
            margin-bottom: 2rem;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow);
        }

        .hotel-header-content {
            width: 100%;
            padding: 2rem;
            background: rgba(0, 0, 0, 0.7);
        }

        .hotel-title {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: var(--light-text);
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.8);
        }

        .hotel-location {
            font-size: 1.2rem;
            margin-bottom: 1rem;
            color: var(--medium-gray);
        }

        .back-button {
            display: inline-block;
            margin: 1.5rem 0;
            color: var(--primary-color);
            text-decoration: none;
            font-weight: bold;
            transition: var(--transition);
            padding: 0.5rem 1rem;
            border-radius: 5px;
        }

        .back-button:hover {
            text-decoration: underline;
            background: rgba(138, 99, 255, 0.1);
        }

        h2 {
            color: var(--light-text);
            margin-bottom: 1.5rem;
            font-size: 2rem;
        }

        .booking-action {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1.5rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1001;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            overflow-y: auto;
        }

        .modal-content {
            background: var(--card-bg);
            margin: 10% auto;
            padding: 2rem;
            border-radius: 15px;
            max-width: 500px;
            width: 90%;
            border: 1px solid var(--dark-gray);
        }

        .modal h3 {
            color: var(--light-text);
            margin-bottom: 1.5rem;
        }

        .modal label {
            display: block;
            color: var(--medium-gray);
            margin-bottom: 0.5rem;
        }

        .modal input[type="date"] {
            width: 100%;
            padding: 0.75rem;
            border-radius: 8px;
            border: 1px solid var(--dark-gray);
            background: var(--dark-bg);
            color: var(--light-text);
            margin-bottom: 1rem;
        }

        .modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            flex-wrap: wrap;
        }

        /* Toast Notification */
        .toast {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: var(--card-bg);
            color: var(--light-text);
            padding: 1rem 2rem;
            border-radius: 8px;
            box-shadow: var(--shadow);
            border-left: 5px solid var(--primary-color);
            display: none;
            z-index: 1000;
            max-width: 90%;
        }

        .toast.error {
            border-left-color: #d32f2f;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .room-card {
                grid-template-columns: 250px 1fr;
            }

            .hotel-title {
                font-size: 2.2rem;
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background: var(--card-bg);
                flex-direction: column;
                padding: 1rem;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
                border: 1px solid var(--dark-gray);
                gap: 1rem;
            }

            .nav-links.active {
                display: flex;
            }

            .hamburger {
                display: flex;
            }

            .room-card {
                grid-template-columns: 1fr;
                padding: 0;
            }

            .card-img {
                height: 250px;
            }

            .hotel-title {
                font-size: 2rem;
            }

            .hotel-header {
                height: 250px;
            }

            .logo img {
                height: 60px;
                width: 60px;
            }

            .booking-action {
                flex-direction: column;
                align-items: flex-start;
            }

            .price {
                font-size: 1.3rem;
            }

            .btn {
                width: 100%;
            }
        }

        @media (max-width: 576px) {
            .hotel-title {
                font-size: 1.8rem;
            }

            .hotel-header {
                height: 200px;
            }

            .hotel-header-content {
                padding: 1rem;
            }

            .logo img {
                height: 50px;
                width: 50px;
            }

            .card-body {
                padding: 1rem;
            }

            .card-title {
                font-size: 1.3rem;
            }

            .amenity {
                font-size: 0.7rem;
                padding: 0.2rem 0.6rem;
            }

            h2 {
                font-size: 1.5rem;
                margin-bottom: 1rem;
            }

            .modal-content {
                padding: 1.5rem;
            }

            .modal h3 {
                font-size: 1.3rem;
                margin-bottom: 1rem;
            }

            .modal-actions {
                justify-content: center;
            }
        }

        @media (max-width: 400px) {
            .hotel-title {
                font-size: 1.5rem;
            }

            .hotel-location {
                font-size: 1rem;
            }

            .card-img {
                height: 200px;
            }

            .container {
                padding: 0 15px;
            }
        }

        footer {
            background: var(--darker-bg);
            padding: 3rem 0 1.5rem;
            border-top: 1px solid var(--dark-gray);
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-column h3 {
            color: var(--light-text);
            margin-bottom: 1.5rem;
            font-size: 1.2rem;
        }

        .footer-column ul {
            list-style: none;
        }

        .footer-column ul li {
            margin-bottom: 0.8rem;
        }

        .footer-column ul li a {
            color: var(--medium-gray);
            text-decoration: none;
            transition: var(--transition);
        }

        .footer-column ul li a:hover {
            color: var(--primary-color);
        }

        .copyright {
            text-align: center;
            padding-top: 1.5rem;
            border-top: 1px solid var(--dark-gray);
            color: var(--medium-gray);
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <nav class="container">
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Hotel Go Logo">
            </div>
            <ul class="nav-links">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/#hotels') }}">Hotels</a></li>
                <li><a href="{{ url('/#about') }}">About</a></li>
                <li><a href="{{ url('/#contact') }}">Contact</a></li>
                @guest
                    <li><a href="{{ route('login') }}" class="btn btn-primary">Login</a></li>
                    <li><a href="{{ route('register') }}" class="btn btn-secondary">Register</a></li>
                @else
                    <li>
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </li>
                @endguest
            </ul>
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
    </header>

    <main class="main-content">
        <div class="container">
            <a href="{{ url('/') }}" class="back-button">← Kembali ke Daftar Hotel</a>

            <div class="hotel-header">
                <div class="hotel-header-content">
                    <h1 class="hotel-title">{{ $hotel->nama_hotel }}</h1>
                    <div class="hotel-location">📍 {{ $hotel->kota }}</div>
                    <div>
                        @foreach (explode(',', $hotel->fitur_hotel) as $fitur)
                            <span class="amenity">{{ ucwords(trim($fitur)) }}</span>
                        @endforeach
                    </div>
                </div>
            </div>

            <h2>Daftar Kamar</h2>

            <div class="grid rooms-grid">
                @foreach ($rooms as $room)
                    <div class="card room-card">
                        <div class="card-img"
                            style="background-image: url('{{ $room->gambar_kamar ? asset('storage/' . $room->gambar_kamar) : asset('images/default-room.jpg') }}')">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">{{ $room->nama_kamar }}</h3>
                            <div class="card-text">{{ $room->description ?? 'Tidak ada description' }}</div>
                            <div>
                                @if ($room->fitur_kamar)
                                    @foreach (explode(',', $room->fitur_kamar) as $fitur)
                                        <span class="amenity">{{ trim($fitur) }}</span>
                                    @endforeach
                                @endif
                            </div>
                            <div class="booking-action">
                                <div class="price">Rp {{ number_format($room->harga, 0, ',', '.') }}/malam</div>
                                @auth
                                    <button class="btn btn-primary" onclick="bookRoom({{ $room->id }})">Pesan
                                        Sekarang</button>
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-primary">Login untuk Memesan</a>
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>HotelGo</h3>
                    <p style="color: var(--medium-gray);">Platform pemesanan hotel premium untuk pengalaman menginap
                        yang tak terlupakan.</p>
                </div>
                <div class="footer-column">
                    <h3>Navigasi</h3>
                    <ul>
                        <li><a href="#home">Beranda</a></li>
                        <li><a href="#hotels">Hotel</a></li>
                        <li><a href="#about">Tentang Kami</a></li>
                        <li><a href="#contact">Kontak</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Layanan</h3>
                    <ul>
                        <li><a href="#">Pemesanan Hotel</a></li>
                        <li><a href="#">Paket Wisata</a></li>
                        <li><a href="#">Transportasi</a></li>
                        <li><a href="#">Layanan Kamar</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Kontak</h3>
                    <ul>
                        <li>Jl. Pandjaitan No. 123, Purwokerto</li>
                        <li>info@HotelGo.com</li>
                        <li>+62 812 2819 2998</li>
                        <li>Buka 24/7</li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                &copy; 2025 VillaGo. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- Modal untuk input tanggal -->
    <div id="bookingModal" class="modal">
        <div class="modal-content">
            <h3>Form Pemesanan Kamar</h3>

            <form id="bookingForm">
                @csrf
                <input type="hidden" id="roomId" name="room_id">

                <div>
                    <label for="checkIn">Tanggal Check-in</label>
                    <input type="date" id="checkIn" name="check_in" required>
                </div>

                <div>
                    <label for="checkOut">Tanggal Check-out</label>
                    <input type="date" id="checkOut" name="check_out" required>
                </div>

                <div class="modal-actions">
                    <button type="button" onclick="closeModal()" class="btn btn-danger">Batal</button>
                    <button type="submit" class="btn btn-primary">Konfirmasi Pesan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Toast Notification -->
    <div id="toast" class="toast">
        <div id="toastMessage"></div>
    </div>

    <script>
        // Toggle mobile menu
        const hamburger = document.querySelector('.hamburger');
        const navLinks = document.querySelector('.nav-links');

        hamburger.addEventListener('click', () => {
            navLinks.classList.toggle('active');
            hamburger.classList.toggle('active');
        });

        // Close menu when clicking on a link
        document.querySelectorAll('.nav-links a').forEach(link => {
            link.addEventListener('click', () => {
                navLinks.classList.remove('active');
                hamburger.classList.remove('active');
            });
        });

        // Fungsi untuk menampilkan modal booking
        function bookRoom(roomId) {
            document.getElementById('roomId').value = roomId;
            document.getElementById('bookingModal').style.display = 'block';
            document.body.style.overflow = 'hidden';

            // Set tanggal minimal untuk input
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('checkIn').min = today;
            document.getElementById('checkIn').value = today;

            // Set tanggal check-out minimal besok
            const tomorrow = new Date();
            tomorrow.setDate(tomorrow.getDate() + 1);
            document.getElementById('checkOut').min = tomorrow.toISOString().split('T')[0];
            document.getElementById('checkOut').value = tomorrow.toISOString().split('T')[0];
        }

        // Fungsi untuk menutup modal
        function closeModal() {
            document.getElementById('bookingModal').style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside
        window.addEventListener('click', (e) => {
            if (e.target === document.getElementById('bookingModal')) {
                closeModal();
            }
        });

        // Fungsi untuk menampilkan toast
        function showToast(message, isSuccess = true) {
            const toast = document.getElementById('toast');
            const toastMessage = document.getElementById('toastMessage');

            toastMessage.textContent = message;
            toast.style.display = 'block';
            toast.className = isSuccess ? 'toast' : 'toast error';

            setTimeout(() => {
                toast.style.display = 'none';
            }, 5000);
        }

        // Handle form submission
        document.getElementById('bookingForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            fetch('{{ route('booking.store') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showToast(data.message);
                        closeModal();
                    } else {
                        showToast(data.message, false);
                    }
                })
                .catch(error => {
                    showToast('Terjadi kesalahan saat memproses permintaan', false);
                    console.error('Error:', error);
                });
        });

        // Update check-out min date when check-in changes
        document.getElementById('checkIn').addEventListener('change', function() {
            const checkInDate = new Date(this.value);
            const nextDay = new Date(checkInDate);
            nextDay.setDate(checkInDate.getDate() + 1);

            document.getElementById('checkOut').min = nextDay.toISOString().split('T')[0];

            // Jika check-out sebelum check-in yang baru, update check-out
            const checkOutDate = new Date(document.getElementById('checkOut').value);
            if (checkOutDate <= checkInDate) {
                document.getElementById('checkOut').value = nextDay.toISOString().split('T')[0];
            }
        });
    </script>
</body>

</html>
