@extends('layouts.main_layout')

@section('menu')
    @include('menu.main_menu')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Регистрация</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" novalidate class="needs-validation">
                        @csrf
                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">Фамилия</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                                       name="last_name" value="{{ old('last_name') }}" required pattern="[A-Za-zА-Яа-яЁё\s\-]{1,255}"
                                       autocomplete="last_name" autofocus placeholder="Фамилия">

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">Имя</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror"
                                       name="first_name" value="{{ old('first_name') }}" required pattern="[A-Za-zА-Яа-яЁё\s\-]{1,255}"
                                       placeholder="Имя" autocomplete="first_name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="middle_name" class="col-md-4 col-form-label text-md-right">Отчество</label>

                            <div class="col-md-6">
                                <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror"
                                       name="middle_name" value="{{ old('middle_name') }}" required pattern="[A-Za-zА-Яа-яЁё\s\-]{1,255}"
                                       placeholder="Отчество" autocomplete="middle_name" autofocus>

                                @error('middle_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="skype" class="col-md-4 col-form-label text-md-right">{{ __('Skype') }}</label>

                            <div class="col-md-6">
                                <input id="skype" type="text" class="form-control @error('skype') is-invalid @enderror"
                                       name="skype" value="{{ old('skype') }}" required pattern=".{1,255}" autocomplete="skype"
                                       placeholder="skype12131" autofocus>

                                @error('skype')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cv" class="col-md-4 col-form-label text-md-right">Резюме</label>

                            <div class="col-md-6">
                                <input id="cv" type="url" class="form-control @error('cv') is-invalid @enderror"
                                       name="cv" value="{{ old('cv') }}" required pattern="http(s)?://.*" autocomplete="cv"
                                       placeholder="http://*" autofocus>

                                @error('cv')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="linkedin" class="col-md-4 col-form-label text-md-right">{{ __('Linkedin') }}</label>

                            <div class="col-md-6">
                                <input id="linkedin" type="url" class="form-control @error('linkedin') is-invalid @enderror"
                                       name="linkedin" value="{{ old('linkedin') }}" required pattern="http(s)?://.*"
                                       placeholder="http://*" autocomplete="linkedin" autofocus>

                                @error('linkedin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-mail адрес</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email"
                                       placeholder="email@gmail.com">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Пароль</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid
                                 @enderror" name="password" required pattern=".{8,255}" autocomplete="new-password"
                                       placeholder="1234Glpa">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Подтверждение пароля</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" required pattern=".{8,255}"
                                       placeholder="1234Glpa" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    Регистрация
                                </button>
                                <a href="{{route('users.index')}}" type="button" class="btn btn-dark">Назад</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <br><br><br>
@endsection
