@extends('layouts.main_layout')

@section('menu')
    @include('menu.main_menu')
@endsection

@section('content')
    <div class="container">
        <br><br>
        <div class="row">
            <div class="col">
                <h1>Заметки</h1>
            </div>
            <br><br><br>
        </div>
        <div class="row">
            <div class="col">
                <form action="{{route('articles.index')}}" method="GET">
                    <div class="form-row">
                        <div class="col">
                            {{--<label for="period">Выберите период времени</label>--}}
                            <select class="form-control" name="period" id="period">
                                @foreach($periods as $key => $period)
                                    <option value="{{$key}}" {{ $key == $options['period'] ? "selected" : ""}}>{{ $period }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
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
                    <div class="col-12">
                        <div class="card" >
                            <div class="card-body">
                                <h5 class="card-title">{{$article->name}}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{$article->date}}</h6>
                                <p class="card-text">{{$article->content}}</p>
                                <a href="{{route('articles.edit', ['article' => $article->id])}}" class="btn btn-success mb-2">Редактировать</a>
                                <a href="{{route('articles.show', ['article' => $article->id])}}" class="btn btn-info mb-2">Подробнее</a>
                                <form action="{{route('articles.destroy', ['article' => $article->id])}}" method="POST" style="display: inline-block;">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger mb-2">Удалить</button>
                                </form>
                            </div>
                        </div>
                        <br>
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