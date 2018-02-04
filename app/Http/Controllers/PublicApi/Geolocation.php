<?php

namespace App\Http\Controllers\PublicApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\GeolocationIp as GeolocationIpService;

class Geolocation extends Controller
{
    private $geolocationIpService;

    public function __construct(GeolocationIpService $geolocationIpService) 
    {
        $this->geolocationIpService = $geolocationIpService;
    }

    public function index($ip = '', Request $request)
    {
    	if (empty($ip)) {
            $ip = \Request::ip();
    	}
        
        if ($request->has('service')) {
            if ($request->input('service') == GeolocationIpService::FREE_GEO_IP_PROVIDER) {
                $this->geolocationIpService->setFreegeoipAsProvider();
            }
        }

        try {
            $this->geolocationIpService->setIp($ip);
            $city = $this->geolocationIpService->getCity();
            if (empty($city)) {
                return $this->badRequestResponse($ip);
            }
        } catch (\Exception $e) {
            return $this->badRequestResponse($ip, $e->getMessage());
        }
        

        return response()->json([
            'ip' => $ip,
            'geo' => [
            	'service' => $this->geolocationIpService->getProviderName(),
            	'city' => $this->geolocationIpService->getCity(),
            	'region' => $this->geolocationIpService->getRegion(),
            	'country' => $this->geolocationIpService->getCountry(),
            ]
        ]);
    }
}
