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
        'featured',
        'category_id',
    ];
    protected $casts = [
        'featured' => 'boolean',
        'price' => 'float',
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
