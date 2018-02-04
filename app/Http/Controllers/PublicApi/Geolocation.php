<?php

namespace App\Http\Controllers\PublicApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use \PulkitJalan\GeoIP\GeoIP;

class Geolocation extends Controller
{
    
    public function index($ip = '', Request $request)
    {
    	if (empty($ip)) {
            $ip = \Request::ip();
    	}

        $config = ['driver' => 'ip-api'];
        $serviceName = 'ip-api';
        
        if ($request->has('service')) {
            if ($request->query('service') == 'freegeoip') {
                $serviceName = 'freegeoip';
                $config = [
                    'driver' => 'freegeoip',
                    'freegeoip' => [
                        'secure' => true,
                    ] ,
                ];
            }
        }


        $geoip = new GeoIP($config);
        $geoip->setIp($ip);
        
        return response()->json([
            'ip' => $ip,
            'geo' => [
            	'service' => $serviceName,
            	'city' => $geoip->getCity(),
            	'region' => $geoip->getRegion(),
            	'country' => $geoip->getCountry(),
            ]
        ]);
    }
}
