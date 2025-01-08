<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return JsonResponse
     * @param Request $request
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $products = Product::paginate(
                perPage: $request->query(key: 'per_page', default: 10)
            );

            return $this->success(
                message: __(key: 'messages.response_messages.products.index'),
                data: $products,
            );
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
            $newProduct = Product::create(attributes: $request->validated());

            return $this->success(
                message: __(key: 'messages.response_messages.products.store'),
                data: $newProduct,
            );
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
            return $this->success(
                message: __(key: 'messages.response_messages.products.show'),
            );
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
            return $this->success(
                message: __(key: 'messages.response_messages.products.update'),
            );
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
            return $this->success(
                message: __(key: 'messages.response_messages.products.destroy'),
            );
        } catch (Exception $error) {
            return $this->error(message: $error->getMessage(), code: $error->getCode());
        }
    }
}
