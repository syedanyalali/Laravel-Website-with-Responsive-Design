<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryService
{
    /**
     * Get all categories.
     */
    public function getAllCategories()
    {
        return Category::all();
    }

    /**
     * Create a new category.
     */
    public function createCategory(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        try {
            // Create a new category
            $category = new Category($request->all());

            // Save the category to the database
            $category->save();

            return ['success' => true, 'message' => 'Category created successfully!'];
        } catch (\Exception $e) {
            // Log any errors during category creation
            Log::error('Category creation failed: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Something went wrong. Please try again later.'];
        }
    }

    /**
     * Get category details.
     */
    public function getCategory($id)
    {
        return Category::findOrFail($id);
    }

    /**
     * Update an existing category.
     */
    public function updateCategory(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Find the category by ID
        $category = Category::findOrFail($request->id);

        try {
            // Update the category's details
            $category->fill($request->all());
            $category->save();

            return ['success' => true, 'message' => 'Category updated successfully!'];
        } catch (\Exception $e) {
            // Log any errors during category update
            Log::error('Category update failed: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Something went wrong. Please try again later.'];
        }
    }

    /**
     * Delete a category.
     */
    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);

        try {
            // Delete the category
            $category->delete();

            return ['success' => true, 'message' => 'Category deleted successfully!'];
        } catch (\Exception $e) {
            // Log any errors during category deletion
            Log::error('Category deletion failed: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Something went wrong. Please try again later.'];
        }
    }
}
