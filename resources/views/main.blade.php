@extends('layouts.main_layout')

@section('menu')
    @include('menu.main_menu')
@endsection

@section('content')
    <main role="main">
        <section class="jumbotron my-0 text-center">
            <div class="container">
                <h1>DID IT LOOK GOOD ON THE TELE?</h1>
                <p class="lead text-muted">
                    "© Tyson Fury after win"
                </p>
            </div>
        </section>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col">
                                <h5>
                                    Список сотрудников
                                </h5>
                            </div>
                        </div>
                        <hr>
                        @foreach($users as $row)
                            <div class="row">
                                @foreach($row as $user)
                                    <div class="card border-secondary mb-3">
                                        <div class="row no-gutters">
                                            <div class="col-lg-4">
                                                <img src="{{$user->image ? asset('storage/users/'.$user->id.'/'.$user->image):asset('images/default-mini.jpg')}}" class="card-img" alt="...">
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{$user->last_name.' '.$user->first_name.' '.$user->middle_name}}</h5>
                                                    <p class="card-text">{{'Skype - '.$user->skype}}</p>
                                                    <p class="card-text"><small class="text-muted">{{'Проектов - '.$user->projects->count()}}</small></p>
                                                    <a href="{{route('users.show', ['user' => $user->id])}}" type="button" class="btn btn-sm btn-outline-secondary">Профиль</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col">
                                <h5>
                                    Новости dev.by
                                </h5>
                            </div>
                        </div>
                        <hr>
                        @foreach($news as $item)
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="media">
                                        <div class="media-body">
                                            <h5 class="mt-0">
                                                <a href="{{$item->get_link()}}">
                                                    {{$item->get_title()}}
                                                </a>
                                            </h5>
                                            {{$item->get_description()}}
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
