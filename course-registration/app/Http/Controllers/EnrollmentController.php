<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use App\Models\Enrollment;

class EnrollmentController extends Controller
{

public function index()
{

$students=Student::all();

$courses=Course::all();

$enrollments=Enrollment::with(
'student','course'
)->get();

return view(
'enrollments.index',
compact(
'students',
'courses',
'enrollments'
)
);

}


public function store(Request $request)
{

$student = Student::findOrFail(
$request->student_id
);

$course = Course::findOrFail(
$request->course_id
);


$totalCredits = $student->courses()
->sum('credits');


if(
$student->courses()
->where(
'course_id',
$course->id
)->exists()
)

{

return back()
->with(
'error',
'Đã đăng ký môn này rồi'
);

}


if(
$totalCredits +
$course->credits
> 18
)

{

return back()
->with(
'error',
'Vượt quá 18 tín chỉ'
);

}


Enrollment::create([

'student_id'=>$student->id,

'course_id'=>$course->id

]);


return back()
->with(
'success',
'Đăng ký thành công'
);

}

}