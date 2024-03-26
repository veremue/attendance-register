@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Events</li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                <div class="card-body"> 
                    <div class="row">
                        <div class="col-md-6 d-flex justify-content-start">
                            <h3>Events</h3>                            
                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                            <button id="add-entity-button" class="btn" style="font-size: 2.5em; color: Tomato;"><i class="fa-solid fa-plus"></i></button>
                        </div>
                    </div> 

                    <div class="card shadow-lg mb-2 bg-body-tertiary rounded" style="display: none" id="add-entity-form">
                        <div class="card-body">
                            <div class="row">
                                <h5>Add event</h5>
                            </div>
                            
                            <div class="row">
                                <form action="{{route('events.store')}}" method="post">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label class="form-label fw-bolder">Event Name</label>
                                            <input type="text" name="event_name" id="event_name" class="form-control" placeholder="Name" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label fw-bolder">Event Type</label>
                                            <select class="form-select" name="event_type" id="event_type" required>
                                                <option selected value="">Select Event Type</option>
                                                <option value="Prayer">Prayer</option>
                                                <option value="Service">Service</option>
                                                <option value="Meeting">Meeting</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label fw-bolder">Event Date</label>
                                            <input type="date" name="event_next_date" id="event_next_date" class="form-control" placeholder="Date" required>
                                        </div>
                                        
                                    </div>   
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label fw-bolder">Event Description</label>
                                            <input type="text" name="event_description" id="event_description" class="form-control" placeholder="Description">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bolder">Event Owner</label>
                                            <select class="form-select" name="event_manager_name" id="event_manager_name" required>
                                                <option selected value="">Select Event Owner</option>
                                                @foreach($event_owners as $event_owner)
                                                    <option value="{{$event_owner->id}}">{{$event_owner->event_manager_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>   
                                    <div class="row mb-3">
                                        <label class="form-label fw-bolder">Invitees</label>
                                        @foreach($people as $person)
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="{{$person->id}}" name="invitees[]">
                                                    <label class="form-check-label">
                                                        {{$person->first_name}}	{{$person->last_name}}
                                                    </label>
                                                </div>
                                            </div>
                                          @endforeach
                                    </div>                           
                                    <div class="row">
                                        <div class="col-md-12 d-flex justify-content-end">
                                            <button class="btn btn-lg" style="color: Tomato;" type="submit"><i class="fas fa-2x fa-save"></i></button>
                                            <button class="btn btn-lg" style="color: Tomato;" type="button" id="cancel-entity-form"><i class="fa fa-2x fa-times"></i></button>
                                        </div>
                                    </div>                            
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow-lg p-3 mb-2 bg-body-tertiary rounded">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="data-table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Type</th>
                                            <th>Date</th>
                                            <th>Manager</th>
                                            <th>Status</th>
                                            <th>Register Marked</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                        </tr>
                                    </thead>
                                    <tbody>		                                        						
                                        @foreach ($events as $event)
                                            <tr>
                                                <td>{{$event->event_name}}</td>
                                                <td>{{$event->event_description}}</td>
                                                <td>{{$event->event_type}}</td>
                                                <td>{{$event->event_next_date}}</td>
                                                <td>{{$event->event_next_date}}</td>
                                                <td>{{strtoupper($event->event_status)}}</td>
                                                <td>{{$event->event_register_marked ? 'Yes' : 'No'}}</td>
                                                <td class="text-center">
                                                    <a class="btn" href="{{url('events/'.$event->id)}}" style="font-size: 0.7em; color: Tomato;" role="button">
                                                        <i class="fas fa-2x fa-eye"></i>
                                                    </a>
                                                    <button class="btn" style="font-size: 0.7em; color: Tomato;" type="button">
                                                        <i class="fas fa-2x fa-pencil"></i>
                                                    </button>
                                                    <button class="btn" style="font-size: 0.7em; color: Tomato;" type="button">
                                                        <i class="fas fa-2x fa-people-group"></i>
                                                    </button>
                                                    <button class="btn" style="font-size: 0.7em; color: Tomato;" type="button">
                                                        <i class="fas fa-2x fa-circle-check"></i>
                                                    </button>
                                                    @if(strtoupper($event->event_status) == 'ACTIVE')
                                                        <button class="btn" style="font-size: 0.7em; color: Tomato;" type="button">
                                                            <i class="fas fa-2x fa-lock"></i>
                                                        </button>
                                                    @else
                                                        <button class="btn" style="font-size: 0.7em; color: Tomato;" type="button">
                                                            <i class="fas fa-2x fa-lock-open"></i>
                                                        </button>
                                                    @endif
                                                    <button class="btn" style="font-size: 0.7em; color: Tomato;" type="button">
                                                        <i class="fas fa-2x fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach                            
                                    </tbody>
                                </table>
                            </div>  
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection