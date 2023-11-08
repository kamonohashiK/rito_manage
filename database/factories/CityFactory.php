<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * CityFactory
 */
class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cityName = $this->faker->city;
        return [
            'name' => $cityName,
            'en_name' => $cityName,
            'code' => strtoupper(substr($cityName, 0, 3)),
            'prefecture_id' => \App\Models\Prefecture::factory(),
        ];
    }
}
