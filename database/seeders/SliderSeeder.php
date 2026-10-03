<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    public function run(): void
    {
        $slides = [
            [
                'image' => 'assets/images/slider/polmind_vasanta.png',
                'title' => 'Kampus Polmind Vasanta Innopark Kawasan Industri MM2100',
                'link' => null,
                'order' => 1,
            ],
            [
                'image' => 'assets/images/slider6.jpg',
                'title' => 'Didirikan di dalam Kawasan Industri MM2100, Bekasi Dalam naungan MITRA INDUSTRI GROUP',
                'link' => null,
                'order' => 2,
            ],
            [
                'image' => 'assets/images/slider2.png',
                'title' => 'Didirikan oleh Expert dan Profesional Industri',
                'link' => null,
                'order' => 3,
            ],
            [
                'image' => 'assets/images/slider3.png',
                'title' => 'Di dalam MM2100 – Kawasan industri terbesar se-Asia Tenggara',
                'link' => null,
                'order' => 4,
            ],
            [
                'image' => 'assets/images/slider4.png',
                'title' => 'Kampus kreatif, profesional, dengan spirit entrepreneural unggul.',
                'link' => null,
                'order' => 5,
            ],
            [
                'image' => 'assets/images/slider5.png',
                'title' => 'Teaching Factory (TEFA)',
                'link' => null,
                'order' => 6,
            ],
            [
                'image' => 'assets/images/slider/slider15.png',
                'title' => 'Inaugurasi Orientasi Mahasiswa Baru (PERKASA) 2025',
                'link' => null,
                'order' => 7,
            ],
            [
                'image' => 'assets/images/slider/slider16.png',
                'title' => 'Kerjasama dengan industri-industri di Kawasan MM2100',
                'link' => null,
                'order' => 8,
            ],
            [
                'image' => 'assets/images/slider/slider17.png',
                'title' => 'Kerjasama dengan Liuzhou Polytechnic, LZPU, China',
                'link' => null,
                'order' => 9,
            ],
            [
                'image' => 'assets/images/slider/slider18.png',
                'title' => 'Kuliah Umum bersama KADIN & APINDO',
                'link' => null,
                'order' => 10,
            ],
            [
                'image' => 'assets/images/slider/slider19.png',
                'title' => 'Mahasiswa persentasi progres TEFA didepan konsumen',
                'link' => null,
                'order' => 11,
            ],
            [
                'image' => 'assets/images/slider/slider21.png',
                'title' => 'Mahasiswa Praktek Syuting membuat konten/video kreatif',
                'link' => null,
                'order' => 12,
            ],
            [
                'image' => 'assets/images/slider/slider22.png',
                'title' => 'Kerjasama dengan Ehime University, Japan',
                'link' => null,
                'order' => 13,
            ],
        ];

        foreach ($slides as $slide) {
            Slider::updateOrCreate(
                ['image' => $slide['image']],
                [
                    'title' => $slide['title'],
                    'link' => $slide['link'],
                    'order' => $slide['order'],
                    'is_active' => true,
                ]
            );
        }
    }
}
