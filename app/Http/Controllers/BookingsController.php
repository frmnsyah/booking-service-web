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
            return redirect('booking')->with('update','Data Berhasil Di Update');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect('booking')->with('error', $e->getMessage());
        }
    }

    public function postBooking(Request $request)
    {
        DB::beginTransaction();
        try {
            $req = $request->all();
            $date = date_create_from_format('j/n/Y H:i:s', $req['tanggal'] .' '. $req['jam'] . ':00');
            $categoryId = Categories::where('kategori', 'like', '%'. $req['cat_id'] .'%')->first();
            $customer = Customers::find($req['cust_id'])->toArray();
            Bookings::insert([
                'cust_id' => intval($req['cust_id']),
                'tanggal' => date_format($date, 'Y-m-d H:i:s'),
                'cat_id' => $categoryId ? $categoryId->id : 0,
                'type_mobil' => $req['type_mobil'],
                'jenis_mobil' => $req['jenis_mobil'],
                'tahun' => $req['tahun'],
                'status' => 0,
                'lokasi' => strtolower($req['lokasi']) == 'dirumah' ? $customer['alamat'] : $req['lokasi'],
                'created_at' => date('Y-m-d H:i:s')
            ]);
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Berhasil',
                'stacktrace' => ""
            ], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Gagal Proses Booking, silakan coba kembali dengan data yang benar',
                'stacktrace' => $e->getMessage()
            ], 200);
        }
    }
}
