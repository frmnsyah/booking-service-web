<?php

namespace App\Http\Controllers\Auth;

use App\Customers;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Auth;

class AuthController extends Controller 
{
    
   public function login(Request $request)
   {
       $credentials = [
           'email' => $request->input('email'),
           'password' => $request->input('password')
        ];

       try {
           if (!$token = Auth::attempt($credentials)) {
               return response()->json([
                        'customer_id' => 0, 
                        'success' => false, 
                        'message' => 'Email dan Password yang anda masukkan tidak sesuai',
                        'stacktrace' => ''
                    ], 200);
           }
       } catch (JWTException $e) {
           return response()->json(['user_id' => 0,'success' => false, 'message' => 'Login gagal', 'stacktrace' => $e->getMessage()], 200);
       }
       $authData = Auth::user();
       $custData = Customers::where('user_id', $authData->id)->first();
       // all good so return the token
       return response()->json([
            'customer_id' => $custData->id,
            'success' => true, 
            'message' => 'Login Berhasil',
            'stacktrace' => ''
        ], 200);
   }
}
