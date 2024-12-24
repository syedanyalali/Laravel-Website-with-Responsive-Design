<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        // Fetch the latest 6 products with their associated category
        $products = Product::with('category')->orderBy('created_at', 'desc')->take(8)->get();

        // Fetch only the latest 6 featured products
        $featured_products = Product::where('featured', true)->orderBy('created_at', 'desc')->take(8)->get();

        // Pass products to the home view
        return view('pages.home', compact('products', 'featured_products'));
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
