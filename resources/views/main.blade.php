@extends('layouts.layout')

@section('content')
    <!--WORK-->
    <section class="grey-bg mar-tm-10" id="work">
        <div class="container">
            <div class="row">
                {{--<div class="col-md-3">--}}
                    {{--<h3 class="title-small">--}}
                        {{--<span>Проекты</span>--}}
                    {{--</h3>--}}
                    {{--<p class="content-detail">--}}
                        {{--Проекты в которых я принимал участие.--}}
                    {{--</p>--}}
                {{--</div>--}}
                <div class="col-xs-12 content-right">
                    @foreach($users as $row)
                        <div class="row">
                            <ul class="listing-item">
                                @foreach($row as $user)
                                    <li>
                                        <div class="col-md-4 col-sm-4 bg-info">
                                            <p class="head-sm">
                                                <a href="{{route('users.show', ['user' => $user->id])}}">
                                                    {{$user->last_name.' '.$user->first_name.' '.$user->middle_name}}
                                                </a>
                                            </p>
                                            <p class="text-grey">
                                                {{--{{$project->desc}}<br>--}}
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