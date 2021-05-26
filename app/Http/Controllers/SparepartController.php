<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SparepartController extends Controller
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
        $sparepart= DB::table('sparepart')->get();
        return view('sparepart/index',compact('sparepart'));
    }

    public function store(Request $request)
    {
        
        DB::table('sparepart')->insert([
                'nama' => $request->nama,
                'harga' => $request->harga,
        ]);

        return redirect()->back()->with('masuk','Data Berhasil Di Input');
    }

    public function edit($id)
    {
        $sparepart= DB::table('sparepart')->where('id_sparepart',$id)->first();
        return view('sparepart/edit',compact('sparepart'));
    }

    public function update(Request $request)
    {
        
        DB::table('sparepart')->where('id_sparepart',$request->id_sparepart)->update([
            'nama' => $request->nama,
            'harga' => $request->harga
        ]);

        return redirect('sparepart')->with('update','Data Berhasil Di Update');
        
    }

    public function tojson()
    {
        $sparepart= DB::table('sparepart')->get();
        return response()->json(['data' => $sparepart]);
    }

    public function getSparepartJson($id)
    {
        $sparepart= DB::table('sparepart')->where('id_sparepart', $id)->first();
        return response()->json(['data' => $sparepart]);
    }
}
