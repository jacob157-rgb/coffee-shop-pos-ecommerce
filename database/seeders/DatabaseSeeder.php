<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Categories;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        for ($i = 0; $i < 20; $i++) {
            Categories::create([
                'name' => fake()->name(), // Menggunakan nama acak sepanjang 10 karakter
            ]);
        }
    }
}
