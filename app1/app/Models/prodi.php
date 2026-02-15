<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prodi extends Model
{
    /** Ambil semua prodi. */
    public static function all(): Collection
    {
        return collect(self::data());
    }

    /** Ambil detail prodi by slug; null kalau tidak ada. */
    public static function find(string $slug): ?array
    {
        return collect(self::data())->firstWhere('slug', $slug);
    }

    /** ---------- DATA STATIS ---------- */
    protected static function data(): array
    {
        return [
            [
                'slug'       => 'informatika',
                'nama'       => 'Informatika',
                'deskripsi'  => 'Program studi yang berfokus pada pengembangan perangkat lunak,
                                 kecerdasan buatan, dan sistem informasi modern.',
                'gambar'     => 'images/mesin.jpeg',
                'kuota'      => 120,
                'fakultas'   => 'Fakultas Sains dan Teknologi',
            ],
            [
                'slug'       => 'arsitektur',
                'nama'       => 'Arsitektur',
                'deskripsi'  => 'Seni dan ilmu merancang serta membangun struktur bangunan. Dalam arti yang lebih luas, 
                                 arsitektur mencakup perancangan dan pembangunan lingkungan, termasuk perencanaan kota dan lingkungan makro, bukan hanya satu bangunan saja. ',
                'gambar'     => 'images/arsi.png',
                'kuota'      => 100,
                'fakultas'   => 'Fakultas Sains dan Teknologi',
            ],
            [
                'slug'       => 'teknik-industri',
                'nama'       => 'Teknik Industri',
                'deskripsi'  => 'ilmu teknik yang berfokus pada pengembangan, perbaikan, dan penerapan sistem terintegrasi yang terdiri dari manusia, 
                                 pengetahuan, peralatan, energi, bahan, dan proses untuk meningkatkan efisiensi, produktivitas, 
                                 dan kualitas dalam berbagai jenis organisasi dan industri. ',
                'gambar'     => 'images/trpl.jpg',
                'kuota'      => 150,
                'fakultas'   => 'Fakultas Sains dan Teknologi',
            ],
            [
                'slug'       => 'pvto',
                'nama'       => 'PVTO',
                'deskripsi'  => 'Menyelenggarakan pendidikan dan pengembangan sumber daya manusia 
                                 yang kompeten dalam bidang pendidikan otomotif.',
                'gambar'     => 'images/listrik.jpg',
                'kuota'      => 200,
                'fakultas'   => 'Fakultas Sains dan Teknologi',
            ],
        ];
    }
}
