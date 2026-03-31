@extends('layouts.app')

@section('content')

<h2>Thêm sản phẩm</h2>

<form method="POST" action="{{ route('products.store') }}">

@csrf

Tên
<input name="name" class="form-control mb-2">

Giá
<input name="price" class="form-control mb-2">

Số lượng
<input name="quantity" class="form-control mb-2">

Danh mục
<input name="category" class="form-control mb-2">

<button class="btn btn-success">
Thêm
</button>

</form>

@endsection