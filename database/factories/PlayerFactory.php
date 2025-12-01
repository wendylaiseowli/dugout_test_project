<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Matches;
use App\Models\Team;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=> fake()->name(), 
            'email'=> fake()->unique()->safeEmail(),
            'phoneNumber'=> $this->faker->numerify('###########'),
            'tableNumber'=> '465',
            'branchID'=> '1',
            'matchID'=> Matches::factory(),
            'homeTeamPrediction'=> Team::factory(),
            'awayTeamPrediction'=> Team::factory(),
            'cookieID'=> '1234567',
            'isWinner'=> true,
            'message'=> 'bla bla bla',
        ];
    }
}
