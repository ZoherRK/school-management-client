<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;

Route::get('/', function () {
    return redirect()->route('teachers.index');
});

Route::resource('teachers', TeacherController::class)->except(['show']);
Route::resource('students', StudentController::class)->except(['show']);
Route::resource('subjects', SubjectController::class)->except(['show']);