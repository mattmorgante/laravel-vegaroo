<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BasicTests extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        $response = $this->get('/vegan-recipes');
        $response->assertStatus(200);

        $response = $this->get('/vegan-recipes/bowls');
        $response->assertStatus(200);

        $response = $this->get('/vegan-recipes/bowls/burrito-bowl');
        $response->assertStatus(200);

        $response = $this->get('/vegan-foods');
        $response->assertStatus(200);

//        $response = $this->get('/vegan-foods/beans');
//        $response->assertStatus(200);

        $response = $this->get('/resources');
        $response->assertStatus(200);

        $response = $this->get('/environmental-benefits');
        $response->assertStatus(200);

        $response = $this->get('/health-benefits-long-term');
        $response->assertStatus(200);

        $response = $this->get('/stop-animal-cruelty');
        $response->assertStatus(200);

        $response = $this->get('/small-steps');
        $response->assertStatus(200);

        $response = $this->get('/calculator');
        $response->assertStatus(200);

        $response = $this->get('/blogs-books-documentaries');
        $response->assertStatus(200);

        $response = $this->get('/login');
        $response->assertStatus(200);

        $response = $this->get('/register');
        $response->assertStatus(200);
    }
}
