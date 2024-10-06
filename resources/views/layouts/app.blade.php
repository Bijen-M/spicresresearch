<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/bootstrap.min.css') }}">
        <!-- Font Icon -->
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/fonts/icofont/icofont.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/fonts/line-awesome/css/line-awesome.min.css') }}">

        <!-- Custom Css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/menu.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/animate.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/customform.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/login.css') }}">

        @yield('style')
        
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900" rel="stylesheet">
    </head>
    <body>
        <div id="vcWrapper" class="wrapper">

            @yield('content')

        </div>


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{ asset('backend/js/jquery.3.2.1.min.js') }}"></script>
        <script src="{{ asset('backend/js/popper.min.js') }}"></script>
        <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
        <!-- jQuery UI -->
        <script src="{{ asset('backend/js/jqueryUi/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('backend/js/jqueryUi/jquery.ui.touch-punch.min.js') }}"></script>

        <!-- scroll js -->
        <script src="{{ asset('backend/js/jquery.scrollbar.min.js') }}"></script>
        <script src="{{ asset('backend/js/moment.min.js') }}"></script>
        @yield('script')
        <script src="{{ asset('backend/js/custom.js') }}"></script>
    </body>
</html>
