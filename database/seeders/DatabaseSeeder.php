<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CoursesTableSeeder::class,
            MacroAreasTableSeeder::class,
            SubjectsTableSeeder::class,
            CourseSubjectsTableSeeder::class,
            UsersTableSeeder::class,
        ]);
    }
}
