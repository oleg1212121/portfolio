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

                                    <canvas id="canvas" width="600" height="350"></canvas>
                                    <table class="w-content">
                                        <tr>
                                            <td class="title">Фамилия </td>
                                            <td class="break">:</td>
                                            <td> Навоша</td>
                                        </tr>
                                        <tr>
                                            <td class="title">Имя </td>
                                            <td class="break">:</td>
                                            <td> Александр</td>
                                        </tr>
                                        <tr>
                                            <td class="title">Отчество </td>
                                            <td class="break">:</td>
                                            <td> Юрьевич</td>
                                        </tr>
                                        <tr>
                                            <td class="title">Email </td>
                                            <td class="break">:</td>
                                            <td> blr.ymka@tut.by</td>
                                        </tr>
                                        <tr>
                                            <td class="title">Skype </td>
                                            <td class="break">:</td>
                                            <td> aleksandr.12131</td>
                                        </tr>
                                        <tr>
                                            <td class="title">LinkedIn </td>
                                            <td class="break">:</td>
                                            <td>
                                                <a href="https://www.linkedin.com/in/aleksandr-nav-634303182/">
                                                    Aleksandr Nav
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="title">Резюме </td>
                                            <td class="break">:</td>
                                            <td>
                                                <a href="https://jobs.tut.by/resume/877438abff017c65090039ed1f66494a314c47">
                                                    Aleksandr Nav
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
                                <li>
                                    <div class="col-md-4 col-sm-4">
                                        <p class="head-sm">
                                            <a href="http://basheltorg.ru">
                                                basheltorg.ru
                                            </a>
                                        </p>
                                        <p class="text-grey">
                                            Система ведения закупок государственных учреждений Республики Башкортостан.
                                            Занимался разработкой back-end с использованием laravel 5.7/Postgres, front-end
                                            с использованием vue.js. <br>
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="col-md-4 col-sm-4">
                                        <p class="head-sm">
                                            <a href="https://edu360.ru">
                                                edu360.ru
                                            </a>
                                        </p>
                                        <p class="text-grey">
                                            Информационная система EDU360 - система ведения образовательного процесса средних
                                            и высших учебных заведений РФ. Занимался в основном back-end разработкой с использованием
                                            laravel 5.7/MySQL.
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="col-md-4 col-sm-4">
                                        <p class="head-sm">
                                            <a href="https://proton-lab.ru">
                                                proton-lab.ru
                                            </a>
                                        </p>
                                        <p class="text-grey">
                                            Корпоративный сайт компании. Занимался переработкой серверной части, с использованием laravel 5.7.
                                        </p>
                                    </div>
                                </li>
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
                            <ul class="listing-item">
                                <li>
                                    <div class="col-md-4 col-sm-4">
                                        <h3 class="icon-use">
                                            m
                                        </h3>
                                        <p class="head-sm">
                                            Back-end
                                        </p>
                                        <p class="text-grey">
                                            Разработка серверной части приложений
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="col-md-4 col-sm-4">
                                        <h3 class="icon-use">
                                            n
                                        </h3>
                                        <p class="head-sm">
                                            Database
                                        </p>
                                        <p class="text-grey">
                                            Проектирование структуры баз данных приложений
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <div class="col-md-4 col-sm-4">
                                        <h3 class="icon-use">
                                            g
                                        </h3>
                                        <p class="head-sm">
                                            UI/UX
                                        </p>
                                        <p class="text-grey">
                                            Продумывание функционала приложений для удобства использования
                                        </p>
                                    </div>
                                </li>
                            </ul>
                            <ul class="listing-item">
                                <li>
                                    <div class="col-md-4 col-sm-4">
                                        <h3 class="icon-use">
                                            c
                                        </h3>
                                        <p class="head-sm">
                                            Management
                                        </p>
                                        <p class="text-grey">
                                            Создание функционала для управления приложением/автоматизации процессов
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <div class="col-md-4 col-sm-4">
                                        <h3 class="icon-use">
                                            d
                                        </h3>
                                        <p class="head-sm">
                                            SPA
                                        </p>
                                        <p class="text-grey">
                                            Разработка single page application
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <div class="col-md-4 col-sm-4">
                                        <h3 class="icon-use">
                                            U
                                        </h3>
                                        <p class="head-sm">
                                            Front-end
                                        </p>
                                        <p class="text-grey">
                                            Разработка клиентской части приложений
                                        </p>
                                    </div>
                                </li>
                            </ul>

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
                            <div class="skillbar" data-percent="65%">
                                <div class="title head-sm">
                                    HTML 5
                                </div>
                                <div class="count-bar">
                                    <div class="count"></div>
                                </div>
                            </div>
                            <div class="skillbar" data-percent="70%">
                                <div class="title head-sm">
                                    CSS 3
                                </div>
                                <div class="count-bar">
                                    <div class="count"></div>
                                </div>
                            </div>
                            <div class="skillbar" data-percent="65%">
                                <div class="title head-sm">
                                    js
                                </div>
                                <div class="count-bar">
                                    <div class="count"></div>
                                </div>
                            </div>
                            <div class="skillbar" data-percent="58%">
                                <div class="title head-sm">
                                    vue.js
                                </div>
                                <div class="count-bar">
                                    <div class="count"></div>
                                </div>
                            </div>
                            <div class="skillbar" data-percent="65%">
                                <div class="title head-sm">
                                    PHP
                                </div>
                                <div class="count-bar">
                                    <div class="count"></div>
                                </div>
                            </div>
                            <div class="skillbar" data-percent="73%">
                                <div class="title head-sm">
                                    laravel
                                </div>
                                <div class="count-bar">
                                    <div class="count"></div>
                                </div>
                            </div>
                            <div class="skillbar" data-percent="65%">
                                <div class="title head-sm">
                                    sql
                                </div>
                                <div class="count-bar">
                                    <div class="count"></div>
                                </div>
                            </div>
                            <div class="skillbar" data-percent="80%">
                                <div class="title head-sm">
                                    git
                                </div>
                                <div class="count-bar">
                                    <div class="count"></div>
                                </div>
                            </div>
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
                                <li>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="wrap-card">
                                            <div class="card">
                                                <h2 class="year">
                                                    2002 - 2006
                                                </h2>
                                                <p class="job">
                                                    Автомобилестроение
                                                </p>
                                                <p class="company">
                                                    Минский государственный автомеханический колледж
                                                </p>
                                                <hr>
                                                <div class="text-detail">
                                                    <p>
                                                        Очная форма обучения. Специальность - техник-технолог.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="wrap-card">
                                            <div class="card">
                                                <h2 class="year">
                                                    2006 - 2012
                                                </h2>
                                                <p class="job">
                                                    Автомобилестроение
                                                </p>
                                                <p class="company">
                                                    Белорусский национальный технический университет
                                                </p>
                                                <hr>
                                                <div class="text-detail">
                                                    <p>
                                                        Заочная форма обучения, автотракторный факультет. Специальность - инженер.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
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
                                <input required="" type="text"><span class="highlight"></span><span class="bar"></span><label>Имя</label>
                            </div>
                            <div class="group">
                                <input required="" type="email"><span class="highlight"></span><span class="bar"></span><label>Email</label>
                            </div>
                            <div class="group">
                                <textarea required=""></textarea><span class="highlight"></span><span class="bar"></span><label>Сообщение</label>
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
                        <a href="https://jobs.tut.by/resume/877438abff017c65090039ed1f66494a314c47" data-hover="Jobs.tut.by">Jobs.tut.by</a>
                    </li>
                    <li class="linkedin">
                        <a href="https://www.linkedin.com/in/aleksandr-nav-634303182/" data-hover="LinkedIn">LinkedIn</a>
                    </li>
                </ul>
            </div>

            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <img src="images/grey-logo.svg" alt="logo bottom" class="center-block" />
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