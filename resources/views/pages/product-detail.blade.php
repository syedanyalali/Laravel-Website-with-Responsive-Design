@extends('layout')

@section('title', 'Single Product Page')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/product-detail.css') }}">
@endsection

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h1>{{ $product->name }}</h1>
            <p class="text-muted">Category: {{ $product->category->name }}</p>
            <p>{{ $product->description }}</p>
            <h4>${{ number_format($product->price, 2) }}</h4>
        </div>
    </div>
</div>
@endsection
