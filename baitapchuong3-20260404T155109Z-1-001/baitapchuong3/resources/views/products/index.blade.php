@extends('layout.master')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <form method="GET" class="d-flex">
        <input type="text" name="keyword" class="form-control me-2" placeholder="Tìm sản phẩm...">
        
        <select name="sort" class="form-select me-2">
            <option value="">Sắp xếp</option>
            <option value="asc">Giá tăng</option>
            <option value="desc">Giá giảm</option>
        </select>

        <button class="btn btn-primary">Lọc</button>
    </form>

    <a href="{{ route('products.create') }}" class="btn btn-success">+ Thêm sản phẩm</a>
</div>

<div class="row">
@foreach($products as $p)
    <div class="col-md-3 mb-4">
        <div class="card shadow-sm">
            <img src="{{ asset('storage/'.$p->image) }}" class="card-img-top">

            <div class="card-body">
                <h6>{{ $p->name }}</h6>
                <p class="price">{{ number_format($p->price) }} đ</p>
                <small>{{ $p->category->name }}</small>

                <div class="mt-2">
                    <a href="{{ route('products.edit',$p->id) }}" class="btn btn-warning btn-sm">Sửa</a>

                    <!-- FORM XÓA -->
                    <form id="delete-form-{{ $p->id }}" action="{{ route('products.destroy',$p->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')

                        <button type="button" onclick="confirmDelete({{ $p->id }})" class="btn btn-danger btn-sm">
                            Xóa
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
</div>

{{ $products->links() }}

<!-- SCRIPT -->
<script>
function confirmDelete(id) {
    Swal.fire({
        title: 'Bạn chắc chưa?',
        text: "Xóa là không lấy lại được!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#ee4d2d',
        cancelButtonColor: '#aaa',
        confirmButtonText: 'Xóa',
        cancelButtonText: 'Hủy'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + id).submit();
        }
    })
}
</script>

@endsection