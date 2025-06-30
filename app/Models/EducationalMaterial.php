<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EducationalMaterial extends Model
{
    protected $fillable = [
        'subject_id',
        'uploaded_by',
        'title',
        'description',
        'file_path',
        'file_name',
        'file_type',
        'file_size',
        'is_public',
        'download_count',
    ];

    // Relazione con la materia
    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    // Relazione con l'utente che ha caricato il materiale (docente)
    public function uploader(): BelongsTo
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }
}