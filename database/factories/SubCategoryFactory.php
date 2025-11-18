<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubCategory>
 */
class SubCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id'=> fake()->unique()->numberBetween(1, 100000000),
            'categoryID'=> Category::factory(),
            'name'=> $this->faker->randomElement(['Starters', 'Mains', 'Burgers', 'Dessert', 'Cocktails', 'Shooters', 'Wine', 'Beers','Pizza', 'Non-Alcoholic', 'Liquour', 'Asian']),
        ];
    }
}
