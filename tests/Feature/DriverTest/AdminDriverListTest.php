<?php

namespace DriverTest;

use App\Models\Driver;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminDriverListTest extends TestCase
{
    use RefreshDatabase;
    public function test_driver_list_returns_paginated_data_correctly(): void
    {
        Driver::factory(6)->create();
        $response = $this->get('api/driver');
        $response->assertStatus(200);
        $response->assertJsonCount(6,'data');
        $response->assertJsonPath('meta.last_page',2);
    }
}
