@extends('admin')

@section('title', 'All Products')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/all-products.css') }}">
@endsection

@section('content')
<section class="all-products">
    <h1>All Products</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>${{ $product->price }}</td>
                <td>
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="50">
                </td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}">
                        <img class="action-icons" src="{{ asset('images/edit.svg') }}" alt="">
                    </a>
                    &nbsp;
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">
                            <img class="action-icons" src="{{ asset('images/delete.svg') }}" alt="">
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>

@endsection