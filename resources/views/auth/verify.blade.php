@extends('layouts.main_layout')

@section('menu')
    @include('menu.main_menu')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Подтверждение e-mail адреса</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Ссылка на подтверждение отправлена на ваш e-mail
                        </div>
                    @endif

                    Проверьте почту перед продолжением
                    Если вы не получили письмо:
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Нажмите, чтобы отправить еще</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
