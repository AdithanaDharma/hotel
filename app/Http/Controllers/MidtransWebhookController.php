<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class MidtransWebhookController extends Controller
{
    public function handle(Request $request)
    {
        $orderId = $request->order_id;
        $status  = $request->transaction_status;

        // karena order_id = booking->id
        $booking = Booking::find($orderId);

        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        if ($status === 'settlement' || $status === 'capture') {
            $booking->update([
                'payment_status' => 'paid',
                'status' => 'dikonfirmasi',
                'metode_pembayaran' => $request->payment_type,
            ]);
        }

        return response()->json(['message' => 'OK']);
    }
}
