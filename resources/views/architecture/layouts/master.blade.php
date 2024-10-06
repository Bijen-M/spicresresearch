<!doctype html>

<html lang="en">

    <head>

        <!--  meta tags -->

        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <base href="{{ asset('/') }}">       

        <meta name="csrf-token" content="{{ csrf_token() }}">


@if(isset($seo))
        <title>{{ $seo->title }} | {{ $settings->website_name??null }}</title>
        <meta name="title" content="{{ $seo->title }} | {{ $settings->website_name??null }}">
        <meta name="keywords" content="{{ $seo->keys }}">
        <meta name="description" content="{{ $seo->description }}">
        
        <meta property="og:title" content="{{ request()->route()->getName() == 'home' ? $settings->website_name : $seo->title }}">
        <meta property="og:description" content="{{ $seo->description }}">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:site_name" content="{{ $settings->website_name }}">
        <meta property="og:type" content="website">
        <meta property="fb:app_id" content="398179644025117">
        
        <meta name="twitter:card" content="summary">
        <meta name="twitter:title" content="{{ request()->route()->getName() == 'home' ? $settings->website_name : $seo->title }}">
        <meta name="twitter:description" content="{{ $seo->description }}">
        <meta name="twitter:site" content="{{ url()->current() }}">
<?php $mata_image = $mimage ?? $settings->picture ? $settings->picture->upload.$settings->picture->url : null ?>
@if($mata_image)
        <meta name="image" content="{{ asset($mata_image) }}">
        <meta property="og:image" content="{{ asset($mata_image) }}">
        <meta name="twitter:image" content="{{ asset($mata_image) }}">
@endif
@else
        <title>{{ $settings->website_name??null }}</title>
@endif



        <link rel="stylesheet" type="text/css" href="architecture/css/animate.css">

        <link rel="stylesheet" type="text/css" href="architecture/css/plugin.css">

        <link rel="stylesheet" type="text/css" href="architecture/fonts/icofont/icofont.min.css">

        <link rel="stylesheet" type="text/css" href="architecture/fonts/line-awesome/css/line-awesome.min.css">

        <link rel="stylesheet" type="text/css" href="architecture/css/slit-slider.css">

        <link rel="stylesheet" type="text/css" href="architecture/css/style.css">



        @stack('style')



        <link rel="stylesheet" type="text/css" href="architecture/css/custom.css">

        <link rel="stylesheet" type="text/css" href="architecture/css/media.css">

        <script type="text/javascript" src="architecture/js/modernizr.custom.79639.js"></script>



        <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Teko:400,500,600,700" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Charm:400,700" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,600,700,800,900" rel="stylesheet">





        <link rel="shortcut icon" href="home/images/favicon.ico" type="image/x-icon"/>

        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-143833116-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-143833116-1');
</script>

    </head>

    <body class="thetop">



        <div id="loading">

            <div id="loading-center-absolute">

                <div class="loading-1"></div>

                <div class="loading-2">Loading...</div>

            </div>

        </div>



        @include('architecture.partials._header')

        @if(request()->route()->getName() == 'architecture.home')

        @include('architecture.partials._slider')

        @else

        @include('architecture.partials._breadcrumb')

        @endif



        <main>

            @yield('content')

        </main>

        @if(request()->route()->getName() != 'architecture.home')

        @include('architecture.partials._footer')

        @endif



        <div class='scrolltop'>

            <div class='scroll icon'><i class="la la-angle-up"></i></div>

        </div>



        <!-- Optional JavaScript -->

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->

        <script src="architecture/js/jquery-3.3.1.min.js"></script>

        <script src="architecture/js/plugin.js"></script>
        <script src="architecture/js/jquery.ba-cond.min.js"></script>
        <script src="architecture/js/jquery.slitslider.js"></script>



        @stack('script')



        <script src="architecture/js/custom.js"></script>

        <script type="text/javascript">
                $(function() {

                  var Page = (function() {

                    var $navArrows = $( '#nav-arrows' ),
                    $nav = $( '#nav-dots > span' ),
                    slitslider = $( '#slider' ).slitslider( {
                      onBeforeChange : function( slide, pos ) {

                        $nav.removeClass( 'nav-dot-current' );
                        $nav.eq( pos ).addClass( 'nav-dot-current' );

                      }
                    } ),

                    init = function() {

                      initEvents();

                    },
                    initEvents = function() {

            // add navigation events
            $navArrows.children( ':last' ).on( 'click', function() {

              slitslider.next();
              return false;

            } );

            $navArrows.children( ':first' ).on( 'click', function() {

              slitslider.previous();
              return false;

            } );

            $nav.each( function( i ) {

              $( this ).on( 'click', function( event ) {

                var $dot = $( this );

                if( !slitslider.isActive() ) {

                  $nav.removeClass( 'nav-dot-current' );
                  $dot.addClass( 'nav-dot-current' );

                }

                slitslider.jump( i + 1 );
                return false;

              } );

            } );

            };

            return { init : init };

            })();

            Page.init();



            });
        </script>

    </body>

</html>