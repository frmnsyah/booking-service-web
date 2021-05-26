<?php


namespace App\Http\Controllers;

use App\LookupValues;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jumlah_barang =  0;//DB::table('tb_barang')->sum('jumlah_barang');
        $jumlah_pasok =  0;//DB::table('tb_pasok')->sum('jumlah_pasok');
        $jumlah_kasir =  0;//DB::table('users')->where('level','K')->count();
        $jumlah_transaksi =  0;//DB::table('tb_kembalian')->count();
                    
        return view('home',compact('jumlah_barang','jumlah_pasok','jumlah_transaksi','jumlah_kasir'));
    }

    public function getTypeMobil()
    {
        try {
            $data = LookupValues::where('type', 'TYPE_MOBIL')->get();
            dd($data);
            return response()->json([
                'success' => true,
                'message' => 'Registrasi berhasil',
                'stacktrace' => "",
                'data' => $data
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Registrasi Gagal, silakan coba kembali',
                'stacktrace' => $e->getMessage()
            ], 200);
        }
    }

    public function getJenisMobil()
    {

    }
}
