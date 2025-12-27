<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; 
use Carbon\Carbon;
use Midtrans\Config;
use Midtrans\Snap;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $bookings = Auth::user()->bookings()->orderBy('created_at', 'desc')->get();
        return view('riwayat-booking', compact('bookings'));
    }

    /**
     * Store a newly created booking in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */



    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'no_whatsapp' => 'required|string|max:20',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'jumlah_tamu' => 'required|integer|min:1',
            'metode_pembayaran' => 'required|string',
        ]);

        $checkIn = $request->input('check_in');
        $checkOut = $request->input('check_out');

        $existingBooking = Booking::where('status', 'dikonfirmasi')
            ->where(function ($query) use ($checkIn, $checkOut) {
                $query->where(function ($q) use ($checkIn, $checkOut) {
                    $q->where('check_in', '<=', $checkIn)
                        ->where('check_out', '>=', $checkIn);
                })->orWhere(function ($q) use ($checkIn, $checkOut) {
                    $q->where('check_in', '<=', $checkOut)
                        ->where('check_out', '>=', $checkOut);
                })->orWhere(function ($q) use ($checkIn, $checkOut) {
                    $q->where('check_in', '>=', $checkIn)
                        ->where('check_out', '<=', $checkOut);
                });
            })->exists();

        if ($existingBooking) {
            return back()->withErrors(['check_in' => 'Tanggal yang dipilih sudah dibooking.'])->withInput();
        }

        $booking = Booking::create([
            'user_id' => Auth::id(),
            'nama_lengkap' => $request->input('nama_lengkap'),
            'no_whatsapp' => $request->input('no_whatsapp'),
            'check_in' => $request->input('check_in'),
            'check_out' => $request->input('check_out'),
            'jumlah_tamu' => $request->input('jumlah_tamu'),
            'metode_pembayaran' => $request->input('metode_pembayaran'),
            'status' => 'pending',
            'total_price' => 700000 // ← harga villa
        ]);

        
        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');

        // PARAMS TRANSAKSI
        $params = [
        'transaction_details' => [
        'order_id' => $booking->id, // PENTING
        'gross_amount' => 700000,
        ],
        'customer_details' => [
        'first_name' => $booking->nama_lengkap,
        'phone' => $booking->no_whatsapp,
        ],
   ];

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $booking->update([
            'snap_token' => $snapToken
        ]);
        return view('booking-payment', compact('snapToken', 'booking'));
        // Redirect to a success page
    }

    /**
     * Show the booking success page.
     *
     * @return \Illuminate\View\View
     */
    public function success()
    {
        // We'll create this view next
        return view('booking-success');
    }
}