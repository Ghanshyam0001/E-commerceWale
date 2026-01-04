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
        Category::truncate();
        $categories = ['Electronics', 'Clothing'];

        foreach ($categories as $category) {
            $cat = new Category();
            $cat->name = $category;
            $cat->save();
        }
    }
}
