<div class="form-group">
    {{ Form::label('fio', 'ФИО') }}
    <br>
    {{ Form::text('fio') }}
</div>
<div class="form-group">
    {{ Form::label('birth', 'Дата рождения') }}
    <br>
    {{ Form::date('birth') }}
</div>
<div class="form-group">
    {{ Form::label('organization', 'Организация') }}
    <br>
    {{ Form::text('organization') }}
</div>
<div class="form-group">
    {{ Form::label('type_id', 'Тип пользователя') }}
    <br>
    {!! Form::select('type_id', $types, null, ['placeholder' => 'Выберите роль']) !!}
</div>
<div class="form-group">
    <div class="form-group" id="roles">

    </div>
</div>
<div class="form-group">
    {{ Form::submit('Сохранить', ['class' => 'btn btn-outline-primary']) }}
</div>
