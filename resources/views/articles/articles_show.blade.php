@extends('layouts.main_layout')

@section('menu')
    @include('menu.main_menu')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="text-center">Просмотр</h1>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col">
                <div class="card text-center">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$article->name}}</h5>
                        <p class="card-text">{{$article->content}}</p>
                        <a href="{{route('articles.index')}}" type="button" class="btn btn-dark mb-2">Назад</a>
                    </div>
                    <div class="card-footer text-muted">
                        {{$article->date}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection