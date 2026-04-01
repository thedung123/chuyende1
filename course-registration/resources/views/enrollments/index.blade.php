@extends('layouts.app')

@section('content')

<h2>Đăng ký môn học</h2>


@if(session('error'))

<div class="alert alert-danger">

{{ session('error') }}

</div>

@endif


@if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif


<form method="POST"
action="/enrollments">

@csrf


<select name="student_id"
class="form-control mb-2">

@foreach($students as $student)

<option value="{{ $student->id }}">

{{ $student->name }}

</option>

@endforeach

</select>


<select name="course_id"
class="form-control mb-2">

@foreach($courses as $course)

<option value="{{ $course->id }}">

{{ $course->name }}
({{ $course->credits }} tín chỉ)

</option>

@endforeach

</select>


<button class="btn btn-primary">

Đăng ký

</button>

</form>


<hr>


<h4>Danh sách đăng ký</h4>


<table class="table table-bordered">

<tr>

<th>Sinh viên</th>

<th>Môn học</th>

<th>Tín chỉ</th>

</tr>


@foreach($enrollments as $e)

<tr>

<td>{{ $e->student->name }}</td>

<td>{{ $e->course->name }}</td>

<td>{{ $e->course->credits }}</td>

</tr>

@endforeach

</table>

@endsection