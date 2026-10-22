
<?php

use Illuminate\Support\Facades\Route;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Course;

Route::get('/students', function () {
    return Student::with('user')->get();
});

Route::get('/teachers', function () {
    return Teacher::with('user')->get();
});

Route::get('/teachers/{id}/courses', function ($id) {
    $teacher = Teacher::findOrFail($id);

    return $teacher->courses;
});

Route::get('/courses/{id}/students', function ($id) {
    $course = Course::findOrFail($id);

    return $course->students()->with('user')->get();
});


Route::post('/teachers/{id}/courses', function ($id) {
    $teacher = Teacher::findOrFail($id);

    $courses = $teacher->courses()->createMany([
        ['name' => 'Science'],
        ['name' => 'History'],
    ]);

    return response()->json([
        'message' => 'doen',
        'data' => $courses,
    ], 201);
});

Route::post('/courses/{id}/students', function ($id) {
    $course = \App\Models\Course::findOrFail($id);

    $course->students()->sync([1]);

    return response()->json([
        'message' => 'done',
        'data' => $course->students()->with('user')->get(),
    ]);
});
Route::post('/courses/{id}/students', function ($id) {
    $course = Course::findOrFail($id);

    $course->students()->sync([1]);

    return response()->json([
        'message' => 'done',
        'data' => $course->students()->with('user')->get(),
    ]);
});
