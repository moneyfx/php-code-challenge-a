<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DefaultProviderTest extends TestCase
{
    /**
     * Test Default Provider of GeoIP endpoint
     *
     * @return void
     */
    public function testExample()
    {
        $data = [
    		'geo' => [
    			'service' => 'ip-api',
    		]
    	];

    	$response = $this->json(
    		'GET', 
    		'/api/v1/geolocation/8.8.8.8'
    	);

        $response->assertJson($data);
    }
}
