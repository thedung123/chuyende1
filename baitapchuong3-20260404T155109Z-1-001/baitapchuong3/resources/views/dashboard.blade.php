@extends('layout.master')

@section('content')

<h3 class="mb-4">📊 Dashboard</h3>

<div class="row mb-4">
    <div class="col-md-6">
        <div class="card text-center p-3">
            <h5>Tổng sản phẩm</h5>
            <h2>{{ $totalProducts }}</h2>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card text-center p-3">
            <h5>Tổng danh mục</h5>
            <h2>{{ $totalCategories }}</h2>
        </div>
    </div>
</div>

<h4>Sản phẩm mới</h4>

<table class="table table-bordered">
    <tr>
        <th>Tên</th>
        <th>Giá</th>
    </tr>

    @foreach($latestProducts as $p)
    <tr>
        <td>{{ $p->name }}</td>
        <td>{{ number_format($p->price) }} đ</td>
    </tr>
    @endforeach
</table>

@endsection