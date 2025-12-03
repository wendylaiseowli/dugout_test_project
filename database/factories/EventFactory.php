<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'event_name'=>$this->faker->word(),
            'description'=>$this->faker->sentence(),
            'userID'=> User::factory()->create(),
            'photo_path'=>'93681670855720357.jpg',
            'event_date'=>Carbon::parse(now()->addDay(1))->second(0)->format('Y-m-d H:i:s'),
            'event_time'=>Carbon::parse(now()->addDay(1))->second(0)->format('Y-m-d H:i:s'),
            'event_location'=> 'Oasis Square, Jalan PJU 1A/7A, Ara Damansara, Petaling Jaya, Malaysia',
        ];
    }
}
