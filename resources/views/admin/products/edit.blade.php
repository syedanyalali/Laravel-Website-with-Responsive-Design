{{-- resources/views/admin/products/edit.blade.php --}}
@extends('admin')

@section('title', 'Edit Product')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/edit-product.css') }}">
@endsection

@section('content')
<section class="admin-buttons-panel">
        <a href="{{ route('products.create') }}">Add Products</a>
        <a href="{{ route('products.index') }}">View Products</a>
        <a href="{{ route('categories.create') }}">Add Categories</a>
        <a href="{{ route('categories.index') }}">View Categories</a>
</section>
<section class="edit-product-form">
    <h1>Edit Product</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ $product->name }}" required>
        <textarea name="description" required>{{ $product->description }}</textarea>
        <input type="number" name="price" value="{{ $product->price }}" required>
        
        {{-- Category Dropdown --}}
        <select name="category_id" required>
            <option value="" disabled>Select Category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        
        <input type="file" name="image" accept="image/*">
        <button type="submit">Update Product</button>
    </form>
</section>

@endsection
