<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template.">
    <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if ($system->app_favicon)
    <link rel="icon" type="image/png" href="{{ url('storage/system', $system->app_favicon) }}">
    <link rel="apple-touch-icon" href="{{ url('storage/system', $system->app_favicon) }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('storage/system', $system->app_favicon) }}">
    @endif 

    <title>{{ $system->app_name }}</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CMuli:300,400,500,700" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/vendors/css/charts/morris.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/vendors/css/extensions/unslider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/vendors/css/weather-icons/climacons.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/app.min.css') }}">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/core/menu/menu-types/vertical-menu.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/core/colors/palette-gradient.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/core/colors/palette-gradient.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/plugins/calendars/clndr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/fonts/meteocons/style.min.css') }}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/assets/css/style.css') }}">
    <!-- END Custom CSS-->
    @stack('css')
</head>

<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click"
    data-menu="vertical-menu" data-col="2-columns">
    <!-- fixed-top-->
    @include('dashboard.inc.nav')
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    @include('dashboard.inc.side-menu')
    <div class="app-content content">
        <div class="content-wrapper">
            <!-- <div class="content-header row">
               </div> -->
               <div class="content-body clear-fix">
                   @yield('content')
                </div>
        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    @include('dashboard.inc.footer')
    <!-- BEGIN VENDOR JS-->

    
    <script src="{{ asset('admin-assets/vendors/js/vendors.min.js') }}"></script>
    
    @include('sweetalert::alert')
    
    
    @stack('js')

    

    <script src="{{ asset('admin-assets/vendors/js/charts/raphael-min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/js/charts/morris.min.js') }}"></script>
    
    <script src="{{ asset('admin-assets/vendors/js/charts/chart.min.js') }}"></script> 
    <script src="{{ asset('admin-assets/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/js/extensions/moment.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/js/extensions/underscore-min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/js/extensions/clndr.min.js') }}"></script>

    <script src="{{ asset('admin-assets/vendors/js/extensions/unslider-min.js') }}"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
    <script src="{{ asset('admin-assets/js/core/app-menu.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/core/app.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/scripts/customizer.min.js') }}"></script>
    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{ asset('admin-assets/js/scripts/pages/dashboard-ecommerce.min.j') }}s"></script>
    <!-- END PAGE LEVEL JS-->
    {{-- <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> --}}
    {{-- <script src="{{ asset('admin-assets/vendors/js/charts/echarts/echarts.js') }}"></script> --}}
    <script src="{{ asset('admin-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    
    {{-- Pushed scripts --}}

    <script src="https://cdn.tiny.cloud/1/n07kqhwmimi936tsx8nh222m7jrwbweyy7yowcwx8gjtmyol/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#editor',  // change this value according to your HTML
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                ' bold italic | link | forecolor backcolor | alignleft aligncenter ' +
                ' alignright alignjustify | bullist numlist outdent indent |' +
                ' removeformat | help',
            menubar: false,
            default_link_target: "_blank"
        });
    </script>
    
</body>

</html>