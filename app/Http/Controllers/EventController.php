<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use App\Models\EventEnquiry;

class EventController extends Controller
{
    public function planEventForm(EventRequest $request){
        $validated = $request->validated();

        EventEnquiry::create($validated);
        return view('thankyou');
    }
}
