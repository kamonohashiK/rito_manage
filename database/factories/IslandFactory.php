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
        //TODO: 場合によってはDBの文字数制限を超える可能性があるので、確実に超えない形に修正する
        return [
            'firestore_id' => $this->faker->unique()->regexify('[a-zA-Z0-9]{40}'),
            'name' => $this->faker->firstName(),
            'kana' => $this->faker->firstName(),
            'en_name' => $this->faker->title(),
            'lat' => $this->faker->latitude(),
            'lng' => $this->faker->longitude(),
        ];
    }
}
