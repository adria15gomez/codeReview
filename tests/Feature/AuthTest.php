<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;
    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('migrate');
    }

    /**
     * Test that checks if the login formulary could be displayed.
     */
    public function testLoginFormDisplayed()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertViewIs('auth.login');
    }

    /**
     * Test that checks if an user registration succeded.
     */
    public function testSuccessfulRegistration()
    {
        $response = $this->post('/register', [
            'name' => 'Sheldon Cooper',
            'email' => 'drcooper@caltech.com',
            'password' => 'ImS0Smart',
            'password_confirmation' => 'ImS0Smart',
        ]);

        $this->assertDatabaseHas('users', [
            'name' => 'Sheldon Cooper',
            'email' => 'drcooper@caltech.com',
        ]);

        $this->assertAuthenticated();
    }

    /**
     * Test that checks if a wrong password registration is noticed.
     */
    public function testFailedLogin()
    {
        $response = $this->post('/register', [
            'name' => 'Sheldon Cooper',
            'email' => 'drcooper@caltech.com',
            'password' => 'ImS0Smart',
        ]);

        $response = $this->post('/login', [
            'username' => 'Sheldon Cooper',
            'email' => 'drcooper@caltech.com',
            'password' => 'ImS0Annoying',
        ]);

        $response->assertStatus(302);
        $this->assertFalse(auth()->check());
    }
}
