<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $data = $this->productService->getAllProducts();
        return view('admin.products.index', compact('data'));
    }

    // public function showProducts()
    // {
    //     // Paginate the products (12 per page)
    //     $products = $this->productService->getAllpaginateProducts();

    //     // Pass the paginated data to the view
    //     return view('pages.products', compact('products'));
    // }

    public function showProducts()
    {
        $products = $this->productService->getAllpaginateProducts();

        if (!($products instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator)) {
            abort(500, 'Pagination failed. Ensure proper paginator is returned.');
        }

        return view('pages.products', compact('products'));
    }


    public function show($id)
    {
        $product = $this->productService->getSingleProduct($id); // Retrieve product by ID
        return view('pages.product-detail', compact('product'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $response = $this->productService->createProduct($request);
        Session::flash('message', $response['message']);
        Session::flash('alert-class', $response['success'] ? 'alert-success' : 'alert-danger');
        return redirect(route('products.index'));
    }

    public function edit($id)
    {
        $product = $this->productService->getProduct($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)  // Accept $id as a parameter
    {
        // Add the 'id' field directly to the request data so it can be validated
        $request->merge(['id' => $id]);

        $response = $this->productService->updateProduct($request);
        Session::flash('message', $response['message']);
        Session::flash('alert-class', $response['success'] ? 'alert-success' : 'alert-danger');
        return redirect(route('products.index'));
    }

    public function destroy($id)
    {
        $response = $this->productService->deleteProduct($id);
        Session::flash('message', $response['message']);
        Session::flash('alert-class', $response['success'] ? 'alert-success' : 'alert-danger');
        return redirect(route('products.index'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query'); // Get the search query from the request
        $products = $this->productService->searchProducts($query); // Call a service method to handle the search
        return view('pages.products', compact('products')); // Return the view with the search results
    }
}
