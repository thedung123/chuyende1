<h2>

Danh sách bài học của khóa:

{{ $course->name }}

</h2>


<a href="{{ route('lessons.create',$course->id) }}">

Thêm bài học

</a>


<table border="1">

<tr>

<th>ID</th>
<th>Tiêu đề</th>
<th>Order</th>
<th>Action</th>
</tr>


@foreach($lessons as $lesson)
<td>

<a href="{{ route('lessons.edit',$lesson->id) }}">
Sửa
</a>


|

<form action="{{ route('lessons.destroy',$lesson->id) }}"
method="POST"
style="display:inline">

@csrf
@method('DELETE')


<button type="submit">

Xóa

</button>


</form>

</td>

<tr>

<td>{{ $lesson->id }}</td>

<td>{{ $lesson->title }}</td>

<td>{{ $lesson->order }}</td>

</tr>

@endforeach


</table>


<br>


<a href="{{ route('courses.index') }}">

Quay lại Course

</a>