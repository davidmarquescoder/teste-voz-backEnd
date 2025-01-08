<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Exception;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            return $this->success(message: '');
        } catch (Exception $error) {
            return $this->error(message: $error->getMessage(), code: $error->getCode());
        }
    }

    /**
     * Store a newly created resource in storage.
     * @return JsonResponse
     * @param CreateProductRequest $request
     */
    public function store(CreateProductRequest $request): JsonResponse
    {
        try {
            return $this->success(message: '');
        } catch (Exception $error) {
            return $this->error(message: $error->getMessage(), code: $error->getCode());
        }
    }

    /**
     * Display the specified resource.
     * @return JsonResponse
     * @param Product $product
     */
    public function show(Product $product): JsonResponse
    {
        try {
            return $this->success(message: '');
        } catch (Exception $error) {
            return $this->error(message: $error->getMessage(), code: $error->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     * @return JsonResponse
     * @param UpdateProductRequest $request
     * @param Product $product
     */
    public function update(UpdateProductRequest $request, Product $product): JsonResponse
    {
        try {
            return $this->success(message: '');
        } catch (Exception $error) {
            return $this->error(message: $error->getMessage(), code: $error->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     * @return JsonResponse
     * @param Product $product
     */
    public function destroy(Product $product): JsonResponse
    {
        try {
            return $this->success(message: '');
        } catch (Exception $error) {
            return $this->error(message: $error->getMessage(), code: $error->getCode());
        }
    }
}
