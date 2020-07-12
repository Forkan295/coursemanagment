@extends('layouts.public')
@section('title', $system->website_title. ' - '. 'Our Courses')
@section('content')
<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url({{ asset('public/images/bg_1.jpg') }})">
    <div class="container">
    <div class="row align-items-end">
        <div class="col-lg-7">
        <h2 class="mb-0">Our courses</h2>
        <p>Our all available course.</p>
        </div>
    </div>
    </div>
</div>
<div class="custom-breadcrumns border-bottom">
    <div class="container">
    <a href="index-2.html">Home</a>
    <span class="mx-3 icon-keyboard_arrow_right"></span>
    <span class="current">Courses</span>
    </div>
</div>
<div class="site-section">
    <div class="container">
        <div class="row">
            @foreach ($courses as $course)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="course-1-item">
                    <figure class="thumnail">
                    <a href="{{ route('course.single', $course->course_slug) }}">
                        <img width="100%" src="{{ url('storage/courses', $course->image) }}" alt="{{ $course->course_title }}" class="img-fluid">
                        <div class="course-1-content">
                            <h4>{{ $course->course_name }}</h4>
                            <p class="desc mb-4">{{ $course->course_title }}</p>
                        </div>
                        <div class="category" style="z-index:999 !important">
                            <h3>Course fee: {{ $course->course_fees }} Tk only</h3>
                        </div>
                    </a>
                    </figure>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@include('public.parts.subscribe')
@endsection