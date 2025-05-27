<?php

namespace Database\Seeders;

use App\Models\User;
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
                'username' => '0001020305',
                'email' => 'dosen2@ujicoba.com',
                'password' => Hash::make('password'),
                'role' => 'dosen',
                'profile_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => '0001020306',
                'email' => 'dosen3@ujicoba.com',
                'password' => Hash::make('password'),
                'role' => 'dosen',
                'profile_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => '2341720209',
                'email' => 'mahasiswa1@ujicoba.com',
                'password' => Hash::make('password'),
                'role' => 'mahasiswa',
                'profile_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => '2341720032',
                'email' => 'mahasiswa2@ujicoba.com',
                'password' => Hash::make('password'),
                'role' => 'mahasiswa',
                'profile_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => '2341720051',
                'email' => 'mahasiswa3@ujicoba.com',
                'password' => Hash::make('password'),
                'role' => 'mahasiswa',
                'profile_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => '2341720054',
                'email' => 'mahasiswa4@ujicoba.com',
                'password' => Hash::make('password'),
                'role' => 'mahasiswa',
                'profile_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        User::insert($users);
    }
}
