@extends('layouts.app')

@section('content')

<h2>Danh sách sản phẩm</h2>

<a href="{{ route('products.create') }}"
class="btn btn-primary mb-3">

Thêm sản phẩm

</a>

<form method="GET">

<input name="search"
placeholder="Tìm theo tên"
class="form-control mb-3">

</form>

<table class="table table-bordered">

<tr>

<th>Tên</th>
<th>Giá</th>
<th>Số lượng</th>
<th>Danh mục</th>
<th>Trạng thái</th>
<th>Action</th>

</tr>

@foreach($products as $product)

<tr>

<td>{{ $product->name }}</td>

<td>{{ $product->price }}</td>

<td>{{ $product->quantity }}</td>

<td>{{ $product->category }}</td>

<td>

@if($product->quantity == 0)

<span class="text-danger">
Hết hàng
</span>

@elseif($product->quantity < 5)

<span class="text-warning">
Sắp hết hàng
</span>

@else

<span class="text-success">
Còn hàng
</span>

@endif

</td>

<td>

<a href="{{ route('products.edit',$product->id) }}"
class="btn btn-warning">

Sửa

</a>

<form action="{{ route('products.destroy',$product->id) }}"
method="POST"
style="display:inline">

@csrf
@method('DELETE')

<button class="btn btn-danger">

Xóa

</button>

</form>

</td>

</tr>

@endforeach

</table>

{{ $products->links() }}

@endsection