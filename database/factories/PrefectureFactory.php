<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * PrefectureFactory
 */
class PrefectureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->prefecture,
            'en_name' => $this->faker->prefecture,
            'code' => $this->faker->prefecture,
        ];
    }
}
