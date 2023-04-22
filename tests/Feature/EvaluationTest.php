<?php

namespace Tests\Feature;

use App\Models\Evaluation;
use App\Models\User;
use App\Models\Autoevaluation;
use App\Models\Coevaluation;
use App\Models\Promotion;
use Illuminate\Http\Client\Request;
use Faker\Factory as Faker;
use App\Models\Competence;
use App\Models\Topic;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class EvaluationTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('migrate');
    }

    public function testCanInsertAutoEvaluation(): void
    /**
     * Test that checks if a autoevaluation can be inserted and it's redirected to the proper page.
     */
    {

        $competence = new Competence([
            'name' => 'Venganza de la consola',
            'description' => 'Saber los comandos correctos para acabar con los errores.'
        ]);
        $competence->save();

        $topic = Topic::create([
            'name' => 'Entrenar dragones',
            'competence_id' => $competence->id,
        ]);

        $promotion = Promotion::create([
            'name' => 'Queens in the North',
            'trainer' => 'Arya Stark',
            'start_date' => '2022-08-14',
            'end_date' => '2023-01-24',
            'topic_id' => $topic->id,
        ]);

        $userEvaluated = new User([
            'name' => 'Shiobban Roy',
            'email' => 'girlboss@waystarroyco.com',
            'password' => 'HateMyDad1948',
            'promotion_id' => $promotion->id,
        ]);
        $userEvaluated->save();

        $this->actingAs($userEvaluated);

        $evaluation = new Evaluation([
            'evaluation_date' => date("Y-m-d"),
            'id_user_evaluated' => $userEvaluated->id,
            'pp_autoeval' => 3,
            'pp_coeval' => 5,
        ]);
        $evaluation->save();

        $response = $this->get('/coevaluacion');
        $response->assertOk();
        $response->assertSee($evaluation->topic);
    }

    public function testCanInsertCoevaluation(): void
    /**
     * Test that checks if a coevaluation can be inserted and it's redirected to the proper page.
     */
    {

        $this->artisan('migrate:fresh');

        $competence = new Competence([
            'name' => 'Venganza de la consola',
            'description' => 'Saber los comandos correctos para acabar con los errores.'
        ]);
        $competence->save();

        $topic = Topic::create([
            'name' => 'Entrenar dragones',
            'competence_id' => $competence->id,
        ]);

        $promotion = Promotion::create([
            'name' => 'Queens in the North',
            'trainer' => 'Arya Stark',
            'start_date' => '2022-08-14',
            'end_date' => '2023-01-24',
            'topic_id' => $topic->id,
        ]);

        $userEvaluated = new User([
            'name' => 'Shiobban Roy',
            'email' => 'girlboss@waystarroyco.com',
            'password' => 'HateMyDad1948',
            'promotion_id' => $promotion->id,
        ]);
        $userEvaluated->save();

        $userCoevaluator = new User([
            'name' => 'Logan Roy',
            'email' => 'therealboss@waystarroyco.com',
            'password' => 'TheBigMAN4ever',
            'promotion_id' => $promotion->id,
        ]);
        $userCoevaluator->save();

        $this->actingAs($userCoevaluator);

        $evaluation = new Evaluation([
            'evaluation_date' => date("Y-m-d"),
            'id_user_evaluated' => $userEvaluated->id,
            'id_user_coevaluator' => $userCoevaluator->id,
            'pp_autoeval' => 3,
            'pp_coeval' => 5,
        ]);
        $evaluation->save();

        $response = $this->get('/coevaluacion');
        $response->assertOk();
        $response->assertSee($userEvaluated->id);
        $response->assertSee($userCoevaluator->id);
    }
}
