@extends('admin')

@section('title', 'Edit Product')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/edit-product.css') }}">
@endsection

@section('content')
<section class="edit-product-form">
    <h1>Edit Product</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ $product->name }}" required>
        <textarea name="description" required>{{ $product->description }}</textarea>
        <input type="number" name="price" value="{{ $product->price }}" required>
        <input type="file" name="image" accept="image/*">
        <button type="submit">Update Product</button>
    </form>
</section>

@endsection