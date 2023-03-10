<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Admin | Ambica Enterprise</title>
    <meta name="description" content="wwfcel | Education & Courses HTML Template" />
    <meta name="keywords" content="academy, course, education, education html theme, elearning, learning," />
    <meta name="author" content="ThemeMascot" />
    <link rel="shortcut icon" href="{{ asset('front/images/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{ asset('front/images/favicon.ico')}}" type="image/x-icon">

    <link href="{{ asset('admin/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/css/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/css/style.css')}}" rel="stylesheet" type="text/css">

</head>


<body class="fixed-left">

<!-- Loader -->
<div id="preloader"><div id="status"><div class="spinner"></div></div></div>

<!-- Begin page -->
<div class="accountbg">

    <div class="content-center">
        <div class="content-desc-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-8">
                        <div class="card" style="background-color: #aec8f9;">
                            <div class="card-body">

                                <h3 class="text-center mt-0 m-b-15">
                                    <a href="{{ url('/') }}" class="logo logo-admin"><img src="{{ asset('front/images/logo.png')}}"  height="150" alt="logo"></a>
                                </h3>

                                <h4 class="text-muted text-center font-18"><b>Sign In</b></h4>

                                <div class="p-2">
                                    <form class="form-horizontal m-t-20" action="{{ route('login') }}" method="post">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email Address" required autofocus>
                                                <span class="invalid-feedback" role="alert">
                                                    @if ($errors->has('email'))
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    @else
                                                        <strong>please enter valid email</strong>
                                                    @endif
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12">
                                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
                                                <span class="invalid-feedback" role="alert">
                                                    @if ($errors->has('password'))
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    @else
                                                        <strong>please enter valid password</strong>
                                                    @endif
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">Remember me</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group text-center row m-t-20">
                                            <div class="col-12">
                                                <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In</button>
                                            </div>
                                        </div>

                                        {{--<div class="form-group m-t-10 mb-0 row">
                                            <div class="col-sm-7 m-t-20">
                                                <a href="{{ url('password/reset') }}" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                            </div>
                                        </div>--}}
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
    </div>
</div>

<!-- jQuery  -->
<script src="{{ asset('admin/js/jquery.min.js')}}"></script>
<script src="{{ asset('admin/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('admin/js/modernizr.min.js')}}"></script>
<script src="{{ asset('admin/js/detect.js')}}"></script>
<script src="{{ asset('admin/js/fastclick.js')}}"></script>
<script src="{{ asset('admin/js/jquery.slimscroll.js')}}"></script>
<script src="{{ asset('admin/js/jquery.blockUI.js')}}"></script>
<script src="{{ asset('admin/js/waves.js')}}"></script>
<script src="{{ asset('admin/js/jquery.nicescroll.js')}}"></script>
<script src="{{ asset('admin/js/jquery.scrollTo.min.js')}}"></script>

<!-- App js -->
<script src="{{ asset('admin/js/app.js')}}"></script>

</body>
</html>
