<?php

namespace Tests\Feature;

use App\Models\Evaluation;
use App\Models\User;
use App\Models\Autoevaluation;
use App\Models\Coevaluation;
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
    //use DatabaseTransactions;
    use RefreshDatabase;

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

    public function testEvaluationsCanBeCompared(): void
    {
        /**
         * Test that checks if a coevaluation and an autoevaluation for a given user/date can be queried and showed in the same page.
         */

        $faker = Faker::create();

        $user_evaluated = new User([
            'name' => 'June Osborn',
            'email' => 'notgonnaforget@stopgilead.org',
            'password' => 'n0litetebastardescarborund0rum',
        ]);
        $user_evaluated->save();

        // $competence = new Competence([
        //     'name' => 'Venganza de la consola',
        //     'description' => 'Saber los comandos correctos para acabar con los errores.'
        // ]);
        // $competence->save();

        // $topics = [
        //     ['name' => 'El fabuloso Git stash', 'competence_id' => $competence->id],
        //     ['name' => 'Artisan y su familia', 'competence_id' => $competence->id],
        // ];

        // foreach ($topics as $topic) {
        //     Topic::create($topic);
        // }

        $user_id = $user_evaluated->id;
        $date = '2023-04-19';

        $evaluation = Evaluation::create([
            'id_user_evaluated' => $user_id,
            'evaluation_date' => $date,
        ]);

        $autoevaluations = [
            [
                'evaluation_id' => $evaluation->id,
                'topic_id' => $faker->numberBetween($min = 1, $max = 10),
                'level' => 2,
            ],
            [
                'evaluation_id' => $evaluation->id,
                'topic_id' => $faker->numberBetween($min = 1, $max = 10),
                'level' => 3,
            ],
        ];

        foreach ($autoevaluations as $autoevaluation) {
            Autoevaluation::create($autoevaluation);
        }

        $coevaluations = [
            [
                'evaluation_id' => $evaluation->id,
                'topic_id' => $faker->numberBetween($min = 1, $max = 10),
                'level' => 6,
            ],
            [
                'evaluation_id' => $evaluation->id,
                'topic_id' => $faker->numberBetween($min = 1, $max = 10),
                'level' => 2,
            ],
        ];

        foreach ($coevaluations as $coevaluation) {
            Coevaluation::create($coevaluation);
        }

        $autoevaluation_data = [];
        foreach ($autoevaluations as $autoevaluation) {
            $autoevaluation_data[] = $autoevaluation;
        }

        $response = $this->call('GET', '/comparison', [
            'user_id' => $user_id,
            'date' => $date,
        ]);

        $response->assertViewIs('coder.comparison');
        $response->assertViewHas([
            'user_id' => $user_id,
            'date' => $date,
            'autoevaluation' => $autoevaluation_data,
            'coevaluations' => $coevaluations,
        ]);
    }
}
