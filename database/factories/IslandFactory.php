<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Island>
 */
class IslandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firestore_id' => $this->faker->unique()->word(),
            'name' => $this->faker->firstName($maxNbChars = 10),
            'kana' => $this->faker->firstName($maxNbChars = 10),
            'en_name' => $this->faker->title($maxNbChars = 20),
            'lat' => $this->faker->latitude(),
            'lng' => $this->faker->longitude(),
        ];
    }
}
