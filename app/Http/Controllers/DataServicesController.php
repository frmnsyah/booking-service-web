<?php


namespace App\Http\Controllers;

use App\Bookings;
use App\BookingServices;
use App\Categories;
use App\Customers;
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

    public function getService($id)
    {
        try {
            $service = BookingServices::with('booking', 'booking.category', 'booking.customer')
                ->where('booking_id', $id)
                ->first()
                ->toArray();
            if (empty($service)) throw new Exception("Data Kosong");
            return response()->json([
                'success' => true,
                'message' => 'Berhasil',
                'stacktrace' => "",
                'data' => $service
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

    public function postBooking(Request $request)
    {
        DB::beginTransaction();
        try {
            $req = $request->all();
            $date = date_create_from_format('j/n/Y H:i:s', $req['tanggal'] .' '. $req['jam'] . ':00');
            $categoryId = Categories::where('kategori', 'like', '%'. $req['cat_id'] .'%')->first();
            $customer = Customers::find($req['cust_id']);
            Bookings::insert([
                'cust_id' => intval($req['cust_id']),
                'tanggal' => date_format($date, 'Y-m-d H:i:s'),
                'cat_id' => $categoryId ? $categoryId->id : 0,
                'type_mobil' => $req['type_mobil'],
                'jenis_mobil' => $req['jenis_mobil'],
                'tahun' => $req['tahun'],
                'status' => 0,
                'lokasi' => strtolower($req['lokasi']) == 'dirumah' ? $customer->alamat : $req['lokasi'],
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

    public function postUpdateAccount(Request $request)
    {
        DB::beginTransaction();
        try {
            $req = $request->all();
            $customer = Customers::find($req['user_id'])->first();
            $customer->nama = $req['nama'];
            $customer->no_hp = $req['no_hp'];
            $customer->alamat = $req['alamat'];
            $customer->save();
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
                'message' => 'Gagal Update Account, silakan coba kembali dengan data yang benar',
                'stacktrace' => $e->getMessage()
            ], 200);
        }
    }
}
