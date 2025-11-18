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
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Refresh the default database
        $this->artisan('migrate:fresh');

        // Refresh the second database
        $this->artisan('migrate:fresh', ['--database' => 'mysql2']);
    }

    public function test_food_and_drink_do_not_exist(){

        $response = $this->get('menu');

        $response->assertStatus(200);
        $response->assertSee('Coming Soon');
    }

    public function test_food_and_drink_only_show_for_active_status(){
        $subcategory = SubCategory::factory()->create(['name'=>'Starters']);
        $food1 = Menu::factory()->create(['menu_item_name'=>'test1 food', 'status'=> false, 'subCategoryID'=> $subcategory->id]);
        $food2 = Menu::factory()->create(['menu_item_name'=>'test2 food', 'status'=> true, 'subCategoryID'=> $subcategory->id]);
        $food3 = Menu::factory()->create(['menu_item_name'=>'test3 food', 'status'=> true, 'subCategoryID'=> $subcategory->id]);
        
        $response = $this->get('menu');

        $response->assertStatus(200);
        $response->assertSee('test2 food');
        $response->assertSee('test3 food');
        $response->assertDontSee('test1 food');
    }

    public function test_food_starters(){
        $foodStarter = Category::factory()->has(SubCategory::factory()->has(Menu::factory()->count(3), 'menuItems')->state(['name'=>'Starters']))->create(['name'=>'Food']);
        
        $response = $this->get('menu');
        $response->assertStatus(200);
        $response->assertViewHas('starters');

        $starterSubCategory = $foodStarter->subcategories->first();
        foreach($starterSubCategory->menuItems as $item){
            $response->assertSee($item->menu_item_name);
            $response->assertSee($item->menu_item_description);
            $response->assertSee($item->price);
        }
    }

    public function test_food_mains(){
        $foodMains = SubCategory::factory()->has(Menu::factory()->count(3), 'menuItems')->create(['name'=>'Mains']);

        $response = $this->get('menu');
        $response->assertStatus(200);
        $response->assertViewHas('mains');
        foreach($foodMains->menuItems as $item){
            $response->assertSee($item->menu_item_name);
            $response->assertSee($item->menu_item_description);
            $response->assertSee($item->price);
        }
    }

    public function test_food_burgers(){
        $foodBurgers = SubCategory::factory()->has(Menu::factory()->count(3), 'menuItems')->create(['name'=>'Burgers']);

        $response = $this->get('menu');
        $response->assertStatus(200);
        $response->assertViewHas('burgers');
        foreach($foodBurgers->menuItems as $item){
            $response->assertSee($item->menu_item_name);
            $response->assertSee($item->menu_item_description);
            $response->assertSee($item->price);
        }
    }

    public function test_food_pizzas(){
        $foodPizza = SubCategory::factory()->has(Menu::factory()->count(3), 'menuItems')->create(['name'=>'Pizza']);

        $response = $this->get('menu');
        $response->assertStatus(200);
        $response->assertViewHas('pizzas');
        foreach($foodPizza->menuItems as $item){
            $response->assertSee($item->menu_item_name);
            $response->assertSee($item->menu_item_description);
            $response->assertSee($item->price);
        }        
    }

    public function test_food_assians(){
        $foodAsian = SubCategory::factory()->has(Menu::factory()->count(3), 'menuItems')->create(['name'=>'Asian']);

        $response = $this->get('menu');
        $response->assertStatus(200);
        $response->assertViewHas('asians');
        foreach($foodAsian->menuItems as $item){
            $response->assertSee($item->menu_item_name);
            $response->assertSee($item->menu_item_description);
            $response->assertSee($item->price);
        }          
    }

    public function test_food_desserts(){
        $foodDessert = SubCategory::factory()->has(Menu::factory()->count(3), 'menuItems')->create(['name'=>'Dessert']);

        $response = $this->get('menu');
        $response->assertStatus(200);
        $response->assertViewHas('desserts');
        foreach($foodDessert->menuItems as $item){
            $response->assertSee($item->menu_item_name);
            $response->assertSee($item->menu_item_description);
            $response->assertSee($item->price);
        }         
    }

    public function test_drink_cocktails(){
        $drinks = SubCategory::factory()->has(Menu::factory()->count(3), 'menuItems')->create(['name'=>'Cocktails']);

        $response = $this->get('menu');
        $response->assertStatus(200);
        $response->assertViewHas('cocktails');
        foreach($drinks->menuItems as $item){
            $response->assertSee($item->menu_item_name);
            $response->assertSee($item->menu_item_description);
            $response->assertSee($item->price);
        }         
    }

    public function test_drink_nonAlcoholics(){
        $drinks = SubCategory::factory()->has(Menu::factory()->count(3), 'menuItems')->create(['name'=>'Non-Alcoholic']);

        $response = $this->get('menu');
        $response->assertStatus(200);
        $response->assertViewHas('nonAlcoholics');
        foreach($drinks->menuItems as $item){
            $response->assertSee($item->menu_item_name);
            $response->assertSee($item->menu_item_description);
            $response->assertSee($item->price);
        }            
    }

    public function test_drink_wines(){
        $drinks = SubCategory::factory()->has(Menu::factory()->count(3), 'menuItems')->create(['name'=>'Wine']);

        $response = $this->get('menu');
        $response->assertStatus(200);
        $response->assertViewHas('wines');
        foreach($drinks->menuItems as $item){
            $response->assertSee($item->menu_item_name);
            $response->assertSee($item->menu_item_description);
            $response->assertSee($item->price);
        }             
    }

    public function test_drink_shooters(){
        $drinks = SubCategory::factory()->has(Menu::factory()->count(3), 'menuItems')->create(['name'=>'Shooters']);

        $response = $this->get('menu');
        $response->assertStatus(200);
        $response->assertViewHas('shooters');
        foreach($drinks->menuItems as $item){
            $response->assertSee($item->menu_item_name);
            $response->assertSee($item->menu_item_description);
            $response->assertSee($item->price);
        }       
    }

    public function test_drink_liquors(){
        $drinks = SubCategory::factory()->has(Menu::factory()->count(3), 'menuItems')->create(['name'=>'Liqour']);

        $response = $this->get('menu');
        $response->assertStatus(200);
        $response->assertViewHas('liquors');
        foreach($drinks->menuItems as $item){
            $response->assertSee($item->menu_item_name);
            $response->assertSee($item->menu_item_description);
            $response->assertSee($item->price);
        }    
    }

    public function test_drink_beers(){
        $drinks = SubCategory::factory()->has(Menu::factory()->count(3), 'menuItems')->create(['name'=>'Beers']);

        $response = $this->get('menu');
        $response->assertStatus(200);
        $response->assertViewHas('beers');
        foreach($drinks->menuItems as $item){
            $response->assertSee($item->menu_item_name);
            $response->assertSee($item->menu_item_description);
            $response->assertSee($item->price);
        }
    }
}
