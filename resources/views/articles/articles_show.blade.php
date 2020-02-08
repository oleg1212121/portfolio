@extends('layouts.main_layout')

@section('menu')
    @include('menu.main_menu')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="text-center">Просмотр новости</h1>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col">
                <div class="card text-center">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$article->category->name.' ('.$article->type->name.')'}}</h5>
                        <p class="card-text">{{$article->content}}</p>
                        <a href="{{route('articles.index')}}" class="btn btn-primary">На главную</a>
                    </div>
                    <div class="card-footer text-muted">
                        {{$article->date}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection