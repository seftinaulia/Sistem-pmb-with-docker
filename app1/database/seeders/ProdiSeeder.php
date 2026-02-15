<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProgramStudi;
use DateTime;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //create ProgramStudi
        ProgramStudi::create([
            'id_prodi' => 'PRD001',
            'nama_prodi' => 'INFORMARTIKA',
            'jenjang_prodi' => 'Sarjana 1',
            'foto_prodi' => 'assets/images/inf.jpeg',
            'created_at' => now()
        ]);

        ProgramStudi::create([
            'id_prodi' => 'PRD002',
            'nama_prodi' => 'ARSITEKTUR',
            'jenjang_prodi' => 'Sarjana 1',
            'foto_prodi' => 'assets/images/arsi.jpeg',
            'created_at' => now()
        ]);
        ProgramStudi::create([
            'id_prodi' => 'PRD003',
            'nama_prodi' => 'TEKNIK INDUSTRI',
            'jenjang_prodi' => 'Sarjana 1',
            'foto_prodi' => 'assets/images/ind.jpg',
            'created_at' => now()
        ]);

        ProgramStudi::create([
            'id_prodi' => 'PRD004',
            'nama_prodi' => 'PVTO',
            'jenjang_prodi' => 'Sarjana 1',
            'foto_prodi' => 'assets/images/pvto.jpg',
            'created_at' => now()
        ]);
    }
}
