<?php

namespace App\Http\Controllers\PublicApi;

use App\Http\Controllers\Controller;
use App\Service\Weather as WeatherService;
use App\Service\GeolocationIp as GeolocationIpService;

class Weather extends Controller
{
    private $geolocationIpService;
    private $weatherService;

    public function __construct(
        WeatherService $weatherService,
        GeolocationIpService $geolocationIpService
    ) {
        $this->weatherService = $weatherService;
        $this->geolocationIpService = $geolocationIpService;
    }

    public function index($ip = '')
    {
        if (empty($ip)) {
            $ip = \Request::ip();
        }

        $this->geolocationIpService->setIp($ip);

        $lat = $this->geolocationIpService->getLatitude();
        $lon = $this->geolocationIpService->getLongitude();

    	$currentWeather = $this->weatherService->getCurrentWeatherByGeoLocation($lat, 
            $lon
        );

        return response()->json([
            'ip' => $ip,
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
