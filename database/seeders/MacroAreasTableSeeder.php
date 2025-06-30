<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MacroArea;

class MacroAreasTableSeeder extends Seeder
{
    public function run()
    {
        $areas = [
            ['Competenze di Base', 'competenze-base', '📘', 1],
            ['IT Fundamentals', 'it-fundamentals', '💻', 2],
            ['Coding', 'coding', '🧠', 3],
            ['Web Development', 'web-development', '🌐', 4],
            ['Sistemi IIoT', 'sistemi-iiot', '⚙️', 5],
            ['Soluzioni IIoT', 'soluzioni-iiot', '🧩', 6],
            ['Project Work & Agile', 'project-agile', '🛠️', 7],
            ['Soft Skills e Trasversali', 'soft-skills', '🧑‍💼', 8],
            ['Stage', 'stage', '🏢', 9],
        ];
        foreach ($areas as [$name, $slug, $icon, $order]) {
            MacroArea::create(compact('name', 'slug', 'icon', 'order'));
        }
    }
}