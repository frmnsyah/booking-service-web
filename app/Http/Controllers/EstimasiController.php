<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use App\Estimasi;
use App\EstimasiDetail;

class EstimasiController extends Controller
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
        $estimasi = DB::table('estimasi')->join('kategori', function ($join) {
            $join->on('estimasi.id_kategori', '=', 'kategori.id_kategori');
        })->orderBy('id_estimasi', 'desc')->get();

        return view('estimasi/index',compact('estimasi'));
    }

    public function create()
    {
        $kategori = DB::table('kategori')->get();
        return view('estimasi/add', compact('kategori'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $kategori = explode("_", $input['estimasi']['kategori']);
        $estimasi = new Estimasi;
        $estimasi->id_kategori = $kategori[0];
        $estimasi->customer = $input['estimasi']['customer'];
        $estimasi->tanggal = $input['estimasi']['tanggal'];
        $estimasi->grand_total = $input['estimasi']['grand_total'];
        $estimasi->save();
        if (isset($input['sparepart'])) {
            foreach($input['sparepart'] as $k => $v) {
                $detail = new EstimasiDetail;
                $detail->id_estimasi = $estimasi->id_estimasi;
                $detail->id_sparepart = $v['sparepart'];
                $detail->jumlah = $v['jumlah'];
                $detail->subtotal = $v['subtotal'];
                $detail->save();
            }    
        }
        $filename = date("Ymdhis") . "_".rand(10,1000).".pdf";
        $pdf = PDF::loadView('pdf.estimasi', ['estimasi' => $estimasi])->setPaper('a4', 'landscape')->save($filename);
        $pdf->download($filename);
        return redirect()->back();
    }

    public function edit($id)
    {
        $kategori = DB::table('kategori')->where('id_kategori',$id)->first();

        return view('kategori/edit',compact('kategori'));
    }

    public function update(Request $request)
    {
        DB::table('kategori')->where('id_kategori',$request->id_kategori)->update([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect('kategori')->with('update','Data Berhasil Di Update');
    }

    public function print($id)
    {
        $estimasi = Estimasi::with('kategori')->where('id_estimasi', $id)->first();
        $pdf = PDF::loadView('pdf.estimasi', ['estimasi' => $estimasi]);
        $filename = date("Ymdhis") . "_".rand(10,1000).".pdf";
        return $pdf->stream($filename, array("Attachment" => true));
    }
}
