<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class EventTest extends TestCase
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

    //Admin
    public function test_event_management_page_render_correctly(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $event = Event::factory()->create(
            [
                'event_name'=> 'Sleep Night', 
                'description'=> 'Sleep all the day',
                'userID'=>Auth::id(),
            ]
        );

        $response = $this->get(route('events.index'));
        $response->assertStatus(200);
        $response->assertViewIs('event.event');
        $response->assertViewHas('events');
        $response->assertSeeText('Sleep Night');
        $response->assertSeeText('Sleep all the day');
        $response->assertSeeText(Carbon::parse(now()->addDay(1))->second(0)->format('d/m/Y'));
        $response->assertSeeText(Carbon::parse(now()->addDay(1))->second(0)->format('H:i A'));
    }

    public function test_event_management_page_render_add_event_page_correctly(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('events.create'));
        $response->assertStatus(200);
    }

    public function test_event_management_add_event_successfully()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $file = UploadedFile::fake()->image('test1.jpg', 520,360)->size(1024);

        $data = [
            'event_name' => 'Sleep Night',
            'description' => 'Sleep all the day',
            'photo_path' => $file,
            'userID' => $user->id,
            'event_date'=> Carbon::parse(now()->addDay(1))->format('d/m/Y'),
            'event_time'=> Carbon::parse(now()->addDay(1))->format('H:i'),
            'event_location'=> 'fghjkl',             
        ];

        $response = $this->post(route('events.store'), $data);
        $response->assertStatus(302);

        // Expected final filename
        $expectedFilename = time() . '_test1.jpg';

        // Expected full path
        $expectedFullPath = public_path('img/admin/gallery/' . $expectedFilename);

        // Check file exists in public folder
        $this->assertFileExists($expectedFullPath);

        // Check database
        $this->assertDatabaseHas('events', [
            'event_name'  => 'Sleep Night',
            'description' => 'Sleep all the day',
            'photo_path'  => 'img/admin/gallery/' . $expectedFilename,
        ]);

        
        if (file_exists($expectedFullPath)) {
            unlink($expectedFullPath);
        }
    }


    public function test_event_management_add_event_unsuccesfully_if_input_field_is_blank(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $data= [
            'event_name'=> '', 
            'description'=> '',
            'photo_path'=> '',
            'event_time'=> '',
            'event_date'=> '',
            'userID'=>Auth::id(),          
        ];

        $response = $this->post(route('events.store'), $data);
        $response->assertStatus(302);
        $response->assertSessionHasErrors('event_name');
        $response->assertSessionHasErrors('description');
        $response->assertSessionHasErrors('photo_path');
        $response->assertSessionHasErrors('event_time');
        $response->assertSessionHasErrors('event_date');
        
        $this->assertDatabaseCount('events', 0);
        // Expected final filename
        $expectedFilename = time() . '_test.jpg';

        // Expected full path
        $expectedFullPath = public_path('img/admin/gallery/' . $expectedFilename);

        // Check file exists in public folder
        $this->assertFileDoesNotExist($expectedFullPath);

        $this->assertDatabaseCount('events', 0);
        $this->assertDatabaseMissing('events', [
            'event_name'=> 'Sleep Night', 
            'description'=> 'Sleep all the day',
            'photo_path'=> 'img/admin/gallery/' . $expectedFilename,
        ]);
    }

    public function test_event_management_add_event_unsuccesfully_if_image_is_larger_than_1MB(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $file = UploadedFile::fake()->image('test1.jpg', 520,360)->size(1025);

        $data= [
            'event_name'=> 'Sleep Night', 
            'description'=> 'Sleep all the day',
            'photo_path'=> $file,
            'userID'=>Auth::id(),
            'event_date'=> Carbon::parse(now()->addDay(1))->format('d/m/Y'),
            'event_time'=> Carbon::parse(now()->addDay(1))->format('H:i'),
        ];

        $response = $this->post(route('events.store'), $data);
        $response->assertStatus(302);
        $response->assertSessionDoesntHaveErrors('event_name');
        $response->assertSessionDoesntHaveErrors('description');
        $response->assertSessionHasErrors('photo_path');
        $response->assertSessionDoesntHaveErrors('event_time');
        $response->assertSessionDoesntHaveErrors('event_date');

        // Expected final filename
        $expectedFilename = time() . '_test1.jpg';

        // Expected full path
        $expectedFullPath = public_path('img/admin/gallery/' . $expectedFilename);

        // Check file exists in public folder
        $this->assertFileDoesNotExist($expectedFullPath);

        $this->assertDatabaseCount('events', 0);
        $this->assertDatabaseMissing('events', [
            'event_name'=> 'Sleep Night', 
            'description'=> 'Sleep all the day',
            'photo_path'=> 'img/admin/gallery/' . $expectedFilename,
        ]);

        // Delete the file after test
        if (file_exists($expectedFullPath)) {
            unlink($expectedFullPath);
        }
    }

    public function test_event_management_add_event_unsuccesfully_if_image_is_less_wider_than_520px(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $file = UploadedFile::fake()->image('test.jpg', 519,360);

        $data= [
            'event_name'=> 'Sleep Night', 
            'description'=> 'Sleep all the day',
            'photo_path'=> $file,
            'userID'=>Auth::id(),
            'event_date'=> Carbon::parse(now()->addDay(1))->format('d/m/Y'),
            'event_time'=> Carbon::parse(now()->addDay(1))->format('H:i'),                 
        ];

        $response = $this->post(route('events.store'), $data);
        $response->assertStatus(302);
        $response->assertSessionDoesntHaveErrors('event_name');
        $response->assertSessionDoesntHaveErrors('description');
        $response->assertSessionHasErrors('photo_path');
        $response->assertSessionDoesntHaveErrors('event_time');
        $response->assertSessionDoesntHaveErrors('event_date');

        // Expected final filename
        $expectedFilename = time() . '_test.jpg';

        // Expected full path
        $expectedFullPath = public_path('img/admin/gallery/' . $expectedFilename);

        // Check file exists in public folder
        $this->assertFileDoesNotExist($expectedFullPath);

        $this->assertDatabaseCount('events', 0);
        $this->assertDatabaseMissing('events', [
            'event_name'=> 'Sleep Night', 
            'description'=> 'Sleep all the day',
            'photo_path'=> 'img/admin/gallery/' . $expectedFilename,
        ]);

        // Delete the file after test
        if (file_exists($expectedFullPath)) {
            unlink($expectedFullPath);
        }        
    }

    public function test_event_management_add_event_unsuccesfully_if_image_is_high_lesser_than_360px(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $file = UploadedFile::fake()->image('test.jpg', 520,359);

        $data= [
            'event_name'=> 'Sleep Night', 
            'description'=> 'Sleep all the day',
            'photo_path'=> $file,
            'userID'=>Auth::id(),
            'event_date'=> Carbon::parse(now()->addDay(1))->format('d/m/Y'),
            'event_time'=> Carbon::parse(now()->addDay(1))->format('H:i'),                   
        ];

        $response = $this->post(route('events.store'), $data);
        $response->assertStatus(302);
        $response->assertSessionDoesntHaveErrors('event_name');
        $response->assertSessionDoesntHaveErrors('description');
        $response->assertSessionHasErrors('photo_path');
        $response->assertSessionDoesntHaveErrors('event_time');
        $response->assertSessionDoesntHaveErrors('event_date');

        // Expected final filename
        $expectedFilename = time() . '_test.jpg';

        // Expected full path
        $expectedFullPath = public_path('img/admin/gallery/' . $expectedFilename);

        // Check file exists in public folder
        $this->assertFileDoesNotExist($expectedFullPath);

        $this->assertDatabaseCount('events', 0);
        $this->assertDatabaseMissing('events', [
            'event_name'=> 'Sleep Night', 
            'description'=> 'Sleep all the day',
            'photo_path'=> 'img/admin/gallery/' . $expectedFilename,
        ]);

        // Delete the file after test
        if (file_exists($expectedFullPath)) {
            unlink($expectedFullPath);
        }      
    }

    public function test_event_management_page_render_edit_event_page_correctly(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $event = Event::factory()->create();

        $response = $this->get(route('events.edit', $event));
        $response->assertStatus(200);
    }

    public function test_event_management_update_event_successfully(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $file = UploadedFile::fake()->image('test1.jpg', 520,360)->size(1024);
        $file2 = UploadedFile::fake()->image('test2.jpg', 520,360)->size(1024);

        $event = Event::factory()->create([
            'event_name' => 'Sleep Night',
            'description' => 'Sleep all the day',
            'photo_path' => $file,
            'userID' => $user->id,
            'event_date'=> Carbon::parse(now()->addDay(1)->second(0))->format('d/m/Y'),
            'event_time'=> Carbon::parse(now()->addDay(1)->second(0))->format('H:i'),
            'event_location'=> 'fghjkl',             
        ]);

        $data = [
            'event_name' => 'Wake up day',
            'description' => 'Cant sleep all the day',
            'photo_path' => $file2,
            'userID' => $user->id,
            'event_date'=> Carbon::parse(now()->addDay(2)->second(0))->format('d/m/Y'),
            'event_time'=> Carbon::parse(now()->addDay(2)->second(0))->format('H:i'),
            'event_location'=> 'fghjkl',             
        ];
        
        $response = $this->put(route('events.update', $event), $data);
        $response->assertStatus(302);
        
        // Expected final filename
        $expectedFilename = time() . '_test2.jpg';

        // Expected full path
        $expectedFullPath = public_path('img/admin/gallery/' . $expectedFilename);
        
        // Check file exists in public folder
        $this->assertFileExists($expectedFullPath);

        // Check database
        $this->assertDatabaseHas('events', [
            'event_name' => 'Wake up day',
            'description' => 'Cant sleep all the day',
            'event_date'=> Carbon::parse(now()->addDay(2)->second(0))->format('Y-m-d H:i:s'),
            'event_time'=> Carbon::parse(now()->addDay(2)->second(0))->format('Y-m-d H:i:s'),
            'photo_path'  => 'img/admin/gallery/' . $expectedFilename,
        ]);

        if (file_exists($expectedFullPath)) {
            unlink($expectedFullPath);
        }
    }

    public function test_event_management_update_event_successfully_if_image_is_not_uploaded_it_will_use_the_old_image(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $file = UploadedFile::fake()->image('test2.jpg', 520,360)->size(1024);

        $expectedFilename = time() . '_test2.jpg';

        // Expected full path
        $expectedFullPath = public_path('img/admin/gallery/' . $expectedFilename);
        
        // Move fake file to folder manually
        copy($file->getPathname(), $expectedFullPath);

        $event = Event::factory()->create([
            'event_name' => 'Sleep Night',
            'description' => 'Sleep all the day',
            'photo_path' => 'img/admin/gallery/' . $expectedFilename,
            'userID' => $user->id,
            'event_date'=> Carbon::parse(now()->addDay(1)->second(0))->format('d/m/Y'),
            'event_time'=> Carbon::parse(now()->addDay(1)->second(0))->format('H:i'),
            'event_location'=> 'fghjkl',             
        ]);

        $data = [
            'event_name' => 'Wake up day',
            'description' => 'Cant sleep all the day',
            'photo_path' => '',
            'userID' => $user->id,
            'event_date'=> Carbon::parse(now()->addDay(2)->second(0))->format('d/m/Y'),
            'event_time'=> Carbon::parse(now()->addDay(2)->second(0))->format('H:i'),
            'event_location'=> 'fghjkl',             
        ];
        
        $response = $this->put(route('events.update', $event), $data);
        $response->assertStatus(302);
        
        // Check file exists in public folder
        $this->assertFileExists($expectedFullPath);

        // Check database
        $this->assertDatabaseHas('events', [
            'event_name' => 'Wake up day',
            'description' => 'Cant sleep all the day',
            'event_date'=> Carbon::parse(now()->addDay(2)->second(0))->format('Y-m-d H:i:s'),
            'event_time'=> Carbon::parse(now()->addDay(2)->second(0))->format('Y-m-d H:i:s'),
            'photo_path'  => 'img/admin/gallery/' . $expectedFilename,
        ]);

        if (file_exists($expectedFullPath)) {
            unlink($expectedFullPath);
        }
    }

    public function test_event_management_update_event_successfully_if_image_is_replaced_by_the_new_image(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $file = UploadedFile::fake()->image('test2.jpg', 520,360)->size(1024);
        $file2 = UploadedFile::fake()->image('test1.jpg', 520,360)->size(1024);

        $expectedFilename = time() . '_test2.jpg';

        // Expected full path
        $expectedFullPath = public_path('img/admin/gallery/' . $expectedFilename);
        
        // Move fake file to folder manually
        copy($file->getPathname(), $expectedFullPath);

        $event = Event::factory()->create([
            'event_name' => 'Sleep Night',
            'description' => 'Sleep all the day',
            'photo_path' => 'img/admin/gallery/' . $expectedFilename,
            'userID' => $user->id,
            'event_date'=> Carbon::parse(now()->addDay(1)->second(0))->format('d/m/Y'),
            'event_time'=> Carbon::parse(now()->addDay(1)->second(0))->format('H:i'),
            'event_location'=> 'fghjkl',             
        ]);

        $data = [
            'event_name' => 'Wake up day',
            'description' => 'Cant sleep all the day',
            'photo_path' => $file2,
            'userID' => $user->id,
            'event_date'=> Carbon::parse(now()->addDay(2)->second(0))->format('d/m/Y'),
            'event_time'=> Carbon::parse(now()->addDay(2)->second(0))->format('H:i'),
            'event_location'=> 'fghjkl',             
        ];
        
        $response = $this->put(route('events.update', $event), $data);
        $response->assertStatus(302);
        
        $expectedFilename1 = time() . '_test1.jpg';

        // Expected full path
        $expectedFullPath1 = public_path('img/admin/gallery/' . $expectedFilename1);

        // Check file exists in public folder
        $this->assertFileDoesNotExist($expectedFullPath);
        $this->assertFileExists($expectedFullPath1);

        // Check database
        $this->assertDatabaseHas('events', [
            'event_name' => 'Wake up day',
            'description' => 'Cant sleep all the day',
            'event_date'=> Carbon::parse(now()->addDay(2)->second(0))->format('Y-m-d H:i:s'),
            'event_time'=> Carbon::parse(now()->addDay(2)->second(0))->format('Y-m-d H:i:s'),
            'photo_path'  => 'img/admin/gallery/' . $expectedFilename1,
        ]);

        if (file_exists($expectedFullPath1)) {
            unlink($expectedFullPath1);
        }
    }

    public function test_event_management_update_event_unsuccesfully_if_input_field_is_blank(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $expectedFilename1 = time() . '_test1.jpg';
        
        $event = Event::factory()->create([
            'event_name' => 'Sleep Night',
            'description' => 'Sleep all the day',
            'photo_path' => 'img/admin/gallery/'.$expectedFilename1,
            'userID' => $user->id,
            'event_date'=> Carbon::parse(now()->addDay(1)->second(0))->format('d/m/Y'),
            'event_time'=> Carbon::parse(now()->addDay(1)->second(0))->format('H:i'),
            'event_location'=> 'fghjkl',             
        ]);

        $data = [
            'event_name' => '',
            'description' => '',
            'photo_path' => '',
            'userID' => $user->id,
            'event_date'=> '',
            'event_time'=> '',
            'event_location'=> 'fghjkl',             
        ];
        
        $response = $this->put(route('events.update', $event), $data);
        $response->assertStatus(302);
        $response->assertSessionHasErrors('event_name');
        $response->assertSessionHasErrors('description');
        $response->assertSessionHasErrors('event_date');
        $response->assertSessionHasErrors('event_time');
        $response->assertSessionDoesntHaveErrors('photo_path');

        // Expected final filename
        $expectedFilename2 = time() . '_test2.jpg';

        // Expected full path
        $expectedFullPath = public_path('img/admin/gallery/' . $expectedFilename2);

        // Check file exists in public folder
        $this->assertFileDoesNotExist($expectedFullPath);

        // Check database
        $this->assertDatabaseCount('events', 1);
        $this->assertDatabaseHas('events', [
            'event_name' => $event->event_name,
            'description' => $event->description,
            'userID' => $user->id,
            'event_time'=> Carbon::parse($event->event_time)->format('Y-m-d H:i:s'),
            'photo_path' => 'img/admin/gallery/' . $expectedFilename1,        
        ]);
    }

    public function test_event_management_update_event_unsuccesfully_if_image_is_larger_than_1MB(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $file2 = UploadedFile::fake()->image('test2.jpg', 520,360)->size(1025);

        $expectedFilename1 = time() . '_test1.jpg';
        
        $event = Event::factory()->create([
            'event_name' => 'Sleep Night',
            'description' => 'Sleep all the day',
            'photo_path' => 'img/admin/gallery/'.$expectedFilename1,
            'userID' => $user->id,
            'event_date'=> Carbon::parse(now()->addDay(1)->second(0))->format('d/m/Y'),
            'event_time'=> Carbon::parse(now()->addDay(1)->second(0))->format('H:i'),
            'event_location'=> 'fghjkl',             
        ]);

        $data = [
            'event_name' => 'Wake up day',
            'description' => 'Cant sleep all the day',
            'photo_path' => $file2,
            'userID' => $user->id,
            'event_date'=> Carbon::parse(now()->addDay(2)->second(0))->format('d/m/Y'),
            'event_time'=> Carbon::parse(now()->addDay(2)->second(0))->format('H:i'),
            'event_location'=> 'fghjkl',             
        ];
        
        $response = $this->put(route('events.update', $event), $data);
        $response->assertStatus(302);
        $response->assertSessionHasErrors('photo_path');
        $response->assertSessionDoesntHaveErrors('event_name');
        $response->assertSessionDoesntHaveErrors('description');
        $response->assertSessionDoesntHaveErrors('event_date');
        $response->assertSessionDoesntHaveErrors('event_time');
        $response->assertSessionDoesntHaveErrors('event_location');

        // Expected final filename
        $expectedFilename2 = time() . '_test2.jpg';

        // Expected full path
        $expectedFullPath = public_path('img/admin/gallery/' . $expectedFilename2);

        // Check file exists in public folder
        $this->assertFileDoesNotExist($expectedFullPath);

        // Check database
        $this->assertDatabaseCount('events', 1);
        $this->assertDatabaseMissing('events', [
            'event_name' => 'Wake up day',
            'description' => 'Cant sleep all the day',
            'event_time'=> Carbon::parse(now()->addDay(2)->second(0))->format('Y-m-d H:i:s'),
            'photo_path'  => 'img/admin/gallery/' . $expectedFilename2,
        ]);

        $this->assertDatabaseHas('events', [
            'event_name' => $event->event_name,
            'description' => $event->description,
            'userID' => $user->id,
            'event_time'=> Carbon::parse($event->event_time)->format('Y-m-d H:i:s'),
            'photo_path' => 'img/admin/gallery/' . $expectedFilename1,        
        ]);
    }

    public function test_event_management_update_event_unsuccesfully_if_image_is_wider_than_520px(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $file2 = UploadedFile::fake()->image('test2.jpg', 519,360)->size(1024);

        $expectedFilename1 = time() . '_test1.jpg';
        
        $event = Event::factory()->create([
            'event_name' => 'Sleep Night',
            'description' => 'Sleep all the day',
            'photo_path' => 'img/admin/gallery/'.$expectedFilename1,
            'userID' => $user->id,
            'event_date'=> Carbon::parse(now()->addDay(1)->second(0))->format('d/m/Y'),
            'event_time'=> Carbon::parse(now()->addDay(1)->second(0))->format('H:i'),
            'event_location'=> 'fghjkl',             
        ]);

        $data = [
            'event_name' => 'Wake up day',
            'description' => 'Cant sleep all the day',
            'photo_path' => $file2,
            'userID' => $user->id,
            'event_date'=> Carbon::parse(now()->addDay(2)->second(0))->format('d/m/Y'),
            'event_time'=> Carbon::parse(now()->addDay(2)->second(0))->format('H:i'),
            'event_location'=> 'fghjkl',             
        ];
        
        $response = $this->put(route('events.update', $event), $data);
        $response->assertStatus(302);
        $response->assertSessionHasErrors('photo_path');
        $response->assertSessionDoesntHaveErrors('description');
        $response->assertSessionDoesntHaveErrors('event_date');
        $response->assertSessionDoesntHaveErrors('event_time');
        $response->assertSessionDoesntHaveErrors('event_location');
        
        // Expected final filename
        $expectedFilename2 = time() . '_test2.jpg';

        // Expected full path
        $expectedFullPath = public_path('img/admin/gallery/' . $expectedFilename2);

        // Check file exists in public folder
        $this->assertFileDoesNotExist($expectedFullPath);

        // Check database
        $this->assertDatabaseCount('events', 1);
        $this->assertDatabaseMissing('events', [
            'event_name' => 'Wake up day',
            'description' => 'Cant sleep all the day',
            'event_time'=> Carbon::parse(now()->addDay(2)->second(0))->format('Y-m-d H:i:s'),
            'photo_path'  => 'img/admin/gallery/' . $expectedFilename2,
        ]);

        $this->assertDatabaseHas('events', [
            'event_name' => $event->event_name,
            'description' => $event->description,
            'userID' => $user->id,
            'event_time'=> Carbon::parse($event->event_time)->format('Y-m-d H:i:s'),
            'photo_path' => 'img/admin/gallery/' . $expectedFilename1,        
        ]);
    }

    public function test_event_management_update_event_unsuccesfully_if_image_is_less_high_than_360px(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $file2 = UploadedFile::fake()->image('test2.jpg', 520,359)->size(1024);

        $expectedFilename1 = time() . '_test1.jpg';
        
        $event = Event::factory()->create([
            'event_name' => 'Sleep Night',
            'description' => 'Sleep all the day',
            'photo_path' => 'img/admin/gallery/'.$expectedFilename1,
            'userID' => $user->id,
            'event_date'=> Carbon::parse(now()->addDay(1)->second(0))->format('d/m/Y'),
            'event_time'=> Carbon::parse(now()->addDay(1)->second(0))->format('H:i'),
            'event_location'=> 'fghjkl',             
        ]);

        $data = [
            'event_name' => 'Wake up day',
            'description' => 'Cant sleep all the day',
            'photo_path' => $file2,
            'userID' => $user->id,
            'event_date'=> Carbon::parse(now()->addDay(2)->second(0))->format('d/m/Y'),
            'event_time'=> Carbon::parse(now()->addDay(2)->second(0))->format('H:i'),
            'event_location'=> 'fghjkl',             
        ];
        
        $response = $this->put(route('events.update', $event), $data);
        $response->assertStatus(302);
        $response->assertSessionHasErrors('photo_path');
        $response->assertSessionDoesntHaveErrors('description');
        $response->assertSessionDoesntHaveErrors('event_date');
        $response->assertSessionDoesntHaveErrors('event_time');
        $response->assertSessionDoesntHaveErrors('event_location');

        // Expected final filename
        $expectedFilename2 = time() . '_test2.jpg';

        // Expected full path
        $expectedFullPath = public_path('img/admin/gallery/' . $expectedFilename2);

        // Check file exists in public folder
        $this->assertFileDoesNotExist($expectedFullPath);

        // Check database
        $this->assertDatabaseCount('events', 1);
        $this->assertDatabaseMissing('events', [
            'event_name' => 'Wake up day',
            'description' => 'Cant sleep all the day',
            'event_time'=> Carbon::parse(now()->addDay(2)->second(0))->format('Y-m-d H:i:s'),
            'photo_path'  => 'img/admin/gallery/' . $expectedFilename2,
        ]);

        $this->assertDatabaseHas('events', [
            'event_name' => $event->event_name,
            'description' => $event->description,
            'userID' => $user->id,
            'event_time'=> Carbon::parse($event->event_time)->format('Y-m-d H:i:s'),
            'photo_path' => 'img/admin/gallery/' . $expectedFilename1,        
        ]);
    }

    public function test_event_management_delete_event_succesfully(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $file = UploadedFile::fake()->image('test2.jpg', 520,360)->size(1024);
        
        $expectedFilename = time() . '_test2.jpg';

        // Expected full path
        $expectedFullPath = public_path('img/admin/gallery/' . $expectedFilename);
        
        // Move fake file to folder manually
        copy($file->getPathname(), $expectedFullPath);

        $event = Event::factory()->create([
            'event_name'=> 'Sleep Night', 
            'description'=> 'Sleep all the day',
            'photo_path'=> 'img/admin/gallery/' . $expectedFilename,
            'userID'=>Auth::id(),     
            'status'=> 0,                 
        ]);

        $response = $this->delete(route('events.destroy', $event));
        $response->assertStatus(302);
        $this->assertDatabaseCount('events', 0);
        $this->assertFileDoesNotExist($expectedFullPath);
    }

    public function test_event_management_activate_event_succesfully(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $file = UploadedFile::fake()->image('test.jpg', 520,360)->size(1024);

        $event = Event::factory()->create([
            'event_name'=> 'Sleep Night', 
            'description'=> 'Sleep all the day',
            'photo_path'=> $file,
            'userID'=>Auth::id(),     
            'status'=>0,                 
        ]);

        $response = $this->put(route('active-event', $event));
        $response->assertStatus(302);
        $this->assertDatabaseHas('events', [
            'event_name'=> 'Sleep Night', 
            'description'=> 'Sleep all the day',
            'userID'=>Auth::id(),            
            'status'=>1,                   
        ]);
    }

    public function test_event_management_deactivate_event_succesfully(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $file = UploadedFile::fake()->image('test.jpg', 520,360)->size(1024);

        $event = Event::factory()->create([
            'event_name'=> 'Sleep Night', 
            'description'=> 'Sleep all the day',
            'photo_path'=> $file,
            'userID'=>Auth::id(),
            'status'=>1,                 
        ]);

        $response = $this->put(route('deactive-event', $event));
        $response->assertStatus(302);
        $this->assertDatabaseHas('events', [
            'event_name'=> 'Sleep Night', 
            'description'=> 'Sleep all the day',
            'userID'=>Auth::id(),         
            'status'=>0,                   
        ]);        
    }
}
