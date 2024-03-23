@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Event Owners</li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                <div class="card-body"> 
                    <div class="row">
                        <div class="col-md-6 d-flex justify-content-start">
                            <h3>Event Owners</h3>                            
                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                            <button id="add-entity-button" class="btn" style="font-size: 2.5em; color: Tomato;"><i class="fa-solid fa-plus"></i></button>
                        </div>
                    </div> 

                    <div class="card shadow-lg mb-2 bg-body-tertiary rounded" style="display: none" id="add-entity-form">
                        <div class="card-body">
                            <div class="row">
                                <h5>Add event owner</h5>
                            </div>
                            
                            <div class="row">
                                <form action="{{route('event-owners.store')}}" method="post">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label class="form-label fw-bolder">Name</label>
                                            <input type="text" name="event_manager_name" id="event_manager_name" class="form-control" placeholder="Name" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label class="form-label fw-bolder">Email address</label>
                                            <input type="email" name="event_manager_email" id="event_manager_email" class="form-control" placeholder="Email" required>
                                        </div>
                                    </div>
                                    <div class="row mb-12">
                                        <div class="col-md-12">
                                            <label class="form-label fw-bolder">Phone Number</label>
                                            <input type="tel" name="event_manager_phone" id="event_manager_phone" class="form-control" placeholder="Phone Number" required>
                                        </div>
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

                    <div class="card shadow-lg mb-2 bg-body-tertiary rounded" style="display: none" id="edit-entity-form">
                        <div class="card-body">
                            <div class="row">
                                <h5>Edit event_owner</h5>
                            </div>
                            <div class="row">
                                <form method="post" name="editEventOwnerForm">
                                    @csrf
                                    {{ method_field('PUT') }}
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label class="form-label fw-bolder">Name</label>
                                            <input type="text" name="edit_event_manager_name" id="edit_event_manager_name" class="form-control" placeholder="Name" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label class="form-label fw-bolder">Email address</label>
                                            <input type="email" name="edit_event_manager_email" id="edit_event_manager_email" class="form-control" placeholder="Email" required>
                                        </div>
                                    </div>
                                    <div class="row mb-12">
                                        <div class="col-md-6">
                                            <label class="form-label fw-bolder">Phone Number</label>
                                            <input type="tel" name="edit_event_manager_phone" id="edit_event_manager_phone" class="form-control" placeholder="Phone Number" required>
                                        </div>
                                    </div>                                    
                                    <div class="row">
                                        <div class="col-md-12 d-flex justify-content-end">
                                            <button class="btn btn-lg" style="color: Tomato;" type="submit"><i class="fas fa-2x fa-save"></i></button>
                                            <button class="btn btn-lg" style="color: Tomato;" type="button" id="edit_cancel-entity-form"><i class="fa fa-2x fa-times"></i></button>
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
                                            <th>Phone Number</th>
                                            <th>Email</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>		
                                        @foreach ($event_owners as $event_owner)
                                            <tr>
                                                <td>{{$event_owner->event_manager_name}}</td>
                                                <td>{{$event_owner->event_manager_phone}}</td>
                                                <td>{{$event_owner->event_manager_email}}</td>
                                                <td>
                                                    <button class="btn" style="font-size: 0.7em; color: Tomato;" type="button" onclick="editEventOwner({{$event_owner}})"><i class="fas fa-2x fa-pencil"></i></button>
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

<script>
    function editEventOwner(event_owner) {
        document.getElementById("edit_event_manager_name").value  = event_owner['event_manager_name'];
        document.getElementById("edit_event_manager_phone").value  = event_owner['event_manager_phone'];
        document.getElementById("edit_event_manager_email").value  = event_owner['event_manager_email'];
        document.getElementById("edit-entity-form").style.display = "block";
        document.getElementById("add-entity-form").style.display = "none";   
        document.editEventOwnerForm.action = "event-owners/"+event_owner['id'];     
    }
</script>