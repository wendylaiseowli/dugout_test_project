<?php

namespace Database\Factories;

use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MatchesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'startDateTime'=> '2025-09-12 22:00:00',
            'homeTeamID'=> Team::factory()->create()->id,
            'awayTeamID'=> Team::factory()->create()->id,
            'homeTeamResult'=> $this->faker->numberBetween(1,3),
            'awayTeamResult'=> $this->faker->numberBetween(1,3),
            'leagueID'=>1,
            'status'=>1,
        ];
    }
}
