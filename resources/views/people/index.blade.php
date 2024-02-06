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
                        <div class="col-6 d-flex justify-content-start">
                            <h3>People</h3>                            
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <button id="add-entity-button" class="btn" style="font-size: 2.5em; color: Tomato;"><i class="fa-solid fa-plus"></i></button>
                        </div>
                    </div> 

                    <div class="card shadow-lg p-3 mb-2 bg-body-tertiary rounded" style="display: none" id="add-entity-form">
                        <div class="card-body">
                            <div class="row">
                                <form action="{{route('people.store')}}" method="post">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-4">
                                            <label class="form-label">First Name</label>
                                            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" required>
                                        </div>
                                        <div class="col-4">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" required>
                                        </div>
                                        <div class="col-4">
                                            <label class="form-label">Email address</label>
                                            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <label class="form-label">Phone Number</label>
                                            <input type="tel" name="phone_number" id="phone_number" class="form-control" placeholder="Phone Number">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">Address</label>
                                            <input type="text" name="address" id="address" class="form-control" placeholder="Address">
                                        </div>
                                    </div>   
                                
                                    <div class="row">
                                        {{-- <div class="col-10"></div> --}}
                                        <div class="col-6 d-flex justify-content-end">
                                            <button class="btn" style="font-size: 1.5em; color: Tomato;" type="submit"><i class="fas fa-2x fa-save"></i></button>
                                        </div>
                                        <div class="col-6 d-flex justify-content-start">
                                            <button class="btn" style="font-size: 1.5em; color: Tomato;" type="button" id="cancel-entity-form"><i class="fa fa-2x fa-times"></i></button>
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
                                                    <button class="btn" style="font-size: 0.7em; color: Tomato;" type="button"><i class="fas fa-2x fa-pencil"></i></button>
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
