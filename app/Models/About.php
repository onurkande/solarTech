<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'title',
        'desc',
        'mission',
        'vission',
        'our_values',
        'content'
    ];
} 