@extends('layouts.main_layout')

@section('menu')
    @include('menu.main_menu')
@endsection

@section('content')
    <section>
        <div class="container">
            <div class="row my-4">
                <div class="col">
                    <h1>Создание фильма</h1>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col">
                    <form action="{{route('films.store')}}" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Название фильма</label>
                            <input type="text" class="form-control" id="title" name="title" required pattern=".{1,255}"
                                   placeholder="Введите название">
                        </div>
                        <div class="form-group">
                            <label for="file">Контентная часть заметки</label>
                            <input type="file" class="form-control" id="file" name="file" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success mb-2">Создать</button>
                            <a href="{{route('films.index')}}" type="button" class="btn btn-secondary mb-2">Назад</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
