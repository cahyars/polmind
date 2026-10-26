<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'caption',
        'image',
        'link',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    protected $appends = [
        'image_url',
        'formatted_caption',
        'has_dynamic_caption',
        'is_standard_aspect_ratio',
    ];

    protected ?bool $memoizedIsStandardRatio = null;

    public function getIsStandardAspectRatioAttribute(): bool
    {
        if ($this->memoizedIsStandardRatio !== null) {
            return $this->memoizedIsStandardRatio;
        }

        if (empty($this->image)) {
            return $this->memoizedIsStandardRatio = true;
        }

        $path = public_path('storage/' . ltrim($this->image, '/'));
        if (!file_exists($path)) {
            $path = public_path(ltrim($this->image, '/'));
        }

        if (!file_exists($path)) {
            return $this->memoizedIsStandardRatio = true;
        }

        $info = @getimagesize($path);
        if (!$info || empty($info[1])) {
            return $this->memoizedIsStandardRatio = true;
        }

        $ratio = $info[0] / $info[1];
        // Rasio standar banner Polmind adalah 2:1 (~1.88 - ~2.12)
        return $this->memoizedIsStandardRatio = ($ratio >= 1.88 && $ratio <= 2.12);
    }

    public function getHasDynamicCaptionAttribute(): bool
    {
        return !empty($this->caption) && trim($this->caption) !== '';
    }

    public function getFormattedCaptionAttribute(): ?string
    {
        if (!$this->has_dynamic_caption) {
            return null;
        }

        $clean = strip_tags($this->caption, '<em><strong><b><i><br>');
        return preg_replace('/\*([^*]+)\*/', '<em>$1</em>', $clean);
    }

    public function getImageUrlAttribute(): string
    {
        if (empty($this->image)) {
            return asset('assets/images/slider6.jpg');
        }

        if (Str::startsWith($this->image, ['http://', 'https://'])) {
            return $this->image;
        }

        if (Str::startsWith($this->image, ['assets/', '/assets/'])) {
            return asset(ltrim($this->image, '/'));
        }

        return asset('storage/' . ltrim($this->image, '/'));
    }
}
