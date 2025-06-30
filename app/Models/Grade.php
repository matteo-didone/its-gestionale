<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Grade extends Model
{
    protected $fillable = [
        'user_id',
        'subject_id',
        'teacher_id',
        'grade',
        'status',
        'approval_status',
        'approved_by',
        'approved_at',
        'notes',
        'exam_date',
    ];

    // Studente a cui è associato il voto
    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Docente che ha inserito il voto
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    // Materia del voto
    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    // Admin che ha approvato il voto
    public function approver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}