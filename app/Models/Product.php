<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Make sure these attributes are fillable to avoid mass-assignment protection
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function home()
    {
        $products = Product::with('category')->take(6)->get(); // Fetch 6 products with their category
        return view('pages.home', compact('products'));
    }
}
