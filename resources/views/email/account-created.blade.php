@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $system->website_title }}</div>

                <div class="card-body">
                     Hello Mr {{ $user->name }},, <br>
                     your account has been created and activated successfully. <br>
                     <h5>Your login information</h5>
                     Email:  {{ $user->email }}<br>
                     Password:  {{ $password }} <br><br>
                     please go to the following link to login your account. <br>
                     Login link: <a href="{{ route('institute.login') }}">{{ route('institute.login') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection