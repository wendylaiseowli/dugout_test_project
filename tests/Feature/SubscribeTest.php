<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SubscribeTest extends TestCase
{
    use RefreshDatabase;
    protected function setUp(): void
    {
        parent::setUp();

        // Refresh the default database
        $this->artisan('migrate:fresh');

        // Refresh the second database
        $this->artisan('migrate:fresh', ['--database' => 'mysql2']);
    }
    public function test_valid_email(): void
    {
        $email =[
            'email' => 'test@gmail.com'
        ];

        $response = $this->post(route('subscribe'), $email);

        $response->assertStatus(200);
        $response->assertViewIs('thankyou');
        
        $this->assertDatabaseCount('subscribe', 1);
        $this->assertDatabaseHas('subscribe', [
            'email' => 'test@gmail.com'
        ]);
    }
    public function test_blank_email(): void
    {
        $email =[
            'email' => ''
        ];
        $response = $this->post(route('subscribe'), $email);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['email'=> 'The email field is required.']);

        $this->assertDatabaseCount('subscribe', 0);
        $this->assertDatabaseMissing('subscribe', [
            'email' => ''
        ]);
    }

    public function test_invalid_email(): void
    {
        $email =[
            'email' => 'testgmail.com'
        ];

        $response = $this->post(route('subscribe'), $email);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['email'=> 'The email field must be a valid email address.']);

        $this->assertDatabaseCount('subscribe', 0);
        $this->assertDatabaseMissing('subscribe', [
            'email' => 'testgmail.com'
        ]);
    }
}
