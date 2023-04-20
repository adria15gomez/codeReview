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
     * Test that checks if a promotion can be inserted
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
            'name' => 'Queens in the North',
            'trainer' => 'Arya Stark',
            'start_date' => date("Y-m-d H:i:s"),
            'end_date' => '2023-09-10',
            'topic_id' => $topic->id,
            'evaluation1' => '2023-05-10',
            'evaluation1' => '2023-06-10',
            'evaluation1' => '2023-07-10',
            'evaluation1' => '2023-08-10',
        ]);
        $promotion->save();

        $response = $this->get('/promociones');
        $response->assertOk();
        $response->assertSee('Queens in the North');;
    }

    public function testCanDisplayPromotion(): void
    /**
     * Test that checks if a promotion can be displayed.
     */
    {
        $response = $this->get('/agregar-promocion');
        $response->assertStatus(200);
        $response->assertViewIs('trainer.addPromotion');
    }

    public function testCanEditPromotion(): void
    /**
     * Test that checks if a promotion can be edited in the database.
     *
     */
    {
        $competence = new Competence([
            'name' => 'Cosas meganerd',
            'description' => 'Saber pociones avanzadas'
        ]);
        $competence->save();

        $topic = new Topic([
            'name' => 'Poción multijugos',
            'competence_id' => $competence->id,
        ]);

        $promotion = new Promotion([
            'name' => 'Dumbledores Army',
            'trainer' => 'Harry Potter',
            'start_date' => date("Y-m-d H:i:s"),
            'end_date' => '2023-09-10',
            'topic_id' => $topic->id,
            'evaluation1' => '2023-05-10',
            'evaluation1' => '2023-06-10',
            'evaluation1' => '2023-07-10',
            'evaluation1' => '2023-08-10',
        ]);
        $promotion->save();

        $newTrainer = 'Hermione Granger';
        $promotion->update(['trainer' => $newTrainer]);

        $updatedEvaluation = Promotion::find($promotion->id);
        $this->assertEquals($newTrainer, $updatedEvaluation->trainer);
    }

    public function testCanDeletePromotion(): void
    /**
     * Test that checks if a promotion can be deleted in the database.
     *
     */
    {
        $competence = new Competence([
            'name' => 'Testing y catas de vinos',
            'description' => 'Identificar lo bueno de lo malo'
        ]);
        $competence->save();

        $topic = new Topic([
            'name' => 'Nochentera',
            'competence_id' => $competence->id,
        ]);

        $promotion = new Promotion([
            'name' => 'Medio limón',
            'trainer' => 'Javi',
            'start_date' => date("Y-m-d H:i:s"),
            'end_date' => '2023-09-10',
            'topic_id' => $topic->id,
            'evaluation1' => '2023-05-10',
            'evaluation2' => '2023-06-10',
            'evaluation3' => '2023-07-10',
            'evaluation4' => '2023-08-10',
            'zoom_url' => 'https://stackoverflow.com/questions/17990820/set-port-for-php-artisan-php-serve',
            'slack_url' => 'https://stackoverflow.com/questions/17990820/set-port-for-php-artisan-php-serve',
        ]);

        $promotion->save();
        $response = $this->delete(route('deletePromotion.destroy', $promotion->id));
        $response->assertRedirect(route('trainer.promotions'));

        $this->assertNull(Promotion::find($promotion->id));
    }
}
