@extends('layouts.main_layout')

@section('menu')
    @include('menu.main_menu')
@endsection

@section('content')
    <section>
        <div class="container">
            <div class="row my-4">
                <div class="col">
                    <h1>Фильмы</h1>
                    @csrf
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a href="{{route('films.create')}}" type="button" class="btn btn-dark mb-2">Создать</a>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="words table table-striped hide_answer">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Фильм</th>
                                <th>Перейти к словарю</th>
                                <th>Удалить</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($films as $key => $item)
                                <tr class="word-row">
                                    <td>{{$key}}</td>
                                    <td class="film">{{$item}}</td>
                                    <td>
                                        <a href="{{route('films.show', $key)}}" type="button" class="btn btn-dark mark_word">>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{route('films.destroy', ['film' => $key])}}"
                                              method="POST">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="close" title="Удалить?">
                                                <span style="color: #ff362e;" aria-hidden="true">&times;</span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--<script>--}}
        {{--document.querySelector('tbody').onclick = function (e) {--}}
            {{--let button = e.target;--}}
            {{--if (button.classList.contains("mark_word")) {--}}
                {{--$.ajax({--}}
                    {{--type: "POST",--}}
                    {{--url: '/mark_word/' + button.getAttribute('data-id'),--}}
                    {{--data: {},--}}
                    {{--headers: {--}}
                        {{--'X-CSRF-Token': document.getElementsByName('_token')[0].value--}}
                    {{--},--}}
                    {{--success: function (res) {--}}
                        {{--button.closest('tr').remove();--}}
                    {{--},--}}
                    {{--error: function (error) {--}}
                        {{--alert('Что-то пошло не так.');--}}
                    {{--}--}}
                {{--});--}}
            {{--}--}}

        {{--};--}}
        {{--document.getElementById('show_translate').onclick = (e) => {--}}
            {{--document.querySelector('.words').classList.toggle('hide_answer');--}}
        {{--}--}}
    {{--</script>--}}
@endsection
