<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\SubCategory;

class MenuController extends Controller
{
    function getMenuItems(){
        //Food
        $categoryStarter = SubCategory::latest()->where('name', 'Starters')->first();
        $categoryMain = SubCategory::latest()->where('name', 'Mains')->first();
        $categoryBurger = SubCategory::latest()->where('name', 'Burgers')->first();
        $categoryPizza = SubCategory::latest()->where('name', 'Pizza')->first();
        $categoryAsian = SubCategory::latest()->where('name', 'Asian')->first();
        $categoryDessert = SubCategory::latest()->where('name', 'Dessert')->first();

        $starters = $categoryStarter ? $categoryStarter->menuItems->where('status', true) :collect();
        $mains = $categoryMain ? $categoryMain->menuItems->where('status', true) :collect();
        $burgers = $categoryBurger ? $categoryBurger->menuItems->where('status', true) :collect();
        $pizzas = $categoryPizza ? $categoryPizza->menuItems->where('status', true) :collect();
        $asians = $categoryAsian ? $categoryAsian->menuItems->where('status', true) :collect();
        $desserts = $categoryDessert ? $categoryDessert->menuItems->where('status', true) :collect();

        //Drinks
        $categoryCocktail = SubCategory::latest()->where('name', 'Cocktails')->first();
        $categoryNonAlcoholic = SubCategory::latest()->where('name', 'Non-Alcoholic')->first();
        $categoryLiquor = SubCategory::latest()->where('name', 'Liqour')->first();
        $categoryShooter = SubCategory::latest()->where('name', 'Shooters')->first();
        $categoryWine = SubCategory::latest()->where('name', 'Wine')->first();
        $categoryBeer = SubCategory::latest()->where('name', 'Beers')->first();

        $cocktails = $categoryCocktail ? $categoryCocktail->menuItems->where('status', true) :collect();
        $nonAlcoholics = $categoryNonAlcoholic ? $categoryNonAlcoholic->menuItems->where('status', true) :collect();
        $liquors = $categoryLiquor ? $categoryLiquor->menuItems->where('status', true) :collect();
        $shooters = $categoryShooter ? $categoryShooter->menuItems->where('status', true) :collect();
        $wines = $categoryWine ? $categoryWine->menuItems->where('status', true) :collect();
        $beers = $categoryBeer ? $categoryBeer->menuItems->where('status', true) :collect();

        return view('menu', compact('starters', 'mains', 'burgers', 'pizzas', 'asians', 'desserts', 'cocktails', 'nonAlcoholics', 'liquors', 'shooters', 'wines', 'beers'));
    }
}
