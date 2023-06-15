<?php

namespace Tests\Feature;
use App\Models\Location;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DatabaseTest extends TestCase
{
    use RefreshDatabase; # always start with fresh db

    public function test_location_model(): void
    {
        Location::factory()->count(5)->create();

        $this->assertDatabaseCount('locations', 5);
    }
}
