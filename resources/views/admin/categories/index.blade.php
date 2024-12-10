@extends('admin')

@section('title', 'Categories')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/all-categories.css') }}">
@endsection

@section('content')
<section class="admin-buttons-panel">
        <a href="{{ route('products.create') }}">Add Products</a>
        <a href="{{ route('products.index') }}">View Products</a>
        <a href="{{ route('categories.create') }}">Add Categories</a>
        <a href="{{ route('categories.index') }}">View Categories</a>
</section>
<section class="all-categories">
    <h1>All Categories</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>
                    <a href="{{ route('categories.edit', $category->id) }}">
                        <img class="action-icons" src="{{ asset('images/edit.svg') }}" alt="">
                    </a>
                    &nbsp;
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
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
<section>

</section>
@endsection