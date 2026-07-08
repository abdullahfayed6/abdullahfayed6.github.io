<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $fillable = ['title', 'description', 'year', 'is_highlighted'];

    protected $casts = [
        'is_highlighted' => 'boolean',
    ];
}
