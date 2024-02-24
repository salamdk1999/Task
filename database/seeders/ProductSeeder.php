<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'first product',
            'description' => 'This is first product',
            'image' => null,
            'price' => 20000000000,
            'slug' => 'first-product',
        ]);
        Product::factory()->count(10)->create();
    }
}
