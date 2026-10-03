<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'category_id',
        'author',
        'published_date',
        'image',
        'summary',
        'content',
        'is_published',
        'views_count',
    ];

    public function categoryRel()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    protected $casts = [
        'published_date' => 'date',
        'is_published' => 'boolean',
    ];

    /**
     * Helper to get image URL properly whether from local assets or storage
     */
    public function getImageUrlAttribute(): string
    {
        if (empty($this->image)) {
            return asset('assets/images/news01.jpg');
        }

        if (Str::startsWith($this->image, ['http://', 'https://'])) {
            return $this->image;
        }

        if (Str::startsWith($this->image, ['assets/', '/assets/'])) {
            return asset(ltrim($this->image, '/'));
        }

        return asset('storage/' . ltrim($this->image, '/'));
    }

    /**
     * Format date in Indonesian
     */
    public function getFormattedDateAttribute(): string
    {
        if (!$this->published_date) {
            return '';
        }

        $months = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        ];

        $day = $this->published_date->format('d');
        $month = $months[(int)$this->published_date->format('m')];
        $year = $this->published_date->format('Y');

        return "$day $month $year";
    }

    /**
     * Extract clean summary from the first paragraph of content
     */
    public static function extractSummaryFromContent(?string $content, int $limit = 200): string
    {
        if (empty($content)) {
            return '';
        }

        // 1. If HTML paragraph exists, grab the first <p>...</p>
        if (preg_match('/<p[^>]*>(.*?)<\/p>/is', $content, $matches)) {
            $firstP = trim(preg_replace('/\s+/', ' ', strip_tags($matches[1])));
            if (!empty($firstP)) {
                return Str::limit($firstP, $limit);
            }
        }

        // 2. If newlines separate paragraphs (e.g. \n\n or \r\n\r\n)
        $normalized = str_replace(["\r\n", "\r"], "\n", $content);
        $paragraphs = array_filter(explode("\n\n", $normalized), function ($p) {
            return !empty(trim(strip_tags($p)));
        });

        if (!empty($paragraphs)) {
            $firstP = trim(preg_replace('/\s+/', ' ', strip_tags(reset($paragraphs))));
            if (!empty($firstP)) {
                return Str::limit($firstP, $limit);
            }
        }

        // 3. Fallback: single newline or raw text limit
        $plain = trim(preg_replace('/\s+/', ' ', strip_tags($content)));
        return Str::limit($plain, $limit);
    }

    /**
     * Auto fallback to first paragraph if summary is empty
     */
    public function getSummaryAttribute($value): string
    {
        if (!empty($value)) {
            return $value;
        }

        return static::extractSummaryFromContent($this->content, 200);
    }
}
