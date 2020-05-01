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
            <div class="row">
                <div class="col-md-10">
                    <form action="{{route('films.show', ['film' => $film->id])}}" method="GET">
                        @foreach(range(0,9) as $item)
                            <div class="form-group form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="statuses[]" value="{{$item}}"
                                           @if(in_array($item, $statuses))checked="checked"@endif>
                                    {{$item}}
                                </label>
                            </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    </form>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-dark pull-right" id="show_translate">Показать</button>
                </div>
            </div>
        </div>
        <div class="container">
            @component('components.words.words_table', ['words' => $film->words])@endcomponent
        </div>
    </section>
    <script>
        document.getElementById('show_translate').onclick = (e) => {
            document.querySelector('.words').classList.toggle('hide_answer');
        }
    </script>
@endsection
@stack('words_table_row_scripts')