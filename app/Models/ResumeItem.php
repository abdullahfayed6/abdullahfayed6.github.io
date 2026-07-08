<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResumeItem extends Model
{
    protected $fillable = ['section', 'title', 'subtitle', 'institution', 'description', 'order'];
}
