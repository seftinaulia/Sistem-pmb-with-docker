<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Iam Admin',
            'password' => Hash::make('password'),
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'role' => 'Administrator',
            'created_at' => now()
        ]);

        // Calon Mahasiswa
        User::create([
            'name' => 'Iam Mahasiswa',
            'password' => Hash::make('password'),
            'email' => 'calonmhs1@gmail.com',
            'email_verified_at' => now(),
            'role' => 'Calon Mahasiswa',
            'created_at' => now()
        ]);
         User::create([
            'name' => 'Aulia',
            'password' => Hash::make('password'),
            'email' => 'aulia@gmail.com',
            'email_verified_at' => now(),
            'role' => 'Calon Mahasiswa',
            'created_at' => now()
        ]);
    }
}
