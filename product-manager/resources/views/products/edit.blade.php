@extends('layouts.app')

@section('content')

<h2>Cập nhật sản phẩm</h2>

<form method="POST"
action="{{ route('products.update',$product->id) }}">

@csrf
@method('PUT')

Tên
<input name="name"
value="{{ $product->name }}"
class="form-control mb-2">

Giá
<input name="price"
value="{{ $product->price }}"
class="form-control mb-2">

Số lượng
<input name="quantity"
value="{{ $product->quantity }}"
class="form-control mb-2">

Danh mục
<input name="category"
value="{{ $product->category }}"
class="form-control mb-2">

<button class="btn btn-success">

Cập nhật

</button>

</form>

@endsection