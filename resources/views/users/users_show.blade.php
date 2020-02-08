@extends('layouts.main_layout')

@section('menu')
    @include('menu.main_menu')
@endsection

@section('content')
    <!--HOME-->
    <section id="home">
        <div class="container">
            <div class="row">
                <div class="col-12 wrap-hero-content">
                    <div class="hero-content">
                        <h1>Дароу</h1>
                        <br>
                        <span class="typed">"._."</span>
                    </div>
                </div>
                <div class="col-12 mouse-icon">
                    <div class="scroll"></div>
                </div>
            </div>
        </div>
    </section>
    <!--/.HOME END-->

    <!--ABOUT-->
    <section id="about">
        <div class="row">
            <div class="col-md-6 no-gutters no-pad">
                <div class="bg-about"></div>
            </div>
            <div class="col-md-6 no-gutters no-pad">
                <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 white-col">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
                            <div class="wrap-about">
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
                        @foreach($user->projects as $project)
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <a href="{{$project->link}}">
                                                {{$project->name}}
                                            </a>
                                        </h5>
                                        {{--<h6 class="card-subtitle mb-2 text-muted">{{$education->name}}</h6>--}}
                                        <p class="card-text">
                                            {{$project->desc}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/.WORK END-->

    {{--<!--SERVICES-->--}}
    {{--<section class="white-bg" id="services">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-3">--}}
                    {{--<h3 class="title-small">--}}
                        {{--<span>Услуги</span>--}}
                    {{--</h3>--}}
                    {{--<p class="content-detail">--}}
                        {{--Чем я занимаюсь.--}}
                    {{--</p>--}}
                {{--</div>--}}
                {{--<div class="col-md-9 content-right">--}}
                    {{--<div class="row">--}}
                        {{--@foreach($user->services->chunk(3) as $chunk)--}}
                            {{--<ul class="listing-item">--}}
                                {{--@foreach($chunk as $service)--}}
                                    {{--<li>--}}
                                        {{--<div class="col-md-4 col-sm-4">--}}
                                            {{--<h3 class="icon-use">--}}
                                                {{--{{$service->image}}--}}
                                            {{--</h3>--}}
                                            {{--<p class="head-sm">--}}
                                                {{--{{$service->name}}--}}
                                            {{--</p>--}}
                                            {{--<p class="text-grey">--}}
                                                {{--{{$service->desc}}--}}
                                            {{--</p>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                {{--@endforeach--}}
                            {{--</ul>--}}
                        {{--@endforeach--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
    {{--<!--/.SERVICES END-->--}}

    {{--<!--SKILLS-->--}}
    {{--<section class="grey-bg" id="skill">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-3">--}}
                    {{--<h3 class="title-small">--}}
                        {{--<span>Навыки</span>--}}
                    {{--</h3>--}}
                    {{--<p class="content-detail">--}}
                        {{--Технологии используемые в работе.--}}
                    {{--</p>--}}
                {{--</div>--}}
                {{--<div class="col-md-9 content-right">--}}
                    {{--<!--SKILLIST-->--}}
                    {{--<div class="skillst">--}}
                        {{--@foreach($user->skills as $skill)--}}
                            {{--<div class="skillbar" data-percent="{{$skill->performance}}%">--}}
                                {{--<div class="title head-sm">--}}
                                    {{--{{$skill->name}}--}}
                                {{--</div>--}}
                                {{--<div class="count-bar">--}}
                                    {{--<div class="count"></div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--@endforeach--}}
                    {{--</div>--}}
                    {{--<!--/.SKILLIST END-->--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
    {{--<!--/.SKILLS END-->--}}

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
                        @foreach($user->educations as $education)
                            <div class="col-md-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            {{$education->institute}}
                                        </h5>
                                        <h6 class="card-subtitle mb-2 text-muted">{{$education->name}}</h6>
                                        <p class="card-text">
                                            {{$education->desc}}
                                            <br>
                                            {{"{$education->start} - {$education->end}"}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/.EDUCATION END-->

    {{--<!--CONTACT-->--}}
    {{--<section id="contact" class="grey-bg">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-3">--}}
                    {{--<h3 class="title-small">--}}
                        {{--<span>Контакты</span>--}}
                    {{--</h3>--}}
                    {{--<p class="content-detail">--}}
                        {{--Свяжитесь со мной.--}}
                    {{--</p>--}}
                {{--</div>--}}
                {{--<div class="col-md-9 content-right">--}}
                    {{--<form>--}}
                        {{--<div class="group">--}}
                            {{--<input required="" type="text"><span class="highlight"></span><span--}}
                                    {{--class="bar"></span><label>Имя</label>--}}
                        {{--</div>--}}
                        {{--<div class="group">--}}
                            {{--<input required="" type="email"><span class="highlight"></span><span class="bar"></span><label>Email</label>--}}
                        {{--</div>--}}
                        {{--<div class="group">--}}
                            {{--<textarea required=""></textarea><span class="highlight"></span><span--}}
                                    {{--class="bar"></span><label>Сообщение</label>--}}
                        {{--</div>--}}
                        {{--<input id="sendMessage" name="sendMessage" type="submit" value="Отправить сообщение">--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
    {{--<!--/.CONTACT END-->--}}
@endsection