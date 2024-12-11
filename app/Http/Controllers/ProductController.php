<?php

// app/Http/Controllers/ProductController.php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    // Display a listing of the products
    public function index()
    {
        // Retrieve all products along with their associated categories
        $products = Product::with('category')->get();

        return view('admin.products.index', compact('products'));
    }

    // Display the form to create a new product
    public function create()
    {
        // Retrieve all categories from the database
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    // Store a newly created product
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id', // Validation for category selection
            'image' => 'nullable|image|max:2048',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id; // Store the selected category_id

        // Handle the image upload if there's a file
        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('products', 'public');
        }

        $product->save();

        return redirect()->route('products.index');
    }

    // Display the form to edit a product
    public function edit(Product $product)
    {
        // Retrieve all categories from the database
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    // Update an existing product
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id', // Validation for category selection
            'image' => 'nullable|image|max:2048',
        ]);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id; // Update the category_id

        // Handle the image upload if there's a new file
        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('products', 'public');
        }

        $product->save();

        return redirect()->route('products.index');
    }
    
    // Delete the existing product
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }

    // Showing products on products page
    public function showProducts()
    {
        $products = Product::paginate(12); // Fetch 12 products per page
        return view('pages.products', compact('products'));
    }

    // Search products in search bar on header
    public function search(Request $request)
{
    $query = $request->input('query');

    // Search for products by name, description, or other fields
    $products = Product::where('name', 'LIKE', "%$query%")
        ->orWhere('description', 'LIKE', "%$query%")
        ->paginate(12); // Paginate the results

    return view('pages.products', compact('products', 'query'));
}
}
