<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SubscribeRequest;
use App\Models\Subscribe;

class SubscribeController extends Controller
{
    public function subscribe(SubscribeRequest $request){
        $validated = $request->validated();

        Subscribe::create($validated);
        return view('thankyou');
    }
}
