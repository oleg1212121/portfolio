<div class="col" style="border: 1px dashed grey; margin-bottom: 10px;">
    <div class="form-group">
        <label>Название проекта</label>
        <input type="text" class="form-control" name="projects[{{$project->id ?? -1}}][name]" value="{{$project->name ?? ''}}">
    </div>
    <div class="form-group">
        <label>Ссылка на проект</label>
        <input type="text" class="form-control" name="projects[{{$project->id ?? -1}}][link]" value="{{$project->link ?? ''}}">
    </div>
    <div class="form-group">
        <label>Описание проекта</label>
        <textarea class="form-control" name="projects[{{$project->id ?? -1}}][desc]"  rows="5">{{$project->desc ?? ''}}</textarea>
    </div>
    <div class="form-group">
        <button type="button" class="btn btn-danger delete-project">Удалить</button>
    </div>
</div>

