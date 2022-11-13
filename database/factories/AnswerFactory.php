<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\User;
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
    public function definition()
    {
        $userIds = User::pluck('id');
        $questionIds = Question::pluck('id');
        return [
            'answer' => fake()->realText(180),
            'best_answer' => false,
            'user_id' => fake() -> randomElement($userIds),
            'question_id' => fake() -> randomElement($questionIds)
        ];
    }
}
