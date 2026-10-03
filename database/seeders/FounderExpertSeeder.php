<?php

namespace Database\Seeders;

use App\Models\FounderExpert;
use Illuminate\Database\Seeder;

class FounderExpertSeeder extends Seeder
{
    public function run(): void
    {
        $founders = [
            [
                'name' => 'Yoshihiro Kobi',
                'role' => 'Pendiri Kawasan Industri MM2100',
                'photo' => 'assets/images/profil/kobi.jpg',
                'order' => 1,
            ],
            [
                'name' => 'Darwoto',
                'role' => 'Pengelola Kawasan Industri MM2100',
                'photo' => 'assets/images/profil/darwoto.jpg',
                'order' => 2,
            ],
            [
                'name' => 'Lispiyatmini',
                'role' => 'Jajaran Pimpinan industri dalam Kawasan Industri MM2100',
                'photo' => 'assets/images/profil/lispiyatmini.jpg',
                'order' => 3,
            ],
            [
                'name' => 'Musfir',
                'role' => 'Jajaran Pimpinan industri dalam Kawasan Industri MM2100',
                'photo' => 'assets/images/profil/musfir.jpg',
                'order' => 4,
            ],
            [
                'name' => 'Wikan Sakarinto',
                'role' => "Direktur Politeknik Mitra Industri\nDirjen Vokasi Kemendikbudristek RI (2020-2022)\nDekan SV-UGM (2016-2020)",
                'photo' => 'assets/images/profil/wikan.jpg',
                'order' => 5,
            ],
            [
                'name' => 'Joko Baroto',
                'role' => "Wakil Direktur Politeknik Mitra Industri\nExecutive Officer, PT. Daihatsu Drivetrain Manufacturing Indonesia",
                'photo' => 'assets/images/profil/joko.jpg',
                'order' => 6,
            ],
        ];

        foreach ($founders as $item) {
            FounderExpert::updateOrCreate(
                ['name' => $item['name']],
                $item
            );
        }
    }
}
