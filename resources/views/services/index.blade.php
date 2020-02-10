@extends('layouts.main_layout')

@section('menu')
    @include('menu.main_menu')
@endsection

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3 class="text-center">
                        Получить хэш строки
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="input-group mb-3">
                        @csrf
                        <input type="text" class="form-control" placeholder="Введите строку" aria-label="Введите строку"
                               aria-describedby="button-addon2" id="hash-input">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Получить</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <span id="hash-result"></span>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.getElementById('button-addon2').onclick = function (){
            var span = document.getElementById('hash-result'),
                csrf = document.getElementsByName('_token')[0].value,
                _data = {
                    value: document.getElementById('hash-input').value,
                };
            $.ajax({
                type: "POST",
                url: '/services/get-hash',
                data: _data,
                headers: {
                    'X-CSRF-Token': csrf
                },
                success: function (res) {
                    span.textContent = res;
                },
                error: function (error) {
                    span.textContent = error;
                }
            });
        }
    </script>
@endsection