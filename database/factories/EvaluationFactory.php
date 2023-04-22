<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evaluation>
 */
class EvaluationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userEvaluated = User::factory()->create();
        $userCoevaluator = User::factory()->create();

        return [
            'evaluation_date' => $this->faker->date(),
            'id_user_evaluated' => $userEvaluated->id,
            'id_user_coevaluator' => $userCoevaluator->id,
            'pp_autoeval' =>  $this->faker->numberBetween(0, 1),
            'pp_coeval' =>  $this->faker->numberBetween(0, 1),
        ];
    }
}
