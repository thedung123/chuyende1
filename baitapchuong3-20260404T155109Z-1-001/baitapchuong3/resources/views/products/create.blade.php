@extends('layout.master')

@section('content')

<h4> Thêm sản phẩm</h4>

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="card p-3">
    @csrf

    <div class="mb-2">
        <label>Tên</label>
        <input name="name" class="form-control">
    </div>

    <div class="mb-2">
        <label>Giá</label>
        <input name="price" type="number" class="form-control">
    </div>

    <div class="mb-2">
        <label>Số lượng</label>
        <input name="quantity" type="number" class="form-control">
    </div>

    <div class="mb-2">
        <label>Danh mục</label>
        <select name="category_id" class="form-control">
            @foreach($categories as $c)
                <option value="{{ $c->id }}">{{ $c->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-2">
        <label>Ảnh</label>
        <input type="file" name="image" class="form-control">
    </div>

    <button class="btn btn-primary">Thêm</button>
</form>

@endsection