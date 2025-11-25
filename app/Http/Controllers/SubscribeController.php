<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SubscribeRequest;
use App\Models\Subscribe;

class SubscribeController extends Controller
{
    #public
    public function subscribe(SubscribeRequest $request){
        $validated = $request->validated();

        Subscribe::create($validated);
        return view('thankyou');
    }

    #Admin
    public function index(){
        $subscribers= Subscribe::latest()->get();
        return view('subscriber.subscribers', compact('subscribers'));   
    }
}
