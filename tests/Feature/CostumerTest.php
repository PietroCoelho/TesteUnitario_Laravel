<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CostumerTest extends TestCase
{
    /**
     * A basic feature test example.
     *@test
     * 
     */
    public function only_logged_in_users_can_see_costumers_list()
    {
        $response = $this->get('/costumers')
        ->assertRedirect('/login');
    }
}
