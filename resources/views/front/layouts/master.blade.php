<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta name="description" content="wwfcel | Education & Courses HTML Template" />
    <meta name="keywords" content="academy, course, education, education html theme, elearning, learning," />
    <meta name="author" content="ThemeMascot" />
    <link rel="shortcut icon" href="{{ asset('front/images/favicon.ico')}}" type="image/x-icon">
    <link href="{{ asset('front/images/favicon/favicon.png')}}" rel="icon">
    <!-- Page Title -->
    <title>@yield('title','Ambica Enterprise')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon and Touch Icons -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700%7cTeko:400,500,600,700&display=swap" rel="stylesheet">
    <!-- Stylesheet -->
    <!--<link href="{{ asset('front/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('front/css/jquery-ui.min.css')}}" rel="stylesheet" type="text/css">-->
    <link href="{{ asset('front/css/prettify.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('front/css/libraries.css')}}" rel="stylesheet" type="text/css">
    <!--LightBoxx-->
    <link href="{{ asset('front/css/lightbox.css')}}" rel="stylesheet" type="text/css">
    <!-- CSS | Main style file -->
    <link href="{{ asset('front/css/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('front/css/custom.css')}}" rel="stylesheet" type="text/css">
    <!-- CSS | Preloader Styles -->
    <link href="{{ asset('front/css/preloader.css')}}" rel="stylesheet" type="text/css">
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

</head>
<body class="">
<div id="wrapper" class="wrapper">
    <!-- preloader -->
    <!--<div id="preloader">
        <div id="spinner">
            <div class="preloader-dot-loading">
                <div class="cssload-loading"><i></i><i></i><i></i><i></i></div>
            </div>
        </div>
        <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>
    </div>-->


    @include('front.layouts.header')
    <!-- Start main-content -->
    @yield('content')

  @include('front.layouts.footer')
</div>
<!-- end wrapper -->

<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->

<!-- dashboard -->
<script src="{{ asset('front/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{ asset('js/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/jquery-validation/additional-methods.js') }}"></script>
<!--<script src="{{ asset('front/js/jquery-ui.min.js')}}"></script>
<script src="{{ asset('front/js/bootstrap.min.js')}}"></script>-->
<!--LightBoxx-->
<script src="{{ asset('front/js/lightbox.js')}}"></script>
<!-- external javascripts -->
<script src="{{ asset('front/js/custom.js')}}"></script>
<script src="{{ asset('front/js/plugins.js')}}"></script>
<script src="{{ asset('front/js/main.js')}}"></script>
<!-- JS | jquery plugin collection for this theme -->

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
@yield('js')
</body>
</html>
