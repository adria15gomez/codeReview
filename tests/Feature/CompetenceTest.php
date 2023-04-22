<?php

namespace Tests\Feature;

use App\Models\Competence;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompetenceTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('migrate');
    }

    public function testCanInsertCompetence(): void
    /**
     * Test that checks if a competence can be inserted
     */
    {
        $competence1 = new Competence([
            'name' => 'Lenguajes frikis',
            'description' => 'Dominio de Alto Valirio, Klingon, Pársel, Sindarin, etc.'
        ]);
        $competence1->save();

        $competence2 = new Competence([
            'name' => 'Series de programadores',
            'description' => 'Haber visto Halt and Catch Fire, Silicon Valley o Mr. Robot.'
        ]);
        $competence2->save();

        $response = $this->get('/competencias');
        $response->assertOk();
        $response->assertSee('Lenguajes frikis');
        $response->assertSee('Series de programadores');
    }

    public function testCanDisplayCompetence(): void
    /**
     * Test that checks if a competence can be displayed.
     */
    {
        $response = $this->get('/agregar-competencia');
        $response->assertStatus(200);
        $response->assertViewIs('superAdmin.addCompetence');
    }

    public function testCanEditCompetence(): void
    /**
     * Test that checks if a competence can be edited in the database.
     *
     */
    {
        $competence = new Competence([
            'name' => 'Escuchar música al programar',
            'description' => 'Concentrarse con música pero apagarla cuando un error se hace pesado.'
        ]);
        $competence->save();

        $newDescription = 'Poder solucionar un bug con Taylor Swift de fondo.';
        $competence->update(['description' => $newDescription]);

        $updatedDescription = Competence::find($competence->id);

        $response = $this->get(route('editCompetence.edit',  $competence->id));
        $response->assertStatus(200);
        $response->assertSee($newDescription);
        $this->assertEquals($newDescription, $updatedDescription->description);
    }

    public function testCanDeleteCompetence(): void
    /**
     * Test that checks if a competence can be deleted in the database.
     *
     */
    {
        $competence = Competence::create([
            'name' => 'Integración sin explosión',
            'description' => 'Poder integrar el trabajo de un equipo sin que haya graves daños.'
        ]);

        $response = $this->delete(route('deleteCompetence.distroy', $competence->id));

        $response->assertRedirect(route('competence', $competence->id));

        $this->assertNull(Competence::find($competence->id));
    }
}
