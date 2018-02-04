<?php

namespace App\Http\Controllers\PublicApi;

use App\Http\Controllers\Controller;
use Gmopx\LaravelOWM\LaravelOWM;
use App\Service\Weather as WeatherService;

class Weather extends Controller
{
    private $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function index($ip = '')
    {
    	$geoip = geoip($ip);
    	$lat = $geoip->getAttribute('lat');
    	$lon = $geoip->getAttribute('lon');

    	$currentWeather = $this->weatherService->getCurrentWeatherByGeoLocation($lat, 
            $lon
        );

        return response()->json([
            'ip' => $geoip->getAttribute('ip'),
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
