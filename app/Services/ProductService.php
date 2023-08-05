<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductService
{
    /**
     * Read the products
     */
    public function index(): LengthAwarePaginator
    {
        return Product::paginate(15);
    }

    /**
     * Create a new Product
     */
    public function store(array $ProductData): Product
    {
        $product = Product::create($ProductData);

        return $product;
    }

    /**
     * Update the product
     */
    public function update(Product $product, array $ProductData): Product
    {
        $product->update($ProductData);

        return $product;
    }

    /**
     * Read the product
     */
    public function show(Product $product): Product
    {
        return $product;
    }

    /**
     * Delete the product
     */
    public function delete(Product $product): bool
    {
        return $product->delete();
    }
}
