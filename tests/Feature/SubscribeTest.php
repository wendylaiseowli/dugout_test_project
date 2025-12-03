<?php

namespace Tests\Feature;

use App\Models\Subscribe;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

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

    public function test_subsriber_list_displayed_correctly_at_admin_side(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $subscriber = Subscribe::factory()->create(['email'=> 'test1@mail.com']);
        $subscriber2 = Subscribe::factory()->create(['email'=> 'test2@mail.com']);
        $subscriber3 = Subscribe::factory()->create(['email'=> 'test3@mail.com']);

        $response = $this->get(route('subscribers.index'));

        $response->assertStatus(200);
        $response->assertViewIs('subscriber.subscribers');
        $response->assertViewHas('subscribers');
        $response->assertSeeText('test1@mail.com');
        $response->assertSeeText('test2@mail.com');
        $response->assertSeeText('test3@mail.com');
    }
}
