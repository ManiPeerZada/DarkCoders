<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv=”Cache-Control” content=”no-cache”>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <meta http-equiv=“Content-Security-Policy” content=”default-src ‘self’; img-src *”> --}}


    <title>Dark Coders</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('back/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('back/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('back/dist/css/adminlte.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('back/favicon.ico') }} " type="image/x-icon">


    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <style>
        .pagination {
            float: right;
            margin-top: 10px;
        }

        @media print {
            .printPageButton {
                display: none;
            }
        }
        .card {
            background-color: lightgray !important;
        }
    </style>

    <!-- Styles -->
</head>

<body class="hold-transition light-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        {{-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="{{ asset('back/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo"
                height="60" width="60">
        </div> --}}
        <!-- Navbar -->
        @include('back.common_views.header')
        <!-- /.navbar -->

        @include('back.common_views.dashboardlinks')
        <div class="content-wrapper">

            @yield('content')

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            @include('back.common_views.footer')
        </div>
        @include('back.common_views.before_footer_close')
        @yield('script')
</body>
</html>
