<?php

namespace App\Http\Controllers\PublicApi;

use App\Http\Controllers\Controller;

use App\Service\Weather as WeatherService;
use \PulkitJalan\GeoIP\GeoIP;

class Weather extends Controller
{
    private $ipApiService;
    private $weatherService;

    public function __construct(WeatherService $weatherService) 
    {
        $this->weatherService = $weatherService;
    }

    public function index($ip = '')
    {
        if (empty($ip)) {
            $ip = \Request::ip();
        }

        $geoip = new GeoIP();
        $geoip->setIp($ip);

        $lat = $geoip->getLatitude();
        $lon = $geoip->getLongitude();

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
