<table class="table table-responsive" id="usuarios-table">
    <thead>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Remember Token</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Id Dep</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($usuarios as $usuario)
        <tr>
            <td>{!! $usuario->name !!}</td>
            <td>{!! $usuario->email !!}</td>
            <td>{!! $usuario->password !!}</td>
            <td>{!! $usuario->remember_token !!}</td>
            <td>{!! $usuario->created_at !!}</td>
            <td>{!! $usuario->updated_at !!}</td>
            <td>{!! $usuario->id_dep !!}</td>
            <td>
                {!! Form::open(['route' => ['usuarios.destroy', $usuario->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('usuarios.show', [$usuario->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('usuarios.edit', [$usuario->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>