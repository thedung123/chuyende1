<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\EnrollmentController;

Route::resource('courses',CourseController::class);
Route::resource('lessons',LessonController::class);
Route::resource('enrollments',EnrollmentController::class);
Route::get('courses-trash',
[CourseController::class,'trash'])
->name('courses.trash');
Route::get('courses-restore/{id}',
[CourseController::class,'restore'])
->name('courses.restore');
Route::get('courses/{course}/lessons',
[LessonController::class,'index'])
->name('lessons.index');


Route::get('courses/{course}/lessons/create',
[LessonController::class,'create'])
->name('lessons.create');


Route::post('courses/{course}/lessons',
[LessonController::class,'store'])
->name('lessons.store');
Route::get('lessons/{lesson}/edit',
[LessonController::class,'edit'])
->name('lessons.edit');


Route::put('lessons/{lesson}',
[LessonController::class,'update'])
->name('lessons.update');
Route::delete('lessons/{lesson}',
[LessonController::class,'destroy'])
->name('lessons.destroy');
Route::resource(
    'courses.lessons',
    LessonController::class
);