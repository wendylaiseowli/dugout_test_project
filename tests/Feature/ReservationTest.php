<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReservationTest extends TestCase
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

    public function test_render_to_reservation_page(){

        $response = $this->get(route('reservation'));
        $response->assertStatus(200);
        $response->assertViewIs('reservation');
    }

    public function test_input_all_correct(){
        $input=[
            'reservation_name'=> 'Sally',
            'reservation_date'=> now()->addDay(1)->format('d/m/Y'),
            'reservation_time'=> '11:00',
            'number_of_people'=> 5,
            'phone_number'=> '01234567890',
            'email'=> 'sally@gmail.com',
        ];

        $response = $this->post(route('reserve', $input));
        $response->assertStatus(200);
        // $response->assertViewIs('thankyou'); using javascript now (window.location.href) so the response is not a view

        $this->assertDatabaseCount('reservations', 1);
        $this->assertDatabaseHas('reservations', [
            'reservation_name'=> 'Sally',
            // 'reservation_date'=> now()->addDay(1)->format('Y-m-d 11:00:00'),
            'number_of_people'=> 5,
            'phone_number'=> '01234567890',
            'email'=> 'sally@gmail.com',
        ]);
    }

    public function test_input_blank(){
        $input=[
            'reservation_name'=> '',
            'reservation_date'=> '',
            'reservation_time'=> '',
            'number_of_people'=> '',
            'phone_number'=> '',
            'email'=> '',
        ];

        $response = $this->post(route('reserve', $input));
        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'reservation_date'=> 'The reservation date field is required.',
            'reservation_time'=> 'The reservation time field is required.', 
            'number_of_people' => 'The number of people field is required.',
            'phone_number' => 'The phone number field is required.', 
            'reservation_name'=> 'The reservation name field is required.', 
            'email' => 'The email field is required.', 
        ]);
        
        $this->assertDatabaseCount('reservations', 0);
    }

    public function test_input_past_date(){
        $input=[
            'reservation_name'=> 'Sally Lee',
            'reservation_date'=> now()->subDay(1)->format('d/m/Y'),
            'reservation_time'=> '11:00',
            'number_of_people'=> 5,
            'phone_number'=> '01234567870',
            'email'=> 'sallylee@gmail.com',
        ];

        $response = $this->post(route('reserve', $input));
        $response->assertStatus(302);
        $response->assertSessionHasErrors(['reservation_date' => 'The reservation date field must be a date after or equal to today.']); 

        $this->assertDatabaseCount('reservations', 0);

        $this->assertDatabaseMissing('reservations', [
            'reservation_name'=> 'Sally Lee',
            'phone_number'=> '01234567870',
            'email'=> 'sallylee@gmail.com',
        ]);
    }
    public function test_input_today_date(){
        $input=[
            'reservation_name'=> 'Sally Khoo',
            'reservation_date'=> now()->format('d/m/Y'),
            'reservation_time'=> '11:00',
            'number_of_people'=> 5,
            'phone_number'=> '01234567880',
            'email'=> 'sallykhoo@gmail.com',
        ];

        $response = $this->post(route('reserve', $input));
        $response->assertStatus(200);
        // $response->assertViewIs('thankyou'); using javascript now (window.location.href) so the response is not a view
        
        $this->assertDatabaseHas('reservations', [
            'reservation_name'=> 'Sally Khoo',
            'number_of_people'=> 5,
            'phone_number'=> '01234567880',
            'email'=> 'sallykhoo@gmail.com',
        ]);       
        $this->assertDatabaseCount('reservations', 1);
    }

    public function test_input_number_of_people_is_not_a_integer(){
        $input=[
            'reservation_name'=> "sally lai",
            'reservation_date'=> now(),
            'reservation_time'=> '11:00',
            'number_of_people'=> 'ssssss',
            'phone_number'=> '01234567890',
            'email'=> 'sallylai@gmail.com',
        ];

        $response = $this->post(route('reserve', $input));
        $response->assertStatus(302);
        $response->assertSessionHasErrors(['number_of_people' => 'The number of people field must be an integer.']);        
        
        $this->assertDatabaseCount('reservations', 0);
        $this->assertDatabaseMissing('reservations', [
            'reservation_name'=> 'sally lai',
            'phone_number'=> '01234567890',
            'email'=> 'sallylai@gmail.com',
        ]);
    }

    public function test_input_phone_number_is_invalid(){
        $input=[
            'reservation_name'=> "sally lai",
            'reservation_date'=> now(),
            'reservation_time'=> '11:00',
            'number_of_people'=> 23,
            'phone_number'=> '0123456789089752',
            'email'=> 'sallylai@gmail.com',
        ];

        $response = $this->post(route('reserve', $input));
        $response->assertStatus(302);
        $response->assertSessionHasErrors(['phone_number' => 'The phone number field format is invalid.']);        
        
        $this->assertDatabaseCount('reservations', 0);
        $this->assertDatabaseMissing('reservations', [
            'reservation_name'=> 'sally lai',
            'phone_number'=> '0123456789089752',
            'email'=> 'sallylai@gmail.com',
        ]);
    }

    public function test_input_invalid_reservation_name(){
        $input=[
            'reservation_name'=> 123,
            'reservation_date'=> now(),
            'reservation_time'=> '11:00',
            'number_of_people'=> 20,
            'phone_number'=> '01234567890',
            'email'=> 'sallylai@gmail.com',
        ];

        $response = $this->post(route('reserve', $input));
        $response->assertStatus(302);
        $response->assertSessionHasErrors(['reservation_name' => 'The reservation name field format is invalid.']);        
        
        $this->assertDatabaseCount('reservations', 0);
        $this->assertDatabaseMissing('reservations', [
            'reservation_name'=> 123,
            'phone_number'=> '01234567890',
            'email'=> 'sallylai@gmail.com',
        ]);
    }
    public function test_input_invalid_email(){
        $input=[
            'reservation_name'=> "sally bee",
            'reservation_date'=> now(),
            'reservation_time'=> '11:00',
            'number_of_people'=> 3,
            'phone_number'=> '01234567891',
            'email'=> 'sallybeegmail@com',
        ];

        $response = $this->post(route('reserve', $input));
        $response->assertStatus(302);
        $response->assertSessionHasErrors(['email' => 'The email field must be a valid email address.']);
        
        $this->assertDatabaseCount('reservations', 0);
        $this->assertDatabaseMissing('reservations', [
            'reservation_name'=> 'sally bee',
            'phone_number'=> '01234567891',
            'email'=> 'sallybeegmail@com',
        ]);
    }

    //Admin
    // public function
}
