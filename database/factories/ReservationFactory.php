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
            'userID' => 1,
            'reservation_name'=> $this->faker->name,
            'reservation_date'=> now()->addDay(2),
            'reservation_time'=> now()->addDay(2)->format('H:i'),
            'number_of_people'=> $this->faker->numberBetween(1, 8),
            'phone_number'=> $this->faker->numerify('###########'),
            'email'=> $this->faker->unique()->email,
            'status'=>1,
            'created_at'=>null,
        ];
    }
}
