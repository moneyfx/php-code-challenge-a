<?php

namespace App\Service;

use Gmopx\LaravelOWM\LaravelOWM as LaravelOWM;

class Weather 
{
    private $lowm;

    public function __construct(LaravelOWM $lowm)
    {
        $this->lowm = $lowm;
    }

    public function getCurrentWeatherByGeoLocation($lat, $lon)
    {
        return $this->lowm->getCurrentWeather([
            'lat' => $lat,
            'lon' => $lon,
        ]);
    }
}
