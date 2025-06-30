<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'course_id',
        'year',
        'student_id',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_active' => 'boolean',
    ];

    // Corso associato (per studenti)
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    // Voti ricevuti (per studenti)
    public function grades(): HasMany
    {
        return $this->hasMany(Grade::class, 'user_id');
    }

    // Voti inseriti (per docenti)
    public function givenGrades(): HasMany
    {
        return $this->hasMany(Grade::class, 'teacher_id');
    }

    // Presenze registrate (per studenti)
    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class, 'user_id');
    }

    // Presenze registrate da questo utente (es. docente)
    public function recordedAttendances(): HasMany
    {
        return $this->hasMany(Attendance::class, 'recorded_by');
    }
}