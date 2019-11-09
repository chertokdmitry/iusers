<p>
{{ Form::open(array('route' => array('users.destroy', $item), 'method' => 'post')) }}
{{ method_field('DELETE') }}
{{ Form::submit('удалить', ['class' => 'btn btn-sm btn-outline-danger']) }}
{{ Form::close() }}
</p>
