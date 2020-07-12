@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <br>
    <h1 class="text-center titan" style="color:orange">{{ $system->website_title }}</h1>
    <h4 class="text-center text-muted">{{ $system->website_slogan }}</h4>
    
    <br>

    <div style="max-width:600px; margin:0 auto;">
        @if (Session::get('success'))
            <div class="alert alert-success">

                {!! Session::get('success') !!}

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (Session::get('error'))
            <div class="alert alert-danger">
                
                {!! Session::get('error') !!}

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif


        @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                {!! $error !!}

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endforeach
        @endif

        <div class="jumbotron">
            <form action="{{ route('verify.register') }}" method="POST"> 
                @csrf
                @method('PUT')
                <div class="form-group">
                    <input type="hidden" name="phone" value="{{$phone}}">
                    <input type="number" class="form-control" name="secret_code" id="secret_code" placeholder="Enter 6 digit secret code">
                </div>

                <button type="submit" class="btn btn-primary">Verify</button>

            </form>
        </div>
    </div>
</div>  
@endsection
