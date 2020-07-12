@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $system->website_title }}</div>

                <div class="card-body">
                     Hello Mr {{ $user->name }},, <br>
                     You are assinged as a {{ ( count( $user->getRoleNames() ) ) ? $user->getRoleNames()[0] : "General User" }} of {{ $system->website_title }}. <br>
                     please go to the following link to activate your account. <br>
                     Link: <a href="{{ route('active.user', $user->user_token) }}">{{ route('active.user', $user->user_token) }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
