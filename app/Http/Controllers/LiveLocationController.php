<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LiveLocationController extends Controller
{
    public function liveLocation()
    {
        return view('live_location');
    }
}
