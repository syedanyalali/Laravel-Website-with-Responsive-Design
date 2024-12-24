<?php

namespace App\Http\Controllers\Api;

use App\Services\CategoryService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryApiController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Get all categories.
     */
    public function index()
    {
        $data = $this->categoryService->getAllCategories();
        return response()->json($data);
    }

    /**
     * Create a new category.
     */
    public function store(Request $request)
    {
        $response = $this->categoryService->createCategory($request);
        return response()->json($response);
    }

    /**
     * Get category details.
     */
    public function edit(Request $request)
    {
        $response = $this->categoryService->getCategory($request->id);
        return response()->json($response);
    }

    /**
     * Update an existing category.
     */
    public function update(Request $request)
    {
        $response = $this->categoryService->updateCategory($request);
        return response()->json($response);
    }

    /**
     * Delete a category.
     */
    public function destroy($id)
    {
        $response = $this->categoryService->deleteCategory($id);
        return response()->json($response);
    }
}
