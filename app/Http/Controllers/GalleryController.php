<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Category;
class GalleryController extends Controller
{
    #Public
    function getGalleryImages(){
        $foodCategory = Category::where('name', 'Food')->first();
        $foodImages = Gallery::latest()->where('categoryID', $foodCategory->id)->where('status', true)->get();
        $drinkCategory = Category::where('name', 'Drinks')->first();
        $drinkImages = Gallery::latest()->where('categoryID', $drinkCategory->id)->where('status', true)->get();
        $eventCategory = Category::where('name', 'Events')->first();
        $eventImages = Gallery::latest()->where('categoryID', $eventCategory->id)->where('status', true)->get();

        return view('gallery', compact('foodImages', 'drinkImages', 'eventImages'));
    }

    #Admin
    public function index(){
        return view('gallery.gallery');         
    }

    public function ceate(){
        return view('gallery.gallery-add');  
    }

    public function store(){

    }

    public function show(){

    }

    public function edit(){
        return view('gallery.gallery-edit');  
    }

    public function update(){

    }

    public function destroy(){

    }
}
