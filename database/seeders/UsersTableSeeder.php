<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $course = Course::where('code', 'SoQu-2')->first();

        // Admin
        User::create([
            'name' => 'Admin ITS',
            'email' => 'admin@its-altoadriatico.it',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'is_active' => true,
        ]);

        // Docente 1
        User::create([
            'name' => 'Prof. Mirco Piccin',
            'email' => 'piccin@its-altoadriatico.it',
            'password' => Hash::make('teacher123'),
            'role' => 'teacher',
            'is_active' => true,
        ]);

        // Docente 2
        User::create([
            'name' => 'Dott. Alessandro Gobbo',
            'email' => 'gobbo@its-altoadriatico.it',
            'password' => Hash::make('teacher123'),
            'role' => 'teacher',
            'is_active' => true,
        ]);

        // Studente di test
        User::create([
            'name' => 'Matteo Didonè',
            'email' => 'didone@its-altoadriatico.it',
            'password' => Hash::make('student123'),
            'role' => 'student',
            'course_id' => $course ? $course->id : null,
            'year' => 2,
            'student_id' => 'SoQu-2-001',
            'is_active' => true,
        ]);
    }
}