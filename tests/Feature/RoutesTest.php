<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testOrdersAvailable()
    {
        $response = $this->get(route('orders.index'));

        $response->assertStatus(200);
    }
    public function testFeedbackAvailable()
    {
        $response = $this->get(route('feedback.index'));

        $response->assertStatus(200);
    }
    public function testRegisterAvailable()
    {
        $response = $this->get(route('register.index'));

        $response->assertStatus(200);
    }
    public function testCategoryAvailable()
    {
        $response = $this->get(route('category.index'));

        $response->assertStatus(200);
    }
}
