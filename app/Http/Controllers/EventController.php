<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventOwner;
use App\Models\Person;
use Illuminate\Http\Request;

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
        dd($request);
        // "event_name" => "Ed"
        // "event_type" => "Service"
        // "event_next_date" => "2024-02-18"
        // "event_description" => null
        // "event_manager_name" => "2"
        // "invitees" => array:2 [▼
        // 0 => "2"
        // 1 => "3"
        //   ]
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
