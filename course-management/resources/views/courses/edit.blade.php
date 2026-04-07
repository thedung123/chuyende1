<!DOCTYPE html>
<html>

<head>

<title>Sửa khóa học</title>

</head>

<body>

<h2>Sửa khóa học</h2>

@if(session('success'))

<p style="color:green">

{{ session('success') }}

</p>

@endif


<form action="{{ route('courses.update',$course->id) }}"

method="POST"

enctype="multipart/form-data">

@csrf

@method('PUT')


Tên khóa học:

<input type="text"

name="name"

value="{{ $course->name }}">

<br><br>


Giá:

<input type="number"

name="price"

value="{{ $course->price }}">

<br><br>


Mô tả:

<textarea name="description">

{{ $course->description }}

</textarea>

<br><br>


Ảnh cũ:

@if($course->image)

<img src="{{ asset('storage/'.$course->image) }}"

width="100">

@endif


<br><br>


Ảnh mới:

<input type="file" name="image">

<br><br>


Trạng thái:

<select name="status">

<option value="draft"

{{ $course->status=='draft'?'selected':'' }}>

Draft

</option>


<option value="published"

{{ $course->status=='published'?'selected':'' }}>

Published

</option>


</select>


<br><br>


<button type="submit">

Cập nhật

</button>


</form>


</body>

</html>