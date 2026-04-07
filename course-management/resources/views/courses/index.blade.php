<!DOCTYPE html>
<html>

<head>

<title>Danh sách khóa học</title>

</head>

<body>

<h2>Danh sách khóa học</h2>

<a href="{{ route('courses.create') }}">
Thêm khóa học
</a>

|

<a href="{{ route('courses.trash') }}">
Xem thùng rác
</a>

<br><br>


@if(session('success'))

<p style="color:green">

{{ session('success') }}

</p>

@endif


<table border="1" cellpadding="10">

<tr>

<th>ID</th>
<th>Tên</th>
<th>Giá</th>
<th>Ảnh</th>
<th>Trạng thái</th>
<th>Số lesson</th>
<th>Lesson</th>
<th>Action</th>

</tr>


@foreach($courses as $course)

<tr>

<td>{{ $course->id }}</td>

<td>{{ $course->name }}</td>

<td>{{ $course->price }}</td>


<td>

@if($course->image)

<img src="{{ asset('storage/'.$course->image) }}"
width="80">

@endif

</td>


<td>

@if($course->status == 'published')

<span style="color:green">

Published

</span>

@else

<span style="color:red">

Draft

</span>

@endif

</td>


<td>

{{ $course->lessons_count }}

</td>


<td>

<a href="{{ route('lessons.index',$course->id) }}">
Lesson
</a>

</td>


<td>

<a href="{{ route('courses.edit',$course->id) }}">
Sửa
</a>

|

<form action="{{ route('courses.destroy',$course->id) }}"
method="POST"
style="display:inline;">

@csrf
@method('DELETE')

<button type="submit">

Xóa

</button>

</form>

</td>


</tr>

@endforeach

</table>


<br>

{{ $courses->links() }}


</body>

</html>