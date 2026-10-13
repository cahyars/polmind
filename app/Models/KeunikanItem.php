<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class KeunikanItem extends Model
{
    use HasFactory;

    protected $table = 'keunikan_items';

    protected $fillable = [
        'type',
        'badge_number',
        'title',
        'subtitle',
        'description',
        'image',
        'icon',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Scope query untuk item blok utama (01, 02, 03...)
     */
    public function scopeBlocks($query)
    {
        return $query->where('type', 'block');
    }

    /**
     * Scope query untuk item kartu karir & internasionalisasi
     */
    public function scopeCareers($query)
    {
        return $query->where('type', 'career');
    }

    /**
     * Mengambil URL gambar dengan fallback cerdas
     */
    public function getImageUrlAttribute(): string
    {
        if (empty($this->image)) {
            return asset('assets/images-new/images10.jpg');
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
     * Mengambil poin-poin checklist dari deskripsi (satu per baris)
     */
    public function getPointsAttribute(): array
    {
        if (empty($this->description)) {
            return [];
        }

        $lines = preg_split('/\r\n|\r|\n/', $this->description);
        $points = [];

        foreach ($lines as $line) {
            $trimmed = trim($line);
            // Bersihkan bullet point simbolik jika user memasukkan tanda -, *, atau angka
            $clean = preg_replace('/^[-*•]\s+/', '', $trimmed);
            if (!empty($clean)) {
                $points[] = $clean;
            }
        }

        return $points;
    }
}
