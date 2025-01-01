<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ProductService
{
    /**
     * Get all products.
     */
    public function getAllProducts()
    {
        return Product::all();
    }

    // public function getAllpaginateProducts()
    // {
    //     return Product::query();
    // }

    public function getAllpaginateProducts()
    {
        return Product::paginate(12);
    }

    public function getSingleProduct($id)
    {
        return Product::with('category')->findOrFail($id); // Include related category if needed
    }


    /**
     * Create a new product.
     */
    // public function createProduct(Request $request)
    // {
    //     Log::info('Product creation request data:', $request->all());

    //     $request->validate([
    //         'name' => 'required|max:255',
    //         'description' => 'required|string',
    //         'price' => 'required|numeric',
    //         'category_id' => 'required|exists:categories,id',
    //         'image' => 'nullable|string|max:2048',
    //         'featured' => 'required|boolean',
    //     ]);

    //     try {
    //         $product = new Product($request->all());

    //         if ($request->hasFile('image')) {
    //             $product->image = $request->file('image')->store('products', 'public');
    //         }

    //         $product->save();
    //         Log::info('Product created:', $product->toArray());

    //         return ['success' => true, 'message' => 'Product created successfully!'];
    //     } catch (\Exception $e) {
    //         Log::error('Product creation failed: ' . $e->getMessage());
    //         return ['success' => false, 'message' => 'Something went wrong. Please try again later.'];
    //     }
    // }

    public function createProduct(Request $request)
    {
        Log::info('Product creation request data:', $request->all());

        // Validate the request
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable', // Relax validation to handle both file and string
            'featured' => 'required|boolean',
        ]);

        return DB::transaction(function () use ($request) {
            try {
                $product = new Product($request->all());

                // Handle the image logic
                if ($request->hasFile('image')) {
                    // If the image is a file upload
                    $product->image = $request->file('image')->store('products', 'public');
                } elseif ($request->filled('image') && is_string($request->image)) {
                    // If the image is a string path
                    $product->image = $request->image;
                }

                $product->save();
                Log::info('Product created:', $product->toArray());

                return ['success' => true, 'message' => 'Product created successfully!'];
            } catch (\Exception $e) {
                Log::error('Product creation failed: ' . $e->getMessage());
                return ['success' => false, 'message' => 'Something went wrong. Please try again later.'];
            }
        });
    }

    /**
     * Get product details.
     */
    public function getProduct($id)
    {
        return Product::findOrFail($id);
    }

    /**
     * Update an existing product.
     */
    // public function updateProduct(Request $request)
    // {
    //     // Ensure id is provided in the request
    //     if (!$request->has('id')) {
    //         return ['success' => false, 'message' => 'Product ID is missing.'];
    //     }

    //     $request->validate([
    //         'id' => 'required|exists:products,id',
    //         'name' => 'required|max:255',
    //         'description' => 'required|string',
    //         'price' => 'required|numeric',
    //         'category_id' => 'required|exists:categories,id',
    //         'image' => 'nullable|string|max:2048',
    //         'featured' => 'required|boolean',
    //     ]);

    //     $product = Product::findOrFail($request->id);

    //     try {
    //         $product->fill($request->all());

    //         // Handle the image upload if a new image is provided
    //         if ($request->hasFile('image')) {
    //             $product->image = $request->file('image')->store('products', 'public');
    //         }

    //         $product->save();

    //         return ['success' => true, 'message' => 'Product updated successfully!'];
    //     } catch (\Exception $e) {
    //         Log::error('Product update failed: ' . $e->getMessage());
    //         return ['success' => false, 'message' => 'Something went wrong. Please try again later.'];
    //     }
    // }

    public function updateProduct(Request $request)
    {
        // Ensure id is provided in the request
        if (!$request->has('id')) {
            return ['success' => false, 'message' => 'Product ID is missing.'];
        }

        // Validate request data
        $request->validate([
            'id' => 'required|exists:products,id',
            'name' => 'required|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable', // Relax validation for image
            'featured' => 'required|boolean',
        ]);

        // Find the product by ID
        $product = Product::findOrFail($request->id);

        // Start transaction
        return DB::transaction(function () use ($request, $product) {
            try {
                // Update attributes except for the image field
                $product->fill($request->except('image', 'id'));

                // Handle the image logic
                if ($request->hasFile('image')) {
                    // If the image is a file upload
                    $product->image = $request->file('image')->store('products', 'public');
                } elseif ($request->filled('image') && is_string($request->image)) {
                    // If the image is a string path (e.g., the uploaded image URL)
                    $product->image = $request->image;
                } elseif ($request->image === null) {
                    // If the image is explicitly set to null
                    $product->image = null;
                }

                // Save the updated product
                $product->save();

                // Log the successful update
                Log::info('Product updated successfully:', $product->toArray());

                return ['success' => true, 'message' => 'Product updated successfully!'];
            } catch (\Exception $e) {
                // Log the error if something goes wrong
                Log::error('Product update failed: ' . $e->getMessage());
                return ['success' => false, 'message' => 'Something went wrong. Please try again later.'];
            }
        });
    }


    /**
     * Delete a product.
     */
    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);

        try {
            $product->delete();

            return ['success' => true, 'message' => 'Product deleted successfully!'];
        } catch (\Exception $e) {
            Log::error('Product deletion failed: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Something went wrong. Please try again later.'];
        }
    }

    public function searchProducts($query)
    {
        return Product::where('name', 'LIKE', "%$query%")
            ->orWhere('description', 'LIKE', "%$query%")
            ->get();
    }
}
