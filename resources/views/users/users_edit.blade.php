@extends('layouts.main_layout')

@section('menu')
    @include('menu.main_menu')
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <h3>
                    Редактирование
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                @if(count($errors->all()) > 0)
                    <div class="row">
                        <div class="col">
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first() }}
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form method="post" action="{{route('users.update', ['user' => $user->id])}}" enctype="multipart/form-data" novalidate class="needs-validation">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="last_name">Фамилия</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{$user->last_name}}"
                               required pattern="[A-Za-zА-Яа-яЁё\s\-]{1,255}">
                    </div>
                    <div class="form-group">
                        <label for="first_name">Имя</label>
                        <input type="text" class="form-control" id="first_name" name="first_name"
                               value="{{$user->first_name}}" required pattern="[A-Za-zА-Яа-яЁё\s\-]{1,255}">
                    </div>
                    <div class="form-group">
                        <label for="middle_name">Отчество</label>
                        <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{$user->middle_name}}"
                               required pattern="[A-Za-zА-Яа-яЁё\s\-]{1,255}">
                    </div>
                    <div class="form-group">
                        <label for="email">Почта</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}"
                               required>
                    </div>
                    <div class="form-group">
                        <label for="skype">Skype</label>
                        <input type="text" class="form-control" id="skype" name="skype" value="{{$user->skype}}"
                               required pattern=".{1,255}">
                    </div>

                    <div class="form-group">
                        <label for="linkedin">Linkedin</label>
                        <input type="url" class="form-control" id="linkedin" name="linkedin" value="{{$user->linkedin}}"
                               required pattern="http(s)?://.*">
                    </div>
                    <div class="form-group">
                        <label for="cv">Резюме</label>
                        <input type="url" class="form-control" id="cv" name="cv" value="{{$user->cv}}"
                               required pattern="http(s)?://.*">
                    </div>
                    <div class="form-group">
                        <label for="image">Изображение</label>
                        <input type="file" class="form-control" id="image" name="image" value="{{$user->image}}">
                        @isset($user->image)
                            {{'Текущее изображение - '.$user->image}}
                        @endisset
                    </div>

                    <div class="form-group">
                        <label for="skills">Навыки</label>
                        <select multiple class="form-control" name="skills[]" id="skills">
                            <option value="" disabled>Выберите навыки</option>
                            @foreach($skills as $key => $skill)
                                <option value="{{$key}}" {{$user->skills->contains($key) ? 'selected="selected"' : ''}}>{{$skill}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group projects">
                        <label>Проекты</label>
                        @foreach($user->projects as $project)
                            <div class="row">
                               @component('users.components.project_item', ['project' => $project])@endcomponent
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-success mb-2" id="create-project">Добавить проект</button>
                    </div>
                    <div class="form-group educations">
                        <label>Учебные заведения</label>
                        @foreach($user->educations as $education)
                            <div class="row">
                               @component('users.components.education_item', ['education' => $education])@endcomponent
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-success mb-2" id="create-education">Добавить учебное заведение</button>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success mb-2">Сохранить текущие изменения</button>
                        <a href="{{route('users.show', ['user' => auth()->id()])}}" type="button" class="btn btn-dark mb-2">Назад</a>
                    </div>
                </form>
                <br><br>
                <form action="{{route('users.destroy', ['user' => $user->id])}}" method="POST" style="display: inline-block;">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger mb-2">Удалить профиль</button>
                </form>
            </div>
        </div>
    </div>
    <template id="project-template">
        <div class="row">
            @component('users.components.project_item', ['project' => new stdClass()])@endcomponent
        </div>
    </template>
    <template id="education-template">
        <div class="row">
            @component('users.components.education_item', ['education' => new stdClass()])@endcomponent
        </div>
    </template>
@endsection

@push('scripts')
    <script>
        var counter = -2;

        document.getElementById('create-project').onclick = function (e) {
            var template = document.getElementById('project-template');
            var inputs = template.content.querySelectorAll('input, textarea');
            for(var i = 0; i < inputs.length; i++){
                inputs[i].name = inputs[i].name.replace( counter + 1, counter);
            }
            var project =  document.importNode(template.content, true);
            document.querySelector('div.projects').append(project);
            counter--;
        };

        document.getElementsByClassName('projects')[0].onclick = function (e) {
            var target = e.target;
            if(target.classList.contains('delete-project')){
                target.closest('div.row').remove();
            }
        } ;
        document.getElementById('create-education').onclick = function (e) {
            var template = document.getElementById('education-template');
            var inputs = template.content.querySelectorAll('input, textarea');
            for(var i = 0; i < inputs.length; i++){
                inputs[i].name = inputs[i].name.replace( counter + 1, counter);
            }
            var education =  document.importNode(template.content, true);
            document.querySelector('div.educations').append(education);
            counter--;
        };

        document.getElementsByClassName('educations')[0].onclick = function (e) {
            var target = e.target;
            if(target.classList.contains('delete-education')){
                target.closest('div.row').remove();
            }
        }
    </script>
@endpush