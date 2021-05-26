<?php

namespace App\Http\Controllers\Auth;

use App\Customers;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Exception;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    private function createUser(array $data)
    {
        return User::insertGetId([
            'password' => Hash::make($data['password']),
            'email' => $data['email'],
            'username' => $data['username']
        ]);
    }

    private function createCustomer(array $data)
    {
        return Customers::insert([
            'user_id' => $data['user_id'],
            'nama' => $data['nama'],
            'alamat' => $data['alamat'],
            'no_hp' => $data['no_hp'],
            'created_at' => date('Y-m-d h:i:s'),
        ]);
    }

    public function register(Request $request) 
    {
        try {
            if ($this->isUserExist($request->input('email'))) {
                throw new Exception("User sudah ada");
            }
            $dataUser = [
                'username' => $request->input('email'),
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ];
            $user = $this->createUser($dataUser);
            $dataCustomer = [
                'user_id' => $user, 
                'nama' => $request->input('nama'),
                'alamat' => $request->input('alamat'),
                'no_hp' => $request->input('no_hp')  
            ];
            $this->createCustomer($dataCustomer);
            return response()->json([
                'success' => true,
                'message' => 'Registrasi berhasil',
                'stacktrace' => "",
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Registrasi Gagal, silakan coba kembali',
                'stacktrace' => $e->getMessage()
            ], 200);
        }
    }

    private function isUserExist($email)
    {
        $user = User::where('email', $email)->count();
        return $user == 0 ? false : true;
    }

}
