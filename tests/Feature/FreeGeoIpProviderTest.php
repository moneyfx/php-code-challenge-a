<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FreeGeoIpProviderTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $data = [
    		'geo' => [
    			'service' => 'freegeoip',
    			'country' => 'Vietnam',
    		]
    	];

    	$response = $this->json(
    		'GET', 
    		'/api/v1/geolocation/14.163.170.48?service=freegeoip'
    	);

        $response->assertJson($data);
    }
}
