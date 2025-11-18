<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventEnquiryTest extends TestCase
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
    public function test_input_correct(){

        $input =[
            'name'=> 'Karen',
            'email'=> 'karen@gmail.com',
            'phone'=> '+0812345678',
            'message'=> 'I want to join your event',
        ];

        $response = $this->post('event', $input);
        $response->assertStatus(200);
        $response->assertViewIs('thankyou');

        $this->assertDatabaseCount('events_enquiries', 1);
        $this->assertDatabaseHas('events_enquiries', [
            'name'=> 'Karen',
            'email'=> 'karen@gmail.com',
            'phone'=> '0812345678',
            'message'=> 'I want to join your event',            
        ]);
    }

    public function test_input_blank(){
        $input =[
            'name'=> '',
            'email'=> '',
            'phone'=> '',
            'message'=> '',
        ];

        $response = $this->post('event', $input);
        $response->assertStatus(302);

        $response->assertSessionHasErrors([
            'name'=> 'The name field is required.', 
            'email'=> 'The email field is required.', 
            'phone'=> 'The phone field is required.', 
            'message'=> 'The message field is required.',
        ]);

        $this->assertDatabaseCount('events_enquiries', 0);
        $this->assertDatabaseMissing('events_enquiries', [
            'name'=> '',
            'email'=> '',
            'phone'=> '',
            'message'=> '',          
        ]);
    }

    public function test_input_name_is_not_string(){
        $input =[
            'name'=> 123,
            'email'=> 'karen@gmail.com',
            'phone'=> '+0812345678',
            'message'=> 'I want to join your event',
        ];

        $response = $this->post('event', $input);
        $response->assertStatus(302);

        $response->assertSessionHasErrors([
            'name'=> 'The name field must be a string.', 
        ]);
        
        $this->assertDatabaseCount('events_enquiries', 0);
        $this->assertDatabaseMissing('events_enquiries', [
            'name'=> 123,
            'email'=> 'karen@gmail.com',
            'phone'=> '0812345678',
            'message'=> 'I want to join your event',     
        ]);
    }
    public function test_input_email_invalid(){
        $input =[
            'name'=> 'Karen ali',
            'email'=> 'karengmailcom',
            'phone'=> '+0812345678',
            'message'=> 'I want to join your event',
        ];

        $response = $this->post('event', $input);
        $response->assertStatus(302);

        $response->assertSessionHasErrors([
            'email'=> 'The email field must be a valid email address.', 
        ]);

        $this->assertDatabaseCount('events_enquiries', 0);
        $this->assertDatabaseMissing('events_enquiries', [
            'name'=> 'Karen ali',
            'email'=> 'karen@gmailcom',
            'phone'=> '0812345678',
            'message'=> 'I want to join your event',   
        ]);        
    }
    public function test_input_phone_invalid(){
        $input =[
            'name'=> 'Karen ali',
            'email'=> 'karen@gmail.com',
            'phone'=> 'haisssi',
            'message'=> 'I want to join your event',
        ];

        $response = $this->post('event', $input);
        $response->assertStatus(302); 
        $response->assertSessionHasErrors([
            'phone'=> 'The phone field format is invalid.', 
        ]);

        $this->assertDatabaseCount('events_enquiries', 0);

        $this->assertDatabaseMissing('events_enquiries', [
            'name'=> 'Karen ali',
            'email'=> 'karen@gmail.com',
            'phone'=> '+haisssi',
            'message'=> 'I want to join your event',
        ]); 
    }

    public function test_input_message_exceed_number_of_character(){
        $message= str_repeat('2', 501);

        $input =[
            'name'=> 'Karen ali',
            'email'=> 'karen@gmail.com',
            'phone'=> '+0812345678',
            'message'=> $message,
        ];

        $response = $this->post('event', $input);
        $response->assertStatus(302);

        $response->assertSessionHasErrors([
            'message'=> 'The message field must not be greater than 500 characters.', 
        ]);

        $this->assertDatabaseCount('events_enquiries', 0);

        $this->assertDatabaseMissing('events_enquiries', [
             'name'=> 'Karen ali',
            'email'=> 'karen@gmail.com',
            'phone'=> '0812345678',
            'message'=> $message,
        ]);         
    }
}
