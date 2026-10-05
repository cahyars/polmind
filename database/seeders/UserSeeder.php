<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@polmind.ac.id'],
            [
                'name' => 'Administrator Polmind',
                'role' => 'admin',
                'password' => Hash::make('PolmindMM2100!!'),
                'email_verified_at' => now(),
            ]
        );
    }
}
