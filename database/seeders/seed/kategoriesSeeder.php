<?php

namespace Database\Seeders\seed;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class kategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategoris')->insert([
            ['name' => 'Art & Design', 'slug_kategori' => 'artanddesign'],
            ['name' => 'Business', 'slug_kategori' => 'business'],
            ['name' => 'Education', 'slug_kategori' => 'education'],
            ['name' => 'Lifestyle', 'slug_kategori' => 'fashion'],
            ['name' => 'News', 'slug_kategori' => 'news'],
            ['name' => 'Politics', 'slug_kategori' => 'politics'],
            ['name' => 'Science', 'slug_kategori' => 'science'],
            ['name' => 'Sports', 'slug_kategori' => 'sports'],
            ['name' => 'Football', 'slug_kategori' => 'football'],
            ['name' => 'Technology', 'slug_kategori' => 'teknologi'],
            ['name' => 'Games', 'slug_kategori' => 'games'],
            ['name' => 'Music', 'slug_kategori' => 'music'],
            ['name' => 'Movies', 'slug_kategori' => 'film'],
            ['name' => 'Books', 'slug_kategori' => 'books'],
            ['name' => 'Food', 'slug_kategori' => 'food'],
        ]);
    }
}
