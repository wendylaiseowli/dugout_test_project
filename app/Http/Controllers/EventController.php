<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use App\Models\EventEnquiry;

class EventController extends Controller
{
    #Public
    public function planEventForm(EventRequest $request){
        $validated = $request->validated();

        EventEnquiry::create($validated);
        return view('thankyou');
    }

    #Admin
    public function index(){
        return view('event.event');          
    }

    public function ceate(){

    }

    public function store(){
        return view('event.event-add');  
    }

    public function show(){

    }

    public function edit(){
        return view('event.event-edit'); 
    }

    public function update(){

    }

    public function destroy(){

    }
}