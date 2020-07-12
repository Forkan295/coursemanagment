@extends('layouts.public')

@section('title', $system->website_title. ' - '. $system->website_slogan)

@section('content')

{{-- @include('public.inc.home-slider') --}}

{{-- <img
style="width:100%"
src="{{ url('storage/system',$system->app_banner) }}" alt="" srcset=""> --}}
<br><br>
@if (count($features))
    <div class="site-section">
        <div class="container">

            <div class="row mb-2 justify-content-center text-center">
                <div class="col-lg-6 mb-2">
                    <h2 class="section-title-underline mb-3 pb-6">
                        <span>{{ $system->website_title }}</span>
                    </h2>
                    <p>{{ $system->app_description }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-slide-3 owl-carousel">
                    @foreach ($features as $item)

                    <div class="course-1-item">
                        <div class="feature-1 border">
                            <br><br><br>
                            <div class="icon-wrapper bg-primary">
                                <span class="{{ $item->icon_name }} text-white"></span>
                            </div>
                            <div class="feature-1-content">
                                <h2>{{ $item->title }}</h2>
                                <p> {{ $item->description }} </p>
                            </div>
                        </div>
                    </div>
                    @endforeach


                    </div>
                </div>
            </div>

        </div>
    </div>
@endif

@if (count($courses))
<div class="site-section site-section-padding">
    <div class="container">
        <div class="row mb-2 justify-content-center text-center">
            <div class="col-lg-6 mb-2">
                <h2 class="section-title-underline mb-3">
                    <span>Our Courses</span>
                </h2>
                <p>Decide what you need to learn. you can apply online for any course by fill the application form in the course details page.</p>
                 <a class="btn btn-success" href="{{ route('public.courses') }}">All courses</a>
                 <br><br>
            </div>
        </div>

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
@endif

@if (count($contents))
<div class="site-section site-section-padding">
    <div class="container">
        <div class="row mb-2 justify-content-center text-center">
            <div class="col-lg-6 mb-2">
                <h2 class="section-title-underline mb-3">
                    <span>Demo classes</span>
                </h2>
                <p>This classes are available for trial purpose. Before applying for a course you can try some of our demo classes.</p>
            </div>
        </div>

        <div class="row">

            @foreach ($contents as $item)
                <div class="col-lg-4">
                    <a href="#" class="video-1 mb-4" data-toggle="modal" data-target="#class-{{ $item->id }}">
                        <span class="play">
                            <span class="icon-play"></span>
                        </span>
                        <img src="{{ url('storage/courses', $item->course->image) }}" alt="Image" class="img-fluid">
                    </a>
                </div>

                <div class="modal fade" id="class-{{ $item->id }}" tabindex="-1">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Demo class</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          {!! $item->video_embed !!}
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
            @endforeach
        </div>{{-- .Row --}}
    </div>
</div>
@endif

@include('public.parts.subscribe')


@endsection
