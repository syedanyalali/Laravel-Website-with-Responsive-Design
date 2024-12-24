<?php
namespace App\Http\Controllers\Api;
use App\Services\ProductService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ProductApiController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $data = $this->productService->getAllProducts();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $response = $this->productService->createProduct($request);
        return response()->json($response);
    }

    public function edit(Request $request)
    {
        $response = $this->productService->getProduct($request->id);
        return response()->json($response);
    }

    public function update(Request $request)
    {
        $response = $this->productService->updateProduct($request);
        return response()->json($response);
    }

    public function destroy($id)
    {
        $response = $this->productService->deleteProduct($id);
        return response()->json($response);
    }
}
