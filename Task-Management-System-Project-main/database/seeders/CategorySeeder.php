<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::insert([
            ['name' => 'Work', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Personal', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Health', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'School', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}