<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\Api\ProductResource;
use App\Models\Product;
use App\Services\ProductService;
use App\Traits\ApiResponser;

class ProductController extends Controller
{
    use ApiResponser;

    private ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = $this->productService->index();

        return $this->successResponse(ProductResource::collection($response), 'Products retrieved');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $response = $this->productService->store($request->validated());

        return $this->successResponse(new ProductResource($response), 'Product created successfully', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $response = $this->productService->show($product);

        return $this->successResponse(new ProductResource($response), 'Product retrieved');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $response = $this->productService->update($product, $request->validated());

        return $this->successResponse(new ProductResource($response), 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $response = $this->productService->delete($product);
        $message = $response ? 'Product deleted successfully' : 'Product not deleted';

        return $this->successResponse([], $message);
    }
}
