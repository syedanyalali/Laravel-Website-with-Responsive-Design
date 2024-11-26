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
    ];
}
