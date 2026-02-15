<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sekolah;
use DateTime;


class SekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sekolah::create([
            'npsn' => '123456',
            'nama_sekolah' => 'Universitas Bhinneka PGRI',
            'alamat' => 'Tulungagung',
            'kota' => 'Tulungagung',
            'created_at' => now()
        ]);

        Sekolah::create([
            'npsn' => '123457',
            'nama_sekolah' => 'Universitas Bhinneka PGRI 2',
            'alamat' => 'Tulungagung',
            'kota' => 'Tulungagung',
            'created_at' => now()
        ]);
    }
}
