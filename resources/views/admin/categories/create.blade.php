@extends('admin')

@section('title', 'Add Category')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/add-category.css') }}">
@endsection

@section('content')
<section class="admin-buttons-panel">
        <a href="{{ route('products.create') }}">Add Products</a>
        <a href="{{ route('products.index') }}">View Products</a>
        <a href="{{ route('categories.create') }}">Add Categories</a>
        <a href="{{ route('categories.index') }}">View Categories</a>
</section>
    <section class="add-category-form">
        <h1>Add Category</h1>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Category Name" required>
            <textarea name="description" placeholder="Category Description"></textarea>
            <button type="submit">Add Category</button>
        </form>
    </section>
@endsection
