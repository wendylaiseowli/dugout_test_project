<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Reservation;
use Carbon\Carbon;

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
    public function test_reservation_management_page_render_correctly(){
        $user = User::factory()->create();
        $reservation = Reservation::factory()->create();
        $this->actingAs($user);
        
        $response = $this->get(route('reservations.index'));
        $response->assertViewIs('reservation.reservation');
        $response->assertViewHas('reservations');
    }

    public function test_reservation_management_page_add_reservation_successfully(){
        $user = User::factory()->create();
        $reservation = Reservation::factory()->create();
        $this->actingAs($user);
        
        $data =[
            'reservation_name'=> 'Wendy Lai',
            'reservation_date'=> now()->second(0)->format('d/m/Y'),
            'reservation_time'=> now()->second(0)->format('H:i'),
            'number_of_people'=> 11,
            'phone_number'=> '0177856320',
            'email'=> 'wendy@gmail.com',
        ];

        $response = $this->post(route('reservations.store', $data));
        $response->assertStatus(200);
        $this->assertDatabaseCount('reservations', 2);
        $this->assertDatabaseHas('reservations', 
        [
            'reservation_name'=> 'Wendy Lai',  
            'reservation_date'=>  Carbon::parse(now())->second(0)->format('Y-m-d H:i:s'),
            'reservation_time'=> Carbon::parse(now())->second(0)->format('Y-m-d H:i:s'),
            'number_of_people'=> 11,
            'phone_number'=> '0177856320',
            'email'=> 'wendy@gmail.com',
        ]);
    }

    public function test_reservation_management_page_add_reservation_successfully_with_ajax(){
        $user = User::factory()->create();
        $reservation = Reservation::factory()->create();
        $this->actingAs($user);
        
        $data =[
            'reservation_name'=> 'Wendy Lai',
            'reservation_date'=> now()->second(0)->format('d/m/Y'),
            'reservation_time'=> now()->second(0)->format('H:i'),
            'number_of_people'=> 11,
            'phone_number'=> '0177856320',
            'email'=> 'wendy@gmail.com',
        ];

         $response = $this->postJson(route('reservations.store'), $data);
        $response->assertStatus(200)->assertJson(['success'=>true]);

        $this->assertDatabaseCount('reservations', 2);
        $this->assertDatabaseHas('reservations', 
        [
            'reservation_name'=> 'Wendy Lai',  
            'reservation_date'=>  Carbon::parse(now())->second(0)->format('Y-m-d H:i:s'),
            'reservation_time'=> Carbon::parse(now())->second(0)->format('Y-m-d H:i:s'),
            'number_of_people'=> 11,
            'phone_number'=> '0177856320',
            'email'=> 'wendy@gmail.com',
        ]);
    }

    public function test_reservation_management_page_add_reservation_unsuccessfully_if_input_field_is_blank(){
        $user = User::factory()->create();
        $reservation = Reservation::factory()->create();
        $this->actingAs($user);
        
        $data =[
            'reservation_name'=> '',
            'reservation_date'=> '',
            'reservation_time'=> '',
            'number_of_people'=> '',
            'phone_number'=> '',
            'email'=> '',
        ];

        $response = $this->post(route('reservations.store', $data));
        $this->assertDatabaseCount('reservations', 1);
        $response->assertSessionHasErrors('reservation_name');
        $response->assertSessionHasErrors('reservation_date');
        $response->assertSessionHasErrors('reservation_time');
        $response->assertSessionHasErrors('number_of_people');
        $response->assertSessionHasErrors('phone_number');
        $response->assertSessionHasErrors('email');   
    }

    public function test_reservation_management_page_add_reservation_unsuccessfully_if_reservation_date_is_passed_date(){
        $user = User::factory()->create();
        $reservation = Reservation::factory()->create();
        $this->actingAs($user);
        
        $data =[
            'reservation_name'=> 'Wendy Lai',
            'reservation_date'=> now()->subDay(1)->second(0)->format('d/m/Y'),
            'reservation_time'=> now()->second(0)->format('H:i'),
            'number_of_people'=> 11,
            'phone_number'=> '0177856320',
            'email'=> 'wendy@gmail.com',
        ];

        $response = $this->post(route('reservations.store', $data));
        $this->assertDatabaseCount('reservations', 1);
        $this->assertDatabaseMissing('reservations', 
        [
            'reservation_name'=> 'Wendy Lai',
            'number_of_people'=> 11,
            'phone_number'=> '0177856320',
            'email'=> 'wendy@gmail.com',
        ]);
        $response->assertSessionHasErrors('reservation_date');
        $response->assertSessionDoesntHaveErrors('reservation_name');
        $response->assertSessionDoesntHaveErrors('reservation_time');
        $response->assertSessionDoesntHaveErrors('number_of_people');
        $response->assertSessionDoesntHaveErrors('phone_number');
    }

    public function test_reservation_management_page_add_reservation_unsuccessfully_if_number_of_people_is_not_integer(){
        $user = User::factory()->create();
        $reservation = Reservation::factory()->create();
        $this->actingAs($user);
        
        $data =[
            'reservation_name'=> 'Wendy Lai',
            'reservation_date'=> now()->second(0)->format('d/m/Y'),
            'reservation_time'=> now()->second(0)->format('H:i'),
            'number_of_people'=> 'cvbnm',
            'phone_number'=> '0177856320',
            'email'=> 'wendy@gmail.com',
        ];

        $response = $this->post(route('reservations.store', $data));
        $this->assertDatabaseCount('reservations', 1);
        $this->assertDatabaseMissing('reservations', 
        [
            'reservation_name'=> 'Wendy Lai',
            'number_of_people'=> 11,
            'phone_number'=> '0177856320',
            'email'=> 'wendy@gmail.com',
        ]);

        $response->assertSessionHasErrors('number_of_people');
        $response->assertSessionDoesntHaveErrors('reservation_name');
        $response->assertSessionDoesntHaveErrors('reservation_time');
        $response->assertSessionDoesntHaveErrors('reservation_date');
        $response->assertSessionDoesntHaveErrors('phone_number');      
    }

    public function test_reservation_management_page_update_reservation_successfully(){
        $user = User::factory()->create();
        $reservation = Reservation::factory()->create([
            'reservation_name'=> 'Wendy Lai',
            'reservation_date'=> Carbon::parse(now())->second(0)->format('Y-m-d H:i:s'),
            'reservation_time'=> Carbon::parse(now())->second(0)->format('Y-m-d H:i:s'),
            'number_of_people'=> 11,
            'phone_number'=> '0177856320',
            'email'=> 'wendy@gmail.com',
        ]);
        $this->actingAs($user);
        
        $data =[
            'reservation_name'=> 'Wendy',
            'reservation_date'=> now()->addDay(1)->second(0)->format('d/m/Y'),
            'reservation_time'=> now()->addDay(1)->second(0)->format('H:i'),
            'number_of_people'=> 13,
            'phone_number'=> '0125654872',
            'email'=> 'wendylai@gmail.com',
        ];

        $response = $this->put(route('reservations.update', $reservation->id), $data);
        $response->assertStatus(302);
        $this->assertDatabaseCount('reservations', 1);
        $this->assertDatabaseMissing('reservations', 
        [
            'reservation_name'=> 'Wendy Lai',  
            'reservation_date'=>  Carbon::parse(now())->second(0)->format('Y-m-d H:i:s'),
            'reservation_time'=> Carbon::parse(now())->second(0)->format('Y-m-d H:i:s'),
            'number_of_people'=> 11,
            'phone_number'=> '0177856320',
            'email'=> 'wendy@gmail.com',
        ]);
        $this->assertDatabaseHas('reservations', 
        [
            'reservation_name'=> 'Wendy',
            'reservation_date'=> Carbon::parse(now())->addDay(1)->second(0)->format('Y-m-d H:i:s'),
            'reservation_time'=> Carbon::parse(now())->addDay(1)->second(0)->format('Y-m-d H:i:s'),
            'number_of_people'=> 13,
            'phone_number'=> '0125654872',
            'email'=> 'wendylai@gmail.com',
        ]);
    }

    public function test_reservation_management_page_update_reservation_unsuccessfully_if_input_field_is_blank(){
        $user = User::factory()->create();
        $reservation = Reservation::factory()->create([
            'reservation_name'=> 'Wendy Lai',
            'reservation_date'=> Carbon::parse(now())->second(0)->format('Y-m-d H:i:s'),
            'reservation_time'=> Carbon::parse(now())->second(0)->format('Y-m-d H:i:s'),
            'number_of_people'=> 11,
            'phone_number'=> '0177856320',
            'email'=> 'wendy@gmail.com',
            'status'=> false,
        ]);
        $this->actingAs($user);
        
        $data =[
            'reservation_name'=> '',
            'reservation_date'=> '',
            'reservation_time'=> '',
            'number_of_people'=> '',
            'phone_number'=> '',
            'email'=> '',
        ];

        $response = $this->put(route('reservations.update', $reservation->id), $data);
        $this->assertDatabaseCount('reservations', 1);
        $this->assertDatabaseHas('reservations',[
            'reservation_name'=> 'Wendy Lai',
            'reservation_date'=> Carbon::parse(now())->second(0)->format('Y-m-d H:i:s'),
            'reservation_time'=> Carbon::parse(now())->second(0)->format('Y-m-d H:i:s'),
            'number_of_people'=> 11,
            'phone_number'=> '0177856320',
            'email'=> 'wendy@gmail.com',
            'status'=> false,
        ]);
        $response->assertSessionHasErrors('reservation_name');
        $response->assertSessionHasErrors('reservation_date');
        $response->assertSessionHasErrors('reservation_time');
        $response->assertSessionHasErrors('number_of_people');
        $response->assertSessionHasErrors('phone_number');
        $response->assertSessionHasErrors('email');          
    }

    public function test_reservation_management_page_update_reservation_unsuccessfully_if_reservation_date_is_passed_date(){
        $user = User::factory()->create();
        $reservation = Reservation::factory()->create();
        $this->actingAs($user);
        
        $data =[
            'reservation_name'=> 'Wendy Lai',
            'reservation_date'=> now()->subDay(1)->second(0)->format('d/m/Y'),
            'reservation_time'=> now()->second(0)->format('H:i'),
            'number_of_people'=> 11,
            'phone_number'=> '0177856320',
            'email'=> 'wendy@gmail.com',
        ];

        $response = $this->put(route('reservations.update', $reservation->id), $data);
        $this->assertDatabaseCount('reservations', 1);
        $this->assertDatabaseMissing('reservations', 
        [
            'reservation_name'=> 'Wendy Lai',
            'number_of_people'=> 11,
            'phone_number'=> '0177856320',
            'email'=> 'wendy@gmail.com',
        ]);
        $response->assertSessionHasErrors('reservation_date');
        $response->assertSessionDoesntHaveErrors('reservation_name');
        $response->assertSessionDoesntHaveErrors('reservation_time');
        $response->assertSessionDoesntHaveErrors('number_of_people');
        $response->assertSessionDoesntHaveErrors('phone_number');        
    }

    public function test_reservation_management_page_update_reservation_unsuccessfully_if_number_of_people_is_not_integer(){
        $user = User::factory()->create();
        $reservation = Reservation::factory()->create();
        $this->actingAs($user);
        
        $data =[
            'reservation_name'=> 'Wendy Lai',
            'reservation_date'=> now()->second(0)->format('d/m/Y'),
            'reservation_time'=> now()->second(0)->format('H:i'),
            'number_of_people'=> 'cvbnm',
            'phone_number'=> '0177856320',
            'email'=> 'wendy@gmail.com',
        ];

        $response = $this->put(route('reservations.update', $reservation->id), $data);
        $this->assertDatabaseCount('reservations', 1);
        $this->assertDatabaseMissing('reservations', 
        [
            'reservation_name'=> 'Wendy Lai',
            'number_of_people'=> 'cvbnm',
            'phone_number'=> '0177856320',
            'email'=> 'wendy@gmail.com',
        ]);

        $response->assertSessionHasErrors('number_of_people');
        $response->assertSessionDoesntHaveErrors('reservation_name');
        $response->assertSessionDoesntHaveErrors('reservation_time');
        $response->assertSessionDoesntHaveErrors('reservation_date');
        $response->assertSessionDoesntHaveErrors('phone_number');      
    }

    public function test_reservation_management_page_delete_reservation_successfully(){
        $user = User::factory()->create();
        $reservation = Reservation::factory()->create();
        $this->actingAs($user);
        
        $response = $this->delete(route('reservations.destroy', $reservation->id));
        $this->assertDatabaseCount('reservations', 0);     
        $response->assertStatus(302);
    }

    public function test_reservation_management_page_activate_reservation_successfully(){
        $user = User::factory()->create();
        $reservation = Reservation::factory()->create([
            'reservation_name'=> 'Wendy Lai',
            'reservation_date'=> Carbon::parse(now())->second(0)->format('Y-m-d H:i:s'),
            'reservation_time'=> Carbon::parse(now())->second(0)->format('Y-m-d H:i:s'),
            'number_of_people'=> 11,
            'phone_number'=> '0177856320',
            'email'=> 'wendy@gmail.com',
            'status'=> false,
        ]);
        $this->actingAs($user);
        
        $response = $this->put(route('active-reservation', $reservation->id));
        $this->assertDatabaseCount('reservations', 1);     
        $response->assertStatus(302);
        $this->assertDatabaseHas('reservations',[
            'reservation_name'=> 'Wendy Lai',
            'reservation_date'=> Carbon::parse(now())->second(0)->format('Y-m-d H:i:s'),
            'reservation_time'=> Carbon::parse(now())->second(0)->format('Y-m-d H:i:s'),
            'number_of_people'=> 11,
            'phone_number'=> '0177856320',
            'email'=> 'wendy@gmail.com',
            'status' => 1,
        ]);  
    }

    public function test_reservation_management_page_deactivate_reservation_successfully(){
        $user = User::factory()->create();
        $reservation = Reservation::factory()->create([
            'reservation_name'=> 'Wendy Lai',
            'reservation_date'=> Carbon::parse(now())->second(0)->format('Y-m-d H:i:s'),
            'reservation_time'=> Carbon::parse(now())->second(0)->format('Y-m-d H:i:s'),
            'number_of_people'=> 11,
            'phone_number'=> '0177856320',
            'email'=> 'wendy@gmail.com',
            //default is active status
        ]);
        $this->actingAs($user);
        
        $response = $this->put(route('deactive-reservation', $reservation->id));
        $this->assertDatabaseCount('reservations', 1);     
        $response->assertStatus(302);      
        $this->assertDatabaseHas('reservations',[
            'reservation_name'=> 'Wendy Lai',
            'reservation_date'=> Carbon::parse(now())->second(0)->format('Y-m-d H:i:s'),
            'reservation_time'=> Carbon::parse(now())->second(0)->format('Y-m-d H:i:s'),
            'number_of_people'=> 11,
            'phone_number'=> '0177856320',
            'email'=> 'wendy@gmail.com',
            'status' => 0,
        ]);  
    }

    public function test_reservation_management_failedValidation_function(){
        $user = User::factory()->create();
        $reservation = Reservation::factory()->create();
        $this->actingAs($user);
        
        $data =[
            'reservation_name'=> 'Wendy Lai',
            'reservation_date'=> now()->second(0)->format('d/m/Y'),
            'reservation_time'=> now()->second(0)->format('H:i'),
            'number_of_people'=> 11,
            'phone_number'=> '0177856320',
            'email'=> 'wendy@gmail.com',
        ];

        $response = $this->postJson(route('reservations.store'), $data);
        $response->assertStatus(200)->assertJson(['success'=>true]);

        $this->assertDatabaseCount('reservations', 2);
        $this->assertDatabaseHas('reservations', 
        [
            'reservation_name'=> 'Wendy Lai',  
            'reservation_date'=>  Carbon::parse(now())->second(0)->format('Y-m-d H:i:s'),
            'reservation_time'=> Carbon::parse(now())->second(0)->format('Y-m-d H:i:s'),
            'number_of_people'=> 11,
            'phone_number'=> '0177856320',
            'email'=> 'wendy@gmail.com',
        ]);
    }

    public function test_reservation_managment_validation_returns_json_errors()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $data = [];

        // Use postJson() to trigger expectsJson()
        $response = $this->postJson(route('reservations.store'), $data);

        // Assert it returns the JSON error response
        $response->assertStatus(422)
                ->assertJsonStructure([
                    'errors'
                ]);
    }
}
