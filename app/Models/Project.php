<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'category',
        'description',
        'image',
        'github_url',
        'project_url',
        'role',
        'project_date',
        'key_features',
    ];

    protected $casts = [
        'key_features' => 'array',
    ];
}
