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
                        <div class="col-12 mb-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="start_date">От</label>
                                        <input type="date" class="form-control" id="start_date" name="start_date"
                                               value="{{$options['start_date']}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="end_date">До</label>
                                        <input type="date" class="form-control" id="end_date" name="end_date" value="{{$options['end_date']}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label >Сортировка</label><br>
                                        <input type="radio" style="display: none;" id="asc" name="sort" value="asc"
                                               @if($options['sort'] == 'asc')checked="checked"@endif title="Начиная с поздних">
                                        <input type="radio" style="display: none;" id="desc" name="sort" value="desc"
                                               @if($options['sort'] == 'desc')checked="checked"@endif title="Начиная с ранних">
                                        <label for="asc" class="sorting-label-asc"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i></label>
                                        <label for="desc" class="sorting-label-desc"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btn-success mb-2">Применить фильтр</button>
                                    @auth()
                                        <a href="{{route('articles.create')}}" type="button" class="btn btn-secondary mb-2">Создать заметку</a>
                                    @endauth
                                </div>
                            </div>
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