<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class CustomersController extends Controller
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
        $customers = DB::table('customers')->get();

        return view('customers/index', compact('customers'));
    }
}
