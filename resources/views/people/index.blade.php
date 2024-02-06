@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">People</li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                <div class="card-body"> 
                    <div class="row">
                        <div class="col-md-6 d-flex justify-content-start">
                            <h3>People</h3>                            
                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                            <button id="add-entity-button" class="btn" style="font-size: 2.5em; color: Tomato;"><i class="fa-solid fa-plus"></i></button>
                        </div>
                    </div> 

                    <div class="card shadow-lg mb-2 bg-body-tertiary rounded" style="display: none" id="add-entity-form">
                        <div class="card-body">
                            <div class="row">
                                <form action="{{route('people.store')}}" method="post">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label class="form-label">First Name</label>
                                            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Email address</label>
                                            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Phone Number</label>
                                            <input type="tel" name="phone_number" id="phone_number" class="form-control" placeholder="Phone Number">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Address</label>
                                            <input type="text" name="address" id="address" class="form-control" placeholder="Address">
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
                                <form method="post" name="editPersonForm">
                                    @csrf
                                    {{ method_field('PUT') }}
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label class="form-label">First Name</label>
                                            <input type="text" name="edit_first_name" id="edit_first_name" class="form-control" placeholder="First Name" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" name="edit_last_name" id="edit_last_name" class="form-control" placeholder="Last Name" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Email address</label>
                                            <input type="email" name="edit_email" id="edit_email" class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Phone Number</label>
                                            <input type="tel" name="edit_phone_number" id="edit_phone_number" class="form-control" placeholder="Phone Number">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Address</label>
                                            <input type="text" name="edit_address" id="edit_address" class="form-control" placeholder="Address">
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
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Address</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($people as $person)
                                            <tr>
                                                <td>{{$person->first_name}}	{{$person->last_name}}</td>
                                                <td>{{$person->email}}</td>
                                                <td>{{$person->phone_number}}</td>
                                                <td>{{$person->address}}</td>
                                                <td>
                                                    <button class="btn" style="font-size: 0.7em; color: Tomato;" type="button" onclick="editPerson({{$person}})"><i class="fas fa-2x fa-pencil"></i></button>
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
    function editPerson(person) {
        console.log(person['first_name'])
        document.getElementById("edit_address").value  = person['address'];
        document.getElementById("edit_email").value  = person['email'];
        document.getElementById("edit_first_name").value  = person['first_name'];
        document.getElementById("edit_last_name").value  = person['last_name'];
        document.getElementById("edit_phone_number").value  = person['phone_number'];
        document.getElementById("edit-entity-form").style.display = "block";
        document.getElementById("add-entity-form").style.display = "none";   
        document.editPersonForm.action = "people/"+person['id'];     
    }
</script>