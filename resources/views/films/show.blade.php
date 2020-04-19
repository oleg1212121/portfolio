@extends('layouts.main_layout')

@section('menu')
    @include('menu.main_menu')
@endsection

@section('content')
    <section>
        <div class="container">
            <div class="row my-4">
                <div class="col">
                    <h1>Фильм - {{$film->title . '(' . $film->words->count() .')'}}</h1>
                    @csrf
                </div>
            </div>
            <div class="row mb-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="words table table-striped hide_answer">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Слово</th>
                                <th>Перевод</th>
                                <th>Отметить</th>
                                <th>Уточнить</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($film->words as $item)
                                <tr class="word-row">
                                    <td>{{$item->id}}</td>
                                    <td class="word">{{$item->word}}</td>
                                    <td class="answer">{{$item->translate}}</td>
                                    <td>
                                        <button data-id="{{$item->id}}" type="button" class="btn btn-dark mark_word">+
                                        </button>
                                    </td>
                                    <td>
                                        <button data-id="{{$item->id}}" type="button" class="btn btn-outline-success translate_word">T
                                        </button>
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
    <script>
        document.querySelector('tbody').onclick = function (e) {
            let button = e.target;
            if (button.classList.contains("mark_word")) {
                $.ajax({
                    type: "POST",
                    url: '/mark_word/' + button.getAttribute('data-id'),
                    data: {},
                    headers: {
                        'X-CSRF-Token': document.getElementsByName('_token')[0].value
                    },
                    success: function (res) {
                        button.closest('tr').remove();
                    },
                    error: function (error) {
                        alert('Что-то пошло не так.');
                    }
                });
            }
            if (button.classList.contains("translate_word")) {
                $.ajax({
                    type: "POST",
                    url: '/translate_word/' + button.getAttribute('data-id'),
                    data: {},
                    headers: {
                        'X-CSRF-Token': document.getElementsByName('_token')[0].value
                    },
                    success: function (res) {
                        // console.log(button.closest('tr').cells[2]);
                        button.closest('tr').cells[2].innerText = res.answer;
                    },
                    error: function (error) {
                        alert('Что-то пошло не так.');
                    }
                });
            }

        };

    </script>
@endsection
