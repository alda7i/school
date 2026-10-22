<?php

use App\Models\Student;
use Illuminate\Support\Facades\Route;

Route::get('/students', function () {
    return Student::with('user')->get();
});;
