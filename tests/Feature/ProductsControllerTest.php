<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;
use App\Models\User;
use Laravel\Sanctum\Sanctum;

class ProductsControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    // Helper method to generate a random product data
    protected function generateProductData(): array
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 1, 100),
            'quantity' => $this->faker->numberBetween(1, 100),
        ];
    }
 
    /** @test */
    public function it_can_create_a_product()
    {
        Sanctum::actingAs(
            User::factory()->create(),
            []
        );

        $productData = $this->generateProductData();

        $response = $this->postJson('/api/products', $productData);

        $response->assertStatus(201)
            ->assertJson([
                'message' => 'Product created successfully',
                'data' => [
                    'name' => $productData['name'],
                    'description' => $productData['description'],
                    'price' => $productData['price'],
                    'quantity' => $productData['quantity'],
                ],
            ]);

        $this->assertDatabaseHas('products', $productData);
    }

    /** @test */
    public function it_can_update_a_product()
    {
        Sanctum::actingAs(
            User::factory()->create(),
            []
        );

        $product = Product::factory()->create();
        $updatedData = $this->generateProductData();

        $response = $this->putJson('/api/products/' . $product->id, $updatedData);

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Product updated successfully',
                'data' => [
                    'name' => $updatedData['name'],
                    'description' => $updatedData['description'],
                    'price' => $updatedData['price'],
                    'quantity' => $updatedData['quantity'],
                ],
            ]);

        $this->assertDatabaseHas('products', $updatedData);
    }

    /** @test */
    public function it_can_delete_a_product()
    {
        Sanctum::actingAs(
            User::factory()->create(),
            []
        );

        $product = Product::factory()->create();

        $response = $this->deleteJson('/api/products/' . $product->id);

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Product deleted successfully',
            ]);

        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }
}
