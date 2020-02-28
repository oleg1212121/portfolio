@extends('layouts.main_layout')

@section('menu')
    @include('menu.main_menu')
@endsection

@section('content')
    <div class="container">
        <div class="row my-4">
            <div class="col">
                <h1>Просмотр</h1>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">{{$article->name}}</h5>
                        <span class="card-subtitle mb-2 text-muted">{{$article->date}}</span>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{$article->content}}</p>
                        <hr>
                        <a href="{{route('articles.index')}}" type="button" class="btn btn-secondary mb-2">Назад</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection