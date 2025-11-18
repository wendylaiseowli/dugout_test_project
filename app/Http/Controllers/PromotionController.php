<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;

class PromotionController extends Controller
{
    function getPromotionDetails(){
        $promotions = Promotion::latest()->where('status', true)->get();
        return view('promotion', compact('promotions'));
    }
}
