@extends('layouts.layout')
@section('content')
    <!--EDUCATION-->
    <section class="white-bg" id="education">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h3 class="title-small">
                        <span>Образование</span>
                    </h3>
                    <p class="content-detail">
                        Оконченные учебные заведения.
                    </p>
                </div>
                <div class="col-md-9 content-right">
                    <div class="row">
                        <ul class="listing-item">
                            @foreach($user->educations as $education)
                                <li>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="wrap-card">
                                            <div class="card">
                                                <h2 class="year">
                                                    {{"{$education->start} - {$education->end}"}}
                                                </h2>
                                                <p class="job">
                                                    {{$education->name}}
                                                </p>
                                                <p class="company">
                                                    {{$education->institute}}
                                                </p>
                                                <hr>
                                                <div class="text-detail">
                                                    <p>
                                                        {{$education->desc}}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/.EDUCATION END-->
@endsection