<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Faker\Factory;
use Illuminate\Support\Facades\Log;
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
        // Log::info(1, [$response->getContent()]); -> Serve com Histórico eu acho, Arquivo @laravel.log
        // post request create product -> post request criar produto
        // then -> Então
        // product exists -> Produto Existe
        $response
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'slug',
                    'price',
                ]
            ])
            ->assertJson([
                'data' => [
                    'name' => $name,
                    'slug' => str_slug($name),
                    'price' => $price
                ]
            ])
            ->assertStatus(201);
        $this->assertDatabaseHas('products', [
            'name' => $name,
            'slug' => str_slug($name),
            'price' => $price
        ]);
    }

    /**
     * @test
     */

    public function can_return_a_product()
    {

        //    Given
        $product = $this->create('Product');
        //    When

        //    Then
    }
}
/**according to the model that we pass to make
 * this happen we also use model factories so 
 * now we can say product equals to factory and 
 * we can use now the model that we pass create and 
 * we pass the attributes if we have any because  we
 * make use of api resource it is a good idea to convert
 *  this product to a product resource so return new product
 *  resource and we pass the product okay we have to import
 *  this so use up eight tdd resource product product resource ok 
 * now this is done so we can close this test case and we can make
 * use of this inside our given so product equals to this create
 * and we want to create a product remember that this is the model
 *  name so the model name is right inside the app so as you can see
 *  the name of the model is product and this is the exact
 *  same name ok so now we create resources in our case we create a product
 *  there is no need to have this code because what we could do is to actually
 *  take this code and we could use the response get content to get the ID
 *  and then we could pass the ID to the endpoint to grab the product
 *  but we are going to see this later there is no need to actually copy
 *  this code and use this code no need for that we can just use model factories
 *  in order to create product so what is missing right now is the factory
 *  to create the model so data base ok so i will just copy the code
 *  from the user and create one for the product right paste delete the
 *  comments okay so this is now product i will save  the name because we need the name for the slug
 * / 









