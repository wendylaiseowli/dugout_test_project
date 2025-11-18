<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Promotion>
 */
class PromotionFactory extends Factory
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
            'userID'=>1,
            'name'=>$this->faker->word(),
            'photo_path'=> '93681670855720357.jpg',
            'promotion_startDate'=>'2025-03-25 00:00:00',
            'promotion_endDate'=>'2025-04-30 00:00:00',
            'description'=> $this->faker->sentence(),
            'status'=>true,
        ];
    }
}
