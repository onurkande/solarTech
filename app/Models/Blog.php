<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BlogImage;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'cover_image',
        'desc',
        'content',
        'tags',
    ];

    public function images()
    {
        return $this->hasMany(BlogImage::class);
    }

    // Okuma süresi (dakika cinsinden, 200 kelime/dk)
    public function getReadingTimeAttribute()
    {
        $wordCount = str_word_count(strip_tags($this->content));
        return max(1, ceil($wordCount / 200));
    }
} 