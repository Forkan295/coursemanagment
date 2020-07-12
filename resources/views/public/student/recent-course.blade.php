@extends('layouts.public')
@section('title', $system->website_title. ' - '. 'Student Profile')

@push('css')
    <style>
        .video-icon{
            font-size: 65px;
            z-index: 999;
            color: white;
            position: absolute;
            top: 32%;
            left: 42%;
            opacity: 0.6;   
            /* z-index: 222; */
        }

        .icon-background{
            background: black;
            position: absolute;
            width: 290px;
            height: 100%;
            top: 0px;
            /* left: 72px; */
            opacity: 0.6;   
            z-index: 2;
        }
   
        .video-img{
            width: 290px;
            height: 100%;
            position: relative;
            z-index: 1;
            padding: 0px;
        }

        .content-link:hover .video-icon{
            opacity: 1.0;   
        }
    </style>
@endpush
@section('content')
<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url({{ asset('public/images/bg_1.jpg') }})">
   <div class="container">
      <div class="row align-items-end">
         <div class="col-lg-7">
            <h2 class="mb-0">Recent Course</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
         </div>
      </div>
   </div>
</div>
<div class="custom-breadcrumns border-bottom">
   <div class="container">
    <a href="{{ url('/') }}">Home</a>
      <span class="mx-3 icon-keyboard_arrow_right"></span>
      <span class="current">Recent Course</span>
   </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                @include('public.inc.student-sidebar')
                <br><br>
            </div>

            <div class="col-md-8">
                <h4 class="form-section"><i class="ft-user"></i> Recent course videos</h4>
                <p>{{ $student->course->course_name }} - batch {{ $student->batch->batch }}</p>
                <hr>
            

                @foreach ($contents as $key => $item)
                <a class="content-link" href="{{ route('content.view', $item->id) }}">
                    <div class="row">

                        <div class="col-lg-5">
                            <div class="icon-background">
                                <i class="video-icon icon-play-circle"></i>
                            </div>
                            <img class="video-img" src="{{ url('storage/courses', auth()->guard('student')->user()->course->image) }}" 
                            alt="{{ $item->content_title }}"> 
                        </div>

                        <div class="col-lg-7">
                        {{-- <a class="content-link" href="#"> --}}
                            <h4 class="text-dark badge badge-primary">{{ "Lecture ".$item->lecture }}</h4>
                            <br>
                            <small class="text-muted mt-3"> 
                                <i class="icon-watch"></i>
                                {{ $item->created_at->format('d M, Y') }} / 
                                Uploaded - {{ $item->created_at->diffForHumans() }} 
                            </small> 
                            <h5 class="text-primary mt-3">{{ $item->content_title }}</h5>
                            {{-- </a> --}}
                            
                        </div>
                    </div>
                </a>
                @if ($key < $paginate )
                <br><br>
                @endif
                 
                @endforeach

                <div class="text-center">
                    {{ $contents->links() }}
                </div>

            </div>{{-- .col-md-8 --}}
        </div>{{-- .Row --}}
    </div>{{-- .Container --}}

</div>{{-- .site-section --}}

@endsection
         