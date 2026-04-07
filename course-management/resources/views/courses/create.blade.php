<!DOCTYPE html>
<html>
<head>
    <title>Thêm khóa học</title>
</head>
<body>

<h2>Thêm khóa học</h2>

@if(session('success'))
    <p style="color:green">
        {{ session('success') }}
    </p>
@endif

<form action="{{ route('courses.store') }}"
method="POST"
enctype="multipart/form-data">

@csrf

Tên khóa học:

<input type="text" name="name">
<br><br>

Giá:

<input type="number" name="price">
<br><br>

Mô tả:

<textarea name="description"></textarea>
<br><br>

Ảnh:

<input type="file" name="image">
<br><br>

Trạng thái:

<select name="status">

<option value="draft">Draft</option>

<option value="published">Published</option>

</select>

<br><br>

<button type="submit">

Thêm khóa học

</button>

</form>

</body>
</html>