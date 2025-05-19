<?php

namespace Database\Seeders;

use App\Models\Users;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'username' => 'admin1',
                'email' => 'admin@ujicoba.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'profile_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => '0001020304',
                'email' => 'dosen1@ujicoba.com',
                'password' => Hash::make('password'),
                'role' => 'dosen',
                'profile_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => '2020001',
                'email' => 'mahasiswa1@ujicoba.com',
                'password' => Hash::make('password'),
                'role' => 'mahasiswa',
                'profile_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Users::insert($users);
    }
}
