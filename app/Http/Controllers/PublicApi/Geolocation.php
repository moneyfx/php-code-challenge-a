<?php

namespace App\Http\Controllers\PublicApi;

use App\Http\Controllers\Controller;

class Geolocation extends Controller
{
    public function index()
    {
    	//**@var Torann\GeoIP\Location
    	$geoip = geoip("104.163.170.48");

        return response()->json([
            'ip' => $geoip->getAttribute('ip'),
            'geo' => [
            	'service' => 'ip-api',
            	'city' => $geoip->getAttribute('city'),
            	'region' => $geoip->getAttribute('state_name'),
            	'country' => $geoip->getAttribute('country'),
            ]
        ]);
    }
}
