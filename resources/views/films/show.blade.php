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
                    @component('components.words.words_table', ['words' => $film->words])@endcomponent
                </div>
            </div>
        </div>
    </section>

@endsection
@stack('words_table_row_scripts')