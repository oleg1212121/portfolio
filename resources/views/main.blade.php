@extends('layouts.main_layout')

@section('menu')
    @include('menu.main_menu')
@endsection

@section('content')
    <main role="main">
        <section class="jumbotron my-0 text-center">
            <div class="container">
                <h1>Список сотрудников</h1>
                <p class="lead text-muted">
                    На этой странице представлен список подтвержденных сотрудников.
                </p>
                <p>
                    {{--<a href="#" class="btn btn-primary my-2">Main call to action</a>--}}
                    <a href="{{ route('articles.index') }}" class="btn btn-secondary my-2">Перейти к новостям</a>
                </p>
            </div>
        </section>
        <div class="album py-5 bg-light">
            <div class="container">
                @foreach($users as $row)
                    <div class="row">
                        @foreach($row as $user)
                            <div class="col-md-4">
                                <div class="card mb-4 shadow-sm">
                                    <div class="card-header">
                                        <p class="card-text">
                                            <strong>
                                                {{$user->last_name.' '.$user->first_name.' '.$user->middle_name}}
                                            </strong>
                                        </p>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">
                                            {{'Проектов - '.$user->projects->count()}}
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a href="{{route('users.show', ['user' => $user->id])}}" type="button" class="btn btn-sm btn-outline-secondary">Профиль</a>
                                                {{--<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>--}}
                                            </div>
                                            {{--<small class="text-muted">9 mins</small>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
