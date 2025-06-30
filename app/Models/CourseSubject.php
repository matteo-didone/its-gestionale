<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseSubject extends Model
{
    protected $table = 'course_subjects'; // specifica la tabella pivot

    protected $fillable = [
        'course_id',
        'subject_id',
        'year',
        'hours_allocated',
        'is_mandatory',
    ];

    public $timestamps = true;
}