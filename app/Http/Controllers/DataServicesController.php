<?php


namespace App\Http\Controllers;

use App\Bookings;
use App\Categories;
use App\LookupValues;
use DB;
use Exception;
use Illuminate\Http\Request;

class DataServicesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // 
    }

    public function getTypeMobil()
    {
        try {
            $data = LookupValues::where('type', 'TYPE_MOBIL')->get(['id', 'values'])->toArray();
            return response()->json([
                'success' => true,
                'message' => 'Berhasil',
                'stacktrace' => "",
                'data' => $data
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal',
                'stacktrace' => $e->getMessage(),
                'data' => []
            ], 200);
        }
    }

    public function getJenisMobil()
    {
        try {
            $data = LookupValues::where('type', 'JENIS_MOBIL')->get(['id', 'values'])->toArray();
            return response()->json([
                'success' => true,
                'message' => 'Berhasil',
                'stacktrace' => "",
                'data' => $data
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal',
                'stacktrace' => $e->getMessage(),
                'data' => []
            ], 200);
        }
    }

    public function getLokasiService()
    {
        try {
            $data = LookupValues::where('type', 'LOKASI')->get(['id', 'values'])->toArray();
            return response()->json([
                'success' => true,
                'message' => 'Berhasil',
                'stacktrace' => "",
                'data' => $data
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal',
                'stacktrace' => $e->getMessage(),
                'data' => []
            ], 200);
        }
    }

    public function getKategoriService()
    {
        try {
            $data = Categories::select('id','kategori as values')->get()->toArray();
            return response()->json([
                'success' => true,
                'message' => 'Berhasil',
                'stacktrace' => "",
                'data' => $data
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal',
                'stacktrace' => $e->getMessage(),
                'data' => []
            ], 200);
        }
    }

    public function bookingList(Request $request)
    {
        try {
            $data = Bookings::with('category')->where('cust_id', $request->input('cust_id'))->orderBy('tanggal', 'DESC')->get()->toArray();
            if (empty($data)) throw new Exception("Data Kosong");
            $bookings = [];
            foreach ($data as $k => $v) {
                $bookings[$k] = $v;
                $bookings[$k]['kategori'] = $v['category']['kategori'];
                $bookings[$k]['status'] = $this->getStatusBooking($v['status']);
            }
            return response()->json([
                'success' => true,
                'message' => 'Berhasil',
                'stacktrace' => "",
                'data' => $bookings
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal',
                'stacktrace' => $e->getMessage(),
                'data' => []
            ], 200);
        }
    }
}
