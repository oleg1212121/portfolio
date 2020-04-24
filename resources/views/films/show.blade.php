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
                                <th>Выуч.</th>
                                <th>Зап.</th>
                                <th>Повт.</th>
                                <th>Уточн.</th>
                                <th>Испр.</th>
                                <th>Удал.</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($film->words as $item)
                                <tr class="word-row">
                                    <td width="15px">{{$loop->index + 1}}</td>
                                    <td class="word" width="50px">{{$item->word}}</td>
                                    <td class="answer">
                                        <textarea class="form-control" >{{$item->translate}}</textarea>
                                    </td>
                                    <td width="10px">
                                        <button data-id="{{$item->id}}" data-argument="-100" type="button" class="btn btn-dark mark_word">L
                                        </button>
                                    </td>
                                    <td width="10px">
                                        <button data-id="{{$item->id}}" data-argument="-1" type="button" class="btn btn-info mark_word">+
                                        </button>
                                    </td>
                                    <td width="10px">
                                        <button data-id="{{$item->id}}" data-argument="1" type="button" class="btn btn-info mark_word">-
                                        </button>
                                    </td>
                                    <td width="10px">
                                        <button data-id="{{$item->id}}" type="button" class="btn btn-success translate_word">T
                                        </button>
                                    </td>
                                    <td width="10px">
                                        <button data-id="{{$item->id}}" type="button" class="btn btn-success update_word">U
                                        </button>
                                    </td>
                                    <td width="10px">
                                        <button data-id="{{$item->id}}" type="button" class="btn btn-outline-danger delete_word">X
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
            let token = document.getElementsByName('_token')[0].value;

            // Change word's status
            if (button.classList.contains("mark_word")) {
                $.ajax({
                    type: "POST",
                    url: `/mark_word/${button.getAttribute('data-id')}?argument=${button.getAttribute('data-argument')}`,
                    data: {},
                    headers: {
                        'X-CSRF-Token': token
                    },
                    success: function (res) {
                        button.closest('tr').remove();
                    },
                    error: function (error) {
                        alert('Что-то пошло не так.');
                    }
                });
            }

            // Translate word
            if (button.classList.contains("translate_word")) {
                let textarea = button.closest('tr').querySelector('textarea');
                $.ajax({
                    type: "POST",
                    url: '/translate_word/' + button.getAttribute('data-id'),
                    data: {},
                    headers: {
                        'X-CSRF-Token': token
                    },
                    success: function (res) {
                        textarea.value = res.answer;
                    },
                    error: function (error) {
                        alert('Что-то пошло не так.');
                    }
                });
            }

            // Update word
            if (button.classList.contains("update_word")) {
                let textarea = button.closest('tr').querySelector('textarea');
                $.ajax({
                    type: "POST",
                    url: '/update_word/' + button.getAttribute('data-id'),
                    data: {'translate': textarea.value},
                    headers: {
                        'X-CSRF-Token': token
                    },
                    success: function (res) {
                        textarea.value = res.answer;
                    },
                    error: function (error) {
                        alert('Что-то пошло не так.');
                    }
                });
            }

             // delete word
            if (button.classList.contains("delete_word")) {
                $.ajax({
                    type: "POST",
                    url: '/delete_word/' + button.getAttribute('data-id'),
                    data: {},
                    headers: {
                        'X-CSRF-Token': token
                    },
                    success: function () {
                        button.closest('tr').remove();
                    },
                    error: function (error) {
                        alert('Что-то пошло не так.');
                    }
                });
            }
        };

    </script>
@endsection
