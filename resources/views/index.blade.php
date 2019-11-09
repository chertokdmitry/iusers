@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            Укажите правильные даты
        </div>
    @endif
        <div>
            <table class="table">
                <tr>
                    <th>ФИО</th>
                    <th>Время создания</th>
                    <th>Тип пользователя</th>
                    <th>Роли</th>
                    <th>Организация</th>
                    <th>Действия</th>
                </tr>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->fio }}</td>
                        <td>
                            {{ date('d M Y h:m', strtotime($item->created_at)) }}
                        </td>
                        <td>
                            {{ $item->type->name }}
                        </td>
                        <td>
                            @include('blocks.roles')
                        </td>
                        <td>
                            {{ $item->organization }}
                        </td>
                        <td>
                            {{ link_to(route('users.edit', ['user' => $item]), 'изменить',
                                ['class' => 'btn btn-sm btn-outline-info']) }}

                            @include('blocks.form_delete')
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        @if ($links)
        {{ $items->links() }}
        @endif
@endsection
