<?php

namespace App\Http\Controllers\PublicApi;

use App\Http\Controllers\Controller;

class Geolocation extends Controller
{
    public function index($ip = '')
    {
    	if (empty($ip)) {
            $ip = \Request::ip();
    	}
        
    	//**@var Torann\GeoIP\Location
    	$geoip = geoip($ip);

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
