<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'no_whatsapp',
        'check_in',
        'check_out',
        'jumlah_tamu',
        'metode_pembayaran',
        'status',
        'total_price',
        'snap_token',
        'payment_status',
        'payment_type',
        'transaction_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
