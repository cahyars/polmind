<?php

namespace Database\Seeders;

use App\Models\Staff;
use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    public function run(): void
    {
        $staff = [
            [
                'name' => 'Adnandhika Ramadhani Dewanto, S.Kom.',
                'position' => 'Admin Akademik',
                'photo' => 'assets/images/daftar_dosen/internal/baru/adnan.jpg',
                'order' => 1,
            ],
            [
                'name' => 'Nurul Salma, S.IP.',
                'position' => 'Pustakawan',
                'photo' => 'assets/images/daftar_dosen/internal/baru/nurul.jpg',
                'order' => 2,
            ],
        ];

        foreach ($staff as $item) {
            Staff::updateOrCreate(
                ['name' => $item['name']],
                $item
            );
        }
    }
}
