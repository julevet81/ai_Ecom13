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
        $electronics = Category::create([
            'name' => 'Electronics',
            'level' => 1,
            'position' => 1
        ]);
        $mobiles = $electronics->children()->create([
            'name' => 'Mobiles',
            'level' => 2,
            'position' => 1
        ]);
        $mobiles->children()->create([
            'name' => 'Android Phones',
            'level' => 3,
            'position' => 1
        ]);
        
        Category::create([
            'name' => 'Fashion',
            'level' => 1,
            'position' => 2
        ]);
        Category::create([
            'name' => 'books',
            'level' => 1,
            'position' => 3
        ]);
        
    }
}