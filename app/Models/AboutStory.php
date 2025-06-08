<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutStory extends Model
{
    protected $fillable = [
        'year',
        'title',
        'desc'
    ];
} 