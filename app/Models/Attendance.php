<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    protected $fillable = [
        'user_id',
        'subject_id',
        'date',
        'start_time',
        'end_time',
        'status',
        'hours_attended',
        'notes',
        'recorded_by',
    ];

    // Studente associato alla presenza
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Materia della lezione
    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    // Utente che ha registrato la presenza (tipicamente un docente o admin)
    public function recorder(): BelongsTo
    {
        return $this->belongsTo(User::class, 'recorded_by');
    }
}