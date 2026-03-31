<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{

    public function index(Request $request)
    {

        $search = $request->search;

        $students = Student::when($search, function ($query) use ($search) {

            return $query->where('name', 'like', "%$search%");

        })
        ->orderBy('name', 'asc')
        ->paginate(5);

        return view('students.index', compact('students'));
    }


    public function create()
    {
        return view('students.create');
    }


    public function store(Request $request)
    {

        $request->validate([

            'name'=>'required',

            'major'=>'required',

            'email'=>'required|email|unique:students'

        ]);

        Student::create($request->all());

        return redirect()->route('students.index')
        ->with('success','Thêm sinh viên thành công');

    }

}