<?php

namespace Tests\Feature;

use App\Models\Topic;
use App\Models\Competence;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TopicTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('migrate');
    }

    public function testCanInsertTopic(): void
    /**
     * Test that checks if a topic can be inserted
     */
    {
        $competence = new Competence([
            'name' => 'Cosas supernerd',
            'description' => 'Controlar binario, ascii, y otros.'
        ]);
        $competence->save();

        $topic1 = new Topic([
            'name' => 'Escribir en binario',
            'competence_id' => $competence->id,
        ]);
        $topic1->save();

        $topic2 = new Topic([
            'name' => 'IDE en modo oscuro',
            'competence_id' => $competence->id,
        ]);
        $topic2->save();

        $response = $this->get('/topic');
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

        $newName = 'Defensa contra los Bugs oscuros';
        $topic->update(['name' => $newName]);

        $updatedTopic = Topic::find($topic->id);

        $response = $this->get(route('editTopic.edit',  $topic->id));
        $response->assertStatus(200);
        $response->assertSee($newName);
        $this->assertEquals($newName, $updatedTopic->name);
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
