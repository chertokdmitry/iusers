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
    {{ Form::text('organization', null, ['class'=>'text-black-50','readonly']) }}
</div>
<div class="form-group">
    {{ Form::label('type_id', 'Тип пользователя') }}
    <br>
    {!! Form::select('type_id', $types, null, ['placeholder' => 'Выберите роль']) !!}
</div>
<div class="form-group">
    {{ Form::submit('Сохранить', ['class' => 'btn btn-outline-primary']) }}
</div>
