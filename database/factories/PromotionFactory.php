<?php

namespace Database\Factories;

use App\Models\Topic;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PromotionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $topic = Topic::factory()->create();

        return [
            'name' => $this->faker->sentence(),
            'trainer' => $this->faker->word(),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'topic_id' => $topic->id,
            'evaluation1' => $this->faker->date(),
            'evaluation2' => $this->faker->date(),
            'evaluation3' => $this->faker->date(),
            'evaluation4' => $this->faker->date(),
            'zoom_url' => $this->faker->sentence(),
            'slack_url' => $this->faker->sentence()
        ];
    }
}
