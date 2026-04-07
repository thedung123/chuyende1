@if(session('success'))

<p style="color:green">

{{ session('success') }}

</p>

@endif
<a href="{{ route('courses.index') }}">
Quay lại danh sách
</a>

<br><br>
<h2>Khóa học đã xóa</h2>

<table border="1">

<tr>

<th>ID</th>
<th>Tên</th>
<th>Khôi phục</th>

</tr>

@foreach($courses as $course)

<tr>

<td>{{ $course->id }}</td>

<td>{{ $course->name }}</td>

<td>

<a href="{{ route('courses.restore',$course->id) }}">

Restore

</a>

</td>

</tr>

@endforeach

</table>