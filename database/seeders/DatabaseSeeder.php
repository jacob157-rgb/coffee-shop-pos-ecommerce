<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        ProductCategory::create([
            'category' => 'drink'
        ]);
        Product::create([
            'category_id' => '1',
            'product_name' => 'drink',
            'product_pict' => 'pict.jpg',
            'product_desc' => 'minumannnn'
        ]);
    }
}
