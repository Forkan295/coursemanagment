<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    
    @if ($system->app_favicon)
    <link rel="icon" type="image/png" href="{{ url('storage/system', $system->app_favicon) }}">
    @endif 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('public/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/aos.css') }}">
    <link href="{{ asset('public/css/jquery.mb.YTPlayer.min.css') }}" media="all" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    @stack('css')
    {!! $system->header_scripts !!}
    
    <style>
       .site-section-padding {
            padding-top: 10px;
        }   

        .section-title-underline > span{
            padding-bottom: 10px !important;
        }


        .course-1-item .course-1-content {
            padding: 20px 10px !important;
            text-align: center;
            background: #00000094;
            color: white;
            position: absolute;
            top: 0px;
            width: 100%;
            height: 150px;
        }
        .modal-body>h1,
        .modal-body>h2,
        .modal-body>h3,
        .modal-body>h4,
        .modal-body>h5,
        .modal-body>h6, 
        p>strong {
            color: #333333 !important;
        }

        .login-dropdown{
            left: -46px !important;
        }
    </style>
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <div class="site-wrap">
        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>
        <div class="py-2 bg-light">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8 d-none d-lg-block">

                        <a href="#" class="small mr-3"><span class="icon-question-circle-o mr-2"></span> Have a questions?</a>

                        @if ($system->primary_contact)
                        <a href="#" class="small mr-3"><span class="icon-phone2 mr-2"></span>{{ $system->primary_contact }}</a>
                        @endif

                        @if ($system->contact_email)
                        <a href="#" class="small mr-3">
                            <span class="icon-envelope-o mr-2"></span> 
                            <span class="__cf_email__">
                                {{ $system->contact_email }}
                            </span>
                        </a>
                        @endif
                    </div>

                    {{-- {{ auth()->guard() }} --}}
                    
                    <div class="col-lg-4 text-right">
                        @if (Auth::guard('student')->check())
                        <div class="dropdown">
                            <button class="small btn btn-info btn-sm rounded-1 dropdown-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="icon-user"></span> {{ Auth::guard('student')->user()->name }}
                            </button>
                            <div class="dropdown-menu login-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('student.profile') }}">Student Profile</a>
                                <a class="dropdown-item" href="{{ route('recent.course') }}">Recent Course</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/login/institute">Sign Out</a>
                            </div>
                        </div>

                        @else 
                        <div class="dropdown float-right">
                            <button class="small btn btn-success btn-sm rounded-1 dropdown-toggle float-right ml-2 text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="icon-lock"></span> Login
                            </button>
                            <div class="dropdown-menu login-dropdown" style="left: -40px !important" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('student.login') }}">Login as student</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/login/institute">Login as institute</a>
                            </div>
                        </div>
                        {{-- <a href="{{ route('apply.online') }}" class="small btn btn-primary btn-sm rounded-1 float-right">
                            <span class="icon-users"></span> Apply online
                        </a> --}}
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
            <div class="container">
                <div class="d-flex align-items-center">
                    <div class="site-logo">
                        <a href="{{ route('public.index') }}" class="d-block">
                            @if ($system->main_logo)
                                <img src="{{ url('storage/system', $system->main_logo) }}" alt="Image" class="img-fluid"> 
                            @else 
                               <h4 style="margin-bottom: -5px !important">{{ $system->website_title }}</h4>
                               <small class="text-muted" style="font-size:12px">{{ $system->website_slogan }}</small>
                            @endif
                        </a>
                    </div>
                    <div class="mr-auto">
                        @include('public.inc.navbar')
                    </div>
                    <div class="ml-auto">
                        <div class="social-wrap">
                            {{-- <a href="#" class="d-sm-none"><span class="icon-facebook"></span></a>
                            <a href="#" class="d-sm-none"><span class="icon-youtube"></span></a> --}}
                            {{-- <span href="#"><span class="icon-linkedin"></span></span> --}}
                            <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </header>


         @yield('content')


        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">

                        @if ($system->main_logo)
                            <img src="{{ url('storage/system', $system->main_logo) }}" alt="Image" class="img-fluid"> 
                        @else 
                        <h4 style="margin-bottom: -5px !important">{{ $system->website_title }}</h4>
                        @endif
                
                        <p class="mt-4">{{ $system->app_description }}</p>
                    </div>

                    <div class="col-lg-3">
                        <h3 class="footer-heading"><span>Our Courses</span></h3>
                        <ul class="list-unstyled">
                        @foreach ($courses->take(5) as $item)
                            <li><a href="#">{{ $item->course_name }}</a></li>
                        @endforeach
                        </ul>
                    </div>



                    <div class="col-lg-3">
                        <h3 class="footer-heading"><span>Pages</span></h3>
                        <ul class="list-unstyled">
                            <li><a href="courses"> All Courses</a></li>
                            <li><a href="contact-us"> Contact Us</a></li>
                            @foreach ($pages->where('show_footer', true) as $item)
                                <li>
                                    <a href="{{ route('default.page',  $item->page_slug) }}">
                                        {{ $item->page_title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="col-lg-3">
                        <h3 class="footer-heading"><span>Contact</span></h3>
                        <ul class="list-unstyled">
                            <li>
                                {{ $system->street_address }} <br><br>
                            </li>
                            <li>
                                <h6>Phone: {{ $system->primary_contact }}</h6>         
                            </li>
                            <li>
                                <h6> Email: {{ $system->contact_email }}</h6>
                            </li>
                            {{-- <a><a href="#">Share Your Story</a></a>
                            <li><a href="#">Our Supporters</a></li> --}}
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="copyright">
                            <p>

                                Copyright &copy;
                                <script data-cfasync="false" src="{{ asset('public/email-decode.min.js') }}"></script>

                                <script type="text/javascript">
                                    document.write(new Date().getFullYear());
                                </script>, <strong class="text-success">{{ $system->website_title }}</strong> 
                                All rights reserved | developed by
                                 <a href="https://dcodea.com/" target="_blank">Dcodea IT</a>.

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#51be78" />
        </svg>
    </div>

   
    {!! $system->footer_scripts !!}
    <script src="{{ asset('public/js/jquery-3.3.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/js/jquery-migrate-3.0.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/js/jquery-ui.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/js/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/js/owl.carousel.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/js/jquery.stellar.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/js/jquery.countdown.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/js/jquery.easing.1.3.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/js/aos.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/js/jquery.fancybox.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/js/jquery.sticky.js') }}" type="text/javascript"></script>
    {{-- <script src="{{ asset('public/js/jquery.mb.YTPlayer.min.js') }}" type="text/javascript"></script> --}}
    <script src="{{ asset('public/js/main.js') }}" type="text/javascript"></script>
    
    <script src="{{ asset('public/loader/rocket-loader.min.js') }}" data-cf-settings="86933f186c8253a11a7ec29b-|49" defer=""></script>
    {{-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="text/javascript"></script> --}}
    {{-- <script type="text/javascript">
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script> --}}

</body>
</html>