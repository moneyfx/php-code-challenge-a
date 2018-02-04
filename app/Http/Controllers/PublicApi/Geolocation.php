<?php

namespace App\Http\Controllers\PublicApi;

use App\Http\Controllers\Controller;
use App\Service\IpApi as IpApiService;

class Geolocation extends Controller
{
    private $ipApiService;

    public function __construct(IpApiService $ipApiService)
    {
        $this->ipApiService = $ipApiService;
    }

    public function index($ip = '')
    {
    	if (empty($ip)) {
            $ip = \Request::ip();
    	}
        
        $location = $this->ipApiService->getLocation($ip);

        return response()->json([
            'ip' => $location->getAttribute('ip'),
            'geo' => [
            	'service' => 'ip-api',
            	'city' => $location->getAttribute('city'),
            	'region' => $location->getAttribute('state_name'),
            	'country' => $location->getAttribute('country'),
            ]
        ]);
    }
}
