<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;

Route::resource('students',StudentController::class);

Route::resource('courses',CourseController::class);

Route::get('enrollments',
[EnrollmentController::class,'index']);

Route::post('enrollments',
[EnrollmentController::class,'store']);