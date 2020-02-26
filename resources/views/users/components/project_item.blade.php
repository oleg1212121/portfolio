<div class="col" style="border: 1px dashed grey; margin-bottom: 10px;">
    <div class="form-group">
        <label>Название проекта</label>
        <input type="text" class="form-control" name="projects[{{$project->id ?? -1}}][name]" value="{{$project->name ?? ''}}"
               required pattern=".{1,255}">
    </div>
    <div class="form-group">
        <label>Ссылка на проект</label>
        <input type="url" class="form-control" name="projects[{{$project->id ?? -1}}][link]" value="{{$project->link ?? ''}}"
               required pattern="http(s)?://.*">
    </div>
    <div class="form-group">
        <label>Описание проекта</label>
        <textarea class="form-control" name="projects[{{$project->id ?? -1}}][desc]"  rows="5"
                  required maxlength="9999">{{$project->desc ?? ''}}</textarea>
    </div>
    <div class="form-group">
        <button type="button" class="btn btn-danger delete-project">Удалить</button>
    </div>
</div>

