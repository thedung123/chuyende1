<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Course $course)
{
    $lessons = $course
               ->lessons()
               ->orderBy('order')
               ->get();

    return view(
        'lessons.index',
        compact('course','lessons')
    );
}

    /**
     * Show the form for creating a new resource.
     */
    public function create(Course $course)
{
    return view(
        'lessons.create',
        compact('course')
    );
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Course $course)
{
    $request->validate([
        'title' => 'required',
        'order' => 'required|integer'
    ]);

    $course->lessons()->create([
        'course_id' => $course->id, // 👈 thêm dòng này (fix lỗi)
        'title' => $request->title,
        'order' => $request->order
    ]);

    return redirect()
        ->route('lessons.index', $course->id)
        ->with('success', 'Thêm lesson thành công');
}
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson $lesson)
{
    return view(
        'lessons.edit',
        compact('lesson')
    );
}

    /**
     * Update the specified resource in storage.
     */
   public function update(
Request $request,
Lesson $lesson
)
{
    $lesson->update(
        $request->only(
            'title',
            'order'
        )
    );


    return redirect()
            ->route(
                'lessons.index',
                $lesson->course_id
            );
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
Lesson $lesson
)
{
    $course_id =
    $lesson->course_id;


    $lesson->delete();


    return redirect()
            ->route(
                'lessons.index',
                $course_id
            );
}
}
