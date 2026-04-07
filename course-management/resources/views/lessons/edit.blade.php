<h2>Sửa lesson</h2>


<form method="POST"
action="{{ route('lessons.update',$lesson->id) }}">

@csrf
@method('PUT')


Tiêu đề:

<input type="text"
name="title"
value="{{ $lesson->title }}">


<br><br>


Order:

<input type="number"
name="order"
value="{{ $lesson->order }}">


<br><br>


<button type="submit">

Cập nhật

</button>


</form>