@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Новости <a href="{{route('articles.create')}}" type="button" class="btn btn-success">Создать новость</a></h1>
            </div>
            <br><br><br>
        </div>
        <div class="row">
            <div class="col">
                <form action="{{route('articles.index')}}" method="GET">
                    <div class="form-group">
                        <label for="period">Выберите период времени</label>
                        <select class="form-control" name="period" id="period">
                            @foreach($periods as $key => $period)
                                <option value="{{$key}}" {{ $key == $options['period'] ? "selected" : ""}}>{{ $period }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="category">Выберите категорию</label>
                        <select class="form-control" id="category" name="category">
                            <option value="0" {{$options['category'] == 0 ? "selected" : ""}}>Все категории</option>
                            @foreach($categories as $key => $category)
                                <option value="{{$key}}" {{$key == $options['category'] ? "selected" : ""}}>{{$category}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mb-2">Поиск</button>
                    </div>
                </form>
            </div>
        </div>
        <br><br>
    </div>
    <div class="container">
        @if($articles->count() > 0)
            @foreach($articles as $row)
                <div class="row">
                    @foreach($row as $article)
                        <div class="col-lg-4">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">{{$article->category->name.' ('.$article->type->name.')'}}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{$article->date}}</h6>
                                    <p class="card-text">{{$article->content}}</p>
                                    <a href="{{route('articles.edit', ['article' => $article->id])}}" class="btn btn-success mb-2">Редактировать</a>
                                    <a href="{{route('articles.show', ['article' => $article->id])}}" class="btn btn-info mb-2">Подробнее</a>
                                    <form action="{{route('articles.destroy', ['article' => $article->id])}}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger mb-2">Удалить</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        @else
            <div class="row">
                <div class="col">
                    <p>Нет новостей ...</p>
                </div>
            </div>
        @endif
    </div>
@endsection