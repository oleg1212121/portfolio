<div class="col" style="border: 1px dashed grey; margin-bottom: 10px;">
    <div class="form-group">
        <label>Специальность</label>
        <input type="text" class="form-control" name="educations[{{$education->id ?? -1}}][name]" value="{{$education->name ?? ''}}">
    </div>
    <div class="form-group">
        <label>Образовательное учреждение</label>
        <input type="text" class="form-control" name="educations[{{$education->id ?? -1}}][institute]" value="{{$education->institute ?? ''}}">
    </div>
    <div class="form-group">
        <label>Начало обучения</label>
        <input type="date" class="form-control" name="educations[{{$education->id ?? -1}}][start]" value="{{$education->start ?? ''}}">
    </div>
    <div class="form-group">
        <label>Конец обучения</label>
        <input type="date" class="form-control" name="educations[{{$education->id ?? -1}}][end]" value="{{$education->end ?? ''}}">
    </div>
    <div class="form-group">
        <label>Описание</label>
        <textarea class="form-control" name="educations[{{$education->id ?? -1}}][desc]">{{$education->desc ?? ''}}</textarea>
    </div>
    <div class="form-group">
        <button type="button" class="btn btn-danger delete-education">Удалить</button>
    </div>
</div>