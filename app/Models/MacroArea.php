<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MacroArea extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'order',
    ];

    // Relazione: una macroarea ha molte materie
    public function subjects(): HasMany
    {
        return $this->hasMany(Subject::class);
    }
}