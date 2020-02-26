@extends('layouts.main_layout')

@section('menu')
    @include('menu.main_menu')
@endsection

@section('content')
    <div class="container">
        <div class="row my-4">
            <div class="col">
                <h1>Заметки</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="{{route('articles.index')}}" method="GET">
                    <div class="form-row">
                        <div class="col-md-6 mb-2">
                            <select class="form-control" name="period" id="period">
                                @foreach($periods as $key => $period)
                                    <option value="{{$key}}" {{ $key == $options['period'] ? "selected" : ""}}>{{ $period }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success mb-2">Поиск</button>
                            <a href="{{route('articles.create')}}" type="button" class="btn btn-dark mb-2">Создать заметку</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br><br>
    </div>
    <div class="container">
        @if($articles->count() > 0)
            <div class="row">
                @foreach($articles as $article)
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-secondary mb-3">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-10">
                                        <a href="{{route('articles.show', ['article' => $article->id])}}">
                                            <h5 class="card-title">{{$article->name}}</h5>
                                        </a>
                                        <span class="card-subtitle mb-2 text-muted">{{$article->date}}</span>
                                    </div>
                                    <div class="col-2">
                                        <form action="{{route('articles.destroy', ['article' => $article->id])}}"
                                              method="POST">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="close" title="Удалить?">
                                                <span style="color: #ff362e;" aria-hidden="true">&times;</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body text-secondary">
                                <p class="card-text">{{$article->content}}</p>
                                <hr>
                                <a href="{{route('articles.edit', ['article' => $article->id])}}" class="btn btn-secondary">Редактировать</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="row">
                <div class="col">
                    <p>Нет заметок ...</p>
                </div>
            </div>
        @endif
        <br><br>
    </div>
@endsection