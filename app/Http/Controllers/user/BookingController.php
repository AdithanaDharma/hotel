<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Midtrans\Snap;
use Midtrans\Config;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'room_id' => 'required|exists:kamar,id',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ], 422);
        }

        // Cek ketersediaan kamar
        $room = DB::table('kamar')->where('id', $request->room_id)->first();
        if (!$room) {
            return response()->json([
                'success' => false,
                'message' => 'Kamar tidak ditemukan'
            ], 404);
        }

        // Hitung total harga
        $days = (strtotime($request->check_out) - strtotime($request->check_in)) / (60 * 60 * 24);
        $totalPrice = $room->harga * $days;

        // Buat booking
        try {
            $bookingId = DB::table('bookings')->insertGetId([
                'user_id' => Auth::id(),
                'room_id' => $request->room_id,
                'hotel_id' => $room->id_hotel,
                'check_in' => $request->check_in,
                'check_out' => $request->check_out,
                'status' => 'pending',
                'payment_status' => 'unpaid',
                'total_price' => $totalPrice,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Pemesanan berhasil! ID Booking: ' . $bookingId
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }
}
