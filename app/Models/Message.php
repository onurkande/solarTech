<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'package_type',
        'message',
        'is_read',
        'read_at'
    ];

    protected $casts = [
        'is_read' => 'boolean',
        'read_at' => 'datetime'
    ];

    public function markAsRead()
    {
        $this->update([
            'is_read' => true,
            'read_at' => now()
        ]);
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getPackageTypeInTurkishAttribute()
    {
        $translations = [
            'residential' => 'Müstakil Ev',
            'commercial' => 'Tiny House',
            'industrial' => 'Tarımsal Alan',
            'consultation' => 'Endüstriyel Alan',
            'other' => 'Diğer'
        ];

        return $translations[$this->package_type] ?? $this->package_type;
    }

} 