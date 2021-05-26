<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

$router->group(['prefix' => 'authenticate'], function () use ($router) {
    $router->group(['namespace' => 'Auth'], function () use ($router) {
        $router->post('/register', 'RegisterController@register');
        $router->post('/login', 'AuthController@login');
    });
});

$router->get('/type-mobil', 'DataServicesController@getTypeMobil');
$router->get('/jenis-mobil', 'DataServicesController@getJenisMobil');
$router->get('/kategori', 'DataServicesController@getKategoriService');
$router->get('/lokasi', 'DataServicesController@getLokasiService');
$router->post('/booking', 'BookingsController@postBooking');
$router->post('/booking-list', 'DataServicesController@bookingList');
