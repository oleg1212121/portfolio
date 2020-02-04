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
<!--PRELOADER-->
<div id="preloader">
    <div id="status">
        <img alt="logo" src="{{asset('images/grey-logo.svg')}}">
    </div>
</div>
<!--/.PRELOADER END-->

<!--HEADER -->
<div class="header">
    <div class="for-sticky">
        <!--LOGO-->
        <div class="col-md-2 col-xs-6 logo">
            <a href="index.html">
                <img alt="logo" class="logo-nav" src="{{asset('images/black-logo.svg')}}">
            </a>
        </div>
        <!--/.LOGO END-->
    </div>
    <div class="menu-wrap">
        <nav class="menu">
            <div class="menu-list">
                <a data-scroll="" href="#home" class="active">
                    <span>Главная</span>
                </a>
                <a data-scroll="" href="#about">
                    <span>Обо мне</span>
                </a>
                <a data-scroll="" href="#work">
                    <span>Проекты</span>
                </a>
                <a data-scroll="" href="#services">
                    <span>Услуги</span>
                </a>
                <a data-scroll="" href="#skill">
                    <span>Навыки</span>
                </a>
                <a data-scroll="" href="#education">
                    <span>Образование</span>
                </a>
                <a data-scroll="" href="#contact">
                    <span>Контакты</span>
                </a>
                <a href="{{route('articles.index')}}">
                    <span>Новости</span>
                </a>
            </div>
        </nav>
        <button class="close-button" id="close-button">Закрыть</button>
    </div>
    <button class="menu-button" id="open-button">
        <span></span>
        <span></span>
        <span></span>
    </button>
</div>
<!--/.HEADER END-->

<!--CONTENT WRAP-->
<div class="content-wrap">
    <!--CONTENT-->
    <div class="content">

    @yield('content')

    <!--FOOTER-->
        <footer>
            <div class="footer-top">
                <ul class="socials">
                    <li class="tut">
                        {{--<a href="{{$user->cv}}"--}}
                           {{--data-hover="Jobs.tut.by">Jobs.tut.by</a>--}}
                    </li>
                    <li class="linkedin">
                        {{--<a href="{{$user->cv}}"--}}
                           {{--data-hover="LinkedIn">LinkedIn</a>--}}
                    </li>
                </ul>
            </div>

            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <img src="images/grey-logo.svg" alt="logo bottom" class="center-block"/>
                    </div>
                </div>
            </div>
        </footer>
        <!--/.FOOTER-END-->

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
</body>
</html>