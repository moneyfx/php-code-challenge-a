<?php

namespace App\Service;

use Torann\GeoIP\Facades\GeoIP as GeoIP;

class IpApi 
{
    private $geoIp;

    public function __construct(GeoIP $geoIp)
    {
        $this->geoIp = $geoIp;
    }

    public function getLocation($ip)
    {
        return $this->geoIp::getLocation($ip);
    }
}
