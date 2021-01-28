<?php

namespace Tests\Feature\Http\Controllers\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Faker\Factory;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @test
     */

    //Pode criar um produto

    public function can_create_a_product()
    {
        $this->withoutExceptionHandling();
        $faker = Factory::create();
        // Given -> Dado
        // user is authenticated -> o usuário está autenticado
        // when -> Quando
        $response = $this->json('POST', '/api/product', [
            'name' => $name = $faker->company,
            'slug' => str_slug($name),
            'price' => $price = random_int(10, 100),
        ]);
        // post request create product -> post request criar produto
        // then -> Então
        // product exists -> Produto Existe
        $response
            ->assertJsonStructure(['id', 'name', 'slug', 'price', 'created_at'])
            ->assertJson([
                'name' => $name,
                'slug' => str_slug($name),
                'price' => $price
            ])
            ->assertStatus(201);

        // dd($response);

        $this->assertDatabaseHas('products', [
            'name' => $name,
            'slug' => str_slug($name),
            'price' => $price
        ]);
    }
}
        // $response = $this->get('/');
        // $response->assertStatus(200);