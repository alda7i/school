<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Course;



class SchoolSeeder extends Seeder
{
    public function run(): void
    {
        $teacherUser = User::factory()->create([
            'name' => 'Ahmad Teacher',
        ]);

        $teacher = Teacher::create([
            'user_id' => $teacherUser->id,
        ]);

        $teacher->courses()->createMany([
            ['name' => 'Math'],
            ['name' => 'English'],
        ]);

        $studentUser1 = User::factory()->create([
            'name' => 'Ali Student',
        ]);

        $student1 = Student::create([
            'user_id' => $studentUser1->id,
        ]);

        $studentUser2 = User::factory()->create([
            'name' => 'Omar Student',
        ]);

        $student2 = Student::create([
            'user_id' => $studentUser2->id,
        ]);

        $course = $teacher->courses()->first();

        $course->students()->attach([
            $student1->id,
            $student2->id,
        ]);
    }
}
