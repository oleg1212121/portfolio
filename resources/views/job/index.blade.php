@extends('layouts.main_layout')

@section('menu')
    @include('menu.main_menu')
@endsection

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3 class="text-center">Медведь выискивает работу</h3>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <canvas id="canvas" width="600" height="350"></canvas>
                </div>
            </div>
        </div>
    </section>
@endsection

{{--@section('scripts')--}}
    {{--<script src="{{asset('js/main.js')}}"></script>--}}
{{--@endsection--}}