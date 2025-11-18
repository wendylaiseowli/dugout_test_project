<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SubCategory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'subCategoryID'=> SubCategory::factory(),
            'menu_item_name'=>$this->faker->word(),
            'menu_item_description'=>$this->faker->sentence(),
            'userID'=>1,
            'price'=>$this->faker->randomFloat(2, 1, 99),
        ];
    }
}
