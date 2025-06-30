<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CoursesTableSeeder extends Seeder
{
    public function run()
    {
        Course::create([
            'name' => 'Digital Solutions 4.0',
            'code' => 'SoQu-2',
            'description' => 'Corso biennale per Tecnico Superiore per la digitalizzazione dei processi aziendali',
            'total_hours' => 2000,
            'classroom_hours' => 1200,
            'internship_hours' => 800,
            'attendance_threshold' => 80.00,
            'is_active' => true,
        ]);
    }
}