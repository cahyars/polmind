<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            BeritaSeeder::class,
            SliderSeeder::class,
            GridFeatureSeeder::class,
            LecturerSeeder::class,
            StaffSeeder::class,
            FounderExpertSeeder::class,
            SiteSettingSeeder::class,
        ]);
    }
}
