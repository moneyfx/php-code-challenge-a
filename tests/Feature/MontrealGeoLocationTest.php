<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MontrealGeoLocationTest extends TestCase
{
    /**
     * Get Montreal City by ip
     *
     * @return void
     */
    public function testExample()
    {
    	$data = [
    		'geo' => [
    			'city' => 'Montreal',
    		]
    	];

    	$response = $this->json(
    		'GET', 
    		'/api/v1/geolocation/104.163.170.48'
    	);

        $response->assertJson($data);
    }
}
