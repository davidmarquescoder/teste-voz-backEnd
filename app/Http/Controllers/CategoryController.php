<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return JsonResponse
     * @param Request $request
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $categories = Category::with(relations: 'products')->paginate(
                perPage: $request->query(key: 'per_page', default: 10)
            );

            return $this->success(
                message: __(key: 'messages.response_messages.categories.index'),
                data: $categories,
                code: Response::HTTP_OK,
            );
        } catch (Exception $error) {
            return $this->error(message: $error->getMessage(), code: $error->getCode());
        }
    }

    /**
     * Store a newly created resource in storage.
     * @return JsonResponse
     * @param CreateCategoryRequest $request
     */
    public function store(CreateCategoryRequest $request): JsonResponse
    {
        try {
            $newCategory = Category::create(attributes: $request->validated());

            return $this->success(
                message: __(key: 'messages.response_messages.categories.store'),
                data: $newCategory,
                code: Response::HTTP_CREATED,
            );
        } catch (Exception $error) {
            return $this->error(message: $error->getMessage(), code: $error->getCode());
        }
    }

    /**
     * Display the specified resource.
     * @return JsonResponse
     * @param Category $category
     */
    public function show(Category $category): JsonResponse
    {
        try {
            $category->load(relations: 'products');

            return $this->success(
                message: __(key: 'messages.response_messages.categories.show'),
                data: $category,
                code: Response::HTTP_OK,
            );
        } catch (Exception $error) {
            return $this->error(message: $error->getMessage(), code: $error->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     * @return JsonResponse
     * @param UpdateCategoryRequest $request
     * @param Category $category
     */
    public function update(UpdateCategoryRequest $request, Category $category): JsonResponse
    {
        try {
            $category->update(attributes: $request->validated());

            return $this->success(
                message: __(key: 'messages.response_messages.categories.update'),
                data: $category,
                code: Response::HTTP_OK,
            );
        } catch (Exception $error) {
            return $this->error(message: $error->getMessage(), code: $error->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     * @return JsonResponse
     * @param Category $category
     */
    public function destroy(Category $category): JsonResponse
    {
        try {
            $category->delete();

            return $this->success(
                message: __(key: 'messages.response_messages.categories.destroy'),
                code: Response::HTTP_NO_CONTENT,
            );
        } catch (Exception $error) {
            return $this->error(message: $error->getMessage(), code: $error->getCode());
        }
    }
}
