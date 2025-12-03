<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Promotion;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;

class PromotionTest extends TestCase
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

    public function test_promotion_record_exist(){
        $promotion= Promotion::factory()->create([
            'name'=> 'Sleep Night',
            'promotion_startDate'=> '2025-01-30 00:00:00',
            'promotion_endDate'=> '2026-01-30 00:00:00',
            'description'=> 'Sleep all the day',
        ]);

        $response = $this->get('promotion');

        $response->assertStatus(200);
        $response->assertViewHas('promotions');
        $response->assertSee('Sleep Night');
        $response->assertSee('Sleep all the day');
        $response->assertSee('30 January, 2026');
    }

    public function test_promotion_record_do_not_exist(){
        $response = $this->get('promotion');

        $response->assertStatus(200);
        $response->assertSee('Coming Soon');
    }

    public function test_promotion_record_only_display_for_active_status(){
        $promotions = collect([
            [
                'name'=> 'Sleep Night',
                'promotion_startDate'=> '2025-01-30 00:00:00',
                'promotion_endDate'=> '2026-01-30 00:00:00',
                'description'=> 'Sleep all the day',
                'status'=> false
            ],
            [
                'name'=> 'Slepy Night',
                'promotion_startDate'=> '2025-01-30 00:00:00',
                'promotion_endDate'=> '2026-01-30 00:00:00',
                'description'=> 'Slepy all the day',
                'status'=> true
            ],
            [
                'name'=> 'Wake Up Day',
                'promotion_startDate'=> '2025-01-30 00:00:00',
                'promotion_endDate'=> '2026-01-30 00:00:00',
                'description'=> 'Wakeup all the day',
                'status'=> true
            ],
        ]);

        $promotions->each(function($data) {
            Promotion::factory()->create($data);
        });

        $response = $this->get('promotion');

        $response->assertStatus(200);
        $response->assertSee('Slepy Night');
        $response->assertSee('Wake Up Day');
        $response->assertDontSee('Sleep Night');
    }

    //Admin
    public function test_promotion_management_page_render_correctly(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $promotion = Promotion::factory()->create(
            [
                'name'=> 'Ten precent', 
                'description'=> '10%',
                'promotion_startDate'=>Carbon::parse(now()->addDay(1)->second(0))->format('Y-m-d H:i:s'),
                'promotion_endDate'=>Carbon::parse(now()->addDay(3))->second(0)->format('Y-m-d H:i:s'),
                'userID'=>Auth::id(),
            ]
        );

        $response = $this->get(route('promotions.index'));
        $response->assertStatus(200);
        $response->assertViewIs('promotion.promo');
        $response->assertViewHas('promotions');
        $response->assertSeeText('Ten precent');
        $response->assertSeeText('10%');
        $response->assertSeeText(Carbon::parse($promotion->promotion_startDate)->format('Y-m-d'));
        $response->assertSeeText(Carbon::parse($promotion->promotion_endDate)->format('Y-m-d'));      
    }

    public function test_promotion_management_page_render_add_page_correctly(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('promotions.create'));
        $response->assertStatus(200); 
        $response->assertViewIs('promotion.promo-add');   
    }

    public function test_promotion_management_add_promotion_successfully(){

        $user = User::factory()->create();
        $this->actingAs($user);

        $file = UploadedFile::fake()->image('test1.jpg', 481,297)->size(5120);

        $data = [
            'name'=> 'Ten precent', 
            'description'=> '10%',
            'promotion_startDate'=>Carbon::parse(now()->addDay(1)->second(0))->format('d/m/Y'),
            'promotion_endDate'=>Carbon::parse(now()->addDay(3))->second(0)->format('d/m/Y'),
            'userID'=>Auth::id(),
            'photo_path'=>$file,
        ];

        $response = $this->post(route('promotions.store'), $data);
        $response->assertStatus(302);

        // Expected final filename
        $expectedFilename = time() . '_test1.jpg';

        // Expected full path
        $expectedFullPath = public_path('img/admin/gallery/' . $expectedFilename);

        // Check file exists in public folder
        $this->assertFileExists($expectedFullPath);

        // Check database
        $this->assertDatabaseHas('promotions', [
            'name'=> 'Ten precent', 
            'description'=> '10%',
            'promotion_startDate' => now()->addDay()->startOfDay()->format('Y-m-d H:i:s'),
            'promotion_endDate' => now()->addDays(3)->startOfDay()->format('Y-m-d H:i:s'),
            'photo_path'  => 'img/admin/gallery/' . $expectedFilename,
        ]);

        if (file_exists($expectedFullPath)) {
            unlink($expectedFullPath);
        }
    }

    public function test_promotion_management_add_promotion_unsuccesfully_if_input_field_is_blank(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $data = [
            'name'=> '', 
            'description'=> '',
            'promotion_startDate'=>'',
            'promotion_endDate'=>'',
            'userID'=>Auth::id(),
            'photo_path'=>'',
        ];

        $response = $this->post(route('promotions.store'), $data);
        $response->assertStatus(302);
        $response->assertSessionHasErrors('name');
        $response->assertSessionHasErrors('description');
        $response->assertSessionHasErrors('promotion_startDate');
        $response->assertSessionHasErrors('promotion_endDate');
        $response->assertSessionHasErrors('photo_path');

        // Check database
        $this->assertDatabaseCount('promotions', 0);
    }

    public function test_promotion_management_add_promotion_unsuccesfully_if_image_is_larger_than_5MB(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $file = UploadedFile::fake()->image('test1.jpg', 481,360)->size(5121);

        $data = [
            'name'=> 'Ten precent', 
            'description'=> '10%',
            'promotion_startDate'=>Carbon::parse(now()->addDay(1)->second(0))->format('d/m/Y'),
            'promotion_endDate'=>Carbon::parse(now()->addDay(3))->second(0)->format('d/m/Y'),
            'userID'=>Auth::id(),
            'photo_path'=>$file,
        ];

        $response = $this->post(route('promotions.store'), $data);
        $response->assertStatus(302);
        $response->assertSessionDoesntHaveErrors('name');
        $response->assertSessionDoesntHaveErrors('description');
        $response->assertSessionDoesntHaveErrors('promotion_startDate');
        $response->assertSessionDoesntHaveErrors('promotion_endDate');
        $response->assertSessionHasErrors('photo_path');

        // Expected final filename
        $expectedFilename = time() . '_test1.jpg';

        // Expected full path
        $expectedFullPath = public_path('img/admin/gallery/' . $expectedFilename);

        // Check file exists in public folder
        $this->assertFileDoesNotExist($expectedFullPath);

        // Check database
        $this->assertDatabaseCount('promotions',0);
    }

    public function test_promotion_management_add_promotion_unsuccesfully_if_image_is_lesser_wide_than_481px(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $file = UploadedFile::fake()->image('test1.jpg', 480,297)->size(5120);

        $data = [
            'name'=> 'Ten precent', 
            'description'=> '10%',
            'promotion_startDate'=>Carbon::parse(now()->addDay(1)->second(0))->format('d/m/Y'),
            'promotion_endDate'=>Carbon::parse(now()->addDay(3))->second(0)->format('d/m/Y'),
            'userID'=>Auth::id(),
            'photo_path'=>$file,
        ];

        $response = $this->post(route('promotions.store'), $data);
        $response->assertStatus(302);
        $response->assertSessionDoesntHaveErrors('name');
        $response->assertSessionDoesntHaveErrors('description');
        $response->assertSessionDoesntHaveErrors('promotion_startDate');
        $response->assertSessionDoesntHaveErrors('promotion_endDate');
        $response->assertSessionHasErrors('photo_path');

        // Expected final filename
        $expectedFilename = time() . '_test1.jpg';

        // Expected full path
        $expectedFullPath = public_path('img/admin/gallery/' . $expectedFilename);

        // Check file exists in public folder
        $this->assertFileDoesNotExist($expectedFullPath);

        // Check database
        $this->assertDatabaseCount('promotions',0);        
    }

    public function test_promotion_management_add_promotion_unsuccesfully_if_image_is_less_high_than_297px(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $file = UploadedFile::fake()->image('test1.jpg', 480,296)->size(5120);

        $data = [
            'name'=> 'Ten precent', 
            'description'=> '10%',
            'promotion_startDate'=>Carbon::parse(now()->addDay(1)->second(0))->format('d/m/Y'),
            'promotion_endDate'=>Carbon::parse(now()->addDay(3))->second(0)->format('d/m/Y'),
            'userID'=>Auth::id(),
            'photo_path'=>$file,
        ];

        $response = $this->post(route('promotions.store'), $data);
        $response->assertStatus(302);
        $response->assertSessionDoesntHaveErrors('name');
        $response->assertSessionDoesntHaveErrors('description');
        $response->assertSessionDoesntHaveErrors('promotion_startDate');
        $response->assertSessionDoesntHaveErrors('promotion_endDate');
        $response->assertSessionHasErrors('photo_path');

        // Expected final filename
        $expectedFilename = time() . '_test1.jpg';

        // Expected full path
        $expectedFullPath = public_path('img/admin/gallery/' . $expectedFilename);

        // Check file exists in public folder
        $this->assertFileDoesNotExist($expectedFullPath);

        // Check database
        $this->assertDatabaseCount('promotions',0); 
    }

    public function test_promotion_management_add_promotion_unsuccesfully_if_promotion_start_date_is_lesser_than_end_date(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $file = UploadedFile::fake()->image('test1.jpg', 481,297)->size(5120);

        $data = [
            'name'=> 'Ten precent', 
            'description'=> '10%',
            'promotion_startDate'=>Carbon::parse(now()->addDay(3)->second(0))->format('d/m/Y'),
            'promotion_endDate'=>Carbon::parse(now()->addDay())->second(0)->format('d/m/Y'),
            'userID'=>Auth::id(),
            'photo_path'=>$file,
        ];

        $response = $this->post(route('promotions.store'), $data);
        $response->assertStatus(302);
        $response->assertSessionDoesntHaveErrors('name');
        $response->assertSessionDoesntHaveErrors('description');
        $response->assertSessionDoesntHaveErrors('photo_path');
        $response->assertSessionHasErrors('promotion_endDate');
        $response->assertSessionDoesntHaveErrors('promotion_startDate');

        // Expected final filename
        $expectedFilename = time() . '_test1.jpg';

        // Expected full path
        $expectedFullPath = public_path('img/admin/gallery/' . $expectedFilename);

        // Check file exists in public folder
        $this->assertFileDoesNotExist($expectedFullPath);

        // Check database
        $this->assertDatabaseCount('promotions',0);
    }

    public function test_replicate_form_render_correctly(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('replicatepromotionform'));
        $response->assertStatus(200);
        $response->assertViewIs('promotion.promo-existing');
        $response->assertViewHas('promotions');
    }

    public function test_promotion_management_replicate_promotion_successfully(){

        $user = User::factory()->create();
        $this->actingAs($user);

        $file = UploadedFile::fake()->image('test1.jpg', 481,297)->size(5120);

        $data = [
            'name'=> 'Ten precent', 
            'description'=> '10%',
            'promotion_startDate'=>Carbon::parse(now()->addDay(1)->second(0))->format('d/m/Y'),
            'promotion_endDate'=>Carbon::parse(now()->addDay(3))->second(0)->format('d/m/Y'),
            'userID'=>Auth::id(),
            'photo_path'=>$file,
        ];

        $response = $this->post(route('replicate-promotion'), $data);
        $response->assertStatus(302);

        // Expected final filename
        $expectedFilename = time() . '_test1.jpg';

        // Expected full path
        $expectedFullPath = public_path('img/admin/gallery/' . $expectedFilename);

        // Check file exists in public folder
        $this->assertFileExists($expectedFullPath);

        // Check database
        $this->assertDatabaseHas('promotions', [
            'name'=> 'Ten precent', 
            'description'=> '10%',
            'promotion_startDate' => now()->addDay()->startOfDay()->format('Y-m-d H:i:s'),
            'promotion_endDate' => now()->addDays(3)->startOfDay()->format('Y-m-d H:i:s'),
            'photo_path'  => 'img/admin/gallery/' . $expectedFilename,
        ]);

        if (file_exists($expectedFullPath)) {
            unlink($expectedFullPath);
        }
    }

    public function test_promotion_management_replicate_promotion_unsuccesfully_if_input_field_is_blank(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $data = [
            'name'=> '', 
            'description'=> '',
            'promotion_startDate'=>'',
            'promotion_endDate'=>'',
            'userID'=>Auth::id(),
            'photo_path'=>'',
        ];

        $response = $this->post(route('replicate-promotion'), $data);
        $response->assertStatus(302);
        $response->assertSessionHasErrors('name');
        $response->assertSessionHasErrors('description');
        $response->assertSessionHasErrors('promotion_startDate');
        $response->assertSessionHasErrors('promotion_endDate');
        $response->assertSessionHasErrors('photo_path');

        // Check database
        $this->assertDatabaseCount('promotions', 0);
    }

    public function test_promotion_management_replicate_promotion_unsuccesfully_if_image_is_larger_than_5MB(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $file = UploadedFile::fake()->image('test1.jpg', 481,360)->size(5121);

        $data = [
            'name'=> 'Ten precent', 
            'description'=> '10%',
            'promotion_startDate'=>Carbon::parse(now()->addDay(1)->second(0))->format('d/m/Y'),
            'promotion_endDate'=>Carbon::parse(now()->addDay(3))->second(0)->format('d/m/Y'),
            'userID'=>Auth::id(),
            'photo_path'=>$file,
        ];

        $response = $this->post(route('replicate-promotion'), $data);
        $response->assertStatus(302);
        $response->assertSessionDoesntHaveErrors('name');
        $response->assertSessionDoesntHaveErrors('description');
        $response->assertSessionDoesntHaveErrors('promotion_startDate');
        $response->assertSessionDoesntHaveErrors('promotion_endDate');
        $response->assertSessionHasErrors('photo_path');

        // Expected final filename
        $expectedFilename = time() . '_test1.jpg';

        // Expected full path
        $expectedFullPath = public_path('img/admin/gallery/' . $expectedFilename);

        // Check file exists in public folder
        $this->assertFileDoesNotExist($expectedFullPath);

        // Check database
        $this->assertDatabaseCount('promotions',0);
    }

    public function test_promotion_management_replicate_promotion_unsuccesfully_if_image_is_lesser_wide_than_481px(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $file = UploadedFile::fake()->image('test1.jpg', 480,297)->size(5120);

        $data = [
            'name'=> 'Ten precent', 
            'description'=> '10%',
            'promotion_startDate'=>Carbon::parse(now()->addDay(1)->second(0))->format('d/m/Y'),
            'promotion_endDate'=>Carbon::parse(now()->addDay(3))->second(0)->format('d/m/Y'),
            'userID'=>Auth::id(),
            'photo_path'=>$file,
        ];

        $response = $this->post(route('replicate-promotion'), $data);
        $response->assertStatus(302);
        $response->assertSessionDoesntHaveErrors('name');
        $response->assertSessionDoesntHaveErrors('description');
        $response->assertSessionDoesntHaveErrors('promotion_startDate');
        $response->assertSessionDoesntHaveErrors('promotion_endDate');
        $response->assertSessionHasErrors('photo_path');

        // Expected final filename
        $expectedFilename = time() . '_test1.jpg';

        // Expected full path
        $expectedFullPath = public_path('img/admin/gallery/' . $expectedFilename);

        // Check file exists in public folder
        $this->assertFileDoesNotExist($expectedFullPath);

        // Check database
        $this->assertDatabaseCount('promotions',0);        
    }

    public function test_promotion_management_replicate_promotion_unsuccesfully_if_image_is_less_high_than_297px(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $file = UploadedFile::fake()->image('test1.jpg', 480,296)->size(5120);

        $data = [
            'name'=> 'Ten precent', 
            'description'=> '10%',
            'promotion_startDate'=>Carbon::parse(now()->addDay(1)->second(0))->format('d/m/Y'),
            'promotion_endDate'=>Carbon::parse(now()->addDay(3))->second(0)->format('d/m/Y'),
            'userID'=>Auth::id(),
            'photo_path'=>$file,
        ];

        $response = $this->post(route('replicate-promotion'), $data);
        $response->assertStatus(302);
        $response->assertSessionDoesntHaveErrors('name');
        $response->assertSessionDoesntHaveErrors('description');
        $response->assertSessionDoesntHaveErrors('promotion_startDate');
        $response->assertSessionDoesntHaveErrors('promotion_endDate');
        $response->assertSessionHasErrors('photo_path');

        // Expected final filename
        $expectedFilename = time() . '_test1.jpg';

        // Expected full path
        $expectedFullPath = public_path('img/admin/gallery/' . $expectedFilename);

        // Check file exists in public folder
        $this->assertFileDoesNotExist($expectedFullPath);

        // Check database
        $this->assertDatabaseCount('promotions',0); 
    }

    public function test_promotion_management_replicate_promotion_unsuccesfully_if_promotion_start_date_is_lesser_than_end_date(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $file = UploadedFile::fake()->image('test1.jpg', 481,297)->size(5120);

        $data = [
            'name'=> 'Ten precent', 
            'description'=> '10%',
            'promotion_startDate'=>Carbon::parse(now()->addDay(3)->second(0))->format('d/m/Y'),
            'promotion_endDate'=>Carbon::parse(now()->addDay())->second(0)->format('d/m/Y'),
            'userID'=>Auth::id(),
            'photo_path'=>$file,
        ];

        $response = $this->post(route('replicate-promotion'), $data);
        $response->assertStatus(302);
        $response->assertSessionDoesntHaveErrors('name');
        $response->assertSessionDoesntHaveErrors('description');
        $response->assertSessionDoesntHaveErrors('photo_path');
        $response->assertSessionHasErrors('promotion_endDate');
        $response->assertSessionDoesntHaveErrors('promotion_startDate');

        // Expected final filename
        $expectedFilename = time() . '_test1.jpg';

        // Expected full path
        $expectedFullPath = public_path('img/admin/gallery/' . $expectedFilename);

        // Check file exists in public folder
        $this->assertFileDoesNotExist($expectedFullPath);

        // Check database
        $this->assertDatabaseCount('promotions',0);
    }
    
    public function test_promotion_management_page_render_edit_page_correctly(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $promotion = Promotion::factory()->create();

        $response = $this->get(route('promotions.edit', $promotion));
        $response->assertStatus(200);
        $response->assertViewIs('promotion.promo-edit');  
    }
    
    public function test_promotion_management_update_promotion_successfully(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $file = UploadedFile::fake()->image('test1.jpg', 520,360)->size(1024);
        $file2 = UploadedFile::fake()->image('test2.jpg', 520,360)->size(1024);

        $expectedFilename = time() . '_test2.jpg';

        // Expected full path
        $expectedFullPath = public_path('img/admin/gallery/' . $expectedFilename);
        
        // Move fake file to folder manually
        copy($file2->getPathname(), $expectedFullPath);

        $promotion = Promotion::factory()->create([
            'name'=> 'Nine precent', 
            'description'=> '9%',
            'promotion_startDate'=>Carbon::parse(now()->addDay(2)->second(0))->format('d/m/Y'),
            'promotion_endDate'=>Carbon::parse(now()->addDay(4))->second(0)->format('d/m/Y'),
            'userID'=>Auth::id(),
            'photo_path'=>'img/admin/gallery/' . $expectedFilename,
        ]);

        $data = [
            'name'=> 'Ten precent', 
            'description'=> '10%',
            'promotion_startDate'=>Carbon::parse(now()->addDay()->second(0))->format('d/m/Y'),
            'promotion_endDate'=>Carbon::parse(now()->addDay(3))->second(0)->format('d/m/Y'),
            'userID'=>Auth::id(),
            'photo_path'=>$file,
        ];
        
        $response = $this->put(route('promotions.update', $promotion), $data);
        $response->assertStatus(302);
        
        // Expected final filename
        $expectedFilename2 = time() . '_test1.jpg';

        // Expected full path
        $expectedFullPath2 = public_path('img/admin/gallery/' . $expectedFilename2);
        
        // Check file exists in public folder
        $this->assertFileExists($expectedFullPath2);
        $this->assertFileDoesNotExist($expectedFullPath);

        // Check database
        $this->assertDatabaseCount('promotions', 1);
        $this->assertDatabaseHas('promotions', [
            'name'=> 'Ten precent', 
            'description'=> '10%',
            'promotion_startDate' => Carbon::parse(now()->addDay())->toDateString(),
            'promotion_endDate'   => Carbon::parse(now()->addDay(3))->toDateString(),
            'photo_path'  => 'img/admin/gallery/' . $expectedFilename2,
        ]);

        if (file_exists($expectedFullPath2)) {
            unlink($expectedFullPath2);
        }
    }

    public function test_promotion_management_update_promotion_unsuccesfully_if_input_field_is_blank(){
        $user = User::factory()->create();
        $this->actingAs($user);
        
        // Expected final filename
        $expectedFilename = time() . '_test1.jpg';

        $promotion = Promotion::factory()->create([
            'name'=> 'Nine precent', 
            'description'=> '9%',
            'promotion_startDate'=> now()->addDays(2)->format('Y-m-d'),
            'promotion_endDate'=> now()->addDays(4)->format('Y-m-d'),
            'userID'=>Auth::id(),
            'photo_path'=>'img/admin/gallery/' . $expectedFilename,
        ]);

        $data = [
            'name'=> '', 
            'description'=> '',
            'promotion_startDate'=>'',
            'promotion_endDate'=>'',
            'userID'=>Auth::id(),
            'photo_path'=>'',
        ];
        
        $response = $this->put(route('promotions.update', $promotion), $data);
        $response->assertStatus(302);
        $response->assertSessionHasErrors('name');
        $response->assertSessionHasErrors('description');
        $response->assertSessionHasErrors('promotion_startDate');
        $response->assertSessionHasErrors('promotion_endDate');
        $response->assertSessionDoesntHaveErrors('photo_path');

        // Check database
        $this->assertDatabaseCount('promotions', 1);
        $this->assertDatabaseHas('promotions', [
            'name'=> 'Nine precent', 
            'description'=> '9%',
            'promotion_startDate' => Carbon::parse(now()->addDay(2)->second(0))->format('Y-m-d 00:00:00'),
            'promotion_endDate'   => Carbon::parse(now()->addDay(4)->second(0))->format('Y-m-d 00:00:00'),
            'photo_path'  => 'img/admin/gallery/' . $expectedFilename,
        ]);
    }

    public function test_promotion_management_update_promotion_unsuccesfully_if_promotion_start_date_is_lesser_than_end_date(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $file = UploadedFile::fake()->image('test1.jpg', 481,297)->size(5120);
        $file2 = UploadedFile::fake()->image('test2.jpg', 481,297)->size(5120);

        $promotion = Promotion::factory()->create([
            'name'=> 'Nine precent',
            'description'=> '9%',
            'promotion_startDate'=> now()->addDays(2)->format('Y-m-d'),
            'promotion_endDate'=> now()->addDays(4)->format('Y-m-d'),
            'userID'=>Auth::id(),
            'photo_path'=>$file,
        ]);

        $data = [
            'name'=> 'Ten precent', 
            'description'=> '10%',
            'promotion_startDate'=>Carbon::parse(now()->addDay(5)->second(0))->format('d/m/Y'),
            'promotion_endDate'=>Carbon::parse(now()->addDay(3))->second(0)->format('d/m/Y'),
            'userID'=>Auth::id(),
            'photo_path'=>$file2,
        ];
        
        $response = $this->put(route('promotions.update', $promotion), $data);
        $response->assertStatus(302);
        $response->assertSessionHasErrors('promotion_endDate');
        $response->assertSessionDoesntHaveErrors('promotion_startDate');
        $response->assertSessionDoesntHaveErrors('name');
        $response->assertSessionDoesntHaveErrors('description');
        $response->assertSessionDoesntHaveErrors('photo_path');

        // Expected final filename
        $expectedFilename = time() . '_test2.jpg';

        // Expected full path
        $expectedFullPath = public_path('img/admin/gallery/' . $expectedFilename);
        
        // Check file exists in public folder
        $this->assertFileDoesNotExist($expectedFullPath);

        // Check database
        $this->assertDatabaseCount('promotions', 1);
        $this->assertDatabaseHas('promotions', [
            'name'=> 'Nine precent', 
            'description'=> '9%',
            'promotion_startDate' => Carbon::parse(now()->addDay(2))->toDateString(),
            'promotion_endDate'   => Carbon::parse(now()->addDay(4))->toDateString(),
            'photo_path'  => $file,
        ]);
    }

    public function test_promotion_management_update_promotion_unsuccesfully_if_image_is_larger_than_5MB(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $file = UploadedFile::fake()->image('test1.jpg', 481,297)->size(5120);
        $file2 = UploadedFile::fake()->image('test2.jpg', 481,297)->size(5121);

        $promotion = Promotion::factory()->create([
            'name'=> 'Nine precent', 
            'description'=> '9%',
            'promotion_startDate'=> now()->addDays(2)->format('Y-m-d'),
            'promotion_endDate'=> now()->addDays(4)->format('Y-m-d'),
            'userID'=>Auth::id(),
            'photo_path'=>$file,
        ]);

        $data = [
            'name'=> 'Ten precent', 
            'description'=> '10%',
            'promotion_startDate'=>Carbon::parse(now()->addDay()->second(0))->format('d/m/Y'),
            'promotion_endDate'=>Carbon::parse(now()->addDay(3))->second(0)->format('d/m/Y'),
            'userID'=>Auth::id(),
            'photo_path'=>$file2,
        ];
        
        $response = $this->put(route('promotions.update', $promotion), $data);
        $response->assertStatus(302);
        $response->assertSessionHasErrors('photo_path');
        $response->assertSessionDoesntHaveErrors('promotion_endDate');
        $response->assertSessionDoesntHaveErrors('name');
        $response->assertSessionDoesntHaveErrors('description');
        $response->assertSessionDoesntHaveErrors('promotion_startDate');

        // Expected final filename
        $expectedFilename = time() . '_test2.jpg';

        // Expected full path
        $expectedFullPath = public_path('img/admin/gallery/' . $expectedFilename);
        
        // Check file exists in public folder
        $this->assertFileDoesNotExist($expectedFullPath);

        // Check database
        $this->assertDatabaseCount('promotions', 1);
        $this->assertDatabaseHas('promotions', [
            'name'=> 'Nine precent', 
            'description'=> '9%',
            'promotion_startDate' => Carbon::parse(now()->addDay(2))->toDateString(),
            'promotion_endDate'   => Carbon::parse(now()->addDay(4))->toDateString(),
            'photo_path'  => $file,
        ]);
    }

    public function test_promotion_management_update_promotion_unsuccesfully_if_image_is_less_wider_than_481px(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $file = UploadedFile::fake()->image('test1.jpg', 481,297)->size(5120);
        $file2 = UploadedFile::fake()->image('test2.jpg', 480,297)->size(5120);

        $promotion = Promotion::factory()->create([
            'name'=> 'Nine precent', 
            'description'=> '9%',
            'promotion_startDate'=> now()->addDays(2)->format('Y-m-d'),
            'promotion_endDate'=> now()->addDays(4)->format('Y-m-d'),
            'userID'=>Auth::id(),
            'photo_path'=>$file,
        ]);

        $data = [
            'name'=> 'Ten precent', 
            'description'=> '10%',
            'promotion_startDate'=>Carbon::parse(now()->addDay()->second(0))->format('d/m/Y'),
            'promotion_endDate'=>Carbon::parse(now()->addDay(3))->second(0)->format('d/m/Y'),
            'userID'=>Auth::id(),
            'photo_path'=>$file2,
        ];
        
        $response = $this->put(route('promotions.update', $promotion), $data);
        $response->assertStatus(302);
        $response->assertSessionHasErrors('photo_path');
        $response->assertSessionDoesntHaveErrors('promotion_endDate');
        $response->assertSessionDoesntHaveErrors('name');
        $response->assertSessionDoesntHaveErrors('description');
        $response->assertSessionDoesntHaveErrors('promotion_startDate');

        // Expected final filename
        $expectedFilename = time() . '_test2.jpg';

        // Expected full path
        $expectedFullPath = public_path('img/admin/gallery/' . $expectedFilename);
        
        // Check file exists in public folder
        $this->assertFileDoesNotExist($expectedFullPath);

        // Check database
        $this->assertDatabaseCount('promotions', 1);
        $this->assertDatabaseHas('promotions', [
            'name'=> 'Nine precent', 
            'description'=> '9%',
            'promotion_startDate' => Carbon::parse(now()->addDay(2))->toDateString(),
            'promotion_endDate'   => Carbon::parse(now()->addDay(4))->toDateString(),
            'photo_path'  => $file,
        ]);        
    }

    public function test_promotion_management_update_promotion_unsuccesfully_if_image_is_less_higher_than_297px(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $file = UploadedFile::fake()->image('test1.jpg', 481,297)->size(5120);
        $file2 = UploadedFile::fake()->image('test2.jpg', 481,296)->size(5120);

        $promotion = Promotion::factory()->create([
            'name'=> 'Nine precent', 
            'description'=> '9%',
            'promotion_startDate'=> now()->addDays(2)->format('Y-m-d'),
            'promotion_endDate'=> now()->addDays(4)->format('Y-m-d'),
            'userID'=>Auth::id(),
            'photo_path'=>$file,
        ]);

        $data = [
            'name'=> 'Ten precent', 
            'description'=> '10%',
            'promotion_startDate'=>Carbon::parse(now()->addDay()->second(0))->format('d/m/Y'),
            'promotion_endDate'=>Carbon::parse(now()->addDay(3))->second(0)->format('d/m/Y'),
            'userID'=>Auth::id(),
            'photo_path'=>$file2,
        ];
        
        $response = $this->put(route('promotions.update', $promotion), $data);
        $response->assertStatus(302);
        $response->assertSessionHasErrors('photo_path');
        $response->assertSessionDoesntHaveErrors('promotion_endDate');
        $response->assertSessionDoesntHaveErrors('name');
        $response->assertSessionDoesntHaveErrors('description');
        $response->assertSessionDoesntHaveErrors('promotion_startDate');

        // Expected final filename
        $expectedFilename = time() . '_test2.jpg';

        // Expected full path
        $expectedFullPath = public_path('img/admin/gallery/' . $expectedFilename);
        
        // Check file exists in public folder
        $this->assertFileDoesNotExist($expectedFullPath);

        // Check database
        $this->assertDatabaseCount('promotions', 1);
        $this->assertDatabaseHas('promotions', [
            'name'=> 'Nine precent', 
            'description'=> '9%',
            'promotion_startDate' => Carbon::parse(now()->addDay(2))->toDateString(),
            'promotion_endDate'   => Carbon::parse(now()->addDay(4))->toDateString(),
            'photo_path'  => $file,
        ]);        
    }

    public function test_promotion_management_delete_promotion_succesfully(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $file = UploadedFile::fake()->image('test.jpg', 481,297)->size(5120);
        
        $expectedFilename = time() . '_test.jpg';

        // Expected full path
        $expectedFullPath = public_path('img/admin/gallery/' . $expectedFilename);
        
        // Move fake file to folder manually
        copy($file->getPathname(), $expectedFullPath);

        $promotion = Promotion::factory()->create(
            [
                'name'=> 'Ten precent', 
                'description'=> '10%',
                'photo_path'=>'img/admin/gallery/' . $expectedFilename,
                'status'=> 0,
            ]
        );
        $response = $this->delete(route('promotions.destroy', $promotion));
        $response->assertStatus(302);
        $this->assertDatabaseCount('promotions', 0);
        $this->assertFileDoesNotExist($expectedFullPath);
    }

    public function test_promotion_management_activate_promotion_succesfully(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $promotion = Promotion::factory()->create(
            [
                'name'=> 'Ten precent', 
                'description'=> '10%',
                'status'=> 0,
            ]
        );   

        $response = $this->put(route('active-promotion', $promotion));
        $response->assertStatus(302);
        $this->assertDatabaseCount('promotions', 1);
        $this->assertDatabaseHas('promotions', [
            'name'=> 'Ten precent', 
            'description'=> '10%',        
            'status'=>1,               
        ]);
    }

    public function test_promotion_management_deactivate_promotion_succesfully(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $promotion = Promotion::factory()->create(
            [
                'name'=> 'Ten precent', 
                'description'=> '10%',
            ]
        );   

        $response = $this->put(route('deactive-promotion', $promotion));
        $response->assertStatus(302);
        $this->assertDatabaseCount('promotions', 1);
        $this->assertDatabaseHas('promotions', [
            'name'=> 'Ten precent', 
            'description'=> '10%',        
            'status'=>0,               
        ]);
    }
}

