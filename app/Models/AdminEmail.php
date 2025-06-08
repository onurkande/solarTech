<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminEmail extends Model
{
    protected $fillable = [
        'email',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];
} 