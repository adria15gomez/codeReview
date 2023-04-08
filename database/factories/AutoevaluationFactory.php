<?php

namespace Database\Factories;

use App\Models\Evaluation;
use App\Models\Topic;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AutoevaluationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $topic = Topic::factory()->create();
        $evaluation = Evaluation::factory()->create();

        return [
            'topic_id' => $topic->id,
            'evaluation_id' => $evaluation->id,
            'level' => $this->faker->numberBetween(0, 7)
        ];
    }
}
