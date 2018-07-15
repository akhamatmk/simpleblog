<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">


    <!-- Font -->

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">


    <!-- Stylesheets -->

    <link href="{{ asset('common-css/bootstrap.css') }}" rel="stylesheet">

    <link href="{{ asset('common-css/swiper.css') }}" rel="stylesheet">

    <link href="{{ asset('common-css/ionicons.css') }}" rel="stylesheet">


    <link href="{{ asset('front-page-category/css/styles.css?v=1') }}" rel="stylesheet">

    <link href="{{ asset('front-page-category/css/responsive.css') }}" rel="stylesheet">

</head>
<body >

    @yield('content')


    <!-- SCIPTS -->

    <script src="{{ asset('common-js/jquery-3.1.1.min.js') }}"></script>

    <script src="{{ asset('common-js/tether.min.js') }}"></script>

    <script src="{{ asset('common-js/bootstrap.js') }}"></script>

    <script src="{{ asset('common-js/swiper.js') }}"></script>

    <script src="{{ asset('common-js/scripts.js') }}"></script>

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>


     @yield('footer-script')
</body>
</html>
