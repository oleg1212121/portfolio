@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Редактирование новости</h1>
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
                <form action="{{route('articles.update', ['article' => $article->id])}}" method="POST">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="type">Выберите тип новости</label>
                        <select class="form-control" name="type_id" id="type">
                            <option value="" disabled>Выберите тип</option>
                            @foreach($types as $key => $type)
                                <option value="{{$key}}" {{ $key == $article->type_id ? "selected" : ""}}>{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="category">Выберите категорию новости</label>
                        <select class="form-control" id="category" name="category_id">
                            <option value="" disabled>Выберите категорию</option>
                            @foreach($categories as $key => $category)
                                <option value="{{$key}}" {{ $key == $article->category_id ? "selected" : ""}}>{{$category}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="content">Контентная часть новости</label>
                        <textarea class="form-control" id="content" name="content">{{ $article->content }}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mb-2">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection