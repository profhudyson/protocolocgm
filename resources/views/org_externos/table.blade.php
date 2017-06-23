<table class="table table-responsive" id="orgExternos-table">
    <thead>
        <th>Descricao</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($orgExternos as $orgExterno)
        <tr>
            <td>{!! $orgExterno->descricao !!}</td>
            <td>
                {!! Form::open(['route' => ['orgExternos.destroy', $orgExterno->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('orgExternos.show', [$orgExterno->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('orgExternos.edit', [$orgExterno->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>