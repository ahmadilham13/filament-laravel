<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        $category = Category::first();

        for($i = 1; $i <= 10; $i++) {
            $manageStock = (bool)random_int(0, 1);
            // $randomCategoriesIDs = Category::all()->random()->limit(2)->pluck('id');

            $product = Product::factory()->create([
                'author_id'     => $user->id,
                'manage_stock'  => $manageStock,
                'stock_status'  => $manageStock ? Product::STATUS_IN_STOCK : Product::STATUS_OUT_OF_STOCK,
                'category_id'   => $category->id,
            ]);            
        }
    }
}
