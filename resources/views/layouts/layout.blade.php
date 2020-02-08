<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Hello</title>
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Aleksandr Navosha" name="description">
    <meta content="yMka" name="author">
    <!--Fav-->
    <link href="{{asset('images/comics2.ico')}}" rel="shortcut icon">

    <!--styles-->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet">

    <!--fonts google-->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>

    <!--[if lt IE 9]>
    <script type="text/javascript" src="js/html5shiv.min.js"></script>
    <![endif]-->
</head>
<body>
@include('layouts.preloader')

@yield('menu')

<!--CONTENT WRAP-->
<div class="content-wrap">
    <!--CONTENT-->
    <div class="content">

    @yield('content')

   @include('layouts.footer')

        <!--/.CONTENT END-->
    </div>
    <!--/.CONTENT-WRAP END-->
</div>


<script src="{{asset('js/jquery-1.9.1.min.js')}} " type="text/javascript"></script>
<script src="{{asset('js/jquery.appear.js')}} " type="text/javascript"></script>
<script src="{{asset('js/bootstrap.min.js')}} " type="text/javascript"></script>
<script src="{{asset('js/classie.js')}} " type="text/javascript"></script>
<script src="{{asset('js/owl.carousel.min.js')}} " type="text/javascript"></script>
<script src="{{asset('js/jquery.magnific-popup.min.js')}} " type="text/javascript"></script>
<script src="{{asset('js/masonry.pkgd.min.js')}} " type="text/javascript"></script>
<script src="{{asset('js/masonry.js')}} " type="text/javascript"></script>
<script src="{{asset('js/smooth-scroll.min.js')}} " type="text/javascript"></script>
<script src="{{asset('js/typed.js')}} " type="text/javascript"></script>
<script src="{{asset('js/main.js')}} " type="text/javascript"></script>

@yield('scripts')
</body>
</html>