<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Menu;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

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

    //Admin
    public function test_menu_management_render_index_page_correct_and_successfully(){
        $menu = Menu::factory()->create();
        $category = Category::factory()->create();
        $subcategory = SubCategory::factory()->create();
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('menus.index'));
        $response->assertViewIs('menu.menu');
        $response->assertStatus(200);
        $response->assertViewHas('menus');
        $response->assertViewHas('category');
        $response->assertViewHas('subcategory');
    }

    public function test_menu_management_render_create_page_correct_and_successfully(){
        $menu = Menu::factory()->create();
        $user = User::factory()->create();
        $subcategory = Subcategory::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('menus.create'));
        $response->assertViewIs('menu.menu-add');
        $response->assertStatus(200);
        $response->assertViewHas('subcategory');
    }

    public function test_menu_management_created_successfully(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $category = Category::factory()->create();
        $subcategory = SubCategory::factory()->create();

        $data = [
            'menu_item_name' => 'burger king soy sauce',
            'menu_item_description'=> 'burger with king soy sauce',
            'price' => '100',
            'subCategoryID'=> $subcategory->id,
        ];

        $response = $this->post(route('menus.store'), $data);
        $response->assertStatus(302);
        $this->assertDatabaseCount('menus', 1);
        $this->assertDatabaseHas('menus',[
            'menu_item_name' => 'burger king soy sauce',
            'menu_item_description'=> 'burger with king soy sauce',
            'price' => '100',
        ]);
    }

    public function test_menu_management_created_unsuccessfully_if_input_field_is_blank(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $data = [
            'menu_item_name' => '',
            'menu_item_description'=> '',
            'price' => '',
            'subCategoryID'=> null,
        ];

        $response = $this->post(route('menus.store'), $data);
        $response->assertStatus(302);
        $response->assertSessionHasErrors('menu_item_name');
        $response->assertSessionHasErrors('menu_item_description');
        $response->assertSessionHasErrors('price');
        $response->assertSessionHasErrors('subCategoryID');
        $this->assertDatabaseCount('menus', 0);
        $this->assertDatabaseMissing('menus',[
            'menu_item_name' => '',
            'menu_item_description'=> '',
            'price' => '',
        ]);
    }

    public function test_menu_management_created_unsuccessfully_if_price_is_not_integer(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $category = Category::factory()->create();
        $subcategory = SubCategory::factory()->create();

        $data = [
            'menu_item_name' => 'burger king soy sauce',
            'menu_item_description'=> 'burger with king soy sauce',
            'price' => 'cvbnm',
            'subCategoryID'=> $subcategory->id,
        ];

        $response = $this->post(route('menus.store'), $data);
        $response->assertStatus(302);
        $response->assertSessionHasErrors('price');
        $response->assertSessionDoesntHaveErrors('menu_item_description');
        $response->assertSessionDoesntHaveErrors('menu_item_name');
        $response->assertSessionDoesntHaveErrors('subCategoryID');
        $this->assertDatabaseCount('menus', 0);
        $this->assertDatabaseMissing('menus',[
            'menu_item_name' => 'burger king soy sauce',
            'menu_item_description'=> 'burger with king soy sauce',
            'price' => 'cvbnm',
        ]);        
    }

    public function test_menu_management_created_unsuccessfully_if_price_is_negative(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $category = Category::factory()->create();
        $subcategory = SubCategory::factory()->create();

        $data = [
            'menu_item_name' => 'burger king soy sauce',
            'menu_item_description'=> 'burger with king soy sauce',
            'price' => -21,
            'subCategoryID'=> $subcategory->id,
        ];

        $response = $this->post(route('menus.store'), $data);
        $response->assertStatus(302);
        $response->assertSessionHasErrors('price');
        $response->assertSessionDoesntHaveErrors('menu_item_description');
        $response->assertSessionDoesntHaveErrors('menu_item_name');
        $response->assertSessionDoesntHaveErrors('subCategoryID');
        $this->assertDatabaseCount('menus', 0);
        $this->assertDatabaseMissing('menus',[
            'menu_item_name' => 'burger king soy sauce',
            'menu_item_description'=> 'burger with king soy sauce',
            'price' => -21,
        ]);        
    }

    public function test_menu_management_created_unsuccessfully_if_price_is_invalid_format(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $category = Category::factory()->create();
        $subcategory = SubCategory::factory()->create();

        $data = [
            'menu_item_name' => 'burger king soy sauce',
            'menu_item_description'=> 'burger with king soy sauce',
            'price' => 10.023,
            'subCategoryID'=> $subcategory->id,
        ];

        $response = $this->post(route('menus.store'), $data);
        $response->assertStatus(302);
        $response->assertSessionHasErrors('price');
        $response->assertSessionDoesntHaveErrors('menu_item_description');
        $response->assertSessionDoesntHaveErrors('menu_item_name');
        $response->assertSessionDoesntHaveErrors('subCategoryID');
        $this->assertDatabaseCount('menus', 0);
        $this->assertDatabaseMissing('menus',[
            'menu_item_name' => 'burger king soy sauce',
            'menu_item_description'=> 'burger with king soy sauce',
            'price' => 10.023,
        ]);        
    }

    public function test_menu_management_render_edit_page_correct_and_successfully(){
        $menu = Menu::factory()->create();
        $user = User::factory()->create();
        $subcategory = Subcategory::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('menus.edit', $menu));
        $response->assertViewIs('menu.menu-edit');
        $response->assertStatus(200);
        $response->assertViewHas('subcategory');
        $response->assertViewHas('menu');
    }

    public function test_menu_management_updated_successfully(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $category = Category::factory()->create();
        $subcategory = SubCategory::factory()->create();
        $subcategory2 = SubCategory::factory()->create();

        $menu = Menu::factory()->create([
            'menu_item_name' => 'burger queen',
            'menu_item_description'=> 'burger with queen soy sauce',
            'price' => '200',
            'subCategoryID'=> $subcategory->id,            
        ]);

        $data = [
            'menu_item_name' => 'burger king soy sauce',
            'menu_item_description'=> 'burger with king soy sauce',
            'price' => '100',
            'subCategoryID'=> $subcategory2->id,
        ];

        $response = $this->put(route('menus.update', $menu), $data);
        $response->assertStatus(302);

        $this->assertDatabaseCount('menus', 1);
        $this->assertDatabaseHas('menus',[
            'menu_item_name' => 'burger king soy sauce',
            'menu_item_description'=> 'burger with king soy sauce',
            'price' => '100',
            'subCategoryID'=> $subcategory2->id,
        ]);
        $this->assertDatabaseMissing('menus',[
            'menu_item_name' => 'burger queen',
            'menu_item_description'=> 'burger with queen soy sauce',
            'price' => '200',
            'subCategoryID'=> $subcategory->id, 
        ]);         
    }

    public function test_menu_management_updated_unsuccessfully_if_input_field_is_blank(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $category = Category::factory()->create();
        $subcategory = SubCategory::factory()->create();

        $menu = Menu::factory()->create([
            'menu_item_name' => 'burger queen',
            'menu_item_description'=> 'burger with queen soy sauce',
            'price' => '200',
            'subCategoryID'=> $subcategory->id,            
        ]);

        $data = [
            'menu_item_name' => '',
            'menu_item_description'=> '',
            'price' => '',
            'subCategoryID'=> null,
        ];

        $response = $this->put(route('menus.update', $menu), $data);
        $response->assertStatus(302);
        $response->assertSessionHasErrors('menu_item_name');
        $response->assertSessionHasErrors('menu_item_description');
        $response->assertSessionHasErrors('price');
        $response->assertSessionHasErrors('subCategoryID');

        $this->assertDatabaseCount('menus', 1);
        $this->assertDatabaseHas('menus',[
            'menu_item_name' => 'burger queen',
            'menu_item_description'=> 'burger with queen soy sauce',
            'price' => '200',
            'subCategoryID'=> $subcategory->id,   
        ]);
        $this->assertDatabaseMissing('menus',[
            'menu_item_name' => '',
            'menu_item_description'=> '',
            'price' => '',
            'subCategoryID'=> null,
        ]);       
    }

    public function test_menu_management_updated_unsuccessfully_if_input_field_is_not_integer(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $category = Category::factory()->create();
        $subcategory = SubCategory::factory()->create();

        $menu = Menu::factory()->create([
            'menu_item_name' => 'burger queen',
            'menu_item_description'=> 'burger with queen soy sauce',
            'price' => '200',
            'subCategoryID'=> $subcategory->id,            
        ]);

        $data = [
            'menu_item_name' => 'burger king soy sauce',
            'menu_item_description'=> 'burger with king soy sauce',
            'price' => 'EVBNM,',
            'subCategoryID'=> $subcategory->id,
        ];

        $response = $this->put(route('menus.update', $menu), $data);
        $response->assertStatus(302);
        $response->assertSessionDoesntHaveErrors('menu_item_name');
        $response->assertSessionDoesntHaveErrors('menu_item_description');
        $response->assertSessionHasErrors('price');
        $response->assertSessionDoesntHaveErrors('subCategoryID');

        $this->assertDatabaseCount('menus', 1);
        $this->assertDatabaseHas('menus',[
            'menu_item_name' => 'burger queen',
            'menu_item_description'=> 'burger with queen soy sauce',
            'price' => '200',
            'subCategoryID'=> $subcategory->id,   
        ]);
        $this->assertDatabaseMissing('menus',[
            'menu_item_name' => 'burger king soy sauce',
            'menu_item_description'=> 'burger with king soy sauce',
            'price' => 'EVBNM,',
            'subCategoryID'=> $subcategory->id,
        ]);        
    }

    public function test_menu_management_updated_unsuccessfully_if_price_is_negative(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $category = Category::factory()->create();
        $subcategory = SubCategory::factory()->create();

        $menu = Menu::factory()->create([
            'menu_item_name' => 'burger queen',
            'menu_item_description'=> 'burger with queen soy sauce',
            'price' => '200',
            'subCategoryID'=> $subcategory->id,            
        ]);

        $data = [
            'menu_item_name' => 'burger king soy sauce',
            'menu_item_description'=> 'burger with king soy sauce',
            'price' => -89.236,
            'subCategoryID'=> $subcategory->id,
        ];

        $response = $this->put(route('menus.update', $menu), $data);
        $response->assertStatus(302);
        $response->assertSessionDoesntHaveErrors('menu_item_name');
        $response->assertSessionHasErrors('price');
        $response->assertSessionDoesntHaveErrors('menu_item_description');
        $response->assertSessionDoesntHaveErrors('subCategoryID');

        $this->assertDatabaseCount('menus', 1);
        $this->assertDatabaseHas('menus',[
            'menu_item_name' => 'burger queen',
            'menu_item_description'=> 'burger with queen soy sauce',
            'price' => '200',
            'subCategoryID'=> $subcategory->id,   
        ]);
        $this->assertDatabaseMissing('menus',[
            'menu_item_name' => 'burger king soy sauce',
            'menu_item_description'=> 'burger with king soy sauce',
            'price' => -89.236,
            'subCategoryID'=> $subcategory->id,
        ]);       
    }

    public function test_menu_management_updated_unsuccessfully_if_price_is_invalid_format(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $category = Category::factory()->create();
        $subcategory = SubCategory::factory()->create();

        $menu = Menu::factory()->create([
            'menu_item_name' => 'burger queen',
            'menu_item_description'=> 'burger with queen soy sauce',
            'price' => '200',
            'subCategoryID'=> $subcategory->id,            
        ]);

        $data = [
            'menu_item_name' => 'burger king soy sauce',
            'menu_item_description'=> 'burger with king soy sauce',
            'price' => 12.503,
            'subCategoryID'=> $subcategory->id,
        ];

        $response = $this->put(route('menus.update', $menu), $data);
        $response->assertStatus(302);
        $response->assertSessionDoesntHaveErrors('menu_item_name');
        $response->assertSessionHasErrors('price');
        $response->assertSessionDoesntHaveErrors('menu_item_description');
        $response->assertSessionDoesntHaveErrors('subCategoryID');

        $this->assertDatabaseCount('menus', 1);
        $this->assertDatabaseHas('menus',[
            'menu_item_name' => 'burger queen',
            'menu_item_description'=> 'burger with queen soy sauce',
            'price' => '200',
            'subCategoryID'=> $subcategory->id,   
        ]);
        $this->assertDatabaseMissing('menus',[
            'menu_item_name' => 'burger king soy sauce',
            'menu_item_description'=> 'burger with king soy sauce',
            'price' => 12.503,
            'subCategoryID'=> $subcategory->id,
        ]);        
    }

    public function test_menu_management_deactive_menu_successfully(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $category = Category::factory()->create();
        $subcategory = SubCategory::factory()->create();
        $menu = Menu::factory()->create([
            'menu_item_name' => 'burger queen',
            'menu_item_description'=> 'burger with queen soy sauce',
            'price' => '200',
            'subCategoryID'=> $subcategory->id,
            'status'=> 1,        
        ]);

        $response = $this->put(route('deactive-menu', $menu));
        $response->assertStatus(302);

        $this->assertDatabaseCount('menus', 1);
        $this->assertDatabaseHas('menus',[
            'menu_item_name' => 'burger queen',
            'menu_item_description'=> 'burger with queen soy sauce',
            'price' => '200',
            'subCategoryID'=> $subcategory->id,
            'status'=>0,  
        ]);
        $this->assertDatabaseMissing('menus',[
            'menu_item_name' => 'burger queen',
            'menu_item_description'=> 'burger with queen soy sauce',
            'price' => '200',
            'subCategoryID'=> $subcategory->id,
            'status'=>1,
        ]);    
    }

    public function test_menu_management_active_menu_successfully(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $category = Category::factory()->create();
        $subcategory = SubCategory::factory()->create();
        $menu = Menu::factory()->create([
            'menu_item_name' => 'burger queen',
            'menu_item_description'=> 'burger with queen soy sauce',
            'price' => '200',
            'subCategoryID'=> $subcategory->id,
            'status'=> 1,        
        ]);

        $response = $this->put(route('active-menu', $menu));
        $response->assertStatus(302);

        $this->assertDatabaseCount('menus', 1);
        $this->assertDatabaseHas('menus',[
            'menu_item_name' => 'burger queen',
            'menu_item_description'=> 'burger with queen soy sauce',
            'price' => '200',
            'subCategoryID'=> $subcategory->id,
            'status'=>1,  
        ]);
        $this->assertDatabaseMissing('menus',[
            'menu_item_name' => 'burger queen',
            'menu_item_description'=> 'burger with queen soy sauce',
            'price' => '200',
            'subCategoryID'=> $subcategory->id,
            'status'=>0,
        ]);    
    }

    public function test_menu_management_delete_menu_successfully(){
        $user = User::factory()->create();
        $this->actingAs($user);

        $category = Category::factory()->create();
        $subcategory = SubCategory::factory()->create();
        $menu = Menu::factory()->create([
            'menu_item_name' => 'burger queen',
            'menu_item_description'=> 'burger with queen soy sauce',
            'price' => '200',
            'subCategoryID'=> $subcategory->id,
            'status'=> 1,        
        ]);

        $response = $this->delete(route('menus.destroy', $menu));
        $response->assertStatus(302);

        $this->assertDatabaseCount('menus', 0);        
    }
}
