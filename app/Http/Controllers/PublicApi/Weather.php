<?php

namespace App\Http\Controllers\PublicApi;

use App\Http\Controllers\Controller;
use Gmopx\LaravelOWM\LaravelOWM;

class Weather extends Controller
{
    public function index($ip = '')
    {
    	$geoip = geoip($ip);
    	$lat = $geoip->getAttribute('lat');
    	$lon = $geoip->getAttribute('lon');

    	$lowm = new LaravelOWM();
    	$currentWeather = $lowm->getCurrentWeather([
    		'lat' => $lat,
            'lon' => $lon,
            ],
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
