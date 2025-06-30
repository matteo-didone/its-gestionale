<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Subject;

class CourseSubjectsTableSeeder extends Seeder
{
    public function run()
    {
        $course = Course::where('code', 'SoQu-2')->first();

        $subjects = Subject::all(); // Prendi tutte le materie (non filtrare con course_id)

        foreach ($subjects as $subject) {
            // Collega materia al corso tramite attach() nella tabella pivot
            $course->subjects()->attach($subject->id, [
                'year' => $subject->year,
                'hours_allocated' => null,
                'is_mandatory' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}