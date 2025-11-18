<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gallery>
 */

class GalleryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'userID'=>1,
            'categoryID'=> Category::factory(),
            'original_photo_path'=>'34041617523075862.jpg',
            'new_photo_path'=>'34041617523075862.jpg',
            'status'=> true,
        ];
    }
}
