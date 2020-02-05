@extends('layouts.layout')

@section('menu')
@endsection

@section('content')
    <!--WORK-->
    <section class="white-bg mar-tm-10" id="work">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h3 class="text-center">Список сотрудников</h3>
                </div>
                <div class="col-xs-12" style="min-height:350px;align-items: center">
                    <canvas id="canvas" width="600" height="350"></canvas>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 content-right">
                    @foreach($users as $row)
                        <div class="row">
                            <ul class="listing-item">
                                @foreach($row as $user)
                                    <li>
                                        <div class="col-md-4 col-sm-4" style="border:2px solid rgba(255, 90, 48, 1)">
                                            <p class="head-sm">
                                                <a href="{{route('users.show', ['user' => $user->id])}}">
                                                    {{$user->last_name.' '.$user->first_name.' '.$user->middle_name}}
                                                </a>
                                            </p>
                                            <p class="text-grey">
                                                {{'Проектов - '.$user->projects->count()}}<br>
                                            </p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--/.WORK END-->
@endsection