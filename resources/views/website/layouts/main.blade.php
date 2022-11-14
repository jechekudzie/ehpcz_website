<?php
/**
 * Created by PhpStorm for ehpcz
 * User: VinceGee
 * Date: 8/4/2022
 * Time: 11:11 AM
 */ ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- For IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- For Resposive Device -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- For Window Tab Color -->
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#061948">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#061948">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#061948">
    <title>@hasSection('template_title')@yield('template_title') | @endif EHPCZ</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="56x56" href="{{asset('web_assets/images/fav-icon/icon.png')}}">
    <!-- Main style sheet -->
    <link rel="stylesheet" type="text/css" href="{{asset('web_assets/css/style.css')}}">
    <!-- responsive style sheet -->
    <link rel="stylesheet" type="text/css" href="{{asset('web_assets/css/responsive.css')}}">

    <!-- Fix Internet Explorer ______________________________________-->
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script src="{{asset('web_assets/vendor/html5shiv.js')}}"></script>
    <script src="{{asset('web_assets/vendor/respond.js')}}"></script>
    <![endif]-->
    <x-notyf::styles/>
</head>

<body>
<div class="main-page-wrapper">

    <!-- ===================================================
        Loading Transition
    ==================================================== -->
    <div id="loader-wrapper">
        <div id="loader"></div>
    </div>

    @include('website.layouts.site-header')

    @yield('content')
    <!--
    =====================================================
        Footer
    =====================================================
    -->
    @include('website.layouts.footer')



    <!-- Optional JavaScript _____________________________  -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- jQuery -->
    <script src="{{asset('web_assets/vendor/jquery.2.2.3.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('web_assets/vendor/popper.js/popper.min.js')}}"></script>
    <!-- Bootstrap JS -->
    <script src="{{asset('web_assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- Camera Slider -->
    <script src='{{asset('web_assets/vendor/Camera-master/scripts/jquery.mobile.customized.min.js')}}'></script>
    <script src='{{asset('web_assets/vendor/Camera-master/scripts/jquery.easing.1.3.js')}}'></script>
    <script src='{{asset('web_assets/vendor/Camera-master/scripts/camera.min.js')}}'></script>
    <!-- menu  -->
    <script src="{{asset('web_assets/vendor/menu/src/js/jquery.slimmenu.js')}}"></script>
    <!-- WOW js -->
    <script src="{{asset('web_assets/vendor/WOW-master/dist/wow.min.js')}}"></script>
    <!-- owl.carousel -->
    <script src="{{asset('web_assets/vendor/owl-carousel/owl.carousel.min.js')}}"></script>
    <!-- js count to -->
    <script src="{{asset('web_assets/vendor/jquery.appear.js')}}"></script>
    <script src="{{asset('web_assets/vendor/jquery.countTo.js')}}"></script>
    <!-- Fancybox -->
    <script src="{{asset('web_assets/vendor/fancybox/dist/jquery.fancybox.min.js')}}"></script>

    @yield('footer_scripts')

    <!-- Theme js -->
    <script src="{{asset('web_assets/js/theme.js')}}"></script>
    <x-notyf::scripts/>
</div> <!-- /.main-page-wrapper -->
</body>
</html>
