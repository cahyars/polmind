<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo',
        'website_url',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Get accessible logo URL
     */
    public function getLogoUrlAttribute(): string
    {
        if (empty($this->logo)) {
            return asset('assets/images/favicon-cerah.ico');
        }

        if (Str::startsWith($this->logo, ['http://', 'https://'])) {
            return $this->logo;
        }

        if (Str::startsWith($this->logo, ['assets/', '/assets/'])) {
            return asset(ltrim($this->logo, '/'));
        }

        return asset('storage/' . ltrim($this->logo, '/'));
    }
}
