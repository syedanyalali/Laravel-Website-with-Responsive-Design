<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // Automatically creates an 'id' column as the primary key
            $table->string('name'); // The name of the category (e.g., Electronics, Clothing, etc.)
            $table->text('description')->nullable(); // Optional description for the category
            $table->timestamps(); // Created_at and updated_at timestamps
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories'); // Drops the 'categories' table if it exists
    }
};

