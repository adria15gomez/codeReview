<?php

namespace Tests\Feature;

use App\Models\Evaluation;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EvaluationTest extends TestCase
{
    public function testCanInsertAutoEvaluation(): void
    /**
     * Test that checks if a autoevaluation can be inserted and it's redirected to the proper page.
     */
    {
        $user_evaluated = new User([
            'name' => 'Penny Hoftader',
            'email' => 'salesdirector@drugcompany.com',
            'password' => 'L0veCaltechNerds2007',
        ]);
        $user_evaluated->save();

        $evaluation = new Evaluation([
            'evaluation_date' => date("Y-m-d"),
            'id_user_evaluated' => $user_evaluated->id,
            'id_user_coevaluator' => null,
            'pp_autoeval' => 2,
            'pp_coeval' => 6,
        ]);
        $evaluation->save();

        $response = $this->get('/autoevaluacion');
        $response->assertOk();
        $response->assertSee($user_evaluated->id);
    }

    public function testCanInsertCoEvaluation(): void
    /**
     * Test that checks if a coevaluation can be inserted and it's redirected to the proper page.
     */
    {
        $user_evaluated = new User([
            'name' => 'Shiobban Roy',
            'email' => 'girlboss@waystarroyco.com',
            'password' => 'HateMyDad1948',
        ]);
        $user_evaluated->save();

        $user_coevaluator = new User([
            'name' => 'Logan Roy',
            'email' => 'therealboss@waystarroyco.com',
            'password' => 'TheBigMAN4ever',
        ]);
        $user_coevaluator->save();

        $evaluation = new Evaluation([
            'evaluation_date' => date("Y-m-d"),
            'id_user_evaluated' => $user_evaluated->id,
            'id_user_coevaluator' => $user_coevaluator->id,
            'pp_autoeval' => 3,
            'pp_coeval' => 5,
        ]);
        $evaluation->save();

        $response = $this->get('/coevaluacion');
        $response->assertOk();
        $response->assertSee($user_evaluated->id);
        $response->assertSee($user_coevaluator->id);
    }
}
