<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Primary key for products
            $table->string('name'); // Product name
            $table->text('description'); // Product description
            $table->decimal('price', 8, 2); // Product price with 2 decimal points
            $table->string('image')->nullable(); // Optional image for the product
            $table->boolean('featured')->default(false); // featured column with a default value
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Foreign key linking to the categories table
            $table->timestamps(); // Created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
