<header>
    <div class="bg-dark collapse" id="navbarHeader" style="">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <h4 class="text-white">Меню</h4>
                    <ul class="list-unstyled">
                        <li><a href="{{route('users.index')}}" class="text-white">Сотрудники</a></li>
                        <li><a href="{{route('articles.index')}}" class="text-white">Новости</a></li>
                        <li><a href="{{route('jobs.index')}}" class="text-white">Поиск работы</a></li>
                        <li><a href="{{route('services.index')}}" class="text-white">Утилиты</a></li>
                        @guest
                            <li><a href="{{route('register')}}" class="text-white">Регистрация</a></li>
                            <li><a href="{{route('login')}}" class="text-white">Логин</a></li>
                        @else
                            <li>
                                <a class="text-white" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    {{ __('Выход') }}
                                </a>
                            </li>
                        @endguest
                        {{--<li><a href="#" class="text-white">Email me</a></li>--}}
                    </ul>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    {{--<p class="text-muted">На это странице представлен список подтвержденных сотрудников.</p>--}}
                </div>
                <div class="col-sm-4 offset-md-1 py-4">
                    <h4 class="text-white">Контакты</h4>
                    <ul class="list-unstyled">
                        <li><a href="mailto:blr.ymka@tut.by" class="text-white">blr.ymka@tut.by</a></li>
                        <li><a href="https://www.linkedin.com/in/aleksandr-nav-634303182/" class="text-white">LinkedIn</a></li>
                        {{--<li><a href="#" class="text-white">Email me</a></li>--}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
            <a href="{{route('users.index')}}" class="navbar-brand d-flex align-items-center">
                <strong>уМка</strong>
            </a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarHeader"
                    aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</header>