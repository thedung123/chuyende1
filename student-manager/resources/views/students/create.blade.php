@extends('layouts.app')

@section('content')

<h2>Thêm sinh viên</h2>

@if ($errors->any())

<div class="alert alert-danger">

@foreach ($errors->all() as $error)

<p>{{ $error }}</p>

@endforeach

</div>

@endif


<form action="{{ route('students.store') }}" method="POST">

@csrf

<div class="mb-3">

<label>Tên</label>

<input type="text" name="name" class="form-control">

</div>


<div class="mb-3">

<label>Ngành</label>

<input type="text" name="major" class="form-control">

</div>


<div class="mb-3">

<label>Email</label>

<input type="email" name="email" class="form-control">

</div>


<button class="btn btn-success">

Thêm sinh viên

</button>

</form>

@endsection