{{-- resources/views/admin/products/create.blade.php --}}
@extends('admin')

@section('title', 'Add Product')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/add-product.css') }}">
@endsection

@section('content')
<section class="admin-buttons-panel">
        <a href="{{ route('products.create') }}">Add Products</a>
        <a href="{{ route('products.index') }}">View Products</a>
        <a href="{{ route('categories.create') }}">Add Categories</a>
        <a href="{{ route('categories.index') }}">View Categories</a>
</section>
<section class="add-product-form">
    <h1>Add Product</h1>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" placeholder="Product Name" required>
        <textarea name="description" placeholder="Product Description" required></textarea>
        <input type="number" name="price" placeholder="Price" required>
        
        {{-- Category Dropdown --}}
        <select name="category_id" required>
            <option value="" disabled selected>Select Category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        
        <input type="file" name="image" accept="image/*">
        <button type="submit">Add Product</button>
    </form>
</section>

@endsection
