<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function getStatusBooking($status)
    {
        switch ($status) {
            case 0:
                return "menunggu diproses";
                break;
            case 1:
                return "sedang diproses";
                break;
            case 2:
                return "selesai";
                break;
        }
        return "";
    }
}
