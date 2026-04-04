@extends('layout.master')

@section('content')

<h4>Sửa sản phẩm</h4>

<form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data" class="card p-3">
    @csrf
    @method('PUT')

    <input name="name" value="{{ $product->name }}" class="form-control mb-2">

    <input name="price" value="{{ $product->price }}" class="form-control mb-2">

    <input name="quantity" value="{{ $product->quantity }}" class="form-control mb-2">

    <select name="category_id" class="form-control mb-2">
        @foreach($categories as $c)
            <option value="{{ $c->id }}" {{ $product->category_id == $c->id ? 'selected' : '' }}>
                {{ $c->name }}
            </option>
        @endforeach
    </select>

    <input type="file" name="image" class="form-control mb-2">

    <button class="btn btn-warning">Cập nhật</button>
</form>

@endsection