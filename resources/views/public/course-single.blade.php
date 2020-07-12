@extends('layouts.public')
@section('title', $course->course_name. ' - '. $course->course_title)
@section('content')

<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url({{ asset('public/images/bg_1.jpg') }})">
   <div class="container">
      <div class="row align-items-end">
         <div class="col-lg-7">
            <h2 class="mb-0">{{ $course->course_name }}</h2>
            <p>{{ $course->course_title }}</p>
         </div>
      </div>
   </div>
</div>

<div class="custom-breadcrumns border-bottom">
   <div class="container">
      <a href="index-2.html">Home</a>
      <span class="mx-3 icon-keyboard_arrow_right"></span>
      <a href="{{ route('public.courses') }}">Courses</a>
      <span class="mx-3 icon-keyboard_arrow_right"></span>
      <span class="current">{{ $course->course_name }}</span>
   </div>
</div>

<div class="site-section">
   <div class="container">
      <div class="row">
         <div class="col-md-7 mb-4">
            <img style="width:100%" src="{{ url('storage/courses', $course->image ) }}" alt="Image" class="img-fluid">
            <br><br>
            <h3 class="mb-3">
               <span>{{ $course->course_title }}</span>
            </h3>
            <hr>
            
            <div class="row">
               <div class="col-md-6">
                  <strong class="text-black d-block">Course</strong> 
                  {{ $course->course_name }}
               </div>
               <div class="col-md-3">
                  <strong class="text-black d-block">Course Fees</strong> 
                  {{ $course->course_fees }} TK
               </div>
               <div class="col-md-3">
                  <strong class="text-black d-block">Period</strong> 
                  {{ $course->course_period }}
               </div>
            </div>

            <hr>

            @include('public.parts.share')

            <hr>

            <div class="mb-3">
               @php
                   $readMore = '<a href="#" data-toggle="modal" data-target="#readMore"><strong>Continue Reading</strong></a>'
               @endphp
               {!!  trim(substr($course->course_description,0,1250)).'... '. $readMore !!}
            </div>

         </div>
         <div class="col-lg-5">
            {{-- <h2 class="section-title-underline mb-3">
               <span>Course Details</span>
            </h2> --}}

            @include('public.parts.apply-form')
  
         </div>
      </div>
   </div>
</div>

@include('public.parts.subscribe')


<div class="modal fade" id="readMore" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Description about {{ $course->course_name }}</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         .....{!! trim(substr($course->course_description, 1240 )) !!}
         @include('public.parts.share')
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       </div>
     </div>
   </div>
 </div>

 
@endsection