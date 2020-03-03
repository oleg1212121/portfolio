@extends('layouts.main_layout')

@section('menu')
    @include('menu.main_menu')
@endsection

@section('content')
    <section>
        <div class="container">
            <div class="row my-4">
                <div class="col">
                    <h1>Уникальные пользователи (за последние 25 дней)</h1>
                </div>
            </div>
            @foreach($clients as $key => $client)
                <div class="row mb-4">
                    <div class="col">
                        <b>{{'Клиент - '.$key}}</b>
                        <br>
                        @foreach($client as $k => $ip)
                            {{'----------- ip - '.$k.' ('.$ip->count().' - переходов)'}}
                            <br>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection