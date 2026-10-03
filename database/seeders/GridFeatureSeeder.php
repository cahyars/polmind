<?php

namespace Database\Seeders;

use App\Models\GridFeature;
use Illuminate\Database\Seeder;

class GridFeatureSeeder extends Seeder
{
    public function run(): void
    {
        $features = [
            [
                'image' => 'assets/images-new/images02.jpg',
                'title' => 'Dikembangkan di dalam Kawasan Industri MM2100, dikelilingi ratusan industri ternama.',
                'order' => 1,
            ],
            [
                'image' => 'assets/images-new/images03.jpg',
                'title' => 'Didirikan oleh para expert dan praktisi industri & pendidikan.',
                'order' => 2,
            ],
            [
                'image' => 'assets/images-new/images04.jpg',
                'title' => 'Kurikulum disusun bersama dengan pihak industri.',
                'order' => 3,
            ],
            [
                'image' => 'assets/images-new/images05.jpg',
                'title' => 'Berpengalaman mengirimkan SDM berkualitas ke luar negeri (Jepang dan Jerman).',
                'order' => 4,
            ],
            [
                'image' => 'assets/images-new/images06.jpg',
                'title' => 'Komite terdiri dari expert dan profesional industri.',
                'order' => 5,
            ],
            [
                'image' => 'assets/images-new/images07.jpg',
                'title' => 'Telah menjalin kerja sama dengan Universitas bereputasi di Jepang.',
                'order' => 6,
            ],
            [
                'image' => 'assets/images-new/images08.jpg',
                'title' => '⁠Kuliahnya tidak kaku dan konvensional hanya di ruang kelas.',
                'order' => 7,
            ],
            [
                'image' => 'assets/images-new/images09.jpg',
                'title' => 'Menerapkan TEFA (Teaching Factory) dan PjBL (Project-based Learning) yang riil.',
                'order' => 8,
            ],
        ];

        foreach ($features as $f) {
            GridFeature::updateOrCreate(
                ['order' => $f['order']],
                [
                    'image' => $f['image'],
                    'title' => $f['title'],
                    'is_active' => true,
                ]
            );
        }
    }
}
