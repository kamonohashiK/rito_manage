<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'question_id' => \App\Models\Question::factory(),
            'firestore_id' => $this->faker->unique()->word(),
            'answer' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'liked_count' => $this->faker->numberBetween($min = 0, $max = 100),
            'disliked_count' => $this->faker->numberBetween($min = 0, $max = 100),
            'posted_at' => $this->faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null),
            'posted_user_id' => $this->faker->unique()->word(),
        ];
    }
}
