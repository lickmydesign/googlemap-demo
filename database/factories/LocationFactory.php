<?php

namespace Database\Factories;

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
            'name' => fake()->name(),
            'lat' => fake()->randomFloat(2, 1, 100),
            'long' => fake()->randomFloat(2, 1, 100),
        ];
    }
}