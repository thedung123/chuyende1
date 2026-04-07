<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Http\Requests\CourseRequest;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $courses = Course::withCount('lessons')
                ->paginate(5);

    return view('courses.index', compact('courses'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('courses.create');
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseRequest $request)
{
    $data = $request->validated();

    // tạo slug tự động
    $data['slug'] = Str::slug($data['name']);

    // upload ảnh
    if($request->hasFile('image'))
    {
        $data['image'] = $request->file('image')->store('courses','public');
    }

    Course::create($data);

    return redirect()->back()->with('success','Thêm khóa học thành công');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit(string $id)
{
    $course = Course::findOrFail($id);

    return view('courses.edit', compact('course'));
}

    /**
     * Update the specified resource in storage.
     */
   public function update(CourseRequest $request, string $id)
{
    $course = Course::findOrFail($id);

    $data = $request->validated();

    $data['slug'] = Str::slug($data['name']);


    if($request->hasFile('image'))
    {
        $data['image'] = $request
                        ->file('image')
                        ->store('courses','public');
    }


    $course->update($data);


    return redirect()
            ->route('courses.index')
            ->with('success','Cập nhật thành công');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    Course::destroy($id);

    return redirect()
            ->route('courses.index')
            ->with('success','Xóa thành công');
}
public function trash()
{
    $courses = Course::onlyTrashed()->get();

    return view('courses.trash',compact('courses'));
}
public function restore($id)
{
    Course::withTrashed()
            ->where('id',$id)
            ->restore();

    return redirect()
            ->route('courses.trash')
            ->with('success','Khôi phục thành công');
}
}
