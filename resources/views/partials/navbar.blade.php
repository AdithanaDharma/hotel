<header class="bg-white">
    <nav class="container h-16 flex items-center justify-between">
        <h1 style="font-size: 1.8rem" class="font-semibold">Calluella House</h1>
        <ul class="nav-links">
            <li><a href="{{ route('home') }}" class="text-black">Beranda</a></li>
            <li><a href="{{ route('fasilitas') }}" class="text-black">Fasilitas</a></li>
            <li><a href="{{ route('galeri') }}" class="text-black">Galeri</a></li>
            <li><a href="{{ route('booking') }}" class="text-black">Booking</a></li>
            @guest
                <li><a href="{{ route('login') }}"
                        class="border border-green-700 rounded-lg px-3 py-1 text-green-700">Masuk</a></li>
            @else
                <li><a href="{{ route('booking.history') }}" class="text-black">Riwayat Booking</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="rounded-lg bg-red-700 px-4 py-1 text-white">Logout</button>
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
