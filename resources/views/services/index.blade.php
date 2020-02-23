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
            <div class="row">
                <div class="col">
                    <h3 class="text-center">
                        Калькулятор
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <form method="post" action="/services/calculator">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="expected">Обучение</label>
                                <div class="input-group">
                                    <input id="learning" type="checkbox" value="1" name="learning"  aria-label="Режим обучения">
                                    <input id="expected" name="expected"  step="0.01" type="range" class="form-control"
                                           min="0.5" max="1"  placeholder="Введите" aria-label="Введите">
                                    <span class="expected">
                                        0.75
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="salary">Зарплата</label>
                                <div class="input-group">
                                    <input id="salary" name="salary"  step="10" type="range" class="form-control"
                                           min="0" max="10000"  placeholder="Введите" aria-label="Введите">
                                    <span class="salary">
                                        5000
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="vacation">Отпуск</label>
                                <div class="input-group">
                                    <input id="vacation" name="vacation"  step="1" type="range" class="form-control"
                                           min="0" max="40"  placeholder="Введите" aria-label="Введите">
                                    <span class="vacation">
                                        20
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="work-form">Форма работы</label>
                                <div class="input-group" id="work-form">
                                    <input type="radio" name="work-form" value="0" aria-label="Офис" checked="checked">
                                    <input type="radio" name="work-form" value="1" aria-label="Удаленная">
                                    <span class="work-form">
                                        Офис
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12"><h3>Компенсации</h3></div>
                            <div class="col">
                                <div class="input-group">
                                    <label for="sport">Физ.активность</label>
                                    <input id="sport" type="checkbox" value="1" name="sport"  aria-label="Компенсация физической активности">
                                </div>
                                <div class="input-group">
                                    <label for="food">Обеды</label>
                                    <input id="food" type="checkbox" value="1" name="food"  aria-label="Компенсация обедов">
                                </div>
                                <div class="input-group">
                                    <label for="medicine">Мед. страховка</label>
                                    <input id="medicine" type="checkbox" value="1" name="medicine"  aria-label="Компенсация мед. страховки">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-success" type="submit">Отправить</button>
                            </div>
                        </div>
                    </form>
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
            };

            // todo: refactoring/reworking

            document.getElementById('salary').onchange = function () {
                console.log(document.getElementsByClassName('salary'));
                document.getElementsByClassName('salary')[0].textContent =
                    document.getElementById('salary').value;

            };
            document.getElementById('vacation').onchange = function () {
                document.getElementsByClassName('vacation')[0].textContent =
                    document.getElementById('vacation').value;

            };
            document.getElementById('expected').onchange = function () {
                document.getElementsByClassName('expected')[0].textContent =
                    document.getElementById('expected').value;

            };
            document.getElementById('work-form').onclick = function (e) {
                document.getElementsByClassName('work-form')[0].textContent =
                    !!(+e.target.value) ? 'Удаленка' : 'Офис';

            }

    </script>
@endsection