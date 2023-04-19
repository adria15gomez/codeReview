<?php

namespace Tests\Feature;

use App\Models\Promotion;
use App\Models\Topic;
use App\Models\Competence;
use App\Models\Competence as ModelsCompetence;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PromotionTest extends TestCase
{
    public function testCanInsertPromotion(): void
    /**
     * Test that checks if a topic can be inserted
     */
    {
        $competence = new Competence([
            'name' => 'SCRUM Máster',
            'description' => 'Trello, Jira, Asana y su familia'
        ]);
        $competence->save();

        $topic = new Topic([
            'name' => 'SCRUM',
            'competence_id' => $competence->id,
        ]);
        $topic->save();


        $promotion = new Promotion([
            'name' => 'SCRUM',
            'competence_id' => $competence->id,
        ]);
        $promotion->save();

        $response = $this->get('/');
        $response->assertOk();
        $response->assertSee('Escribir en binario');
        $response->assertSee('IDE en modo oscuro');
    }

    public function testCanDisplayTopic(): void
    /**
     * Test that checks if a topic can be displayed.
     */
    {
        $response = $this->get('/agregar-topic');
        $response->assertStatus(200);
        $response->assertViewIs('trainer.addTopic');
    }

    public function testCanEditTopic(): void
    /**
     * Test that checks if a topic can be edited in the database.
     *
     */
    {
        $competence = new Competence([
            'name' => 'Cosas ultranerd',
            'description' => 'Saber volar con escoba'
        ]);
        $competence->save();

        $topic = Topic::create([
            'name' => 'Quidditch a través de los tiempos',
            'competence_id' => $competence->id,
        ]);

        $response = $this->get(route('editTopic.edit',  $topic->id));
        $response->assertStatus(200);
        $response->assertSee($topic->name);
        $response->assertSee($topic->competence_id);
    }

    public function testCanDeleteTopic(): void
    /**
     * Test that checks if a topic can be deleted in the database.
     *
     */
    {
        $competence = new Competence([
            'name' => 'Cosas meganerd',
            'description' => 'Estar mal de la cabeza.'
        ]);
        $competence->save();

        $topic = Topic::create([
            'name' => 'Wheel of Doom',
            'competence_id' => 5,
        ]);

        $response = $this->delete(route('deleteTopic.distroy', $topic->id));

        $response->assertRedirect(route('topic', $topic->id));

        $this->assertNull(Topic::find($topic->id));
    }
}
