<?php

namespace Database\Seeders;

use App\Models\ProfileUser;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::where('email', 'admin@gmail.com')->first();
        $mahasiswa = User::where('email', 'calonmhs1@gmail.com')->first();

        if ($admin) {
            ProfileUser::create([
                'user_id' => $admin->id,
                'nama' => $admin->name,
                'email' => $admin->email,
                'foto' => null,
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1990-01-01',
                'gender' => 'Laki-laki',
                'no_hp' => '08123456789',
                'alamat' => 'Jl. Sudirman No.1',
                'instagram' => '@admin',
                'whatsapp' => '08123456789',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        if ($mahasiswa) {
            ProfileUser::create([
                'user_id' => $mahasiswa->id,
                'nama' => $mahasiswa->name,
                'email' => $mahasiswa->email,
                'foto' => null,
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1995-05-05',
                'gender' => 'Perempuan',
                'no_hp' => '08987654321',
                'alamat' => 'Jl. Asia Afrika No.2',
                'instagram' => '@mahasiswa',
                'whatsapp' => '08987654321',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
