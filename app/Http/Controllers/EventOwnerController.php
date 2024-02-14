<?php

namespace App\Http\Controllers;

use App\Models\EventOwner;
use Illuminate\Http\Request;

class EventOwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $event_owners = EventOwner::orderBy('event_manager_name')->get();
        return view('event-owners.index',['event_owners'=>$event_owners]);
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
        $event_owner = new EventOwner();
        $event_owner->event_manager_name = $request->event_manager_name;
        $event_owner->event_manager_email = $request->event_manager_email;
        $event_owner->event_manager_phone = $request->event_manager_phone;
        $event_owner->save();
        return back()->with('status','Event owner successfully saved!');
    }

    /**
     * Display the specified resource.
     */
    public function show(EventOwner $eventOwner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EventOwner $eventOwner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EventOwner $eventOwner)
    {
        $eventOwner->event_manager_name = $request->edit_event_manager_name;
        $eventOwner->event_manager_email = $request->edit_event_manager_email;
        $eventOwner->event_manager_phone = $request->edit_event_manager_phone;
        $eventOwner->update();

        return back()->with('status','Person successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventOwner $eventOwner)
    {
        //
    }
}
