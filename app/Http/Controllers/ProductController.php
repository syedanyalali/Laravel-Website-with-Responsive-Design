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

    public function showProducts()
    {
        // Get 12 products per page
        $data = $this->productService->getAllProducts()->take(12);

        // Pass the paginated data to the view
        return view('pages.products', compact('data'));
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
}
