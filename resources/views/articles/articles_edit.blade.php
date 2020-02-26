@extends('layouts.main_layout')

@section('menu')
    @include('menu.main_menu')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Редактирование заметки</h1>
            </div>
        </div>
        @if(count($errors->all()) > 0)
            <div class="row">
                <div class="col">
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first() }}
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col">
                <form action="{{route('articles.update', ['article' => $article->id])}}" method="POST" novalidate class="needs-validation">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="name">Название заметки</label>
                        <input required pattern=".{1,255}" type="text" class="form-control" id="name" name="name" value="{{$article->name}}">
                    </div>
                    <div class="form-group">
                        <label for="content">Контентная часть</label>
                        <textarea required maxlength="9999" class="form-control" id="content" name="content">{{ $article->content }}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success mb-2">Сохранить</button>
                        <a href="{{route('articles.index')}}" type="button" class="btn btn-dark mb-2">Назад</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection