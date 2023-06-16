<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_home_page_request(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_home_page_rendered(): void
    {
        $view = $this->withViewErrors([])->view('home');

        $view->assertSee('Google Maps Demo');
    }
}
