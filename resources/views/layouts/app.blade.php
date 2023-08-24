

<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    
	<title>Login | System</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="icon" type="image/png" href="{{ asset('logs/images/favicon.ico')}}" />

	<link rel="stylesheet" type="text/css" href="{{ asset('logs/css/bootstrap.min.css')}}">

	<link rel="stylesheet" type="text/css" href="{{ asset('logs/css/font-awesome.min.css')}}">

	<link rel="stylesheet" type="text/css" href="{{ asset('logs/css/icon-font.min.css')}}">

	<link rel="stylesheet" type="text/css" href="{{ asset('logs/css/animate.css')}}">

	<link rel="stylesheet" type="text/css" href="{{ asset('logs/css/hamburgers.min.css')}}">

	<link rel="stylesheet" type="text/css" href="{{ asset('logs/css/animsition.min.css')}}">

	<link rel="stylesheet" type="text/css" href="{{ asset('logs/css/select2.min.css')}}">

	<link rel="stylesheet" type="text/css" href="{{ asset('logs/css/daterangepicker.css')}}">

	<link rel="stylesheet" type="text/css" href="{{ asset('logs/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('logs/css/main.css')}}">
	<meta name="robots" content="noindex, follow">
</head>

<body>
    <div class="limiter">
        <div class="container-login100" style="bg-gray">
            <div class="wrap-login100 p-t-30 p-b-50">

                @yield('content')
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <script src="{{ asset('logs/js/jquery-3.2.1.min.js') }}"></script>

    <script src="{{ asset('logs/js/animsition.min.js') }}"></script>

    <script src="{{ asset('logs/js/popper.js') }}"></script>
    <script src="{{ asset('logs/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('logs/js/select2.min.js') }}"></script>

    <script src="{{ asset('logs/js/moment.min.js') }}"></script>
    <script src="{{ asset('logs/js/daterangepicker.js') }}"></script>

    <script src="{{ asset('logs/js/countdowntime.js') }}"></script>

    <script src="{{ asset('logs/js/main.js') }}"></script>
</body>

</html>
