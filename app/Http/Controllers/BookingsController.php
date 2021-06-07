<?php

namespace App\Http\Controllers;

use App\Bookings;
use App\BookingServices;
use App\Categories;
use App\Customers;
use App\Mekanik;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
        $bookings = Bookings::with('category','customer')->where('status', 0)->get()->toArray();
        return view('booking/index', compact('bookings'));
    }

    public function process($id)
    {
        $booking = Bookings::with('category','customer')->where([
            'status' => 0,
            'id' => $id
        ])->first()->toArray();
        $mekanik = Mekanik::all()->toArray();
        return view('booking/process', compact('booking', 'mekanik'));
    }

    public function doProcess(Request $request)
    {
        DB::beginTransaction();
        try {
            $req = $request->all();
            $booking = Bookings::find($req['booking_id']);
            $date = $booking->tanggal;
            $save = [
                'booking_id' => intval($booking->id),
                'tanggal' => date('Y-m-d', strtotime("$date")),
                'mulai' => date('H:i:s', strtotime("$date")),
                'mekanik' => $req['mekanik'],
                'status' => 0,
                'created_at' => date('Y-m-d H:i:s')
            ];
            BookingServices::insert($save);
            $booking->status = 1;
            $booking->save();
            DB::commit();
            return redirect('booking');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect('booking')->withErrors('error: '+ $e->getMessage());
        }
    }
}
