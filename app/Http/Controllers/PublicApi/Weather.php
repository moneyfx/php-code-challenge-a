<?php

namespace App\Http\Controllers\PublicApi;

use App\Http\Controllers\Controller;

use App\Service\Weather as WeatherService;
use App\Service\IpApi as IpApiService;

class Weather extends Controller
{
    private $ipApiService;
    private $weatherService;

    public function __construct(
        WeatherService $weatherService, 
        IpApiService $ipApiService
    ) {
        $this->weatherService = $weatherService;
        $this->ipApiService = $ipApiService;
    }

    public function index($ip = '')
    {
        if (empty($ip)) {
            $ip = \Request::ip();
        }
        
        $location = $this->ipApiService->getLocation($ip);

    	$lat = $location->getAttribute('lat');
    	$lon = $location->getAttribute('lon');

    	$currentWeather = $this->weatherService->getCurrentWeatherByGeoLocation($lat, 
            $lon
        );

        return response()->json([
            'ip' => $location->getAttribute('ip'),
            'city' => $currentWeather->city->name,
            'temperature' => [
                'current' => $currentWeather->temperature->now->getValue(),
                'low' => $currentWeather->temperature->min->getValue(),
                'high' => $currentWeather->temperature->max->getValue(),
            ],
            'wind' => [
                'speed' => $currentWeather->wind->speed->getValue(),
                'direction' => $currentWeather->wind->direction->getValue(),
            ]
        ]);
    }
}
