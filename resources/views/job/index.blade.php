@extends('layouts.main_layout')

@section('menu')
    @include('menu.main_menu')
@endsection

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3 class="text-center">Вакансии career.habr.com</h3>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col text-center">
                    <canvas id="canvas" width="600" height="350"></canvas>
                </div>
            </div>
            <div class="row">
                @foreach($jobs as $item)
                    <div class="col-md-6 col-lg-4">
                        <div class="media">
                            <div class="media-body">
                                <h5 class="mt-0">
                                    <a href="{{$item->get_link()}}">
                                        {{$item->get_title()}}
                                    </a>
                                </h5>
                                {{$item->get_description()}}
                            </div>
                        </div>
                        <hr>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

{{--@section('scripts')--}}
    {{--<script src="{{asset('js/main.js')}}"></script>--}}
{{--@endsection--}}