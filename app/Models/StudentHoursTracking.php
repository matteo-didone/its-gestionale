<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentHoursTracking extends Model
{
    protected $fillable = [
        'user_id',
        'total_classroom_hours',
        'total_internship_hours',
        'attendance_percentage',
        'eligible_for_exam',
        'last_calculated_at',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
