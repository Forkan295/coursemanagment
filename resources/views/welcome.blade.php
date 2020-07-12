@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <br>
    <h1 class="text-center titan" style="color:orange">DCODEA IT INSTITUTE</h1>
    <h4 class="text-center text-muted">ফ্রিল্যান্সিং জগতে আপনার স্বপ্নের ক্যারীয়ার গড়ুন আমাদের হাত ধরে</h4>

    <div>
        <marquee behavior="slow" direction="left" style="padding:20px">
            <h2>বিঃদ্রঃ - ৩য় ব্যাচ এর ভর্তি চলছে। ভর্তির শেষ তারিখঃ ২৯ ফেব্রুয়ারি, ২০২০ । ক্লাস শুরু হবে - ৫ই মার্চ, ২০২০ তারিখ থেকে। </h2>
        </marquee>
    </div>
    
    <div class="text-center">
        <a class="btn btn-info mb-2" href="{{ route('course.info') }}">আমাদের কোর্স এবং ভর্তি তথ্য</a>
        <a class="btn btn-success mb-2" href="{{ route('application.form') }}">অনলাইনে ভর্তি আবেদন করুন</a>
    </div>

    <br>

    <div class="row">
        <div class="col-md-7">
        
            @include('templates.sidebar')
            
        </div>    
        <div class="col-md-5">
            
            @include('templates.register-form')
 
        </div>
    </div>
    <br><br>
</div>

@endsection