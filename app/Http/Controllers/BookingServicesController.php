<?php

namespace App\Http\Controllers;

use App\Bookings;
use App\BookingServices;
use Illuminate\Http\Request;
use PDF;
class BookingServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
        $services = BookingServices::with('booking', 'booking.category', 'booking.customer')->get()->toArray();
        
        return view('services/index', compact('services'));
    }

    public function detail($id)
    {
        $service = BookingServices::with('booking', 'booking.category', 'booking.customer')
            ->where('id', $id)
            ->first()
            ->toArray();
        return view('services/detail', compact('service'));
    }

    public function process($id)
    {
        $service = BookingServices::with('booking', 'booking.category', 'booking.customer')
            ->where('id', $id)
            ->first()
            ->toArray();
        return view('services/process', compact('service'));
    }

    public function doProcess(Request $request)
    {
        $data = $request->all();
        $service = BookingServices::find($data['service_id']);
        if ($service == null) return redirect()->back()->withErrors("Data service tidak ditemukan..");
        $service->no_polisi = $data['no_polisi'];
        $service->catatan = $data['catatan'];
        $service->total_biaya = $data['total_biaya'];
        $service->status = 1;
        if (!$service->save()) return redirect()->back()->withErrors("Data service tidak berhasil disimpan, cek data yang anda masukan");
        $booking = Bookings::find($service->booking_id);
        $booking->status = 2;
        $booking->save();
        return redirect('services')->with('update', "Data berhasil disimpan");
    }

    public function downloadSpk($id)
    {
        $service = BookingServices::with('booking', 'booking.category', 'booking.customer')
            ->where('id', $id)
            ->first()
            ->toArray();
        $pdf = PDF::loadView('pdf.spk', ['service' => $service]);
        $filename = date("Ymdhis") . "_".rand(10,1000).".pdf";
        return $pdf->stream($filename, array("Attachment" => true));
    }
}
