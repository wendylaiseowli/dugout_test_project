<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Refresh the default database
        $this->artisan('migrate:fresh');

        // Refresh the second database
        $this->artisan('migrate:fresh', ['--database' => 'mysql2']);
    }

    // public function test_example(): void
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    public function test_view_user_management_page_render_correctly(){
        $user = User::factory()->create(['id'=>1,'username' => 'DS']);
        $user1 = User::factory()->create(['id'=>2,'username' => 'Wendy']);
        $user2 = User::factory()->create(['id'=>3,'username' => 'Muiz']);
        $user3 = User::factory()->create(['id'=>4,'username' => 'Brendon']);
        $user4 = User::factory()->create(['id'=>5,'username' => 'Asif']);
        $user5 = User::factory()->create(['id'=>6,'username' => 'Jega']);
        
        $this->actingAs($user);
        $response = $this->get(route('users.index'));
        

        $response->assertStatus(200);
        $response->assertViewIs('user.user');
        $response->assertViewHas('users');
        $response->assertSeeText('DS');
        $response->assertSeeText('Wendy');
        $response->assertSeeText('Muiz');
        $response->assertSeeText('Brendon');
        $response->assertSeeText('Asif');
        $response->assertSeeText('Jega');      
    }

    public function test_active_user_management_page_active_user_correctly(){
        $user = User::factory()->create();
        $user1 = User::factory()->create(['status'=> false]);
        $this->actingAs($user);

        $response = $this->put(route('active-user', $user1));
        $response->assertStatus(302);
        $response->assertRedirect('/users');

        $this->assertDatabaseHas('users', ['id'=>$user1->id, 'status'=> 1]);
    }
    
    public function test_deactive_user_management_page_deactive_user_correctly(){
        $user = User::factory()->create();
        $user1 = User::factory()->create(['status'=> true]);
        $this->actingAs($user);

        $response = $this->put(route('deactive-user', $user1));
        $response->assertStatus(302);
        $response->assertRedirect('/users');

        $this->assertDatabaseHas('users', ['id'=>$user->id,'status'=>1]);
        $this->assertDatabaseHas('users', ['id'=>$user1->id,'status'=>0]); 
    }

    public function test_update_user_management_page_successfully_update_user_correctly(){
        $user = User::factory()->create();
        $user1 = User::factory()->create(['first_name'=> 'test1','last_name'=> 'test1','status'=> true]);
        $this->actingAs($user);

        $data=[
            'first_name'=> 'test',
            'last_name'=> 'test',
            'password' => 'testing',
            'password_confirmation' => 'testing',
        ];

        $response = $this->put(route('users.update', $user1), $data);
        $response->assertStatus(302);
        $response->assertRedirect('/users');

        $this->assertDatabaseHas('users', ['id'=>$user1->id, 'first_name'=> 'test','last_name'=> 'test']);
        //password has not been test here
        $this->assertDatabaseMissing('users', ['id'=>$user->id, 'first_name'=> 'test1','last_name'=> 'test']);
    }

    public function test_update_user_management_page_unsuccessfully_update_user_if_input_is_blank(){
        $user = User::factory()->create();
        $user1 = User::factory()->create(['first_name'=> 'test1','last_name'=> 'test1','status'=> true]);
        $this->actingAs($user);

        $data=[
            'first_name'=> '',
            'last_name'=> '',
            'password' => '',
            'password_confirmation' => '',
        ];

        $response = $this->put(route('users.update', $user1), $data);
        $response->assertStatus(302);

        $this->assertDatabaseHas('users', ['id'=>$user1->id, 'first_name'=> 'test1','last_name'=> 'test1']);
       
        $this->assertDatabaseMissing('users', ['id'=>$user->id, 'first_name'=> '','last_name'=> '']);
        $response->assertSessionHasErrors('first_name');
        $response->assertSessionHasErrors('last_name');
        $response->assertSessionHasErrors('password');
    }

    public function test_update_user_management_page_unsuccessfully_update_user_if_password_is_unmatch_with_confirm_password(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $data=[
            'first_name'=> 'wendy',
            'last_name'=> 'lai',
            'password' => 'Wendy2003@10/29',
            'password_confirmation' => 'hdihidhi',
        ];

        $response = $this->put(route('users.update', $user), $data);
        $response->assertStatus(302);

        $this->assertDatabaseMissing('users', ['id'=>$user->id, 'first_name'=> 'wendy','last_name'=> 'lai']);
        $response->assertSessionHasErrors('password');
    }

    public function test_password_is_hashed_when_provided()
    {
        $data = [
            'name' => 'Wendy',
            'email' => 'wendy@example.com',
            'password' => 'secret123'
        ];

        // Simulate the logic
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $this->assertNotEquals('secret123', $data['password']); // password is hashed
        $this->assertTrue(Hash::check('secret123', $data['password'])); // bcrypt verified
    }

    public function test_password_is_unset_when_password_field_is_empty()
    {
        $data = [
            'name' => 'Wendy',
            'email' => 'wendy@example.com',
            'password' => ''
        ];

        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $this->assertArrayNotHasKey('password', $data);
    }

    public function test_delete_user_management_page_successfully(){
        $user = User::factory()->create();
        $user1 = User::factory()->create(['status'=> true]);
        $this->actingAs($user);

        $response = $this->delete(route('users.destroy', $user1));
        $response->assertStatus(302);
        $response->assertRedirect('/users');

        $this->assertDatabaseMissing('users', ['id'=>$user1->id]); 
        $this->assertDatabaseHas('users', ['id'=>$user->id]);
    }
}
