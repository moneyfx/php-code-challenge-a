<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BadRequestTest extends TestCase
{
    /**
     * Test a bad request, return status should be 400
     *
     * @return void
     */
    public function testExample()
    {
    	$response = $this->get('/api/v1/geolocation/1014.163.1170.485');

        $response->assertStatus(400);
    }
}
