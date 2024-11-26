@extends('admin')

@section('title', 'Add Product')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/add-product.css') }}">
@endsection

@section('content')
<section class="add-product-form">
    <h1>Add Product</h1>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" placeholder="Product Name" required>
        <textarea name="description" placeholder="Product Description" required></textarea>
        <input type="number" name="price" placeholder="Price" required>
        <input type="file" name="image" accept="image/*">
        <button type="submit">Add Product</button>
    </form>
</section>

@endsection