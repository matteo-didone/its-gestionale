<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    protected $fillable = [
        'name',
        'code',
        'description',
        'total_hours',
        'classroom_hours',
        'internship_hours',
        'attendance_threshold',
        'is_active',
    ];

    // Un corso ha molti studenti
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    // Un corso ha molte associazioni corso-materia
    public function courseSubjects(): HasMany
    {
        return $this->hasMany(CourseSubject::class);
    }

    // Accesso rapido alle materie tramite la tabella pivot
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'course_subjects')
            ->withPivot('year', 'hours_allocated', 'is_mandatory')
            ->withTimestamps();
    }

    // Orario delle lezioni associato al corso
    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }
}