@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <br>
    <h1 class="text-center titan" style="color:orange">DCODEA IT INSTITUTE</h1>

    <h4 class="text-center text-muted">ফ্রিল্যান্সিং জগতে আপনার স্বপ্নের ক্যারীয়ার গড়ুন আমাদের হাত ধরে</h4>
    
    <div class="text-center">
        <a class="btn btn-info" href="/">প্রথম পেজে ফিরুন</a>
    </div>

    <br>

    <div class="row">

        <div class="col-md-8 offset-md-2">
            
            @include('templates.register-form')
 
        </div>
    </div>
    <br><br>
</div>
@endsection