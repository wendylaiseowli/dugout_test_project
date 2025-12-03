<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

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
            'promotion_startDate'=>Carbon::parse(now()->addDay(1)->second(0))->format('Y-m-d H:i:s'),
            'promotion_endDate'=>Carbon::parse(now()->addDay(3))->second(0)->format('Y-m-d H:i:s'),
            'description'=> $this->faker->sentence(),
            'status'=>true,
        ];
    }
}
