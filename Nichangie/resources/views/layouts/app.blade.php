<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta property="og:type" content="website" />
    <meta property="og:url" content="env('APP_URL')" />
    <meta property="og:title" content="NACHANGIA" />
    <meta property="og:description" content="NACHANGIA" />
    <meta property="og:image" content="{{ asset('assets/images/LOGO2.png')}}" />
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="env('APP_URL')" />
    <meta property="twitter:title" content="" />
    <meta property="twitter:description" content="NACHANGIA" />
    <meta property="twitter:image" content="{{ asset('assets/images/LOGO2.png')}}" />
    <meta property="twitter:image:alt" content="Company logo" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'NACHANGIA') }}</title>

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png')}}" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets/images/favicon.png')}}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Prata|Rubik:300,400,500,700&amp;display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link href="{{ asset('assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/jquery-ui.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/swiper.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/flaticon.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom-animate.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/jquery.fancybox.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/owl.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/responsive.css')}}" rel="stylesheet">
    @section('page-styles')
    @show
</head>

<body>
    <div class="page-wrapper">
        <!-- Preloader -->
        <div class="loader-wrap">
            <div class="preloader"></div>
            <div class="layer layer-one"><span class="overlay"></span></div>
            <div class="layer layer-two"><span class="overlay"></span></div>
            <div class="layer layer-three"><span class="overlay"></span></div>
        </div>

        @yield('content')

        <!--Scroll to top-->
        <div class="scroll-to-top scroll-to-target" data-target="html"><span class="icon flaticon-arrow"></span></div>


    </div>
    <!--End pagewrapper-->

    <!-- JS -->
    <script src="{{ asset('assets/js/jquery.js')}}"></script>
    <script src="{{ asset('assets/js/popper.min.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/js/TweenMax.min.js')}}"></script>
    <script src="{{ asset('assets/js/wow.js')}}"></script>
    <script src="{{ asset('assets/js/owl.js')}}"></script>
    <script src="{{ asset('assets/js/appear.js')}}"></script>
    <script src="{{ asset('assets/js/swiper.min.js')}}"></script>
    <script src="{{ asset('assets/js/jquery.fancybox.js')}}"></script>
    <script src="{{ asset('assets/js/menu-nav-btn.js')}}"></script>
    <script src="{{ asset('assets/js/jquery-ui.js')}}"></script>
    @section('page-scripts')
    @show
    <!-- Custom JS -->
    <script src="{{ asset('assets/js/script.js')}}"></script>

</body>

</html>