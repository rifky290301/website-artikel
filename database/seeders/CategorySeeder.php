<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'berita',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Category::create([
            'name' => 'artikel',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Category::create([
            'name' => 'cerpen',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Category::create([
            'name' => 'puisi',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Category::create([
            'name' => 'opini',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Category::create([
            'name' => 'karya ilmiah',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
