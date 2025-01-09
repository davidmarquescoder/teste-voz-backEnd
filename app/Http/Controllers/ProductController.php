<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

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
            $products = Product::with(relations: 'category')->paginate(
                perPage: $request->query(key: 'per_page', default: 10)
            );

            return $this->success(
                message: __(key: 'messages.response_messages.products.index'),
                data: $products,
                code: Response::HTTP_OK,
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
                code: Response::HTTP_CREATED,
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
            $product->load(relations: 'category');

            return $this->success(
                message: __(key: 'messages.response_messages.products.show'),
                data: $product,
                code: Response::HTTP_OK,
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
            $product->update(attributes: $request->validated());

            return $this->success(
                message: __(key: 'messages.response_messages.products.update'),
                data: $product,
                code: Response::HTTP_OK,
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
            $product->delete();

            return $this->success(
                message: __(key: 'messages.response_messages.products.destroy'),
                code: Response::HTTP_NO_CONTENT,
            );
        } catch (Exception $error) {
            return $this->error(message: $error->getMessage(), code: $error->getCode());
        }
    }
}
