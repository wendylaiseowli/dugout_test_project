<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EventEnquiryRequest;
use App\Models\EventEnquiry;
use App\Models\Event;
use App\Http\Requests\EventRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    #Public
    public function planEventForm(EventEnquiryRequest $request){
        $validated = $request->validated();

        EventEnquiry::create($validated);
        return view('thankyou');
    }

    #Admin
    public function index(){
        $events= Event::select('id', 'event_name', 'description', 'photo_path', 'event_date', 'event_time', 'status', 'updated_at')->orderBy('updated_at', 'desc')->get();
        return view('event.event', compact('events'));
    }

    public function create(){
        return view('event.event-add');
    }

    public function store(EventRequest $request){
        $validated = $request->validated();
        
        $validated['event_location']= 'Oasis Square, Jalan PJU 1A/7A, Ara Damansara, Petaling Jaya, Malaysia';
        $validated['userID']= Auth::id();

        if ($request->hasFile('photo_path')) {

            $file = $request->file('photo_path');
            $folder = 'img/admin/gallery'; 

            // Full path to the folder
            $fullPath = public_path($folder);

            // Create folder if it doesn't exist
            if (!file_exists($fullPath)) {
                mkdir($fullPath, 0755, true); // 0755 gives read/write/execute for owner
            }

            // Create filename
            $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());

            // Move the file to the folder
            $file->move($fullPath, $filename);

            $validated['photo_path'] = $folder . '/' . $filename;

        } else {
            return redirect()->back()
                ->withErrors(['original_photo_path' => 'The original photo path failed to upload'])
                ->withInput();
        }

        // Convert date and time to proper DB format
        if (!empty($validated['event_date']) && !empty($validated['event_time'])) {
            // Combine date and time into one datetime
            $datetime = Carbon::createFromFormat(
                'd/m/Y H:i',
                $validated['event_date'] . ' ' . $validated['event_time']
            );

            $validated['event_date'] = $datetime->format('Y-m-d H:i:s');
            $validated['event_time'] = $datetime->format('Y-m-d H:i:s');
        }

        Event::create($validated);

        return redirect('/events')->with('success', 'Event successfully added');
    }

    public function show(){

    }

    public function edit(Event $event){
        return view('event.event-edit', compact('event'));
    }

    public function update(EventRequest $request, Event $event){
        $validated = $request->validated();
        
        $validated['event_location']= 'Oasis Square, Jalan PJU 1A/7A, Ara Damansara, Petaling Jaya, Malaysia';
        $validated['userID']= Auth::id();

        if ($request->hasFile('photo_path')) {

            $file = $request->file('photo_path');
            $folder = 'img/admin/gallery';    

            // Full path to the folder
            $fullPath = public_path($folder);

            // Create folder if it doesn't exist
            if (!file_exists($fullPath)) {
                mkdir($fullPath, 0755, true); // 0755 gives read/write/execute for owner
            }

            // Create filename
            $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());

            // Move the file to the folder
            $file->move($fullPath, $filename);

            //Delete the old one
            if($event->photo_path && file_exists(public_path($event->photo_path))){
                unlink(public_path($event->photo_path));
            }

            $validated['photo_path'] = $folder . '/' . $filename;

        } else {
            // No new image uploaded (keep old one) 
            $validated['photo_path'] = $event->photo_path;
        }

        // Convert date and time to proper DB format
        if (!empty($validated['event_date']) && !empty($validated['event_time'])) {
            // Combine date and time into one datetime
            $datetime = Carbon::createFromFormat(
                'd/m/Y H:i',
                $validated['event_date'] . ' ' . $validated['event_time']
            );

            $validated['event_date'] = $datetime->format('Y-m-d H:i:s');
            $validated['event_time'] = $datetime->format('Y-m-d H:i:s');
        }

        $event->update($validated);

        return redirect('/events')->with('success', 'Event has been successfully edited');
    }

    public function destroy(Event $event){
        $event->delete();

        //Delete the old one
        if($event->photo_path && file_exists(public_path($event->photo_path))){
            unlink(public_path($event->photo_path));
        }
        
        return redirect('/events')->with('success', 'Event has been successfully deleted');
    }

    public function active(Event $event){
        $event->update(['status'=> true]);
        return redirect('/events')->with('success', 'Event has been successfully activated');
    }

    public function deactive(Event $event){
        $event->update(['status'=> false]);
        return redirect('/events')->with('success', 'Event has been successfully activated');
    }
}