@extends('layouts.public')

@section('title', $system->website_title. ' - '. $page->page_title )

@section('content')
<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url({{ url('storage/page', $page->featured_image) }})">
   <div class="container">
      <div class="row align-items-end">
         <div class="col-lg-7">
            <h2 class="mb-0 pb-5">{{ $page->page_title }}</h2>
         </div>
      </div>
   </div>
</div>
<div class="custom-breadcrumns border-bottom mb-5">
   <div class="container">
        <a href="#">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">{{ $page->page_title }}</span>
   </div>
</div>

<div class="container mb-5">
   <div class="row div col-md-8 offset-md-2">
      {!! $page->page_description !!}
   </div>
</div>

@include('public.parts.subscribe')

@endsection



