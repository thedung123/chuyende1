<h2>

Thêm bài học cho:

{{ $course->name }}

</h2>


<form method="POST"

action="{{ route('lessons.store',$course->id) }}">

@csrf


Tiêu đề:

<input type="text"

name="title">

<br><br>


Thứ tự:

<input type="number"

name="order">

<br><br>


<button type="submit">

Lưu

</button>


</form>