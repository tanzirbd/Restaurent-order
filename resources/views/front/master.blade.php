<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tomato Responsive Restaurant HTML5 Template</title>
    <meta name="author" content="Surjith S M">

    <!-- SEO -->
    <meta name="description" content="Tomato is a Responsive HTML5 Template for Restaurants and food related services.">
    <meta name="keywords" content="tomato, responsive, html5, restaurant, template, food, reservation">

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ url('front_resturent') }}/img/favicon.ico">

    <!-- Responsive Tag -->
    <meta name="viewport" content="width=device-width">

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ url('front_resturent') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('front_resturent') }}/css/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="{{ url('front_resturent') }}/css/plugin.css">
    <link rel="stylesheet" href="{{ url('front_resturent') }}/js/vendor/vegas/vegas.min.css">
    <link rel="stylesheet" href="{{ url('front_resturent') }}/css/main.css">

    <!--[if lt IE 9]>
    <script src="{{ url('front_resturent') }}/js/vendor/html5-3.6-respond-1.4.2.min.js"></script>
    <![endif]-->
</head>

<body id="intro3">

<!-- Preloder-->
<div class="preloder animated">
    <div class="scoket">
        <img src="{{ url('front_resturent') }}/img/preloader.svg" alt=""/>
    </div>
</div>

<div class="body">

    @include('front.includes.header')

    @yield('body_content')

    @include('front.includes.footer')

</div>


<!-- Javascript -->
<script src="{{ url('front_resturent') }}/js/vendor/jquery-1.11.2.min.js"></script>
<script src="{{ url('front_resturent') }}/js/vendor/bootstrap.min.js"></script>
<script src="{{ url('front_resturent') }}/js/vendor/jquery.flexslider-min.js"></script>
<script src="{{ url('front_resturent') }}/js/vendor/spectragram.js"></script>
<script src="{{ url('front_resturent') }}/js/vendor/owl.carousel.min.js"></script>
<script src="{{ url('front_resturent') }}/js/vendor/velocity.min.js"></script>
<script src="{{ url('front_resturent') }}/js/vendor/velocity.ui.min.js"></script>
<script src="{{ url('front_resturent') }}/js/vendor/bootstrap-datepicker.min.js"></script>
<script src="{{ url('front_resturent') }}/js/vendor/bootstrap-clockpicker.min.js"></script>
<script src="{{ url('front_resturent') }}/js/vendor/jquery.magnific-popup.min.js"></script>
<script src="{{ url('front_resturent') }}/js/vendor/isotope.pkgd.min.js"></script>
<script src="{{ url('front_resturent') }}/js/vendor/slick.min.js"></script>
<script src="{{ url('front_resturent') }}/js/vendor/wow.min.js"></script>
<script src="{{ url('front_resturent') }}/js/animation.js"></script>
<script src="{{ url('front_resturent') }}/js/vendor/vegas/vegas.min.js"></script>
<script src="{{ url('front_resturent') }}/js/vendor/jquery.mb.YTPlayer.js"></script>
<script src="{{ url('front_resturent') }}/js/vendor/jquery.stellar.js"></script>
<script src="{{ url('front_resturent') }}/js/main.js"></script>
<script src="{{ url('front_resturent') }}/js/vendor/mc/jquery.ketchup.all.min.js"></script>
<script src="{{ url('front_resturent') }}/js/vendor/mc/main.js"></script>

</body>

</html>
