<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WeatherEndPointJsonStructureTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
    	$data = [
    		'ip',
            'city',
            'temperature' => [
                'current',
                'low',
                'high',
            ],
            'wind' => [
                'speed',
                'direction'
            ]

    	];

    	$response = $this->json(
    		'GET', 
    		'/api/v1/weather/8.8.8.8'
    	);

        $response->assertJsonStructure($data);
    }
}
