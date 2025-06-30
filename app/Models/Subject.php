<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Subject extends Model
{
    protected $fillable = [
        'macro_area_id',
        'name',
        'slug',
        'year',
        'total_hours',
        'description',
        'language',
    ];

    public function macroArea(): BelongsTo
    {
        return $this->belongsTo(MacroArea::class);
    }

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'course_subjects')
            ->withPivot('year', 'hours_allocated', 'is_mandatory')
            ->withTimestamps();
    }
}