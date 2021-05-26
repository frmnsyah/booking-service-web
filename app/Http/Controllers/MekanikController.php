<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MekanikController extends Controller
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
        $mekaniks = DB::table('mekaniks')->get();

        return view('mekanik/index', compact('mekaniks'));
    }

    public function store(Request $request)
    {
        DB::table('mekaniks')->insert([
            'nama' => $request->nama,
            'no_mekanik' => $request->no_mekanik,
            'created_at' => now()
        ]);

        return redirect()->back()->with('masuk','Data Berhasil Di Input');
    }

    public function edit($id)
    {
        $mekanik = DB::table('mekaniks')->where('id',$id)->first();

        return view('mekanik/edit', compact('mekanik'));
    }

    public function update(Request $request)
    {
        DB::table('mekaniks')->where('id',$request->id)->update([
            'nama' => $request->nama,
            'no_mekanik' => $request->no_mekanik,
            'updated_at' => now()
        ]);

        return redirect('mekanik')->with('update','Data Berhasil Di Update');
    }
}
