@extends('layouts.app')

@section('content')

<h2>Danh sách sinh viên</h2>


@if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif


<a href="{{ route('students.create') }}"
class="btn btn-primary mb-3">

Thêm sinh viên

</a>


<form method="GET" class="mb-3">

<input type="text"
name="search"
placeholder="Tìm theo tên"
class="form-control">

</form>


<table class="table table-bordered">

<tr>

<th>ID</th>

<th>Tên</th>

<th>Ngành</th>

<th>Email</th>

</tr>


@foreach($students as $student)

<tr>

<td>{{ $student->id }}</td>

<td>{{ $student->name }}</td>

<td>{{ $student->major }}</td>

<td>{{ $student->email }}</td>

</tr>

@endforeach


</table>


{{ $students->links() }}

@endsection