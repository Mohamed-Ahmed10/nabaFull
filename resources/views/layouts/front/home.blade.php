<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <!--Responsive needs & IE-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0 , shrink-to-fit= no" />
        <meta http-equiv="X-UA-compatible" content="ie=edge" />
        <meta http-equiv="X-UA-Compatible" content="IE=7" />
        <!-- --------------- FOR IE9 below ----------------->
        <!--[if lt IE 9]-->
        <!--script(src="js/respond.min.js")-->
        <!--[endif]-->
        <!--Site description -->
        <!-- TODO------------------------------- Client remaining -->
        <meta name="keyword" content="" />
        <meta name="description"
            content="NABA was established in 2000. We provides information systems, technical support, research, hardware, systematic and network" />

        <!-- meta(http-equiv="refresh", content="0; url=index.html")-->
        <meta name="auther" content="Eng - Mohamed Ahmed" />
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
        <!--Windows phone-->
        <meta content="#" name="msapplication-navbutton-color" />
        <meta name="msapplication-TileImage" content="{{asset('front/assets/img/naba_logo.jpeg')}}" />
        <!-- Chrome, Firefox OS and Opera-->
        <meta content="#094aae" name="theme-color" />
        <!--Apple-->
        <link rel="apple-touch-icon" href="{{asset('front/assets/img/naba_logo.jpeg')}}" />
        <!--Open graph protocol Facebook integration-->
        <meta property="og:site_name" content="Naba soft" />
        <meta property="og:url" content="http://www.nabasoft.com" />
        <meta property="og:locale" content="en_US" />
        <meta property="og:description"
            content="Best ERP Software, HR, Real estate, Constructions, School system, Mobile App., Web development ... our branches at Dubai , Muscat , Ras Al Khaimah , Riyadh and Cairo from year  2000" />
        <meta property="og:title" content="" />
        <meta property="og:type" content="website" />
        <meta property="og:image" content="{{asset('front/assets/img/naba_logo.jpeg')}}" />
        <meta property="og:image:width" content="1200" />
        <meta property="og:image:height" content="630" />
        <!--Twitter integration-->
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:title" content="Naba software" />
        <meta name="twitter:image" content="{{asset('front/assets/img/naba_logo.jpeg')}}" />
        <meta name="twitter:description"
            content="Best ERP Software, HR, Real estate, Constructions, School system, Mobile App., Web development ... our branches at Dubai , Muscat , Ras Al Khaimah , Riyadh and Cairo from year  2000" />
        <meta name="generator" content="Powered by Naba soft company" />
        <link rel="icon" href="{{asset('front/assets/img/naba_logo.jpeg')}}" sizes="32x32" />
        <link rel="icon" href="{{asset('front/assets/img/naba_logo.jpeg')}}" sizes="192x192" />
        <meta name="language" content="English" />
        <link rel="canonical" href="" />
        <meta name="robots" content="index, follow" />
        <meta content="en" http-equiv="content-language" />
        <meta content="text/html;charset=UTF-8" http-equiv="content-type" />
        <meta content="text/javascript" http-equiv="content-script-type" />
        <meta content="text/css" http-equiv="content-style-type" />
        <meta name="copyright" content="Copyright 2023 Nabasoft.com, Inc." />
        <meta name="image" content="{{asset('front/assets/img/naba_logo.jpeg')}}" />
        <meta name="twitter:creator" content="@mohamedahmed" />
        <meta name="twitter:image:src" content="{{asset('front/assets/img/naba_logo.jpeg')}}" />
        <!-- title -->
        <!-- <title>Naba soft company</title> -->

        @yield('title')
        @yield('css')
        <!-- favicon -->
        <link rel="shortcut icon" type="image/png" href="{{asset('front/assets/img/naba_logo.jpeg')}}">

        <!-- fontawesome -->
        <link rel="stylesheet" href="{{asset('front/assets/css/all.min.css')}}">
        <!-- bootstrap -->
        <link rel="stylesheet" href="{{asset('front/assets/bootstrap/css/bootstrap.min.css')}}">
        <!-- owl carousel -->
        <link rel="stylesheet" href="{{asset('front/assets/css/owl.carousel.min.css')}}">
        <!-- magnific popup -->
        <link rel="stylesheet" href="{{asset('front/assets/css/magnific-popup.min.css')}}">
        <!-- animate css -->
        <link rel="stylesheet" href="{{asset('front/assets/css/animate.min.css')}}">
        <!-- mean menu css -->
        <link rel="stylesheet" href="{{asset('front/assets/css/meanmenu.min.css')}}">
        <!-- main style -->
        <link rel="stylesheet" href="{{asset('front/assets/css/main.min.css')}}">
        <!-- responsive -->
        <link rel="stylesheet" href="{{asset('front/assets/css/responsive.css')}}">

    </head>
    <body>
        <!--PreLoader-->
        <div class="loader">
            <div class="loader-inner">
                <div class="circle"></div>
            </div>
        </div>

        <!-- Page Header Start-->
        @include('layouts.front.navbar')

        <!-- Page Body Start-->
        @yield('content')

        <!-- footer Start-->
        @include('layouts.front.footer')
        <!-- jquery -->
        <script src="{{asset('front/assets/js/jquery-1.11.3.min.js')}}"></script>
        <!-- bootstrap -->
        <script src="{{asset('front/assets/bootstrap/js/bootstrap.min.js')}}"></script>
        <!-- count down -->
        <script src="{{asset('front/assets/js/jquery.countdown.js')}}"></script>
        <!-- isotope -->
        <script src="{{asset('front/assets/js/jquery.isotope-3.0.6.min.js')}}"></script>
        <!-- waypoints -->
        <script src="{{asset('front/assets/js/waypoints.js')}}"></script>
        <!-- owl carousel -->
        <script src="{{asset('front/assets/js/owl.carousel.min.js')}}"></script>
        <!-- magnific popup -->
        <script src="{{asset('front/assets/js/jquery.magnific-popup.min.js')}}"></script>
        <!-- mean menu -->
        <script src="{{asset('front/assets/js/jquery.meanmenu.min.js')}}"></script>
        <!-- sticker js -->
        <script src="{{asset('front/assets/js/sticker.js')}}"></script>
        <!-- main js -->
        <script src="{{asset('front/assets/js/main.js')}}"></script>

        @yield('script')

    </body>
</html>
