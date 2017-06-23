<table class="table table-responsive" id="tramitacaos-table">
    <thead>
        <th>Data da Tramitação</th>
        <th>Origem</th>
        <th>Destino</th>
        <th>Usuário</th>
        <th>Tipo de Tramitação</th>
        <th>Despacho</th>
        <th>Documento</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($tramitacaos as $tramitacao)
        <tr>
            <td>{!! $tramitacao->data_tram !!}</td>
            <td>{!! $tramitacao->origem !!}</td>
            <td>{!! $tramitacao->destino !!}</td>
            <td>{!! $tramitacao->id_usu !!}</td>
            <td>{!! $tramitacao->tipo_tram !!}</td>
            <td>{!! $tramitacao->despacho !!}</td>
            <td>{!! $tramitacao->id_doc !!}</td>
            <td>
                {!! Form::open(['route' => ['tramitacaos.destroy', $tramitacao->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('tramitacaos.show', [$tramitacao->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('tramitacaos.edit', [$tramitacao->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>