@extends('layouts.main_layout')

@section('menu')
    @include('menu.main_menu')
@endsection

@section('content')
    <div class="container">
        <div class="row my-4">
            <div class="col">
                <h1>Создание заметки</h1>
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
        <div class="row mb-4">
            <div class="col">
                <form action="{{route('articles.store')}}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-group">
                        <label for="name">Название заметки</label>
                        <input type="text" class="form-control" id="name" name="name" required pattern=".{1,255}"
                               placeholder="Введите название">
                    </div>
                    <div class="form-group">
                        <label for="content">Контентная часть заметки</label>
                        <textarea class="form-control" id="content" name="content" rows="5" cols="10" required maxlength="9999"
                                  placeholder="Содержимое заметки..."></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success mb-2">Создать</button>
                        <a href="{{route('articles.index')}}" type="button" class="btn btn-secondary mb-2">Назад</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection