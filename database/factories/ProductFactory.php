<?php

namespace Database\Factories;

use App\Helper\SlugHelper;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->name;
        return [
            'name' => $name,
            'description' => fake()->paragraph,
            'image' => null,
            'price' => fake()->randomFloat(2, 10, 1000), // Generate a random price between 10 and 1000 with 2 decimal places
            'slug' => SlugHelper::generateUniqueSlug($name, new Product()),
            'is_active' => fake()->boolean(70), // 70% chance of being active, 30% chance of being inactive
        ];
    }
}
