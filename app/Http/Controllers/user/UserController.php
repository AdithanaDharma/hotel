<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Booking;

class UserController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function fasilitas()
    {
        return view('fasilitas');
    }

    public function galeri()
    {
        return view('galeri');
    }

    public function booking()
    {
        $confirmedBookings = Booking::where('status', 'dikonfirmasi')->get();
        $disabledDates = [];
        foreach ($confirmedBookings as $booking) {
            $disabledDates[] = [
                'from' => $booking->check_in,
                'to' => $booking->check_out,
            ];
        }

        return view('booking', ['disabledDates' => $disabledDates]);
    }
}
