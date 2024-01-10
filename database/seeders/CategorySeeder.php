<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'nama_kategori' => 'Pop',
                'keterangan' => 'Lagu Pop'
            ],
            [
                'nama_kategori' => 'Rock',
                'keterangan' => 'Lagu Rock'
            ],
            [
                'nama_kategori' => 'Reggae',
                'keterangan' => 'Lagu Reggae'
            ],
            [
                'nama_kategori' => 'Hip-hop',
                'keterangan' => 'Lagu Hip-hop'
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
