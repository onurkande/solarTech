<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SliderSetting extends Model
{
    protected $fillable = [
        'title',
        'content',
        'button_text'
    ];
} 