@extends('admin')

@section('title', 'Edit Category')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/edit-category.css') }}">
@endsection

@section('content')
<section class="admin-buttons-panel">
        <a href="{{ route('products.create') }}">Add Products</a>
        <a href="{{ route('products.index') }}">View Products</a>
        <a href="{{ route('categories.create') }}">Add Categories</a>
        <a href="{{ route('categories.index') }}">View Categories</a>
</section>
<section class="edit-category-form">
    <h1>Edit Category</h1>
    <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ $category->name }}" required>
        <textarea name="description" required>{{ $category->description }}</textarea>
        
        <button type="submit">Update Category</button>
    </form>
</section>

@endsection
