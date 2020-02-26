<div class="col" style="border: 1px dashed grey; margin-bottom: 10px;">
    <div class="form-group">
        <label>Специальность</label>
        <input type="text" class="form-control" name="educations[{{$education->id ?? -1}}][name]"
               value="{{$education->name ?? ''}}" required pattern=".{1,255}">
    </div>
    <div class="form-group">
        <label>Образовательное учреждение</label>
        <input type="text" class="form-control" name="educations[{{$education->id ?? -1}}][institute]"
               value="{{$education->institute ?? ''}}" required pattern=".{1,255}">
    </div>
    <div class="form-group">
        <label>Начало обучения</label>
        <input type="date" class="form-control" name="educations[{{$education->id ?? -1}}][start]"
               value="{{$education->start ?? ''}}" required>
    </div>
    <div class="form-group">
        <label>Конец обучения</label>
        <input type="date" class="form-control" name="educations[{{$education->id ?? -1}}][end]"
               value="{{$education->end ?? ''}}" required>
    </div>
    <div class="form-group">
        <label>Описание</label>
        <textarea class="form-control" name="educations[{{$education->id ?? -1}}][desc]"
                  required maxlength="9999">{{$education->desc ?? ''}}</textarea>
    </div>
    <div class="form-group">
        <button type="button" class="btn btn-danger delete-education">Удалить</button>
    </div>
</div>