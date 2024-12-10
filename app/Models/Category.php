<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Define the table name (optional, if it's different from plural of the model name)
    protected $table = 'categories'; 

    // Specify the fillable attributes (columns that can be mass-assigned)
    protected $fillable = [
        'name', 
        'description'
    ];

    // Define the relationship with the products (one-to-many)
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
