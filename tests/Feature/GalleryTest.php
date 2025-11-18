<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Gallery;
use App\Models\Category;

class GalleryTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */

    // public function test_example(): void
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }
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

        $response->assertSee('COMING SOON');
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
        //count it is just 1
    }

    

    public function test_gallery_record_do_not_exist(){
        $foodcategory = Category::factory()->create(['name'=> 'Food']);
        $drinkcategory = Category::factory()->create(['name'=> 'Drinks']);
        $eventcategory = Category::factory()->create(['name'=> 'Events']);
        $response = $this->get('gallery');

        $response->assertStatus(200);
        $response->assertSee('COMING SOON');
    }

}
