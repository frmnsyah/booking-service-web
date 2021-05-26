<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    protected $table;
    protected $fillable = [
        'cust_id',
        'cat_id',
        'tanggal',
        'type_mobil',
        'jenis_mobil',
        'status',
        'tahun'
    ];

    public function __construct ()
    {
        $this->table = 'bookings';
    }

    public function category()
    {
        return $this->belongsTo('App\Categories', 'cat_id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customers', 'cust_id');
    }

    public function service()
    {
        return $this->hasOne('App\BookingServices', 'booking_id', 'id');
    }
}
