<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Greek Capital</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    <link rel="stylesheet" href="{{ URL::asset('front-end/img/favicon.png') }}"/>
    <link rel="apple-touch-icon" href="{{ URL::asset('front-end/img/apple-touch-icon.png') }}"/>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700"
          rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link rel="stylesheet" href="{{ URL::asset('front-end/lib/bootstrap/css/bootstrap.min.css') }}"/>

    <!-- Libraries CSS Files -->
    <link rel="stylesheet" href="{{ URL::asset('front-end/lib/font-awesome/css/font-awesome.min.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('front-end/lib/animate/animate.min.css') }}"/>

    <!-- Main Stylesheet File -->
    <link rel="stylesheet" href="{{ URL::asset('front-end/css/style.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('css/animate.css') }}"/>
    <!-- =======================================================
      Author: AnhNT
      License: https://bootstrapmade.com/license/
    ======================================================= -->
</head>
<body>
@include('front-end.layouts.header')
<!--==========================
   Section
============================-->
@include('front-end.layouts.section')
<!--==========================
   Content
============================-->
<main id="main">
    @yield('content')
</main>
<!--==========================
  Footer
============================-->
@include('front-end.layouts.footer')
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
</body>

<!-- JavaScript Libraries -->
<script src="{{ URL::asset('front-end/lib/jquery/jquery.min.js') }}"></script>
<script src="{{ URL::asset('front-end/lib/jquery/jquery-migrate.min.js') }}"></script>
<script src="{{ URL::asset('front-end/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ URL::asset('front-end/lib/easing/easing.min.js') }}"></script>
<script src="{{ URL::asset('front-end/lib/wow/wow.min.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script>

<script src="{{ URL::asset('front-end/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ URL::asset('front-end/lib/counterup/counterup.min.js') }}"></script>
<script src="{{ URL::asset('front-end/lib/superfish/hoverIntent.js') }}"></script>
<script src="{{ URL::asset('front-end/lib/superfish/superfish.min.js') }}"></script>

<!-- Contact Form JavaScript File -->
<script src="{{ URL::asset('front-end/contactform/contactform.js') }}"></script>

<!-- Template Main Javascript File -->
<script src="{{ URL::asset('front-end/js/main.js') }}"></script>
<script src="{{ URL::asset('front-end/js/jquery.particleground.js') }}"></script>
<script src="{{ URL::asset('front-end/js/jquery.particleground.min.js') }}"></script>
<script src="{{ URL::asset('front-end/js/particleground.js') }}"></script>

</html>