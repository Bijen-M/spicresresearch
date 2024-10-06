

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



        <!-- Bootstrap CSS -->

        <!-- <link rel="stylesheet" type="text/css" href="home/css/bootstrap.min.css"> -->

        <!-- icon font -->



        <link rel="stylesheet" type="text/css" href="home/fonts/icofont/icofont.min.css">

        <!-- extra infos css -->

        <link rel="stylesheet" type="text/css" href="home/css/combine.css">

        <!-- custom css -->

        <link rel="stylesheet" type="text/css" href="home/css/custom.css">

        <link rel="stylesheet" type="text/css" href="home/css/media.css">



        <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">



        @stack('style')



        <link rel="shortcut icon" href="home/images/favicon.ico" type="image/x-icon"/>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-143833116-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-143833116-1');
</script>

    </head>

    <body>

        <div id="loading">



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

    </div>  

        

        @yield('content')



        <!-- Optional JavaScript -->

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->

        <!-- <script src="home/js/jquery-3.3.1.min.js"></script>

        <script src="home/js/popper.min.js"></script>

        <script src="home/js/bootstrap.min.js" ></script> -->

        <script src="home/js/combine.js"></script>

        @stack('script')

        <script src="home/js/custom.js"></script>
       
        <script>
              window.fbAsyncInit = function() {
                FB.init({
                  appId      : '398179644025117',
                  cookie     : true,
                  xfbml      : true,
                  version    : 'v3.3'
                });
                  
                FB.AppEvents.logPageView();   
                  
              };

              (function(d, s, id){
                 var js, fjs = d.getElementsByTagName(s)[0];
                 if (d.getElementById(id)) {return;}
                 js = d.createElement(s); js.id = id;
                 js.src = "https://connect.facebook.net/en_US/sdk.js";
                 fjs.parentNode.insertBefore(js, fjs);
               }(document, 'script', 'facebook-jssdk'));
            </script>

    </body>

</html>