@extends('layouts.public')
@section('title', $system->website_title. ' - '. 'Apply online')
@section('content')

<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('public/images/bg_1.jpg')">
   <div class="container">
      <div class="row align-items-end">
         <div class="col-lg-7">
            <h2 class="mb-0">Apply online</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
         </div>
      </div>
   </div>
</div>

<div class="custom-breadcrumns border-bottom">
   <div class="container">
      <a href="index-2.html">Home</a>
      <span class="mx-3 icon-keyboard_arrow_right"></span>
      <span class="current">Apply online</span>
   </div>
</div>

<div class="site-section">
   <div class="container">

      <div class="row">
         <div class="col-md-6 offset-md-3">
            @include('public.parts.apply-form')

         </div>
      </div>

   </div> {{-- container --}}
</div>

@endsection
         