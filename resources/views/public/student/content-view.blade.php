@extends('layouts.public')
@section('title', $system->website_title. ' - '. 'Student Profile')

@push('css')
    <style>
        .ytp-button{
            display: none !important;
        }

        .overlay-banner {
            position: absolute;
            background: transparent !important;
            top: 0px;
            left: 0;
        }
    </style>
@endpush
@section('content')
<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url({{ asset('public/images/bg_1.jpg') }})">
   <div class="container">
      <div class="row align-items-end">
         <div class="col-lg-7">
            <h2 class="mb-0">{{ "Lecture ". $content->lecture  }}</h2>
            <p>{{ $content->content_title }}</p>
         </div>
      </div>
   </div>
</div>

<div class="custom-breadcrumns border-bottom">
   <div class="container">
        <a href="{{ url('/') }}">Home</a>
            <span class="mx-3 icon-keyboard_arrow_right"></span>
        <a href="{{ route('recent.course') }}">Recent Course</a>
            <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">{{ "Lecture ". $content->lecture  }}</span>
   </div>
</div>

<div class="site-section mt-0" style="margin-top:-45px !important">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                {!! $content->video_embed !!}
                <br><br>
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <h3>{{ "Lecture ". $content->lecture }}</h3>
                        <h5>{{ $content->content_title }}</h5><hr>
                        <p>
                            Date - {{ $content->created_at->format('d M, Y') }}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        {!! $content->content_description !!}
                    </div>
                </div>
                
            </div>{{-- .col-md-8 --}}
        </div>{{-- .Row --}}
    </div>{{-- .Container --}}

</div>{{-- .site-section --}}

@endsection

@push('js')
<script>
    // $(document).ready(function(){
    //     $('.ytp-button').hide();

    // });

    document.getElementsByTagName('iframe')[0].contentWindow.getElementsByClassName('ytp-watch-later-button')[0].style.display = 'none';
</script>
@endpush