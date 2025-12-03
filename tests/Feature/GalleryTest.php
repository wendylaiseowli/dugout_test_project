<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Gallery;
use App\Models\Category;
use Illuminate\Http\UploadedFile;
use App\Models\User;

class GalleryTest extends TestCase
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

    public function test_gallery_records_is_inactive(){
        $foodcategory = Category::factory()->create(['name'=> 'Food']);
        $drinkcategory = Category::factory()->create(['name'=> 'Drinks']);
        $eventcategory = Category::factory()->create(['name'=> 'Events']);
        
        $gallery1 = Gallery::create([    
            'userID'=> 1,        
            'categoryID'=> $foodcategory->id,
            'original_photo_path'=>'34041617523075861.jpg',
            'new_photo_path'=>'34041617523075861.jpg',
            'status'=> false,
        ]);

        $gallery2 = Gallery::create([
            'userID'=> 1,         
            'categoryID'=> $drinkcategory->id,
            'original_photo_path'=>'34041617523075863.jpg',
            'new_photo_path'=>'34041617523075863.jpg',
            'status'=> false,
        ]);

        $gallery3 = Gallery::create([
            'userID'=> 1,         
            'categoryID'=> $eventcategory->id,
            'original_photo_path'=>'34041617523075864.jpg',
            'new_photo_path'=>'34041617523075864.jpg',
            'status'=> false,
        ]);

        $response = $this->get('gallery');

        $response->assertStatus(200);
        $response->assertViewHas('foodImages');
        $response->assertViewHas('drinkImages');
        $response->assertViewHas('eventImages');
        $response->assertDontSee('34041617523075861.jpg');
        $response->assertDontSee('34041617523075864.jpg');
        $response->assertDontSee('34041617523075863.jpg');

        $response->assertSee('Coming Soon');
    }

    public function test_gallery_record_exist_and_only_get_the_active_status(){
        $foodcategory = Category::factory()->create(['name'=> 'Food']);
        $drinkcategory = Category::factory()->create(['name'=> 'Drinks']);
        $eventcategory = Category::factory()->create(['name'=> 'Events']);
        
        $gallery1 = Gallery::create([    
            'userID'=> 1,        
            'categoryID'=> $foodcategory->id,
            'original_photo_path'=>'34041617523075861.jpg',
            'new_photo_path'=>'34041617523075861.jpg',
            'status'=> true,
        ]);

        $gallery2 = Gallery::create([
            'userID'=> 1,         
            'categoryID'=> $drinkcategory->id,
            'original_photo_path'=>'34041617523075863.jpg',
            'new_photo_path'=>'34041617523075863.jpg',
            'status'=> false,
        ]);

        $gallery3 = Gallery::create([
            'userID'=> 1,         
            'categoryID'=> $eventcategory->id,
            'original_photo_path'=>'34041617523075864.jpg',
            'new_photo_path'=>'34041617523075864.jpg',
            'status'=> true,
        ]);

        $response = $this->get('gallery');

        $response->assertStatus(200);
        $response->assertViewHas('foodImages');
        $response->assertViewHas('drinkImages');
        $response->assertViewHas('eventImages');
        $response->assertSee('34041617523075861.jpg');
        $response->assertSee('34041617523075864.jpg');
        $response->assertDontSee('34041617523075863.jpg');
    }

    public function test_gallery_record_do_not_exist(){
        $foodcategory = Category::factory()->create(['name'=> 'Food']);
        $drinkcategory = Category::factory()->create(['name'=> 'Drinks']);
        $eventcategory = Category::factory()->create(['name'=> 'Events']);
        $response = $this->get('gallery');

        $response->assertStatus(200);
        $response->assertSee('Coming Soon');
    }

    public function test_relationship_between_gallery_and_category(){
    
        $foodcategory = Category::factory()->has(
            Gallery::factory()
        )->create(['name'=> 'Food']);
        $drinkcategory = Category::factory()->has(
            Gallery::factory()
        )->create(['name'=> 'Drinks']);
        $eventcategory = Category::factory()->has(
            Gallery::factory()
        )->create(['name'=> 'Events']);
        
        $response = $this->get('gallery');

        $response->assertStatus(200);
        $food = $foodcategory->galleries->first();
        $drink = $drinkcategory->galleries->first();
        $event = $eventcategory->galleries->first();
        $response->assertSee($food->new_photo_path);
        $response->assertSee($drink->new_photo_path);
        $response->assertSee($event->new_photo_path);
    }

    //Admin
    public function test_gallery_management_page_render_correctly(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $file = UploadedFile::fake()->image('test.jpg')->size(5120);

        $category= Category::factory()->create();

        $galleries = Gallery::factory()->create([
            'categoryID'=> $category->id,
            'new_photo_path'=>$file,  
            'original_photo_path'=>$file,  
        ]);

        $response = $this->get(route('gallerys.index'));
        $response->assertStatus(200);
        $response->assertViewIs('gallery.gallery');
        $response->assertViewHas('galleries');
    }

    public function test_gallery_management_add_page_render_correctly(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $category= Category::factory()->create();

        $response = $this->get(route('gallerys.create'));
        $response->assertStatus(200);
        $response->assertViewIs('gallery.gallery-add');
        $response->assertViewHas('categories');
    }

    public function test_gallery_management_add_gallery_successfully(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $file = UploadedFile::fake()->image('test1.jpg', 481,297)->size(5120);
        
        $category= Category::factory()->create();

        $data = [
            'categoryID'=> $category->id,
            'new_photo_path'=>$file,
        ];

        $response = $this->post(route('gallerys.store'), $data);
        $response->assertStatus(302);

        // Expected final filename
        $expectedFilename = time() . '_test1.jpg';

        // Expected full path
        $expectedFullPath = public_path('img/admin/gallery/' . $expectedFilename);

        // Check file exists in public folder
        $this->assertFileExists($expectedFullPath);

        // Check database
        $this->assertDatabaseHas('galleries', [
            'categoryID'=> $category->id,
            'new_photo_path'  => 'img/admin/gallery/' . $expectedFilename,
            'original_photo_path'=> 'img/admin/gallery/' . $expectedFilename,
        ]);

        if (file_exists($expectedFullPath)) {
            unlink($expectedFullPath);
        }
    }

    public function test_gallery_management_add_gallery_unsuccesfully_if_input_field_is_blank(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $data = [
            'categoryID'=> '',
            'new_photo_path'=>'',
        ];

        $response = $this->post(route('gallerys.store'), $data);
        $response->assertStatus(302);
        $response->assertSessionHasErrors('categoryID');
        $response->assertSessionHasErrors('new_photo_path');
        
        $this->assertDatabaseCount('galleries', 0);
    }

    public function test_gallery_management_add_gallery_unsuccesfully_if_image_is_larger_than_5MB(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $file = UploadedFile::fake()->image('test1.jpg')->size(5121);
        
        $category= Category::factory()->create();

        $data = [
            'categoryID'=> $category->id,
            'new_photo_path'=>$file,
        ];

        $response = $this->post(route('gallerys.store'), $data);
        $response->assertStatus(302);

        // Expected final filename
        $expectedFilename = time() . '_test1.jpg';

        // Expected full path
        $expectedFullPath = public_path('img/admin/gallery/' . $expectedFilename);

        // Check file exists in public folder
        $this->assertFileDoesNotExist($expectedFullPath);

        // Check database
        $this->assertDatabaseMissing('galleries', [
            'categoryID'=> $category->id,
            'new_photo_path'  => 'img/admin/gallery/' . $expectedFilename,
            'original_photo_path'=> 'img/admin/gallery/' . $expectedFilename,
        ]);
        $this->assertDatabaseCount('galleries',0);
        
    }

    public function test_gallery_management_edit_page_render_correctly(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $file = UploadedFile::fake()->image('test.jpg')->size(5120);

        $category= Category::factory()->create();

        $galleries = Gallery::factory()->create([
            'categoryID'=> $category->id,
            'new_photo_path'=>$file,  
            'original_photo_path'=>$file,  
        ]);

        $response = $this->get(route('gallerys.edit', $galleries));
        $response->assertStatus(200);
        $response->assertViewIs('gallery.gallery-edit');
        $response->assertViewHas('gallery');
        $response->assertViewHas('categories');
    }

    public function test_gallery_management_update_gallery_successfully(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $file = UploadedFile::fake()->image('test1.jpg', 520,360)->size(5120);
        $file2 = UploadedFile::fake()->image('test2.jpg', 520,360)->size(5120);

        $expectedFilename = time() . '_test2.jpg';

        // Expected full path
        $expectedFullPath = public_path('img/admin/gallery/' . $expectedFilename);
        
        // Move fake file to folder manually
        copy($file2->getPathname(), $expectedFullPath);

        $category= Category::factory()->create();

        $gallery = Gallery::factory()->create([
            'categoryID'=> $category->id,
            'new_photo_path'=>'img/admin/gallery/' . $expectedFilename,  
            'original_photo_path'=>'img/admin/gallery/' . $expectedFilename,  
        ]);

        $data = [
            'categoryID'=> $category->id,
            'new_photo_path'=>$file,  
            'original_photo_path'=>$file,  
        ];
        
        $response = $this->put(route('gallerys.update', $gallery), $data);
        $response->assertStatus(302);
        
        // Expected final filename
        $expectedFilename2 = time() . '_test1.jpg';

        // Expected full path
        $expectedFullPath2 = public_path('img/admin/gallery/' . $expectedFilename2);
        
        // Check file exists in public folder
        $this->assertFileExists($expectedFullPath2);
        $this->assertFileDoesNotExist($expectedFullPath);

        // Check database
        $this->assertDatabaseCount('galleries', 1);
        $this->assertDatabaseHas('galleries', [
            'categoryID'=> $category->id,
            'original_photo_path'  => 'img/admin/gallery/' . $expectedFilename2,
            'new_photo_path'  => 'img/admin/gallery/' . $expectedFilename2,
        ]);

        if (file_exists($expectedFullPath2)) {
            unlink($expectedFullPath2);
        }
    }

    public function test_gallery_management_update_gallery_unsuccesfully_if_input_field_is_blank(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $file2 = UploadedFile::fake()->image('test2.jpg', 520,360)->size(5120);

        $expectedFilename = time() . '_test2.jpg';

        // Expected full path
        $expectedFullPath = public_path('img/admin/gallery/' . $expectedFilename);
        
        // Move fake file to folder manually
        copy($file2->getPathname(), $expectedFullPath);

        $category= Category::factory()->create();

        $gallery = Gallery::factory()->create([
            'categoryID'=> $category->id,
            'new_photo_path'=>'img/admin/gallery/' . $expectedFilename,  
            'original_photo_path'=>'img/admin/gallery/' . $expectedFilename,  
        ]);

        $data = [
            'categoryID'=> '',
            'new_photo_path'=>'',   
        ];
        
        $response = $this->put(route('gallerys.update', $gallery), $data);
        $response->assertStatus(302);
        $response->assertSessionHasErrors('categoryID');
        $response->assertSessionDoesntHaveErrors('new_photo_path'); //use back the previous image

        // Check file exists in public folder
        $this->assertFileExists($expectedFullPath);

        // Check database
        $this->assertDatabaseCount('galleries', 1);
        $this->assertDatabaseHas('galleries', [
            'categoryID'=> $category->id,
            'original_photo_path'  => 'img/admin/gallery/' . $expectedFilename,
            'new_photo_path'  => 'img/admin/gallery/' . $expectedFilename,
        ]);

        if (file_exists($expectedFullPath)) {
            unlink($expectedFullPath);
        }
    }

    public function test_gallery_management_update_gallery_unsuccesfully_if_image_is_larger_than_5MB(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $file = UploadedFile::fake()->image('test1.jpg', 520,360)->size(5121);
        $file2 = UploadedFile::fake()->image('test2.jpg', 520,360)->size(5120);

        $expectedFilename = time() . '_test2.jpg';

        // Expected full path
        $expectedFullPath = public_path('img/admin/gallery/' . $expectedFilename);
        
        // Move fake file to folder manually
        copy($file2->getPathname(), $expectedFullPath);

        $category= Category::factory()->create();

        $gallery = Gallery::factory()->create([
            'categoryID'=> $category->id,
            'new_photo_path'=>'img/admin/gallery/' . $expectedFilename,  
            'original_photo_path'=>'img/admin/gallery/' . $expectedFilename,  
        ]);

        $data = [
            'categoryID'=> $category->id,
            'new_photo_path'=>$file,  
            'original_photo_path'=>$file,  
        ];
        
        $response = $this->put(route('gallerys.update', $gallery), $data);
        $response->assertStatus(302);
        $response->assertSessionDoesntHaveErrors('categoryID');
        $response->assertSessionHasErrors('new_photo_path');

        // Expected final filename
        $expectedFilename2 = time() . '_test1.jpg';

        // Expected full path
        $expectedFullPath2 = public_path('img/admin/gallery/' . $expectedFilename2);
        
        // Check file exists in public folder
        $this->assertFileExists($expectedFullPath);
        $this->assertFileDoesNotExist($expectedFullPath2);

        // Check database
        $this->assertDatabaseCount('galleries', 1);
        $this->assertDatabaseHas('galleries', [
            'categoryID'=> $category->id,
            'original_photo_path'  => 'img/admin/gallery/' . $expectedFilename,
            'new_photo_path'  => 'img/admin/gallery/' . $expectedFilename,
        ]);

        if (file_exists($expectedFullPath)) {
            unlink($expectedFullPath);
        }
    }

    public function test_gallery_management_delete_gallery_succesfully(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $file = UploadedFile::fake()->image('test.jpg')->size(5120);
        
        $expectedFilename = time() . '_test.jpg';

        // Expected full path
        $expectedFullPath = public_path('img/admin/gallery/' . $expectedFilename);
        
        // Move fake file to folder manually
        copy($file->getPathname(), $expectedFullPath);
        $category= Category::factory()->create();

        $gallery = Gallery::factory()->create([
            'categoryID'=> $category->id,
            'new_photo_path'=>'img/admin/gallery/' . $expectedFilename,  
            'original_photo_path'=>'img/admin/gallery/' . $expectedFilename,
            'status'=> 0,  
        ]);

        $response = $this->delete(route('gallerys.destroy', $gallery));
        $response->assertStatus(302);
        $this->assertDatabaseCount('galleries', 0); 
        $this->assertFileDoesNotExist($expectedFullPath);
    }

    public function test_gallery_management_activate_gallery_succesfully(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $file = UploadedFile::fake()->image('test.jpg', 520,360)->size(5120);

        $category= Category::factory()->create();

        $gallery = Gallery::factory()->create([
            'categoryID'=> $category->id,
            'new_photo_path'=>$file,  
            'original_photo_path'=>$file,
            'status'=> 0,  
        ]);

        $response = $this->put(route('active-gallery', $gallery));
        $response->assertStatus(302);
        $this->assertDatabaseHas('galleries', [
            'categoryID'=> $category->id, 
            'status'=> 1,              
        ]); 
    }

    public function test_gallery_management_deactivate_gallery_succesfully(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $file = UploadedFile::fake()->image('test.jpg', 520,360)->size(5120);

        $category= Category::factory()->create();

        $gallery = Gallery::factory()->create([
            'categoryID'=> $category->id,
            'new_photo_path'=>$file,  
            'original_photo_path'=>$file,   
        ]);

        $response = $this->put(route('deactive-gallery', $gallery));
        $response->assertStatus(302);
        $this->assertDatabaseHas('galleries', [
            'categoryID'=> $category->id, 
            'status'=> 0,                
        ]);       
    }
}
