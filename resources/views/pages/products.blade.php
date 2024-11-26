@extends('layout')

@section('title', 'Products Page')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/products.css') }}">
@endsection

@section('content')
<!-- Page Container -->
<div class="container">
    <!-- Sidebar Filters -->
    <aside class="sidebar">
        <h2>Filter Products</h2>

        <div class="filter-group">
            <label for="category">Category</label>
            <select id="category">
                <option value="all">All</option>
                <option value="necklaces">Necklaces</option>
                <option value="rings">Rings</option>
                <option value="bracelets">Bracelets</option>
            </select>
        </div>

        <div class="filter-group">
            <label for="price-range">Price Range</label>
            <select id="price-range">
                <option value="all">All</option>
                <option value="0-50">$0 - $50</option>
                <option value="51-100">$51 - $100</option>
                <option value="101-200">$101 - $200</option>
                <option value="200+">$200+</option>
            </select>
        </div>

        <div class="filter-group">
            <label>Material</label>
            <label><input type="checkbox" name="material" value="gold"> Gold</label>
            <label><input type="checkbox" name="material" value="silver"> Silver</label>
            <label><input type="checkbox" name="material" value="diamond"> Diamond</label>
        </div>
    </aside>

    <!-- Product Grid -->
    <section class="product-grid">
        <div class="product-card">
            <img src="{{ asset('images/gold-necklace.webp') }}" alt="Gold Necklace">
            <h3>Gold Necklace</h3>
            <p>Elegant and timeless.</p>
            <span class="price">$299</span>
        </div>
        <div class="product-card">
            <img src="{{ asset('images/diamond-ring.webp') }}" alt="Diamond Ring">
            <h3>Diamond Ring</h3>
            <p>Perfect for special occasions.</p>
            <span class="price">$499</span>
        </div>
        <div class="product-card">
            <img src="{{ asset('images/pearl-earrings.webp') }}" alt="Pearl Earrings">
            <h3>Pearl Earrings</h3>
            <p>Classic and beautiful.</p>
            <span class="price">$199</span>
        </div>
        <!-- Additional product cards here -->
    </section>
</div>

<!-- Pagination -->
<div class="pagination">
    <a href="#">&laquo;</a>
    <a href="#">1</a>
    <a href="#">2</a>
    <a href="#">3</a>
    <a href="#">&raquo;</a>
</div>
@endsection