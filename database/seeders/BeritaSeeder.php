<?php

namespace Database\Seeders;

use App\Models\Berita;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'slug' => 'mou-polmind-dengan-fk-ugm',
                'title' => 'MoU Polmind dengan Departemen Patologi dan Anatomi Fakultas Kedokteran, Kesehatan Masyarakat dan Keperawatan UGM',
                'category' => 'kerjasama',
                'published_date' => '2026-04-24',
                'author' => 'Administrator',
                'image' => 'assets/images/news/mou_kedokteran_ugm.jpg',
                'summary' => 'Yogyakarta, Universitas Gadjah Mada – Penandatanganan Memorandum of Understanding (MoU) dan Perjanjian Kerja Sama antara Politeknik Mitra Industri dengan Departemen Patologi dan Anatomi FKKMK UGM.',
                'file' => '_legacy_backup/pages/berita/mou-polmind-dengan-fk-ugm.php',
            ],
            [
                'slug' => 'politeknik-mitra-industri-jalin-kemitraan-dengan-ehime-university-jepang',
                'title' => 'Perkuat Pendidikan Vokasi Berstandar Global, Politeknik Mitra Industri Jalin Kemitraan dengan Ehime University Jepang',
                'category' => 'kerjasama',
                'published_date' => '2025-10-14',
                'author' => 'Administrator',
                'image' => 'assets/images/news/berita_terbaru02.jpg',
                'summary' => 'Dalam upaya meningkatkan mutu pendidikan vokasi dan memperluas jaringan kolaborasi internasional, Politeknik Mitra Industri (Polmind) kembali mencetak sejarah penting...',
                'file' => '_legacy_backup/pages/berita/politeknik-mitra-industri-jalin-kemitraan-dengan-ehime-university-jepang.php',
            ],
            [
                'slug' => 'polmind-resmi-bergabung-dalam-aliansi-strategis-kampus-vokasi-indonesia-china',
                'title' => 'POLMIND Resmi Bergabung dalam Aliansi Strategis Kampus Vokasi Indonesia dan China',
                'category' => 'kerjasama',
                'published_date' => '2025-09-16',
                'author' => 'Administrator',
                'image' => 'assets/images/news/berita_terbaru01.jpg',
                'summary' => 'Politeknik Mitra Industri (POLMIND) secara resmi bergabung dalam Aliansi Kerja Sama Strategis Kampus Vokasi Indonesia dan China...',
                'file' => '_legacy_backup/pages/berita/polmind-resmi-bergabung-dalam-aliansi-strategis-kampus-vokasi-indonesia-china.php',
            ],
            [
                'slug' => '60-Mahasiswa-baru-resmi-diterima-digelombang-1-pmb-politeknik-mitra-industri',
                'title' => '60 Mahasiswa Baru Resmi Diterima di Gelombang 1 PMB Politeknik Mitra Industri Tahun Akademik 2025/2026',
                'category' => 'umum',
                'published_date' => '2025-07-05',
                'author' => 'Administrator',
                'image' => 'assets/images/news/tpa.jpg',
                'summary' => 'Politeknik Mitra Industri (Polmind) dengan bangga mengumumkan bahwa sebanyak 60 calon mahasiswa baru telah resmi dinyatakan lolos seleksi...',
                'file' => '_legacy_backup/pages/berita/60-Mahasiswa-baru-resmi-diterima-digelombang-1-pmb-politeknik-mitra-industri.php',
            ],
            [
                'slug' => 'polmind-gelar-press-conference',
                'title' => 'Polmind Gelar Press Conference, Perkenalkan Program Terkini dengan Dukungan Para Tokoh Kunci',
                'category' => 'umum',
                'published_date' => '2025-05-28',
                'author' => 'Administrator',
                'image' => 'assets/images/news/press-conference.jpg',
                'summary' => 'Politeknik Mitra Industri (Polmind) menggelar press conference pada tanggal 28 Mei 2025, yang dihadiri oleh berbagai media nasional...',
                'file' => '_legacy_backup/pages/berita/polmind-gelar-press-conference.php',
            ],
            [
                'slug' => 'polmind-sukses-gelar-seminar-deep-learning',
                'title' => 'Polmind Sukses Gelar Seminar Deep Learning Bersama Direktur Polmind Wikan Sakarinto, S.T., M.Sc., Ph.D.',
                'category' => 'umum',
                'published_date' => '2025-05-28',
                'author' => 'Administrator',
                'image' => 'assets/images/news/berita_deep_learning.jpg',
                'summary' => 'Politeknik Mitra Industri (Polmind) telah menyelenggarakan seminar dan diskusi mendalam bertema Deep Learning pada tanggal...',
                'file' => '_legacy_backup/pages/berita/polmind-sukses-gelar-seminar-deep-learning.php',
            ],
            [
                'slug' => 'polmind-dengan-kementerian',
                'title' => 'Politeknik Mitra Industri Jalin Sinergi Strategis dengan Kementerian Ketenagakerjaan Republik Indonesia',
                'category' => 'kerjasama',
                'published_date' => '2025-05-19',
                'author' => 'Administrator',
                'image' => 'assets/images/news/kunjungan-kementrian.jpg',
                'summary' => 'Dalam upaya memperkuat link and match antara dunia pendidikan vokasi dan kebutuhan pasar kerja, Pendiri dan Pimpinan Politeknik...',
                'file' => '_legacy_backup/pages/berita/polmind-dengan-kementerian.php',
            ],
            [
                'slug' => 'polmind-perluas-jejaring-internasional-ke-jepang',
                'title' => 'Politeknik Mitra Industri Perluas Jejaring Internasional dengan Kunjungan ke Universitas Ternama di Jepang',
                'category' => 'kerjasama',
                'published_date' => '2025-05-08',
                'author' => 'Administrator',
                'image' => 'assets/images/images06.jpeg',
                'summary' => 'Dalam rangka memperkuat kolaborasi pendidikan vokasi bertaraf global, Pendiri dan Pimpinan Politeknik Mitra Industri melakukan kunjungan ke universitas terkemuka di Jepang...',
                'file' => '_legacy_backup/pages/berita/polmind-perluas-jejaring-internasional-ke-jepang.php',
            ],
            [
                'slug' => 'polmind-luncurkan-tefa-konsultan',
                'title' => 'Politeknik Mitra Industri Resmi Luncurkan Teaching Factory (TEFA) Bidang Konsultan Bisnis dan Engineering',
                'category' => 'prestasi',
                'published_date' => '2025-02-20',
                'author' => 'Administrator',
                'image' => 'assets/images/news/berita-peresmian-tefa.jpg',
                'summary' => 'Politeknik Mitra Industri dengan bangga mengumumkan peluncuran Teaching Factory (TEFA) Konsultan Bisnis dan Engineering...',
                'file' => '_legacy_backup/pages/berita/polmind-luncurkan-tefa-konsultan.php',
            ],
        ];

        foreach ($articles as $data) {
            $filePath = base_path($data['file']);
            $content = '';

            if (file_exists($filePath)) {
                $raw = file_get_contents($filePath);
                // Extract inside class="news-content..." or div with content
                if (preg_match('#<div class="news-content[^>]*>(.*?)</div>\s*(?:<div class="news-source"|$|<?php)#s', $raw, $m)) {
                    $content = trim($m[1]);
                } elseif (preg_match('#<div class="news__content[^>]*>(.*?)</div>#s', $raw, $m)) {
                    $content = trim($m[1]);
                } else {
                    $content = '<p>' . htmlspecialchars($data['summary']) . '</p>';
                }
            } else {
                $content = '<p>' . htmlspecialchars($data['summary']) . '</p>';
            }

            Berita::updateOrCreate(
                ['slug' => $data['slug']],
                [
                    'title' => $data['title'],
                    'category' => $data['category'],
                    'published_date' => $data['published_date'],
                    'author' => $data['author'],
                    'image' => $data['image'],
                    'summary' => $data['summary'],
                    'content' => $content,
                    'is_published' => true,
                    'views_count' => rand(150, 850),
                ]
            );
        }
    }
}
