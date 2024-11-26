@extends('layout')

@section('title', 'Home Page')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')
<!-- Hero Section -->
<section class="hero" id="home">
    <h1>Exquisite Jewelry Collection</h1>
    <p>Discover the elegance and craftsmanship of our fine jewelry.</p>
    <input type="button" value="Shop Now">
</section>

<!-- Featured Products Section -->
<section class="featured-products" id="products">
    <h2>Featured Products</h2>
    <div class="products">
        <div class="product-card">
            <img src="{{ asset('images/gold-necklace.webp') }}" alt="Gold Necklace">
            <h3>Gold Necklace</h3>
            <p>$299</p>
        </div>
        <div class="product-card">
            <img src="{{ asset('images/diamond-ring.webp') }}" alt="Diamond Ring">
            <h3>Diamond Ring</h3>
            <p>$599</p>
        </div>
        <a href="">
            <div class="product-card">
                <img src="{{ asset('images/pearl-earrings.webp') }}" alt="Pearl Earrings">
                <h3>Pearl Earrings</h3>
                <p>$199</p>
            </div>
        </a>
    </div>
</section>

<!-- Collection Showcase Section -->
<section class="collection-showcase">
    <h2>Our Collections</h2>
    <div class="collections">
        <div class="collection">
            <img src="{{ asset('images/silver-collection.jpg') }}" alt="Silver Collection">
        </div>
        <div class="collection">
            <img src="{{ asset('images/gold-collection.jpg') }}" alt="Gold Collection">
        </div>
        <div class="collection">
            <img src="{{ asset('images/diamond-collection.jpg') }}" alt="Diamond Collection">
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials">
    <h2>What Our Customers Say</h2>
    <div class="testimonial">
        <p>"The quality of these pieces is unmatched. I wear my necklace every day!"</p>
        <strong>- Sarah K.</strong>
    </div>
    <div class="testimonial">
        <p>"Beautiful jewelry and excellent customer service. Highly recommend!"</p>
        <strong>- Michael P.</strong>
    </div>
</section>
@endsection