<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            ['title' => 'Sejarah', 'category_id' => 1],
            ['title' => 'Arti Lambang', 'category_id' => 1],
            ['title' => 'Motto Daerah', 'category_id' => 1],
            ['title' => 'Visi dan Misi', 'category_id' => 1],
            ['title' => 'Pendidikan', 'category_id' => 1],
            ['title' => 'Kesehatan', 'category_id' => 1],
            ['title' => 'Agama', 'category_id' => 1],
            ['title' => 'Tenaga Kerja', 'category_id' => 1],

            ['title' => 'Peta Wilayah', 'category_id' => 2],
            ['title' => 'Letak, Luas & Batas', 'category_id' => 2],
            ['title' => 'Cuaca & Iklim', 'category_id' => 2],
            ['title' => 'Topografi', 'category_id' => 2],
            ['title' => 'Demografi', 'category_id' => 2],
            ['title' => 'Sosial - Ekonomi', 'category_id' => 2],
            ['title' => 'Budaya Daerah', 'category_id' => 2],

            ['title' => 'Bupati OKU Timur', 'category_id' => 3],
            ['title' => 'Wakil Bupati OKU Timur', 'category_id' => 3],
            ['title' => 'Sekretaris Daerah', 'category_id' => 3],
            ['title' => 'Asisten I', 'category_id' => 3],
            ['title' => 'Asisten II', 'category_id' => 3],
            ['title' => 'Asisten III', 'category_id' => 3],
            ['title' => 'Kepala Dinas', 'category_id' => 3],

            ['title' => 'Perkebunan', 'category_id' => 4],
            ['title' => 'Pertanian', 'category_id' => 4],
            ['title' => 'Peternakan dan Perikanan', 'category_id' => 4],
            ['title' => 'Kehutanan', 'category_id' => 4],
            ['title' => 'Pertambangan', 'category_id' => 4],
            ['title' => 'Perindustrian', 'category_id' => 4],
            ['title' => 'Perdagangan', 'category_id' => 4],
            ['title' => 'Pariwisata', 'category_id' => 4],

            ['title' => 'Jalan dan Kereta Api', 'category_id' => 5],
            ['title' => 'Listrik', 'category_id' => 5],
            ['title' => 'Telekomunikasi', 'category_id' => 5],
            ['title' => 'Sarana Air Bersih', 'category_id' => 5],

            ['title' => 'Galeri', 'category_id' => 8],

            ['title' => 'Kebijakan Privasi', 'category_id' => 9],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
    }
}
