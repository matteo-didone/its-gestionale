<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;
use App\Models\MacroArea;

class SubjectsTableSeeder extends Seeder
{
    public function run()
    {
        $subjects = [
            ['Competenze in ambito linguistico, relazionale e organizzativo', 'competenze-linguaggio', 1, 'competenze-base'],
            ['Sistemi operativi: Windows', 'sistemi-operativi-windows', 1, 'it-fundamentals'],
            ['Sistemi operativi: Linux', 'sistemi-operativi-linux', 1, 'it-fundamentals'],
            ['Networking', 'networking', 1, 'it-fundamentals'],
            ['Sistemi di virtualizzazione', 'virtualizzazione', 1, 'it-fundamentals'],
            ['Cybersecurity', 'cybersecurity', 1, 'it-fundamentals'],
            ['Logica e algoritmica', 'logica-algoritmica', 1, 'coding'],
            ['Object Oriented Programming: C#', 'oop-csharp', 1, 'coding'],
            ['Framework .NET', 'framework-dotnet', 1, 'coding'],
            ['Database relazionali (SQL, DBMS)', 'database-relazionali', 1, 'coding'],
            ['Linguaggi web (HTML, CSS, JS)', 'linguaggi-web', 1, 'web-development'],
            ['Sviluppo web server-side (ASP.NET, Node.js)', 'server-side-web', 1, 'web-development'],
            ['Sviluppo distribuito (Git, GitHub)', 'sviluppo-distribuito', 1, 'web-development'],
            ['Elettronica ed elettrotecnica', 'elettronica-elettrotecnica', 1, 'sistemi-iiot'],
            ['PLC base', 'plc-base', 1, 'sistemi-iiot'],
            ['SoC e Single-Board 1', 'soc-singleboard1', 1, 'sistemi-iiot'],
            ['Protocolli IoT', 'protocolli-iot', 2, 'sistemi-iiot'],
            ['Sviluppo embedded in C', 'embedded-c', 2, 'sistemi-iiot'],
            ['SoC e Single-Board 2', 'soc-singleboard2', 2, 'sistemi-iiot'],
            ['Industrial Cybersecurity', 'industrial-cybersecurity', 2, 'sistemi-iiot'],
            ['OPC-UA', 'opc-ua', 2, 'soluzioni-iiot'],
            ['Architetture Cloud IoT', 'cloud-iot', 2, 'soluzioni-iiot'],
            ['Design Patterns', 'design-patterns', 2, 'soluzioni-iiot'],
            ['Database NoSQL', 'database-nosql', 2, 'soluzioni-iiot'],
            ['Python', 'python', 2, 'soluzioni-iiot'],
            ['Edge Computing', 'edge-computing', 2, 'soluzioni-iiot'],
            ['Project Work e Agile Management 1', 'project-work-1', 1, 'project-agile'],
            ['Project Work e Agile Management 2', 'project-work-2', 2, 'project-agile'],
            ['Gestione del processo formativo 1', 'gestione-formativo-1', 1, 'soft-skills'],
            ['Inglese tecnico 1', 'inglese-tecnico-1', 1, 'soft-skills'],
            ['Soft Skills 1', 'soft-skills-1', 1, 'soft-skills'],
            ['Sicurezza e prevenzione', 'sicurezza-prevenzione', 1, 'soft-skills'],
            ['Informatica giuridica', 'informatica-giuridica', 1, 'soft-skills'],
            ['Gestione del processo formativo 2', 'gestione-formativo-2', 2, 'soft-skills'],
            ['Inglese tecnico 2', 'inglese-tecnico-2', 2, 'soft-skills'],
            ['Soft Skills 2', 'soft-skills-2', 2, 'soft-skills'],
            ['Lean e Digital Transformation', 'lean-digital', 2, 'soft-skills'],
            ['Budgeting ICT', 'budgeting-ict', 2, 'soft-skills'],
            ['Sostenibilità ICT', 'sostenibilità-ict', 2, 'soft-skills'],
            ['Stage 1° anno', 'stage-1', 1, 'stage'],
            ['Stage 2° anno', 'stage-2', 2, 'stage'],
        ];

        foreach ($subjects as [$name, $slug, $year, $mSlug]) {
            Subject::create([
                'name' => $name,
                'slug' => $slug,
                'year' => $year,
                'macro_area_id' => MacroArea::where('slug', $mSlug)->value('id'),
                'total_hours' => null,
                'language' => 'it'
            ]);
        }
    }
}