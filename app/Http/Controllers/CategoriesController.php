<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
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
        $kategori= DB::table('categories')->get();

        return view('categories/index',compact('kategori'));
    }

    public function store(Request $request)
    {
        DB::table('categories')->insert([
            'kategori' => $request->kategori,
            'created_at' => now()
        ]);

        return redirect()->back()->with('masuk','Data Berhasil Di Input');
    }

    public function edit($id)
    {
        $kategori = DB::table('categories')->where('id',$id)->first();

        return view('categories/edit',compact('kategori'));
    }

    public function update(Request $request)
    {
        DB::table('categories')->where('id',$request->id)->update([
            'kategori' => $request->kategori,
            'updated_at' => now()
        ]);

        return redirect('categories')->with('update','Data Berhasil Di Update');
    }
}
