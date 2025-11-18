<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Menu;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MenuTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    // public function test_example(): void
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }
    use RefreshDatabase;
    public function test_food_and_drink_exist(){

        $foodcategory = Category::factory()->has(
            Subcategory::factory()->has(
                Menu::factory()->count(5), 'menuItems'
            )->count(6), 'subcategories'
        )->create(['name'=>'Food']);
        
        $drinkCategory = Category::factory()->has(
            SubCategory::factory()->has(
                Menu::factory()->count(5), 'menuItems'
            )->count(6), 'subcategories'
        )->create(['name'=>'Drinks']);

        $response = $this->get('menu');

        $response->assertStatus(200);
        $response->assertViewHas('starters');
        $response->assertViewHas('mains');
        $response->assertViewHas('burgers');
        $response->assertViewHas('pizzas');
        $response->assertViewHas('asians');
        $response->assertViewHas('desserts');
        $response->assertViewHas('cocktails');
        $response->assertViewHas('nonAlcoholics');
        $response->assertViewHas('liquors');
        $response->assertViewHas('shooters');
        $response->assertViewHas('wines');
        $response->assertViewHas('beers');
    }

    public function test_food_and_drink_do_not_exist(){

        $response = $this->get('menu');

        $response->assertStatus(200);
        $response->assertSee('Coming Soon');
    }

    // public function test_food_starters(){
    //     $foodStarter = SubCategory::factory()->has(Menu::factory()->count(3))->create(['name'=>'Starters']);

    //     $response = $this->get('menu');
    //     $response->assertStatus(200);
    //     $response->assertViewHas('starters');
    //     foreach($foodStarter->menuItems as $item){
    //         $response->assertSee($item->menu_item_name);
    //         $response->assertSee($item->menu_item_description);
    //         $response->assertSee($item->price);
    //     }
    // }
    // public function test_food_mains(){
    //     $foodMains = SubCategory::factory()->has(Menu::factory()->count(3))->create(['name'=>'Mains']);

    //     $response = $this->get('menu');
    //     $response->assertStatus(200);
    //     $response->assertViewHas('mains');
    //     foreach($foodMains as $item){
    //         $response->assertSee($item->menu_item_name);
    //         $response->assertSee($item->menu_item_description);
    //         $response->assertSee($item->price);
    //     }
    // }

    // public function test_food_burgers(){
    //     $foodBurgers = SubCategory::factory()->has(Menu::factory()->count(3))->create(['name'=>'Burgers']);

    //     $response = $this->get('menu');
    //     $response->assertStatus(200);
    //     $response->assertViewHas('burgers');
    //     foreach($foodBurgers as $item){
    //         $response->assertSee($item->menu_item_name);
    //         $response->assertSee($item->menu_item_description);
    //         $response->assertSee($item->price);
    //     }
    // }

    // public function test_food_pizzas(){
    //     $foodPizza = SubCategory::factory()->has(Menu::factory()->count(3))->create(['name'=>'Pizza']);

    //     $response = $this->get('menu');
    //     $response->assertStatus(200);
    //     $response->assertViewHas('pizza');
    //     foreach($foodPizza as $item){
    //         $response->assertSee($item->menu_item_name);
    //         $response->assertSee($item->menu_item_description);
    //         $response->assertSee($item->price);
    //     }        
    // }

    // public function test_food_assians(){
    //     $foodAsian = SubCategory::factory()->has(Menu::factory()->count(3))->create(['name'=>'Assians']);

    //     $response = $this->get('menu');
    //     $response->assertStatus(200);
    //     $response->assertViewHas('asians');
    //     foreach($foodAsian as $item){
    //         $response->assertSee($item->menu_item_name);
    //         $response->assertSee($item->menu_item_description);
    //         $response->assertSee($item->price);
    //     }          
    // }

    // public function test_food_desserts(){
    //     $foodDessert = SubCategory::factory()->has(Menu::factory()->count(3))->create(['name'=>'desserts']);

    //     $response = $this->get('menu');
    //     $response->assertStatus(200);
    //     $response->assertViewHas('desserts');
    //     foreach($foodDessert as $item){
    //         $response->assertSee($item->menu_item_name);
    //         $response->assertSee($item->menu_item_description);
    //         $response->assertSee($item->price);
    //     }         
    // }

    // public function test_drink_cocktails(){
    //     $foodDessert = SubCategory::factory()->has(Menu::factory()->count(3))->create(['name'=>'desserts']);

    //     $response = $this->get('menu');
    //     $response->assertStatus(200);
    //     $response->assertViewHas('desserts');
    //     foreach($foodDessert as $item){
    //         $response->assertSee($item->menu_item_name);
    //         $response->assertSee($item->menu_item_description);
    //         $response->assertSee($item->price);
    //     }         
    // }

    // public function test_drink_nonAlcoholics(){
        
    // }

    // public function test_drink_wines(){
        
    // }


    // public function test_drink_shooters(){
        
    // }

    // public function test_drink_liquors(){
        
    // }


    // public function test_drink_beers(){
        
    // }
}
