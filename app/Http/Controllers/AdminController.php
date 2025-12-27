<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Booking;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $totalBookings = Booking::count();
        $pendingBookings = Booking::where('status', 'pending')->count();
        $confirmedBookings = Booking::where('status', 'dikonfirmasi')->count();
        $completedBookings = Booking::where('status', 'selesai')->count();
        $totalRevenue = Booking::whereIn('status', ['dikonfirmasi', 'selesai'])->sum('total_price');

        $bookingsChart = Booking::select(
            DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
            DB::raw('COUNT(*) as count')
        )
            ->where('created_at', '>=', Carbon::now()->subYear())
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get();

        $chartLabels = $bookingsChart->pluck('month');
        $chartData = $bookingsChart->pluck('count');

        return view('admin.dashboard', compact(
            'totalBookings',
            'pendingBookings',
            'confirmedBookings',
            'completedBookings',
            'totalRevenue',
            'chartLabels',
            'chartData'
        ));
    }
}
