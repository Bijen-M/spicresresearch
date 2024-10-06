
<!doctype html>
<html lang="en">
    <head>
        <!--  meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <base href="{{ asset('/') }}">       
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <title>@yield('title')</title>
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="backend/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="backend/css/bootstrap-datetimepicker.min.css">
        <link href="backend/css/datatables.min.css" rel="stylesheet" type="text/css"/>
        <!-- Font Icon -->
        <link rel="stylesheet" type="text/css" href="backend/fonts/icofont/icofont.min.css">
        <link rel="stylesheet" type="text/css" href="backend/fonts/line-awesome/css/line-awesome.min.css">

        <!-- Minify Common Css -->
        <link rel="stylesheet" type="text/css" href="backend/css/minify-single.css">
        <!-- Main Form Css -->
        <link rel="stylesheet" type="text/css" href="backend/css/customform.css">

        <link rel="stylesheet" type="text/css" href="backend/css/calendar.css">
        <link rel="stylesheet" type="text/css" href="backend/css/fakescroll.css">
        <!-- Custom Css -->
        <link rel="stylesheet" type="text/css" href="backend/css/style.css">
        
        @stack('style')
        
        <link rel="stylesheet" type="text/css" href="backend/css/custom.css">
        <link rel="stylesheet" type="text/css" href="backend/css/media.css">
        

        <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="shortcut icon" href="backend/images/favicon.ico" type="image/x-icon"/>

    </head>
    <body>

        <!--<div id="loading">
            <div id="loading-center-absolute">
                <div class="object" id="object_one"></div>
                <div class="object" id="object_two" style="left:20px;"></div>
                <div class="object" id="object_three" style="left:40px;"></div>
                <div class="object" id="object_four" style="left:60px;"></div>
                <div class="object" id="object_five" style="left:80px;"></div>
            </div>
            <div class="loading-text">
                <span class="loading-text-words">L</span>
                <span class="loading-text-words">O</span>
                <span class="loading-text-words">A</span>
                <span class="loading-text-words">D</span>
                <span class="loading-text-words">I</span>
                <span class="loading-text-words">N</span>
                <span class="loading-text-words">G</span>
            </div>
        </div>-->
        
        <div id="vcWrapper" class="wrapper">
            @include('admin.partials._header')

            @include('admin.partials._sidebar')

            <section id="vcMainPanel" class="main-panel">

                <div id="vcContent" class="content">

                    @include('admin.partials._breadcrumb')

                    <div id="vcPageInner" class="page-inner">
                        <div id="vcPageContent" class="pageContent">
                            @yield('content')
                        </div>
                    </div>

                </div>

                @include('admin.partials._footer')

            </section>
        </div>


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="backend/js/jquery.3.2.1.min.js"></script>
        <script src="backend/js/popper.min.js"></script>
        <script src="backend/js/bootstrap.min.js"></script>
        <script src="backend/js/moment.js" type="text/javascript"></script>
        <script src="backend/js/bootstrap-datetimepicker.min.js"></script>
        <script src="backend/js/datatables.min.js" type="text/javascript"></script>
        <!-- Minify Js -->
        <script src="backend/js/minify-admin.js"></script>
        
        <script src="backend/js/jqueryUi/select2.full.min.js"></script>
        <!-- calendar -->
        <script src="backend/js/fullcalendar.min.js"></script>
        <!-- Fake Scroll -->
        <script src="backend/js/fakescroll.js"></script>
        <script src="backend/ckeditor/ckeditor.js" type="text/javascript"></script>
        
        @stack('script')
        <!-- photo upload -->
        <script src="backend/js/custom.js"></script>
        
        <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
        </script>

        
    </body>
</html>