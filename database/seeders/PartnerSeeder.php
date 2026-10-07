<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PartnerSeeder extends Seeder
{
    public function run(): void
    {
        $sourceDir = base_path('LOGO MITRA');
        $targetDir = storage_path('app/public/partners');

        if (!File::exists($targetDir)) {
            File::makeDirectory($targetDir, 0755, true);
        }

        $partnersData = [
            [
                'file' => 'PT Denso Indonesia.png',
                'name' => 'PT Denso Indonesia',
                'website' => 'https://www.denso.com/id/id/',
            ],
            [
                'file' => 'JOTUN.png',
                'name' => 'PT Jotun Indonesia',
                'website' => 'https://www.jotun.com/id-id/',
            ],
            [
                'file' => 'United Tractors.png',
                'name' => 'PT United Tractors Tbk',
                'website' => 'https://www.unitedtractors.com/',
            ],
            [
                'file' => 'PT Sugity Creatives.png',
                'name' => 'PT Sugity Creatives',
                'website' => 'https://sugity.co.id/',
            ],
            [
                'file' => 'PT Diamond Electric Mfg.png',
                'name' => 'PT Diamond Electric Mfg. Indonesia',
                'website' => null,
            ],
            [
                'file' => 'PT ROKI Indonesia.png',
                'name' => 'PT ROKI Indonesia',
                'website' => null,
            ],
            [
                'file' => 'PT JFE Steel.png',
                'name' => 'PT JFE Steel Galvanizing Indonesia',
                'website' => null,
            ],
            [
                'file' => 'PT BEFA.png',
                'name' => 'PT Bekasi Fajar Industrial Estate Tbk (BeFa)',
                'website' => 'https://www.befa.id/',
            ],
            [
                'file' => 'PT MMID.png',
                'name' => 'PT MMID (Kawasan Industri MM2100)',
                'website' => 'https://mm2100.co.id/',
            ],
            [
                'file' => 'Akademi Komunitas Toyota Indonesia.png',
                'name' => 'Akademi Komunitas Toyota Indonesia',
                'website' => null,
            ],
            [
                'file' => 'Universitas Gadjah Mada.jpeg',
                'name' => 'Universitas Gadjah Mada (UGM)',
                'website' => 'https://ugm.ac.id/',
            ],
            [
                'file' => 'Ehime University.jpeg',
                'name' => 'Ehime University Japan',
                'website' => 'https://www.ehime-u.ac.jp/en/',
            ],
            [
                'file' => 'Shunan University.png',
                'name' => 'Shunan University Japan',
                'website' => 'https://www.shunan-u.ac.jp/',
            ],
            [
                'file' => 'Wuhan Vocational College of Software and Engineering.jpeg',
                'name' => 'Wuhan Vocational College of Software & Engineering',
                'website' => null,
            ],
            [
                'file' => 'IROOTECH Technologi Co, Ltd',
                'name' => 'IROOTECH Technology Co., Ltd',
                'website' => null,
                'target_extension' => 'png',
            ],
            [
                'file' => 'PT Bank Tabungan Negara.png',
                'name' => 'PT Bank Tabungan Negara (Persero) Tbk',
                'website' => 'https://www.btn.co.id/',
            ],
            [
                'file' => 'Kanwil Kemenkumham RI Provinsi Jawa Barat.png',
                'name' => 'Kanwil Kemenkumham Jawa Barat',
                'website' => null,
            ],
            [
                'file' => 'PT DTECH Engineering.png',
                'name' => 'PT DTECH Engineering',
                'website' => 'https://dtechengineering.com/',
            ],
            [
                'file' => 'PT DRA Component Persada.png',
                'name' => 'PT DRA Component Persada',
                'website' => null,
            ],
            [
                'file' => 'PT Dora Bisnis Konsultindo.png',
                'name' => 'PT Dora Bisnis Konsultindo',
                'website' => null,
            ],
            [
                'file' => 'PT Gisma.png',
                'name' => 'PT Gisma Cipta Sukses',
                'website' => null,
            ],
            [
                'file' => 'PT Mili Talenta Inspirasi.png',
                'name' => 'PT Mili Talenta Inspirasi',
                'website' => null,
            ],
            [
                'file' => 'PT Pusat Studi Apindo.jpeg',
                'name' => 'Pusat Studi Apindo',
                'website' => null,
            ],
            [
                'file' => 'DC Robotic School.png',
                'name' => 'DC Robotic School',
                'website' => null,
            ],
            [
                'file' => 'SMK Mitra Industri MM2100.png',
                'name' => 'SMK Mitra Industri MM2100',
                'website' => 'https://smkmitraindustrimm2100.sch.id/',
            ],
            [
                'file' => 'SMK Dewantara 2.jpeg',
                'name' => 'SMK Dewantara 2',
                'website' => null,
            ],
        ];

        foreach ($partnersData as $index => $item) {
            $sourceFile = $sourceDir . '/' . $item['file'];
            $order = $index + 1;
            $ext = isset($item['target_extension']) 
                ? $item['target_extension'] 
                : pathinfo($item['file'], PATHINFO_EXTENSION);
            
            $safeName = Str::slug(pathinfo($item['file'], PATHINFO_FILENAME)) . '.' . ($ext ?: 'png');
            $targetFile = $targetDir . '/' . $safeName;

            if (File::exists($sourceFile)) {
                File::copy($sourceFile, $targetFile);
                $logoPath = 'partners/' . $safeName;
            } elseif (File::exists($targetFile)) {
                $logoPath = 'partners/' . $safeName;
            } else {
                $logoPath = 'assets/images/favicon-cerah.ico';
            }

            Partner::updateOrCreate(
                ['name' => $item['name']],
                [
                    'logo' => $logoPath,
                    'website_url' => $item['website'],
                    'order' => $order,
                    'is_active' => true,
                ]
            );
        }
    }
}
