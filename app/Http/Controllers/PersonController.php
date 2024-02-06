<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Brian2694\Toastr\Toastr;
use Illuminate\Database\Query\Processors\PostgresProcessor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $people = Person::orderBy('first_name')->get();
        return view('people.index',['people'=>$people]);
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
        $person = new Person();
        $person->first_name = $request->first_name;
        $person->last_name = $request->last_name;
        $person->email = $request->email;
        $person->phone_number = $request->phone_number;
        $person->address = $request->address;
        $person->user_id = Auth::user()->id;
        $person->save();

        return back()->with('status','Person successfully saved!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Person $person)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Person $person)
    {
        // dd($person);
        // dd($request);
        $person->first_name = $request->edit_first_name;
        $person->last_name = $request->edit_last_name;
        $person->email = $request->edit_email;
        $person->phone_number = $request->edit_phone_number;
        $person->address = $request->edit_address;
        $person->update();

        return back()->with('status','Person successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person)
    {
        //
    }
}
