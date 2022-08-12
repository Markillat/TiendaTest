<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::factory(5)->create();
        $products = Product::factory(15)
            ->make()
            ->each(function ($category) use ($categories) {
                $category->category_id = $categories->random()->id;
                $category->save();
            });
    }
}
