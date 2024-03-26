@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="/events">Events</a></li>
          <li class="breadcrumb-item active" aria-current="page">View Event</li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                <div class="card-body"> 
                    <div class="row">
                        <div class="col-md-6 d-flex justify-content-start">
                            <h3>Event</h3>                            
                        </div>
                    </div> 

                    <div class="card shadow-lg p-3 mb-2 bg-body-tertiary rounded">
                        <div class="card-body">
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection