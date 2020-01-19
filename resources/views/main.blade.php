<!DOCTYPE html>
<html lang="en">
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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

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
        <img alt="logo" src="images/grey-logo.svg">
    </div>
</div>
<!--/.PRELOADER END-->

<!--HEADER -->
<div class="header">
    <div class="for-sticky">
        <!--LOGO-->
        <div class="col-md-2 col-xs-6 logo">
            <a href="index.html">
                <img alt="logo" class="logo-nav" src="images/black-logo.svg">
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
        <!--HOME-->
        <section id="home">
            <div class="container">
                <div class="row">
                    <div class="wrap-hero-content">
                        <div class="hero-content">
                            <h1>Дароу</h1>
                            <br>
                            <span class="typed"></span>
                        </div>
                    </div>
                    <div class="mouse-icon">
                        <div class="scroll"></div>
                    </div>
                </div>
            </div>
        </section>
        <!--/.HOME END-->

        <!--ABOUT-->
        <section id="about">
            <div class="col-md-6 col-xs-12 no-pad">
                <div class="bg-about"></div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12 white-col">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 white-col">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
                                <div class="wrap-about">
                                    {{--<canvas id="canvas" width="600" height="350"></canvas>--}}
                                    <table class="w-content">
                                        <tr>
                                            <td class="title">Фамилия</td>
                                            <td class="break">:</td>
                                            <td>{{$user->last_name}}</td>
                                        </tr>
                                        <tr>
                                            <td class="title">Имя</td>
                                            <td class="break">:</td>
                                            <td>{{$user->first_name}}</td>
                                        </tr>
                                        <tr>
                                            <td class="title">Отчество</td>
                                            <td class="break">:</td>
                                            <td>{{$user->middle_name}}</td>
                                        </tr>
                                        <tr>
                                            <td class="title">Email</td>
                                            <td class="break">:</td>
                                            <td>{{$user->email}}</td>
                                        </tr>
                                        <tr>
                                            <td class="title">Skype</td>
                                            <td class="break">:</td>
                                            <td>{{$user->skype}}</td>
                                        </tr>
                                        <tr>
                                            <td class="title">LinkedIn</td>
                                            <td class="break">:</td>
                                            <td>
                                                <a href="{{$user->linkedin}}">
                                                    {{"{$user->last_name} {$user->first_name}"}}
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="title">Резюме</td>
                                            <td class="break">:</td>
                                            <td>
                                                <a href="{{$user->cv}}">
                                                    {{"{$user->last_name} {$user->first_name}"}}
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/.ABOUT END-->

        <!--WORK-->
        <section class="grey-bg mar-tm-10" id="work">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <h3 class="title-small">
                            <span>Проекты</span>
                        </h3>
                        <p class="content-detail">
                            Проекты в которых я принимал участие.
                        </p>
                    </div>
                    <div class="col-md-9 content-right">
                        <div class="row">
                            <ul class="listing-item">
                                @foreach($user->projects as $project)
                                    <li>
                                        <div class="col-md-4 col-sm-4">
                                            <p class="head-sm">
                                                <a href="{{$project->link}}">
                                                    {{$project->name}}
                                                </a>
                                            </p>
                                            <p class="text-grey">
                                                {{$project->desc}}<br>
                                            </p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/.WORK END-->

        <!--SERVICES-->
        <section class="white-bg" id="services">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <h3 class="title-small">
                            <span>Услуги</span>
                        </h3>
                        <p class="content-detail">
                            Чем я занимаюсь.
                        </p>
                    </div>
                    <div class="col-md-9 content-right">
                        <div class="row">
                            @foreach($user->services->chunk(3) as $chunk)
                                <ul class="listing-item">
                                    @foreach($chunk as $service)
                                        <li>
                                            <div class="col-md-4 col-sm-4">
                                                <h3 class="icon-use">
                                                    {{$service->image}}
                                                </h3>
                                                <p class="head-sm">
                                                    {{$service->name}}
                                                </p>
                                                <p class="text-grey">
                                                    {{$service->desc}}
                                                </p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/.SERVICES END-->

        <!--SKILLS-->
        <section class="grey-bg" id="skill">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <h3 class="title-small">
                            <span>Навыки</span>
                        </h3>
                        <p class="content-detail">
                            Технологии используемые в работе.
                        </p>
                    </div>
                    <div class="col-md-9 content-right">
                        <!--SKILLIST-->
                        <div class="skillst">
                            @foreach($user->skills as $skill)
                                <div class="skillbar" data-percent="{{$skill->performance}}%">
                                    <div class="title head-sm">
                                        {{$skill->name}}
                                    </div>
                                    <div class="count-bar">
                                        <div class="count"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!--/.SKILLIST END-->
                    </div>
                </div>
            </div>
        </section>
        <!--/.SKILLS END-->

        <!--EDUCATION-->
        <section class="white-bg" id="education">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <h3 class="title-small">
                            <span>Образование</span>
                        </h3>
                        <p class="content-detail">
                            Оконченные учебные заведения.
                        </p>
                    </div>
                    <div class="col-md-9 content-right">
                        <div class="row">
                            <ul class="listing-item">
                                @foreach($user->educations as $education)
                                    <li>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="wrap-card">
                                                <div class="card">
                                                    <h2 class="year">
                                                        {{"{$education->start} - {$education->end}"}}
                                                    </h2>
                                                    <p class="job">
                                                        {{$education->name}}
                                                    </p>
                                                    <p class="company">
                                                        {{$education->institute}}
                                                    </p>
                                                    <hr>
                                                    <div class="text-detail">
                                                        <p>
                                                            {{$education->desc}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/.EDUCATION END-->

        <!--CONTACT-->
        <section id="contact" class="grey-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <h3 class="title-small">
                            <span>Контакты</span>
                        </h3>
                        <p class="content-detail">
                            Свяжитесь со мной.
                        </p>
                    </div>
                    <div class="col-md-9 content-right">
                        <form>
                            <div class="group">
                                <input required="" type="text"><span class="highlight"></span><span
                                        class="bar"></span><label>Имя</label>
                            </div>
                            <div class="group">
                                <input required="" type="email"><span class="highlight"></span><span class="bar"></span><label>Email</label>
                            </div>
                            <div class="group">
                                <textarea required=""></textarea><span class="highlight"></span><span
                                        class="bar"></span><label>Сообщение</label>
                            </div>
                            <input id="sendMessage" name="sendMessage" type="submit" value="Отправить сообщение">
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!--/.CONTACT END-->

        <!--FOOTER-->
        <footer>
            <div class="footer-top">
                <ul class="socials">
                    <li class="tut">
                        <a href="{{$user->cv}}"
                           data-hover="Jobs.tut.by">Jobs.tut.by</a>
                    </li>
                    <li class="linkedin">
                        <a href="{{$user->cv}}"
                           data-hover="LinkedIn">LinkedIn</a>
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