<?php

namespace Database\Seeders;

use App\Models\KeunikanItem;
use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class KeunikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pengaturan Teks Halaman Keunikan
        SiteSetting::set('keunikan_page_title', 'KEUNIKAN DAN KEUNGGULAN', 'keunikan');
        SiteSetting::set('keunikan_page_subtitle', 'Mengapa Memilih Politeknik Mitra Industri?', 'keunikan');
        SiteSetting::set('keunikan_career_title', 'Bagian Karir & Internasionalisasi', 'keunikan');

        // Blok Keunggulan (01, 02, 03...)
        $blocks = [
            [
                'type' => 'block',
                'badge_number' => '01',
                'title' => 'Project-Based Learning & TEFA',
                'description' => "Kuliah lebih fokus Project-Based Learning (Teaching Factory), tidak banyak di dalam ruang kelas.\nTEFA dan PjBL sejak semester awal.\nProject-project-nya berasal dari perusahaan/industri, dan real project.",
                'image' => 'assets/images-new/images10.jpg',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'type' => 'block',
                'badge_number' => '02',
                'title' => 'Kemitraan Industri & Kegiatan',
                'description' => "Bentuk TEFA, berupa Konsultan Engineering dan Business, atau berupa industri manufaktur.\nKolaborasi aktif & kurikulum terintegrasi dengan ratusan industri manufaktur terkemuka.",
                'image' => 'assets/images/keunikan/keunikan02.jpg',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'type' => 'block',
                'badge_number' => '03',
                'title' => 'Kurikulum & Praktik Industri',
                'description' => "Mata Kuliah semua mendukung PjBL dan TEFA. Dosen tidak jalan sendiri-sendiri, tidak bikin PR/Tugas yang tidak ada hubungan dengan project TEFA.\nPara dosen dari internal dan banyak dari expert serta pimpinan industri.\nTeam mahasiswa digembleng menghasilkan produk riil yang memuaskan customer/industri.\nMahasiswa rutin presentasi progress project, di depan user.",
                'image' => 'assets/images/keunikan/keunikan03.jpg',
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($blocks as $block) {
            KeunikanItem::updateOrCreate(
                ['type' => 'block', 'order' => $block['order']],
                $block
            );
        }

        // Kartu Karir & Internasionalisasi
        $careers = [
            [
                'type' => 'career',
                'badge_number' => null,
                'title' => 'Magang di Industri',
                'subtitle' => 'Mahasiswa akan bisa magang di industri yang selama ini menjadi customers mereka.',
                'description' => 'Peluang langsung terjun ke ritme profesional industri MM2100 sejak masa perkuliahan.',
                'icon' => 'fas fa-briefcase',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'type' => 'career',
                'badge_number' => null,
                'title' => 'Tugas Akhir/Skripsi dari project',
                'subtitle' => 'Tugas Akhir/Skripsi berasal dari project yang dikerjakan.',
                'description' => 'Solusi nyata terhadap problem industri nyata sebagai karya tugas akhir.',
                'icon' => 'fas fa-file-lines',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'type' => 'career',
                'badge_number' => null,
                'title' => 'Kesempatan Kerja',
                'subtitle' => 'Kesempatan untuk bisa lanjut bekerja di industri tempat tersebut setelah lulus/wisuda.',
                'description' => 'Jalur rekrutmen prioritas bagi lulusan berprestasi di ratusan jaringan mitra.',
                'icon' => 'fas fa-handshake',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'type' => 'career',
                'badge_number' => null,
                'title' => 'Presentasi Bahasa Asing',
                'subtitle' => 'Selama proses kuliah dibiasakan presentasi dengan Bahasa Asing agar peluang ke luar negeri semakin besar.',
                'description' => 'Pembiasaan komunikasi bilingual (Inggris/Jepang) membuka karir global.',
                'icon' => 'fas fa-globe',
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($careers as $career) {
            KeunikanItem::updateOrCreate(
                ['type' => 'career', 'order' => $career['order']],
                $career
            );
        }
    }
}
