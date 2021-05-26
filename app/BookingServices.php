<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingServices extends Model
{
    protected $table;
    protected $fillable = [
        'booking_id',
        'tanggal',
        'mulai',
        'selesai',
        'mekanik',
        'no_polisi',
        'catatan',
        'total_biaya',
        'status'
    ];

    public function __construct ()
    {
        $this->table = 'booking_services';
    }

    public function booking()
    {
        return $this->belongsTo('App\Bookings', 'booking_id');
    }
}
