<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    // Display all categories
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    // Show the form to create a new category
    public function create()
    {
        // Retrieve all categories
        $categories = Category::all();
        return view('admin.categories.create', compact('categories'));
    }

    // Store a newly created category
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Create a new category
        Category::create($validated);

        // Flash a success message to the session
        Session::flash('message', 'Category created successfully!');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('categories.index');
    }

    // Show the form to edit an existing category
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    // Update an existing category
    public function update(Request $request, Category $category)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Update the category attributes
        $category->name = $request->name;
        $category->description = $request->description;

        // Save the updated category
        $category->save();

        // Flash a success message to the session
        Session::flash('message', 'Category updated successfully!');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('categories.index');
    }

    // Delete a category
    public function destroy(Category $category)
    {
        // Delete the category
        $category->delete();

        // Flash a success message to the session
        Session::flash('message', 'Category deleted successfully!');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('categories.index');
    }
}
