<?php

namespace Database\Factories;

use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     * 
     * @return array<string, mixed>
     */
    
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'latitude' => $this->faker->randomFloat(8, 6, 100),
            'longitude' => $this->faker->randomFloat(9, 6, 100),
        ];
    }
}
