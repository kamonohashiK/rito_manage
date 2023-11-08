<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'island_id' =>
            function () {
                return \App\Models\Island::factory()->create()->id;
            },
            'firestore_id' => $this->faker->unique()->regexify('[a-zA-Z0-9]{40}'),
            'question' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'answer_count' => $this->faker->numberBetween($min = 0, $max = 4),
            'is_default' => $this->faker->boolean(),
            'posted_at' => $this->faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null),
            'posted_user_id' =>
            $this->faker->unique()->regexify('[a-zA-Z0-9]{40}'),
        ];
    }
}
