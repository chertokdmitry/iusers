@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                Пожалуйста, заполните все поля
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                Редактировать пользователя
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    {{ Form::model($model, ['url' => route('users.update', ['user' => $model]), 'method' => 'PATCH']) }}
                    @include('blocks.fields_edit', ['types' => $types])
                    {{ Form::close() }}
                </li>
            </ul>
        </div>
    </div>
@endsection
