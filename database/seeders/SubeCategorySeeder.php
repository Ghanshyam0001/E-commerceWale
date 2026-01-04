<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubeCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubCategory::truncate();

        $categories = [
            'Electronics' => ['Mobile', 'Laptop', 'Washing Machine', 'Computer'],
            'Clothing'    => ['Mens', 'Women', 'Children'],
        ];


        foreach ($categories as $categoryName => $subcategories) {


            $category = Category::firstOrCreate([
                'name' => $categoryName
            ]);


            foreach ($subcategories as $subcategoryName) {


                $subcategory = SubCategory::firstOrNew([
                    'category_id' => $category->id,
                    'name'        => $subcategoryName,
                ]);


                if (!$subcategory->exists) {
                    $subcategory->save();
                }
            }
        }
    }
}
