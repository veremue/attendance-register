<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventOwner;
use App\Models\Person;
use App\Models\EventManager;
use App\Models\EventRegister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  
        $events = Event::orderBy('created_at','desc')->get();
        $people = Person::orderBy('first_name')->get();
        $event_owners = EventOwner::orderBy('event_manager_name')->get();
        return view('events.index',['events'=>$events,'people'=>$people,'event_owners'=>$event_owners]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $event = new Event();
        $event->event_name = $request->event_name;
        $event->event_type = $request->event_type;
        $event->event_next_date = $request->event_next_date;
        $event->event_description = $request->event_description;
        $event->save();

        $event_manager = new EventManager();
        $event_manager->event_owner_id = $request->event_manager_name;
        $event_manager->event_id = $event->id;
        $event_manager->save();

        if(!empty($request->invitees))
        {
            foreach($request->invitees as $invitee)
            {
                $event_register = new EventRegister();
                $event_register->person_id = $invitee;
                $event_register->event_id = $event->id;
                $event_register->user_id = $user_id;
                $event_register->save();
            }
        }

        return back()->with('status','Event successfully saved!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
