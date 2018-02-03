<?php

namespace App\Http\Controllers\PublicApi;

use App\Http\Controllers\Controller;

class Geolocation extends Controller
{
    public function index()
    {
        return response()->json([
            'ip' => '8.8.8.8',
        ]);
    }
}
