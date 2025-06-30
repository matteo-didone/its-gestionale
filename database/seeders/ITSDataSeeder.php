<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ITSDataSeeder extends Seeder
{
    public function run()
    {
        // 1. Crea le Macroaree
        $macroAreas = [
            ['name' => 'Competenze di Base', 'slug' => 'competenze-base', 'icon' => '📘', 'order' => 1],
            ['name' => 'IT Fundamentals', 'slug' => 'it-fundamentals', 'icon' => '💻', 'order' => 2],
            ['name' => 'Coding', 'slug' => 'coding', 'icon' => '🧠', 'order' => 3],
            ['name' => 'Web Development', 'slug' => 'web-development', 'icon' => '🌐', 'order' => 4],
            ['name' => 'Sistemi IIoT', 'slug' => 'sistemi-iiot', 'icon' => '⚙️', 'order' => 5],
            ['name' => 'Soluzioni IIoT', 'slug' => 'soluzioni-iiot', 'icon' => '🧩', 'order' => 6],
            ['name' => 'Project Work & Agile', 'slug' => 'project-agile', 'icon' => '🛠️', 'order' => 7],
            ['name' => 'Soft Skills e Trasversali', 'slug' => 'soft-skills', 'icon' => '🧑‍💼', 'order' => 8],
            ['name' => 'Stage', 'slug' => 'stage', 'icon' => '🏢', 'order' => 9],
        ];

        foreach ($macroAreas as $area) {
            DB::table('macro_areas')->insert(array_merge($area, [
                'created_at' => now(),
                'updated_at' => now()
            ]));
        }

        // 2. Crea i Corsi
        $courses = [
            [
                'name' => 'Digital Solutions 4.0',
                'code' => 'SoQu-2',
                'description' => 'Corso biennale per Tecnico Superiore per la digitalizzazione dei processi aziendali',
                'total_hours' => 2000,
                'classroom_hours' => 1200,
                'internship_hours' => 800
            ],
            [
                'name' => 'Web Developer',
                'code' => 'WIcs-2',
                'description' => 'Corso biennale per Tecnico Superiore per lo sviluppo di applicazioni web',
                'total_hours' => 2000,
                'classroom_hours' => 1200,
                'internship_hours' => 800
            ]
        ];

        foreach ($courses as $course) {
            DB::table('courses')->insert(array_merge($course, [
                'created_at' => now(),
                'updated_at' => now()
            ]));
        }

        // 3. Crea le Materie per Digital Solutions 4.0
        $subjects = [
            // Competenze di Base
            ['macro_area' => 'competenze-base', 'name' => 'Competenze linguistiche, relazionali e organizzative', 'year' => 1],
            ['macro_area' => 'competenze-base', 'name' => 'Competenze linguistiche, relazionali e organizzative', 'year' => 2],

            // IT Fundamentals
            ['macro_area' => 'it-fundamentals', 'name' => 'Sistemi Operativi Windows', 'year' => 1],
            ['macro_area' => 'it-fundamentals', 'name' => 'Sistemi Operativi Linux', 'year' => 1],
            ['macro_area' => 'it-fundamentals', 'name' => 'Networking', 'year' => 1],
            ['macro_area' => 'it-fundamentals', 'name' => 'Sistemi di Virtualizzazione', 'year' => 1],
            ['macro_area' => 'it-fundamentals', 'name' => 'Cybersecurity', 'year' => 1],

            // Coding
            ['macro_area' => 'coding', 'name' => 'Logica e Algoritmica', 'year' => 1],
            ['macro_area' => 'coding', 'name' => 'Object Oriented Programming C#', 'year' => 1],
            ['macro_area' => 'coding', 'name' => 'Framework .NET', 'year' => 1],
            ['macro_area' => 'coding', 'name' => 'Database Relazionali (SQL, DBMS)', 'year' => 1],

            // Web Development
            ['macro_area' => 'web-development', 'name' => 'Linguaggi Web (HTML, CSS, JS)', 'year' => 1],
            ['macro_area' => 'web-development', 'name' => 'Sviluppo Web Server-side (ASP.NET, Node.js)', 'year' => 1],
            ['macro_area' => 'web-development', 'name' => 'Sviluppo Distribuito (Git, GitHub)', 'year' => 1],

            // Sistemi IIoT
            ['macro_area' => 'sistemi-iiot', 'name' => 'Elettronica ed Elettrotecnica', 'year' => 1],
            ['macro_area' => 'sistemi-iiot', 'name' => 'PLC Base', 'year' => 1],
            ['macro_area' => 'sistemi-iiot', 'name' => 'SoC e Single-Board 1', 'year' => 1],
            ['macro_area' => 'sistemi-iiot', 'name' => 'Protocolli IoT', 'year' => 2],
            ['macro_area' => 'sistemi-iiot', 'name' => 'Sviluppo Embedded in C', 'year' => 2],
            ['macro_area' => 'sistemi-iiot', 'name' => 'SoC e Single-Board 2', 'year' => 2],
            ['macro_area' => 'sistemi-iiot', 'name' => 'Industrial Cybersecurity', 'year' => 2],

            // Soluzioni IIoT (Anno 2)
            ['macro_area' => 'soluzioni-iiot', 'name' => 'OPC-UA', 'year' => 2],
            ['macro_area' => 'soluzioni-iiot', 'name' => 'Architetture Cloud IoT', 'year' => 2],
            ['macro_area' => 'soluzioni-iiot', 'name' => 'Design Patterns', 'year' => 2],
            ['macro_area' => 'soluzioni-iiot', 'name' => 'Database NoSQL', 'year' => 2],
            ['macro_area' => 'soluzioni-iiot', 'name' => 'Python', 'year' => 2],
            ['macro_area' => 'soluzioni-iiot', 'name' => 'Edge Computing', 'year' => 2],

            // Project Work
            ['macro_area' => 'project-agile', 'name' => 'Project Work e Agile Management 1', 'year' => 1],
            ['macro_area' => 'project-agile', 'name' => 'Project Work e Agile Management 2', 'year' => 2],

            // Soft Skills
            ['macro_area' => 'soft-skills', 'name' => 'Gestione del Processo Formativo 1', 'year' => 1],
            ['macro_area' => 'soft-skills', 'name' => 'Inglese Tecnico 1', 'year' => 1],
            ['macro_area' => 'soft-skills', 'name' => 'Soft Skills 1', 'year' => 1],
            ['macro_area' => 'soft-skills', 'name' => 'Sicurezza e Prevenzione', 'year' => 1],
            ['macro_area' => 'soft-skills', 'name' => 'Informatica Giuridica', 'year' => 1],
            ['macro_area' => 'soft-skills', 'name' => 'Gestione del Processo Formativo 2', 'year' => 2],
            ['macro_area' => 'soft-skills', 'name' => 'Inglese Tecnico 2', 'year' => 2],
            ['macro_area' => 'soft-skills', 'name' => 'Soft Skills 2', 'year' => 2],
            ['macro_area' => 'soft-skills', 'name' => 'Lean e Digital Transformation', 'year' => 2],
            ['macro_area' => 'soft-skills', 'name' => 'Budgeting ICT', 'year' => 2],
            ['macro_area' => 'soft-skills', 'name' => 'Sostenibilità ICT', 'year' => 2],

            // Stage
            ['macro_area' => 'stage', 'name' => 'Stage 1° Anno', 'year' => 1],
            ['macro_area' => 'stage', 'name' => 'Stage 2° Anno', 'year' => 2],
        ];

        foreach ($subjects as $subject) {
            $macroAreaId = DB::table('macro_areas')->where('slug', $subject['macro_area'])->first()->id;

            DB::table('subjects')->insert([
                'macro_area_id' => $macroAreaId,
                'name' => $subject['name'],
                'slug' => \Str::slug($subject['name']),
                'year' => $subject['year'],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        // 4. Associa materie al corso Digital Solutions 4.0
        $courseId = DB::table('courses')->where('code', 'SoQu-2')->first()->id;
        $allSubjects = DB::table('subjects')->get();

        foreach ($allSubjects as $subject) {
            DB::table('course_subjects')->insert([
                'course_id' => $courseId,
                'subject_id' => $subject->id,
                'year' => $subject->year,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        // 5. Crea utenti di esempio
        // Admin
        User::create([
            'name' => 'Admin ITS',
            'email' => 'admin@its-altoadriatico.it',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'is_active' => true,
        ]);

        // Docente
        User::create([
            'name' => 'Prof. Mirco Piccin',
            'email' => 'piccin@its-altoadriatico.it',
            'password' => Hash::make('teacher123'),
            'role' => 'teacher',
            'is_active' => true,
        ]);

        // Studente (te!)
        User::create([
            'name' => 'Matteo Didonè',
            'email' => 'didone@its-altoadriatico.it',
            'password' => Hash::make('student123'),
            'role' => 'student',
            'course_id' => $courseId,
            'year' => 2,
            'student_id' => 'SoQu-2-001',
            'is_active' => true,
        ]);
    }
}