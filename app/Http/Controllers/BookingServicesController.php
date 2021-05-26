<?php

namespace App\Http\Controllers;

use App\BookingServices;
use Illuminate\Http\Request;

class BookingServicesController extends Controller
{
    public function list()
    {
        $services = BookingServices::with('booking', 'booking.category', 'booking.customer')->get()->toArray();
        return view('services/index', compact('services'));
    }
}
