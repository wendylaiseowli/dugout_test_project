<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'reservation_name'=> $this->faker->name,
            'reservation_date'=> now()->addDay(2),
            'reservation_time'=> now()->addDay(2)->format('H:i'),
            'number_of_prople'=> $this->faker->numberBetween(1, 10),
            'phone_number'=> $this->faker->phoneNumber,
            'email'=> $this->faker->unique()->email,
        ];
    }
}
