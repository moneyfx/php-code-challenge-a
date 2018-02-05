<?php

namespace App\Service;

use \PulkitJalan\GeoIP\GeoIP;

class GeolocationIp 
{
    const IP_API_PROVIDER = 'ip-api';
    const FREE_GEO_IP_PROVIDER = 'freegeoip';

    private $geoip;

    private $providerName;

    public function __construct(GeoIP $geoip)
    {
        $this->providerName = $this::IP_API_PROVIDER;
        $this->geoip = $geoip;
    }

    public function getProviderName()
    {
        return $this->providerName;
    }

    public function setFreegeoipAsProvider()
    {
        $this->providerName = $this::FREE_GEO_IP_PROVIDER;

        $config = [
            'driver' => 'freegeoip',
            'freegeoip' => [
                'secure' => true,
            ] ,
        ];

        $this->geoip = new GeoIP($config);
    }    

    public function setIp($ip)
    {
        $this->geoip->setIp($ip);
    }

    public function getCity()
    {
        return $this->geoip->getCity();
    }

    public function getRegion()
    {
        return $this->geoip->getRegion();
    }

    public function getCountry()
    {
        return $this->geoip->getCountry();
    }

    public function getLatitude()
    {
        return $this->geoip->getLatitude();
    }

    public function getLongitude()
    {
        return $this->geoip->getLongitude();
    }
}
