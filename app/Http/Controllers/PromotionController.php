<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;

class PromotionController extends Controller
{
    #Public
    function getPromotionDetails(){
        $promotions = Promotion::latest()->where('status', true)->get();
        return view('promotion', compact('promotions'));
    }

    #Admin
    public function index(){
        return view('promotion.promo');    
    }

    public function ceate(){
        return view('promotion.promo-add'); 
    }

    public function store(){

    }

    public function show(){

    }

    public function edit(){
        return view('promotion.promo-edit');
    }

    public function update(){

    }

    public function destroy(){

    }
}
