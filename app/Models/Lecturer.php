<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Lecturer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'category',
        'photo',
        'order',
    ];

    public function getPhotoUrlAttribute(): string
    {
        if (empty($this->photo)) {
            return asset('assets/images/daftar_dosen/internal/wikan.jpg');
        }

        if (Str::startsWith($this->photo, ['http://', 'https://'])) {
            return $this->photo;
        }

        if (Str::startsWith($this->photo, ['assets/', '/assets/'])) {
            return asset(ltrim($this->photo, '/'));
        }

        return asset('storage/' . ltrim($this->photo, '/'));
    }
}
