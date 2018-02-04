<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ValidIpTest extends TestCase
{
    /**
     * Test a request with valid IP 
     *
     * @return void
     */
    public function testExample()
    {
    	$response = $this->get('/api/v1/geolocation/8.8.8.8');

        $response->assertStatus(200);
    }
}
