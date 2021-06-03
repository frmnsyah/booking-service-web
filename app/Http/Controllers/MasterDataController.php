<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterDataController extends Controller
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
        $masterData = DB::table('lookup_values')
            ->select('id', 'type as title', 'values')
            ->orderBy('title')
            ->get();

        return view('master_data/index', compact('masterData'));
    }

    public function store(Request $request)
    {
        DB::table('lookup_values')->insert([
            'type' => $request->title,
            'values' => $request->values,
            'created_at' => now()
        ]);

        return redirect()->back()->with('masuk','Data Berhasil Di Input');
    }

    public function edit($id)
    {
        $masterData = DB::table('lookup_values')->where('id', $id)->first();

        return view('master_data/edit', compact('masterData'));
    }

    public function update(Request $request)
    {
        DB::table('lookup_values')->where('id', $request->id)->update([
            'type' => $request->title,
            'values' => $request->values,
            'updated_at' => now()
        ]);

        return redirect('master_data')->with('update','Data Berhasil Di Update');
    }
}
