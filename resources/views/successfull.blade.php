@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <br>

    <br>
    <div style="max-width:600px; margin:0 auto;">

    <div class="jumbotron text-center">
        <h2>
            <i style="font-size:200px; color:green" class="fa fa-check-circle"></i><br><br>
            <span class="text-muted">Your Application is successfully submitted</span><br>
            <br>
        </h2>
        <div class="text-left">
            <p><strong>Please contact to our office to confirm your admission.</strong></p>
            <p> <strong>Address: </strong> {{ $system->street_address }}</p>
            <p> <strong>Office time:</strong> {{ $system->office_time }} </p>
            <p> <strong>Contact number: </strong> {{ $system->primary_contact }}, {{ $system->primary_contact }}</p>
        </div>
<br><br>
    <a class="btn btn-success" href="/">Go Home</a>
    </div>
    </div>
</div>    
@endsection