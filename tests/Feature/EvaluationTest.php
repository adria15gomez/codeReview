<?php

namespace Tests\Feature;

use App\Models\Evaluation;
use App\Models\User;
use App\Models\Autoevaluation;
use App\Models\Coevaluation;
use App\Models\Promotion;
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

    public function testCanInsertEvaluationAuto(): void
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

        $user_evaluated = new User([
            'name' => 'Shiobban Roy',
            'email' => 'girlboss@waystarroyco.com',
            'password' => 'HateMyDad1948',
            'promotion_id' => $promotion->id,
        ]);
        $user_evaluated->save();

        $this->actingAs($user_evaluated);

        $evaluation = new Evaluation([
            'evaluation_date' => date("Y-m-d"),
            'id_user_evaluated' => $user_evaluated->id,
            'pp_autoeval' => 3,
            'pp_coeval' => 5,
        ]);
        $evaluation->save();

        $response = $this->get('/coevaluacion');
        $response->assertOk();
        $response->assertSee($evaluation->topic);
    }

    public function testCanInsertEvaluationCo(): void
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

        $user_evaluated = new User([
            'name' => 'Shiobban Roy',
            'email' => 'girlboss@waystarroyco.com',
            'password' => 'HateMyDad1948',
            'promotion_id' => $promotion->id,
        ]);
        $user_evaluated->save();

        $user_coevaluator = new User([
            'name' => 'Logan Roy',
            'email' => 'therealboss@waystarroyco.com',
            'password' => 'TheBigMAN4ever',
            'promotion_id' => $promotion->id,
        ]);
        $user_coevaluator->save();

        $this->actingAs($user_coevaluator);

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

    public function testEvaluationsCanBeCompared(): void
    {
        /**
         * Test that checks if a coevaluation and an autoevaluation for a given user/date can be queried and showed in the same page.
         */

        $this->artisan('migrate:fresh');

        $competence = new Competence([
            'name' => 'Venganza de la consola',
            'description' => 'Saber los comandos correctos para acabar con los errores.'
        ]);
        $competence->save();

        $topic = new Topic([
            'name' => 'Entrenar dragones',
            'competence_id' => $competence->id,
        ]);
        $topic->save();

        $promotion = Promotion::create([
            'name' => 'Queens in the North',
            'trainer' => 'Arya Stark',
            'start_date' => '2022-08-14',
            'end_date' => '2023-01-24',
            'topic_id' => $topic->id,
        ]);

        $user_evaluated = new User([
            'name' => 'June Osborn',
            'email' => 'notgonnaforget@stopgilead.org',
            'password' => 'n0litetebastardescarborund0rum',
            'promotion_id' => $promotion->id,
        ]);
        $user_evaluated->save();

        $user_id = $user_evaluated->id;
        $date = '2023-04-19';

        $evaluation = Evaluation::create([
            'id_user_evaluated' => $user_id,
            'evaluation_date' => $date,
        ]);


        $autoevaluation = Autoevaluation::create([
            'topic_id' => $topic->id,
            'level' => 3,
            'evaluation_id' => $evaluation->id,
        ]);

        $coevaluation = Coevaluation::create([
            'topic_id' => $topic->id,
            'level' => 3,
            'evaluation_id' => $evaluation->id,
        ]);

        // $autoevaluations = [
        //     [
        //         'evaluation_id' => $evaluation->id,
        //         'topic_id' => $topic->id,
        //         'level' => 2,
        //     ],
        //     [
        //         'evaluation_id' => $evaluation->id,
        //         'topic_id' => $topic->id,
        //         'level' => 3,
        //     ],
        // ];

        // foreach ($autoevaluations as $autoevaluation) {
        //     Autoevaluation::create($autoevaluation);
        // }

        // $coevaluations = [
        //     [
        //         'evaluation_id' => $evaluation->id,
        //         'topic_id' => $topic->id,
        //         'level' => 6,
        //     ],
        //     [
        //         'evaluation_id' => $evaluation->id,
        //         'topic_id' => $topic->id,
        //         'level' => 2,
        //     ],
        // ];

        // foreach ($coevaluations as $coevaluation) {
        //     Coevaluation::create($coevaluation);
        // }

        // $autoevaluation_data = [];
        // foreach ($autoevaluations as $autoevaluation) {
        //     $autoevaluation_data[] = $autoevaluation;
        // }

        $response = $this->call('GET', '/comparison', [
            'user_id' => $user_id,
            'date' => $date,
        ]);

        $response->assertViewIs('coder.comparison');
        $response->assertViewHas([
            'user_id' => $user_id,
            'date' => $date,
            'autoevaluation' => $autoevaluation,
            'coevaluation' => $coevaluation,
        ]);
    }
}
